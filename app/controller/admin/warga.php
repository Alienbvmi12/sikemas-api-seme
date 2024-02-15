<?php

class Warga extends JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setTheme('admin');
        $this->load('posisi_model', 'posisi');
        $this->load('admin/alamat_model', 'alamat');
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
        $data['active'] = "warga";
        $data['posisi'] = $this->posisi->get();
        $data['alamat'] = $this->alamat->get("");

        $this->putThemeContent("warga/home", $data); //pass data to view
        $this->putJsReady("warga/home.bottom", $data);

        $this->loadLayout("col-1", $data);
        $this->render();
    }
}