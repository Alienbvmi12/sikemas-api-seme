<?php

class Login extends JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setTheme('admin');
        $this->lib('sene_json_engine', 'sene_json');
        $this->load('admin/admin_model', 'apm');
    }
    public function index()
    {
        $this->sene_json->out(["desc" => "Api admin"]);
    }
    public function auth()
    {
        //init
        $data = array();
        $dt = $this->__init();
        if ($this->admin_login) {
            $this->status = 401;
            $this->message = 'Sudah Login';
            $this->__json_out($data);
            die();
        }

        $username = $this->input->request('username', '');
        if (strlen($username) <= 3) {
            $this->status = 1711;
            $this->message = 'Kombinasi email/username dan/atau password salah';
            $this->__json_out($data);
            die();
        }

        $password = $this->input->request('password', '');
        if (strlen($password) <= 3) {
            $this->status = 1712;
            $this->message = 'Kombinasi email/username dan/atau password salah';
            $this->__json_out($data);
            die();
        }

        $res = $this->apm->auth($username);
        if (isset($res[0]->id)) {
            $res = $res[0];

            //check password
            if (md5($password) == $res->password) {
                $res->password = password_hash($password, PASSWORD_BCRYPT);
                $this->apm->update($res->id, array("password" => $res->password));
                /* if ($this->is_log) {
                        $this->seme_log->write("API_Front/User::login --reEncryptPassword");
                    } */
            }
            if (!password_verify($password, $res->password)) {
                $this->status = 1707;
                $this->message = 'Kombinasi email/username dan/atau password salah';
                $this->__json_out($data);
                die();
            }

            $this->status = 200;
            $this->message = 'Berhasil';
            // $res->foto = base_url($res->foto);

            $sess = new stdClass();
            if (isset($dt['sess'])) $sess = $dt['sess'];
            if (!is_object($sess)) {
                $sess = new stdClass();
            }
            if (!isset($sess->admin)) {
                $sess->admin = new stdClass();
            }
            $sess->admin = $res;
            //	$sess->user->modules = $this->bum->getUserModules($res->id);
            $sess->admin->menus = new stdClass();
            $sess->admin->menus->left = array();

            $this->setKey($sess);

            unset($res->password);
        } else {
            $this->status = 1709;
            $this->message = 'Kombinasi email/username dan/atau password salah';
        }
        $this->__json_out($data);
    }
}
