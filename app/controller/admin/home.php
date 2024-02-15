<?php

class Home extends JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setTheme('admin');
        $this->load('warga_model', 'warga');
        $this->load('darurat_model', 'darurat');
        $this->load('aspirasi_model', 'aspirasi');
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
        $data['active'] = "dashboard";
        $data['warga'] = $this->warga->count();
        $data['aspirasi'] = $this->aspirasi->count();
        $data['darurat'] = $this->darurat->count();

        $this->putThemeContent("dashboard/home", $data); //pass data to view
        $this->putJsReady("dashboard/home.bottom", $data);

        $this->loadLayout("col-1", $data);
        $this->render();
    }
}
