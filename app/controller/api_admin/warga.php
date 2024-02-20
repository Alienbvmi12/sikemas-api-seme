<?php

class Warga extends JI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setTheme('admin');
        $this->load("admin/warga_model", "warga");
        $this->load("admin/alamat_model", "alamat");
        $this->lib('sene_json_engine', 'sene_json');
    }
    public function index()
    {
        $this->sene_json->out(["desc" => "Api admin"]);
    }

    private function __connect_to_ftp()
    {
        $conn = ftp_connect($this->config->semevar->ftp_server);
        if ($conn) {
            $login = ftp_login($conn, $this->config->semevar->ftp_user, $this->config->semevar->ftp_pass);
            if ($login) {
                ftp_pasv($conn, true);
                return $conn;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    private function __upload_to_ftp($conn, $file, $filename_remote)
    {
        $target_file_dir = $file;
        $ftp_upload_file = ftp_put($conn, "storage/" . $filename_remote, $target_file_dir, FTP_BINARY);
        if ($ftp_upload_file) {
            return true;
        } else {
            return false;
        }
    }

    private function __delete_from_ftp($conn, $filename_remote)
    {
        $ftp_delete_file = ftp_delete($conn, "brand_images/" . $filename_remote);
        if ($ftp_delete_file) {
            return true;
        } else {
            return false;
        }
    }

    private function __validate_image_format($file)
    {
        $finamearr = explode(".", basename($file["name"]));
        $ext = end($finamearr);
        $acc_format = [
            "jpg",
            "jpeg",
            "png",
            "jfif",
            "heic",
            "gif",
            "webp"
        ];
        if (!in_array($ext, $acc_format)) {
            $this->status = 400;
            $this->message = 'Image format not accepted';
            $this->__json_out([]);
            return false;
        } else {
            return true;
        }
    }

    public function getById($id)
    {
        $dt = $this->__init();
        $data = array();
        if (!$this->admin_login) {
            $this->status = 401;
            $this->message = 'Login first please!!';
            $this->__json_out($data);
            return;
        }
        $data = $this->warga->getById($id);
        $this->status = 200;
        $this->message = 'Success';
        $this->__json_out($data);
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
        $data = $this->warga->read($search, $start, $length, $column, $dir);
        $count = array($this->warga->count($search))[0]->total;
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
        $this->warga->validate($input, $this, 'insert', [
            'nik' => ['required', "min:16", "max:20", "min:16"],
            'nama' => ['required', "max:255"],
            'phone' => ['required', "min:9", "max:13"],
            'tempat_lahir' => ['required', "max:50"],
            'tanggal_lahir' => ['required'],
            'kelamin' => ['required'],
            'kewarganegaraan' => ['required'],
            'pekerjaan' => ['required', "max:255"],
            'posisi_id' => ['required'],
            'alamat_id' => ['required'],
        ]);
        if ($input['nama'] == "") {
            $this->status = 400;
            $this->message = 'nama required!!';
            $this->__json_out([]);
            return;
        }
        $image_name = "";
        if (count($_FILES) > 0 or isset($_FILES['foto'])) {
            // $conn = $this->__connect_to_ftp();
            // if ($conn == false) {
            //     $this->status = 408;
            //     $this->message = 'FTP Connection Unstable';
            //     $this->__json_out([]);
            //     return;
            // }
            $file = $_FILES["foto"];
            if (!$this->__validate_image_format($file)) {
                return;
            }
            $name_slug = $input["nama"];
            $name_slug = $this->slugify($name_slug) . "-" . date("Ymdhis");
            $splited_filename = explode(".", basename($file["name"]));
            $name_slug = $name_slug . "." . end($splited_filename);
            $image_name = $name_slug;

            $dirr = str_replace("app\controller\api_admin", "storage\\", __DIR__) . $image_name;
            move_uploaded_file($file['tmp_name'], $dirr);
            // if (!$this->__upload_to_ftp($conn, $dirr, $name_slug)) {
            //     $this->status = 408;
            //     $this->message = 'Timeout when uploading file';
            //     $this->__json_out([]);
            // }
        } else {
            $this->status = 401;
            $this->message = 'Foto wajib diisi!!';
            $this->__json_out(["status" => false]);
        }
        $input["foto"] = "storage/" . $image_name;
        $res = $this->warga->create($input);
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
        $id = $input['id'];
        $this->warga->validate($input, $this, 'insert', [
            'id' => ['required'],
            'nik' => ['required', "min:16", "max:20", "min:16"],
            'nama' => ['required', "max:255"],
            'phone' => ['required', "min:9", "max:13"],
            'tempat_lahir' => ['required', "max:50"],
            'tanggal_lahir' => ['required'],
            'kelamin' => ['required'],
            'kewarganegaraan' => ['required'],
            'pekerjaan' => ['required', "max:255"],
            'posisi_id' => ['required'],
            'alamat_id' => ['required'],
        ]);
        if ($id == "" or $id == 0) {
            $this->status = 400;
            $this->message = 'id required!!';
            $this->__json_out([]);
            return;
        }
        if (!isset($input['nama'])) {
            $this->status = 400;
            $this->message = 'name required!!';
            $this->__json_out([]);
            return;
        }
        // $input['image_name'] is the name of current image, not new image
        if (!isset($input['image_name'])) {
            $this->status = 400;
            $this->message = 'image name required!!';
            $this->__json_out([]);
            return;
        }
        $name_slug = $input["nama"];
        if (count($_FILES) > 0 and $_FILES['foto']['name'] != "") {
            $file = $_FILES["foto"];
            if (!$this->__validate_image_format($file)) {
                return;
            }
            $name_slug = $this->slugify($name_slug) . "-" . date("Ymdhis");
            $splited_filename = explode(".", basename($file["name"]));
            $name_slug = $name_slug . "." . end($splited_filename);
            $dirr = str_replace("app\controller\api_admin", "storage\\", __DIR__) . $name_slug;
            move_uploaded_file($file['tmp_name'], $dirr);
            $input["foto"] = "storage/" . $name_slug;
        }
        unset($input["image_name"]);
        $res = $this->warga->update($id, $input);
        $this->status = 200;
        $this->message = 'Update success';
        $this->__json_out($res);
    }
    public function delete($id)
    {
        $dt = $this->__init();
        $data = array();
        if (!$this->admin_login) {
            $this->status = 401;
            $this->message = 'Login first please!!';
            $this->__json_out($data);
            return;
        }
        $res = $this->warga->delete($id);
        $this->status = 200;
        $this->message = "Success";
        $this->__json_out($res);
    }
}
