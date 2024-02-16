<?php

class Balasan extends JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setTheme('admin');
        $this->load("admin/balasan_model", "balasan");
        $this->lib('sene_json_engine', 'sene_json');
    }
    public function index()
    {
        $this->sene_json->out(["desc" => "Api admin"]);
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
        
        $res = $this->balasan->delete($id);
        $this->status = 200;
        $this->message = "Success";
        $this->__json_out($res);
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
        $this->balasan->validate($input, $this, 'insert', [
            'aspirasi_id' => ['required'],
            'pengguna_id' => ['required'],
            'title' => ['required', 'max:50'],
            'pesan' => ['required', "min:5"]
        ]);
        $res = $this->balasan->create($input);
        $this->status = 200;
        $this->message = 'Create success';
        $this->__json_out($res);
    }
}
