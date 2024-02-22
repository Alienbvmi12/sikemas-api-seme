<?php

class User extends JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setTheme('admin');
        $this->load("admin/user_model", "user");
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
        $data = $this->user->read($search, $start, $length, $column, $dir);
        $count = array($this->user->count($search))[0]->count;
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

        $this->user->validate($input, $this, 'insert', [
            'email' => ['required', 'max:50', 'email', "unique"],
            'username' => ['required', 'max:50', "unique"],
            'warga_id' => ['required', "as:Warga"],
            'password' => ['required', 'min:6', 'max:50'],
            'confirm_password' => ['required', 'min:6', 'max:50', 'as:Konfirmasi Password']
        ]);

        if ($input['password'] != $input['confirm_password']) {
            $this->status = 400;
            $this->message = 'Password tidak sama';
            $this->__json_out(["status" => false]);
            die();
        }

        $input['password'] = password_hash($input['password'], PASSWORD_BCRYPT);

        unset($input['confirm_password']);

        $input["is_active"] = 1;

        $res = $this->user->create($input);
        $this->status = 200;
        $this->message = 'Create success';
        $this->__json_out($res);
    }
    public function update()
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
        $this->user->validate($input, $this, 'update', [
            'id' => ['required'],
            'email' => ['required', 'max:50', 'email', "unique"],
            'username' => ['required', 'max:50', "unique"],
            'warga_id' => ['required'],
        ]);

        if (isset($input['password']) and isset($input['confirm_password'])) {
            if ($input['password'] != "" or $input['confirm_password'] != "") {
                $this->user->validate($input, $this, 'update', [
                    'password' => ['required', 'min:6', 'max:50'],
                    'confirm_password' => ['required', 'min:6', 'max:50', "as:Konfirmasi Password"]
                ]);
                if ($input['password'] != $input['confirm_password']) {
                    $this->status = 400;
                    $this->message = 'Password tidak sama';
                    $this->__json_out(["status" => false]);
                    die();
                }
                $input['password'] = password_hash($input['password'], PASSWORD_BCRYPT);
                unset($input['confirm_password']);
            } else {
                unset($input['confirm_password']);
                unset($input['password']);
            }
        }

        $id = $input['id'];
        if ($id == "" or $id == 0) {
            $this->status = 400;
            $this->message = 'id required!!';
            $this->__json_out([]);
            return;
        }
        $res = $this->user->update($id, $input);
        $this->status = 200;
        $this->message = 'Update success';
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
        $res = $this->user->delete($id);
        $this->status = 200;
        $this->message = "Success";
        $this->__json_out($res);
    }
}
