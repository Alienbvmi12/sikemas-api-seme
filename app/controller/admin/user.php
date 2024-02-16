<?php

class User extends JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setTheme('admin');
        $this->load('admin/warga_model', 'warga');
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
        $data['active'] = "user";
        $data['warga'] = $this->warga->get();

        $this->putThemeContent("user/home", $data); //pass data to view
        $this->putJsReady("user/home.bottom", $data);

        $this->loadLayout("col-1", $data);
        $this->render();
    }
}