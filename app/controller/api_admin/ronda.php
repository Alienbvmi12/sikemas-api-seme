<?php

class Ronda extends JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setTheme('admin');
        $this->load("admin/ronda_model", "ronda");
        $this->lib('sene_json_engine', 'sene_json');
    }
    public function index()
    {
        $this->sene_json->out(["desc" => "Api admin"]);
    }


    public function read()
    {
        $dt = $this->__init();
        $data = array();
        if (!$this->admin_login) {
            $this->status = 401;
            $this->message = 'Login first please!!';
            $this->__json_out($data);
            return;
        }
        $search = $_GET['search']['value'];
        $order = $_GET['order'];
        $start = ((int)$_GET['start']);
        $length = $_GET['length'];
        $column = $order[0]['column'];
        $dir = $order[0]['dir'];
        $data = $this->ronda->read($search, $start, $length, $column, $dir);
        $count = array($this->ronda->count($search))[0]->count;
        $this->status = 200;
        $this->message = 'Success';
        $addon = array();
        $addon['recordsTotal'] = $count;
        $addon['recordsFiltered'] = $count;
        $this->__json_out($data, $addon);
    }

    public function create()
    {
        $dt = $this->__init();
        $data = array();
        if (!$this->admin_login) {
            $this->status = 401;
            $this->message = 'Login first please!!';
            $this->__json_out($data);
            return;
        }
        $input = $_POST;
        $this->ronda->validate($input, $this, 'insert', [
            'hari' => ['required'],
            'warga_id' => ['required']
        ]);
        $res = $this->ronda->create($input);
        $this->status = 200;
        $this->message = 'Create success';
        $this->__json_out($res);
    }
    public function delete($id = 0)
    {
        $dt = $this->__init();
        $data = array();
        if (!$this->admin_login) {
            $this->status = 401;
            $this->message = 'Login first please!!';
            $this->__json_out($data);
            return;
        }
        $res = $this->ronda->delete($id);
        $this->status = 200;
        $this->message = "Success";
        $this->__json_out($res);
    }
}
