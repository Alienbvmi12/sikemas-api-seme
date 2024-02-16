<?php

class Ronda extends JI_Controller
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
        $data['active'] = "ronda";
        $data['warga'] = $this->warga->get();

        $this->putThemeContent("jadwal_ronda/home", $data); //pass data to view
        $this->putJsReady("jadwal_ronda/home.bottom", $data);

        $this->loadLayout("col-1", $data);
        $this->render();
    }
}