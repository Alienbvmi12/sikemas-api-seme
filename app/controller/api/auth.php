<?php

use PhpOffice\PhpSpreadsheet\Cell\DataType;

class Auth extends JI_Controller
{
    private $user;
    public function __construct()
    {
        parent::__construct();
        $this->load('users_model', 'bum');
        $this->load('warga_model', 'warga');
        $this->user = $this->bum;
    }

    public function index()
    {
        echo "hello";
    }

    private function __passGen($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    private function __passClear($password)
    {
        return preg_replace('/[^a-zA-Z0-9]/', '', $password);
    }
    private function __genTokenMobile($user_id, $username)
    {
        // $this->lib("conumtext");
        $token = '';
        $token = md5($user_id . $username . date("Ymdhisa") . $this->__generateRandomString(5));
        return $token;
    }

    private function __generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    private function __generateOTP($length = 6)
    {
        $characters = '0123456789';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    public function login()
    {
        //init
        $data = array();

        $requestBody = file_get_contents('php://input');
        $jsonData = json_decode($requestBody, true);

        $this->user->validate($jsonData, $this, 'read', [
            'username' => ['required', 'max:50'],
            'password' => ['required', 'min:6', 'max:50']
        ]);

        $jsonData = (object) $jsonData;

        $username = $jsonData->username;
        $password = $jsonData->password;

        $res = $this->bum->auth($username);
        if (isset($res->id)) {
            //check whether the user is inactive
            if (empty($res->is_active)) {
                http_response_code(1708);
                $this->status = 1708;
                $this->message = 'Akun belum diaktivasi';
                $this->__json_out(["result" => false]);
                die();
            }

            //check old password encryption, renew it
            if (md5($password) == $res->password) {
                $res->password = password_hash($password, PASSWORD_BCRYPT);
                $this->bum->update($res->id, array("password" => $res->password));
            }

            //verify the oassword
            if (!password_verify($password, $res->password)) {
                http_response_code(1708);
                $this->status = 1707;
                $this->message = 'Kombinasi email dan/atau password salah';
                $this->__json_out(["result" => false]);
                die();
            }


            // generate mobile token
            $token = $this->__genTokenMobile($res->id, $username);

            $this->user->insert_token(md5($token), $res->id);

            $userdata = [
                "id" => $res->id,
                "email" => $res->email,
                "username" => $res->username,
                "profile" => $res->foto,
                "token" => $token
            ];

            $data = $userdata;

            http_response_code(200);
            $this->status = 200;
            $this->message = 'Success';
            unset($res->password);
        } else {
            http_response_code(1709);
            $this->status = 1709;
            $this->message = 'Kombinasi email dan/atau password salah';
            $data = ["result" => false];
        }

        $this->__json_out($data);
    }

    public function register()
    {
        $data = array();

        $requestBody = file_get_contents('php://input');
        $jsonData = json_decode($requestBody, true);

        $this->user->validate($jsonData, $this, 'insert', [
            'nik' => ['required', 'max:255'],
            'username' => ['required', 'unique', 'max:50', "unique"],
            'email' => ['required', 'max:50', 'email', "unique"],
            'password' => ['required', 'min:6', 'max:50'],
            'confirm_password' => ['required']
        ]);

        if ($jsonData["password"] !== $jsonData["confirm_password"]) {
            http_response_code(1709);
            $this->status = 1709;
            $this->message = 'Password tidak sama';
            $this->__json_out(["result" => false]);
            die();
        }

        $warga = $this->warga->get_by_nik($jsonData["nik"]);

        if (!isset($warga->id)) {
            http_response_code(1709);
            $this->status = 1709;
            $this->message = 'NIK tidak ditemukan';
            $this->__json_out(["result" => false]);
            die();
        }

        $otp = $this->__generateOTP();

        $jsonData["warga_id"] = $warga->id;

        $this->user->validate(['warga_id' => $warga->id], $this, 'insert', [
            'warga_id' => ['required']
        ]);

        //Mark for mysql fun

        $new_user = $this->user->insert_reg([
            "email" => $jsonData["email"],
            "username" => $jsonData["username"],
            "password" => $this->__passGen($jsonData["password"]),
            "warga_id" => $jsonData["warga_id"],
            "email_verify_token" => md5($otp)
        ]);

        //Mark end

        if (!$this->send_otp($jsonData, $otp)) {
            http_response_code(500);
            $this->status = 500;
            $this->message = 'Gagal mengirim email';
            $this->__json_out(["result" => false]);
        }

        http_response_code(200);
        $this->status = 200;
        $this->message = 'Register Success';
        $this->__json_out([
            "reg_id" => $new_user->id,
            "email" => $jsonData['email'],
            "username" => $jsonData['username']
        ]);
    }

    public function send_otp($jsonData = array(), $otp = "", $subject = "Verifikasi Email")
    {
        ob_start();

        $send_result = $this->send_email(
            $jsonData["email"],
            $jsonData["username"],
            $subject,
            "Halo!! ini adalah kode " . strtolower($subject) . " anda <b>$otp</b>"
        );

        ob_end_clean();

        return $send_result;
    }

    public function resend_otp()
    {
        $requestBody = file_get_contents('php://input');
        $jsonData = json_decode($requestBody, true);

        $this->user->validate($jsonData, $this, 'insert', [
            'username' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email'],
            'reg_id' => ['required']
        ]);

        $reg_data = $this->user->findRegData($jsonData);

        if (!isset($reg_data->id)) {
            http_response_code(422);
            $this->status = 422;
            $this->message = 'Data not found';
            $this->__json_out(["result" => false]);
        }

        $user_id = $jsonData['reg_id'];
        $otp = $this->__generateOTP();
        $subject = "Verifikasi Email";

        $this->user->update_reg($user_id, ["email_verify_token" => md5($otp)]);

        ob_start();

        $send_result = $this->send_email(
            $jsonData["email"],
            $jsonData["username"],
            $subject,
            "Halo!! ini adalah kode " . strtolower($subject) . " anda <b>$otp</b>"
        );

        ob_end_clean();

        if ($send_result) {
            http_response_code(200);
            $this->status = 200;
            $this->message = 'Resend Success';
            $this->__json_out(["result" => true]);
        } else {
            http_response_code(500);
            $this->status = 500;
            $this->message = 'Internal Server Error';
            $this->__json_out(["result" => false]);
        }
    }

    public function verify_email()
    {
        $data = array();

        $requestBody = file_get_contents('php://input');
        $jsonData = json_decode($requestBody, true);

        $this->user->validate($jsonData, $this, 'insert', [
            'reg_id' => ['required'],
            'otp' => ['required', 'max:6', 'min:6'],
        ]);

        $user_reg = $this->user->validate_otp_reg($jsonData);

        if (!isset($user_reg->id)) {
            http_response_code(401);
            $this->status = 401;
            $this->message = 'OTP salah';
            $this->__json_out(["result" => false]);
            die();
        }

        $user_reg->is_active = 1;

        // generate mobile token
        $token = $this->__genTokenMobile($user_reg->id, $user_reg->username);

        $new_user = $this->user->activate_user(md5($token), $user_reg);

        $userdata = [
            "id" => $new_user->id,
            "email" => $new_user->email,
            "username" => $new_user->username,
            "profile" => $new_user->foto,
            "token" => $token
        ];

        $data = $userdata;

        http_response_code(200);
        $this->status = 200;
        $this->message = 'Success';
        $this->__json_out($data);
    }

    public function request_reset_password_otp()
    {
        $requestBody = file_get_contents('php://input');
        $jsonData = json_decode($requestBody, true);

        $this->user->validate($jsonData, $this, 'insert', [
            'email' => ['required', 'max:50', 'email'],
        ]);

        $user = $this->user->getByEmail($jsonData["email"]);

        if (!isset($user->id)) {
            http_response_code(422);
            $this->status = 422;
            $this->message = 'User tidak ditemukan';
            $this->__json_out([
                "result" => false
            ]);
        }

        $user_id = $user->id;
        $otp = $this->__generateOTP();
        $subject = "Reset Password";

        $this->user->update($user_id, ["reset_password_token" => md5($otp)]);

        ob_start();

        $send_result = $this->send_email(
            $user->email,
            $user->username,
            $subject,
            "Halo!! ini adalah kode " . strtolower($subject) . " anda <b>$otp</b>"
        );

        ob_end_clean();

        if ($send_result) {
            http_response_code(200);
            $this->status = 200;
            $this->message = 'Kode OTP untuk reset password berhasil dikirim';
            $this->__json_out([
                "result" => true
            ]);
        } else {
            http_response_code(500);
            $this->status = 500;
            $this->message = 'Internal Server Error';
            $this->__json_out([
                "result" => false
            ]);
        }
    }

    public function reset_password_otp_verify()
    {
        $requestBody = file_get_contents('php://input');
        $jsonData = json_decode($requestBody, true);

        $this->user->validate($jsonData, $this, 'insert', [
            'email' => ['required', 'max:50', 'email'],
            'otp' => ['required', 'max:6', 'min:6']
        ]);

        $validate_otp = $this->user->validate_otp_reset_password($jsonData);

        if (isset($validate_otp->id)) {
            http_response_code(200);
            $this->status = 200;
            $this->message = 'Kode OTP berhasil diverifikasi';
            $this->__json_out([
                "result" => true
            ]);
        } else {
            http_response_code(401);
            $this->status = 401;
            $this->message = 'Kode otp salah';
            $this->__json_out([
                "result" => false
            ]);
        }
    }

    public function reset_password()
    {
        $requestBody = file_get_contents('php://input');
        $jsonData = json_decode($requestBody, true);

        $this->user->validate($jsonData, $this, 'insert', [
            'email' => ['required', 'max:50', 'email'],
            'otp' => ['required', 'max:6', 'min:6'],
            'password' => ['required', 'min:6', 'max:50'],
            'confirm_password' => ['required']
        ]);

        if ($jsonData["password"] !== $jsonData["confirm_password"]) {
            http_response_code(1709);
            $this->status = 1709;
            $this->message = 'Password tidak sama';
            $this->__json_out(["result" => false]);
            die();
        }

        $validate_otp = $this->user->validate_otp_reset_password($jsonData);

        if (isset($validate_otp->id)) {
            $currentTimestamp = time();
            $mysqlTimestamp = date("Y-m-d H:i:s", $currentTimestamp);
            $this->user->update($validate_otp->id, [
                "password" => $this->__passGen($jsonData["password"]),
                "updated_at" => $mysqlTimestamp
            ]);

            http_response_code(200);
            $this->status = 200;
            $this->message = 'Berhasil merubah password!!';
            $this->__json_out([
                "result" => true
            ]);
        } else {
            http_response_code(422);
            $this->status = 422;
            $this->message = 'Gagal reset password, OTP tidak valid atau User tidak ada!!';
            $this->__json_out([
                "result" => false
            ]);
        }
    }

    public function logout()
    {
        $requestBody = file_get_contents('php://input');
        $jsonData = json_decode($requestBody, true);

        $this->user->validate($jsonData, $this, 'insert', [
            'token' => ['required'],
        ]);

        $result = $this->user->delete_log($jsonData["token"]);

        http_response_code(200);
        $this->status = 200;
        $this->message = 'Logout Success';
        $this->__json_out([
            "result" => true
        ]);
    }
}
