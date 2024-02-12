<?php

/**
 * Main Controller Class 
 * Mostly for this controller will resulting HTTP Body Content in HTML format
 *
 * @version 1.0.0
 *
 * @package Controller
 * @since 1.0.0
 */
class Aspirasi extends \JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load('users_model', 'user');
        $this->load('warga_model', 'warga');
        $this->load('aspirasi_model', 'aspirasi');
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
    }

    public function post_aspirasi()
    {
        $this->isAuthorized();

        $requestBody = file_get_contents('php://input');
        $jsonData = json_decode($requestBody, true);

        // http_response_code(500);
        // echo $requestBody;
        // die();

        $this->user->validate($jsonData, $this, 'read', [
            'id' => ['required'],
            'perihal' => ['required', 'min:5', 'max:50'],
            'pesan' => ['required', 'min:5']
        ]);

        $jsonData['user_id'] = $jsonData['id'];
        unset($jsonData["id"]);

        $result = (bool) $this->aspirasi->create($jsonData);

        if (!$result) {
            http_response_code(500);
            $this->status = 500;
            $this->message = 'Internal Server Error';
            $this->__json_out(["result" => false]);
            die();
        }

        http_response_code(200);
        $this->status = 200;
        $this->message = 'Pesan berhasil terkirim, pesan anda akan dibalas oleh pihak yang bersangkutan';
        $this->__json_out(["result" => true]);
        die();
    }
}
