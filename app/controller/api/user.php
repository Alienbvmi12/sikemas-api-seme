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
class User extends \JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load('users_model', 'user');
        $this->load('warga_model', 'warga');
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

    public function get($id)
    {
        $this->isAuthorized();

        $this->user->validate(["id" => $id], $this, 'read', [
            'id' => ['required']
        ]);

        $user_data = $this->user->getUserWarga($id);

        if (!isset($user_data->id)) {
            http_response_code(422);
            $this->status = 422;
            $this->message = 'User tidak ditemukan';
            $this->__json_out(["result" => false]);
            die();
        }

        http_response_code(200);
        $this->status = 200;
        $this->message = 'Success';
        $this->__json_out($user_data);
        die();
    }
}