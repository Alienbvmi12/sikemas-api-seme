<?php

use phpFCMv1\Client;
use phpFCMv1\Notification;
use phpFCMv1\Recipient;

class Alamat extends \JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load('users_model', 'user');
        $this->load('warga_model', 'warga');
        $this->load('alamat_model', 'alamat');
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

    public function search($q = "")
    {
        $this->isAuthorized();

        $result = $this->alamat->get($q);

        http_response_code(200);
        $this->status = 200;
        $this->message = 'get Success';
        $this->__json_out($result);
    }
}
