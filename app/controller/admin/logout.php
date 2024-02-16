<?php

class Logout extends JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setTheme('admin');
    }
    public function index()
    {
        $dt = $this->__init();
        $data = $this->getKey();
        if (!$this->admin_login) {
            redir(base_url_admin("login/"));
            return;
        }
        if (isset($data->admin->id)) {
            $user = $data->admin;
            $sess = $data;
            $sess->admin = new \stdClass();
            $this->admin_login = 0;
            $this->setKey($sess);
            redir(base_url_admin("login"), 0, 1);
            return;
        }
    }
}
