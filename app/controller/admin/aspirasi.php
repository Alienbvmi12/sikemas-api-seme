<?php

class Aspirasi extends JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setTheme('admin');
        $this->load('admin/aspirasi_model', 'aspirasi');
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
        $data['active'] = "aspirasi";

        $this->putThemeContent("aspirasi/home", $data); //pass data to view
        $this->putJsReady("aspirasi/home.bottom", $data);

        $this->loadLayout("col-1", $data);
        $this->render();
    }

    public function detail($id)
    {
        $dt = $this->__init();
        if (!$this->admin_login) {
            redir(base_url_admin("login/"));
            return;
        }
        $data = array();
        $this->setTitle('Dashboard');
        $data['admin'] = $this->getKey()->admin;
        $data['active'] = "aspirasi";
        $data['aspirasi'] = $this->aspirasi->getById($id);

        $this->putThemeContent("aspirasi/detail", $data); //pass data to view
        $this->putJsReady("aspirasi/detail.bottom", $data);

        $this->loadLayout("col-1", $data);
        $this->render();
    }
}