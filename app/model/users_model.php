<?php

namespace Model\Front;

register_namespace(__NAMESPACE__);

use JI_Model;
use Model;
use stdClass;

/**
 * Scoped `Front` class model for `b_user` table
 *
 * @version 1.0.0
 *
 * @package Model\Front
 * @since 1.0.0
 */
class Users_Model extends JI_Model
{
    public $tbl = "users";
    public $tbl_as = "bu";
    public $tbl2 = "login";
    public $tbl2_as = "log";
    public $tbl3 = "register";
    public $tbl3_as = "reg";
    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }

    public function create($data){
        return $this->db->insert($this->tbl, $data);
    }

    public function get()
    {
        return $this->db->get();
    }

    public function getByEmail($email)
    {
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->where("email", $email);
        return $this->db->get_first();
    }

    public function update($id, $du)
    {
        $this->db->where("id", $id);
        $this->db->update($this->tbl, $du);
    }

    public function delete($id)
    {
        $this->db->where("id", $id);
        $this->db->delete($this->tbl);
    }

    public function auth($username)
    {
        $this->db->where("$this->tbl_as.email", $username, "OR", "=", 1, 0);
        $this->db->where("$this->tbl_as.username", $username, "OR", "=", 0, 1);
        return $this->db->get_first();
    }

    public function insert_token($token, $user_id){
        $this->db->insert($this->tbl2, [
            "user_id" => $user_id,
            "token" => $token
        ]);
    }

    public function activate_user($token, $user){
        // $this->db->insert_token($token, $user_id);
        $reg_id = $user->id;
        unset($user->id);
        unset($user->email_verify_token);
        $arrUser = (array) $user;
        $check = $this->getByEmail($user->email);
        $new_user = new stdClass();
        if(isset($check->id)){
            $new_user = $check;
        }
        else{
            $this->db->insert($this->tbl, $arrUser);
            $new_user = $this->getByEmail($user->email);
        }
        $this->delete_reg($reg_id);
        $this->insert_token($token, $new_user->id);
        return $new_user;
    }

    public function validate_otp_reg($data){
        $this->db->from($this->tbl3, $this->tbl3_as);
        $this->db->where("id", $data["reg_id"], "AND", "=", 1, 0);
        $this->db->where("email_verify_token", md5($data["otp"]), "AND", "=", 0, 1);
        return $this->db->get_first();
    }

    public function validate_otp_reset_password($data){
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->where("email", $data["email"], "AND", "=", 1, 0);
        $this->db->where("reset_password_token", md5($data["otp"]), "AND", "=", 0, 1);
        return $this->db->get_first();
    }

    public function insert_reg($data){
        extract($data);
        return $this->db->query("call insert_reg(
            '$email',
            '$username',
            '$password',
            '$warga_id',
            '$email_verify_token'
        )")[0];
    }

    public function update_reg($id, $du)
    {
        $this->db->where("id", $id);
        $this->db->update($this->tbl3, $du);
    }

    public function delete_reg($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl3);
    }

    public function delete_log($token)
    {
        $this->db->where("token", md5($token));
        $this->db->delete($this->tbl2);
    }

    public function findRegData($data){
        $data = (object) $data;
        $this->db->from($this->tbl3, $this->tbl3_as);
        $this->db->where('id', $data->reg_id, "AND", "=", 1, 0);
        $this->db->where('email', $data->email, "AND", "=", 0, 0);
        $this->db->where('username', $data->username, "AND", "=", 0, 1);
        return $this->db->get_first();
    }

    public function getpas($id)
    {
        $sql = 'select `password` from ' . $this->tbl . ' where id = '.$id.'';
        return $this->db->query($sql);
    }
}
