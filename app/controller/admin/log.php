<?php

class Log extends JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setTheme('admin');
    }
    public function index()
    {
        $dt = $this->__init();
        if (!$this->admin_login) {
            redir(base_url_admin("login/"));
            return;
        }
        $data = array();
        $this->setTitle('Dashboard');
        $data['admin'] = $this->getKey()->admin;
        $data['active'] = "log";

        $this->putThemeContent("log/home", $data); //pass data to view
        $this->putJsReady("log/home.bottom", $data);

        $this->loadLayout("col-1", $data);
        $this->render();
    }
}