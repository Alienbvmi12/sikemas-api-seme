<?php

namespace Model\Front;

register_namespace(__NAMESPACE__);

use Model;

/**
 * Scoped `Front` class model for `b_user` table
 *
 * @version 1.0.0
 *
 * @package Model\Front
 * @since 1.0.0
 */
class B_User_Model extends \Model\B_User_Concern
{
    public $tbl = "b_user";
    public $tbl_as = "bu";
    public $tbl2 = "c_siswa";
    public $tbl2_as = "cs";
    public $tbl3 = "c_gurutendik";
    public $tbl3_as = "cgt";
    public $tbl4 = "b_user_alamat";
    public $tbl4_as = "bua";
    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }

    public function get()
    {
        return $this->db->get();
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

    public function auth($cred)
    {
        $this->db->select_as("$this->tbl_as.id", "id");
        $this->db->select_as("$this->tbl_as.a_institusi_id_owner", "a_institusi_id_owner");
        $this->db->select_as("$this->tbl_as.email", "email");
        $this->db->select_as("$this->tbl_as.password", "password");
        $this->db->select_as("$this->tbl_as.fnama", "fnama");
        $this->db->select_as("$this->tbl_as.lnama", "lnama");
        $this->db->select_as("$this->tbl_as.kelamin", "kelamin");
        $this->db->select_as("$this->tbl_as.telp", "telp");
        $this->db->select_as("$this->tbl_as.birth_place", "birth_place");
        $this->db->select_as("$this->tbl_as.birth_date", "birth_date");
        $this->db->select_as("$this->tbl_as.created_at", "created_at");
        $this->db->select_as("$this->tbl_as.active_date", "active_date");
        $this->db->select_as("$this->tbl_as.expire_date", "expire_date");
        $this->db->select_as("$this->tbl_as.umur", "umur");
        $this->db->select_as("$this->tbl_as.pekerjaan", "pekerjaan");
        $this->db->select_as("$this->tbl_as.api_reg_date", "api_reg_date");
        $this->db->select_as("$this->tbl_as.api_reg_token", "api_reg_token");
        $this->db->select_as("$this->tbl_as.api_web_date", "api_web_date");
        $this->db->select_as("$this->tbl_as.api_web_token", "api_web_token");
        $this->db->select_as("$this->tbl_as.api_mobile_date", "api_mobile_date");
        $this->db->select_as("$this->tbl_as.api_mobile_token", "api_mobile_token");
        $this->db->select_as("$this->tbl_as.fcm_token", "fcm_token");
        $this->db->select_as("$this->tbl_as.device", "device");
        $this->db->select_as("$this->tbl_as.foto", "foto");
        $this->db->select_as("$this->tbl_as.is_agree", "is_aggre");
        $this->db->select_as("$this->tbl_as.is_mentor", "is_mentor");
        $this->db->select_as("$this->tbl_as.is_confirmed", "is_confirmed");
        $this->db->select_as("$this->tbl_as.is_active", "is_active");
        $this->db->select_as("$this->tbl_as.b_user_id_pendaftar", "b_user_id_pendaftar");
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->join($this->tbl2, $this->tbl2_as, "b_user_id", $this->tbl_as, "id", "left");
        $this->db->join($this->tbl3, $this->tbl3_as, "b_user_id", $this->tbl_as, "id", "left");
        $this->db->where("$this->tbl_as.email", $cred, "OR", "=");
        $this->db->where("$this->tbl2_as.nisn", $cred, "OR", "=");
        $this->db->where("$this->tbl2_as.nomor_induk", $cred, "OR", "=");
        $this->db->where("$this->tbl3_as.nip", $cred, "OR", "=");
        $this->db->where("$this->tbl3_as.nuptk", $cred, "OR", "=");
        return $this->db->get_first();
    }
    public function getByEmail($email)
    {
        $this->db->where('email', $email);
        return $this->db->get_first();
    }
    public function getpas($id)
    {
        $sql = 'select `password` from ' . $this->tbl . ' where id = '.$id.'';
        return $this->db->query($sql);
    }
}
