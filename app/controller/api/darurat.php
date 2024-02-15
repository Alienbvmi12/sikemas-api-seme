<?php

use phpFCMv1\Client;
use phpFCMv1\Notification;
use phpFCMv1\Recipient;

class Darurat extends \JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load('users_model', 'user');
        $this->load('warga_model', 'warga');
        $this->load('darurat_model', 'darurat');
    }
    public function index()
    {
        echo "Hello world!!";
    }

    private function isAuthorized()
    {
        $headers = apache_request_headers();
        if (!isset($headers['Authorization'])) {
            http_response_code(401);
            $this->status = 401;
            $this->message = 'Belum Login';
            $this->__json_out(["result" => false]);
            die();
        }

        $token = $headers['Authorization'];
        $token_verify = $this->user->verify_token($token);

        if (!isset($token_verify->id)) {
            http_response_code(422);
            $this->status = 422;
            $this->message = 'Token Invalid';
            $this->__json_out(["result" => false]);
            die();
        }
        else{
            return $token_verify->user_id;
        }
    }

    public function emergency_alarm()
    {
        $user_id = $this->isAuthorized();
        $requestBody = file_get_contents('php://input');
        $jsonData = json_decode($requestBody, true);

        $this->user->validate($jsonData, $this, 'read', [
            'event' => ['required', 'max:50'],
            'option' => ['required'],
            'location' => ['required'],
            'nama' => ['required'],
        ]);

        $to_fill = "";

        if ($jsonData['option'] == "0") {
            $jsonData['location'] = "titik " . $jsonData['location'];
        } else {
            $this->user->validate($jsonData, $this, 'read', [
                'id' => ['required']
            ]);
        }

        if ($jsonData['nama'] != "-") {
            $to_fill = ", kediaman " . $jsonData['nama'];
        }

        $result = $this->sendNotificationToTopic("DARURAT", "Tengah terjadi " . strtoupper($jsonData['event']) . " di " . $jsonData['location'] . $to_fill . ". Semua orang yang berada disekitar lokasi diharapkan untuk membantu/menolong");

        if (gettype($result) == "boolean") {
            if ($jsonData['option'] == "0") {
                $this->darurat->create([
                    "event" => $jsonData['event'],
                    "lokasi" => $jsonData['location'],
                    "user_id" => $user_id
                ]);
            } else {
                $this->darurat->create([
                    "event" => $jsonData['event'],
                    "alamat_id" => $jsonData['id'],
                    "user_id" => $user_id
                ]);
            }

            if ($result) {
                http_response_code(200);
                $this->status = 200;
                $this->message = 'Pesan berhasil disiarkan!!';
                $this->__json_out(["result" => true]);
            } else {
                http_response_code(500);
                $this->status = 500;
                $this->message = 'Internal Server Error';
                $this->__json_out(["result" => false]);
            }
        } else {
            http_response_code(500);
            $this->status = 500;
            $this->message = 'Internal Server Error';
            $this->__json_out(["result" => false]);
        }
    }

    private function sendNotificationToTopic($title, $body, $topic = "emergency")
    {
        $client = new Client(str_replace("app\controller\api", "", __DIR__) . 'service_account.json');
        $recipient = new Recipient();
        $notification = new Notification();

        $recipient->setTopicRecipient($topic);
        $notification->setNotification($title, $body);
        $client->build($recipient, $notification);
        return $client->fire();
    }
}
