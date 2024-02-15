<?php

class Login extends JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setTheme('admin');
    }
    public function index()
    {
        $dt = $this->__init();
        if ($this->admin_login) {
            redir(base_url_admin(""));
            return;
        }
        $data = array();
        $this->setTitle('Login Admin');

        $data['hello'] = "this is from controller";

        $this->putThemeContent("login/home", $data); //pass data to view
        $this->putJsReady("login/home.bottom", $data);

        $this->loadLayout("login", $data);
        $this->render();
    }
}
