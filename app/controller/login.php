<?php

class Login extends JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setTheme('front');
        $this->load('a_institusi_concern');
        $this->load('front/a_institusi_model', 'aim');
        $this->load('b_user_concern');
        $this->load('front/b_user_model', 'bum');
    }

    private function institusi_owner($res)
    {
        return $this->aim->id($res->a_institusi_id_owner);
    }

	private function generateUserSession($res)
	{
		$sess = $this->getKey();
		if (!is_object($sess)) {
			$sess = new stdClass();
		}
		if (!isset($sess->user)) {
			$sess->user = new stdClass();
		}
		$sess->user = $res;
		//	$sess->user->modules = $this->bum->getUserModules($res->id);
		$sess->user->menus = new stdClass();
		$sess->user->menus->left = array();
        $sess->user->institusi_owner = $this->institusi_owner($res);
		$this->setKey($sess);

		return $sess;
	}

    private function __passGen($password)
    {
        $password = preg_replace('/[^a-zA-Z0-9]/', '', $password);
        return password_hash($password, PASSWORD_BCRYPT);
    }

    private function __passClear($password)
    {
        return preg_replace('/[^a-zA-Z0-9]/', '', $password);
    }
    private function __genTokenMobile($user_id)
    {
        $user_id = (int) $user_id;
        $this->lib("conumtext");
        $token = '';
        if ($user_id == 3) {
            $token = 'KMZDT';
        } elseif ($user_id == 2) {
            $token = 'KMZDR';
        } elseif ($user_id == 1) {
            $token = 'KMZDS';
        } elseif ($user_id == 4) {
            $token = 'KMZDU';
        } elseif ($user_id == 24783) {
            $token = 'KMZDA';
        } else {
            $token = $this->conumtext->genRand($type="str", $min=7, $max=11);
        }
        return $token;
    }

    public function index()
    {
        $data = $this->__init(); //method from app/core/ji_controller
        if($this->user_login) {
            redir(base_url('dashboard'));
            die();
        }
        //this config can be found on app/view/front/page/html/head.php

        $this->setDescription("Silahkan login anda sebelum dapat melakukan pelayanan");
        $this->setKeyword("login");

        //main content
        //this view can be found on app/view/front/home/home.php
        $this->putThemeContent("login/home", $data); //pass data to view
        //this view for INPAGE JS Script can be found on app/view/front/page/home/home_bottom.php
        $this->putJsContent("login/home_bottom", $data); //pass data to view

        $this->loadLayout("col-1-login", $data);
        $this->render();
    }

    private function validateInput($input_key, $minlenght=4) {
        $input_key = $this->input->request($input_key, '');
		if (strlen($input_key) <= 4) {
            $this->status = 102;
            $this->message = 'Kombinasi '.$input_key.' atau password tidak valid';
            $this->__json_out(new stdClass());
            die();
		}

        return $input_key;
    }

    private function refresh_fcm_token($res)
    {
        if (strlen($res->fcm_token) > 6) {
            $fcm_token_old = explode(':', $res->fcm_token);
            if (isset($fcm_token_old[0])) {
                $fcm_token_old = $fcm_token_old[0];
            }
            if (is_string($fcm_token_old)) {
                $this->bum->flushFcmToken($fcm_token_old);
            }
        }

        return $res;
    }

    public function auth()
    {
        //init
        $data = array();
        $dt = $this->__init();
        if($this->user_login) {
            $this->status = 401;
            $this->message = 'Sudah Login';
            $this->__json_out($data);
            die();
        }

        $username = $this->validateInput('username');
        $password = $this->validateInput('password');
		
		$res = $this->bum->auth($username);
		if (isset($res->id)) {
			//check whether the user is inactive
			if (empty($res->is_active)) {
				$this->status = 1708;
				$this->message = 'Pengguna telah di non-aktifkan';
				$this->__json_out($data);
				die();
			}

			//flush old fcm_token
            $res = $this->refresh_fcm_token($res);

			//check old password encryption, renew it
			if (md5($password) == $res->password) {
				$res->password = password_hash($password, PASSWORD_BCRYPT);
				$this->bum->update($res->id, array("password"=>$res->password));
			}

			//verify the oassword
			if (!password_verify($password, $res->password)) {
				$this->status = 1707;
				$this->message = 'Kombinasi email dan/atau password salah';
				$this->__json_out($data);
				die();
			}

            


			// generate mobile token
			$token = $this->__genTokenMobile($res->id);
			$data['apisess'] = $token;

			$this->status = 200;
			$this->message = 'Berhasil';
			$res->foto = base_url($res->foto);
			$res->apisess = $token;
			$this->generateUserSession($res);
			unset($res->api_mobile_token);
			unset($res->api_web_token);
			unset($res->password);
		} else {
			$this->status = 1709;
			$this->message = 'Kombinasi email dan/atau password salah';
		}

        $this->__json_out($data);
    }
}
