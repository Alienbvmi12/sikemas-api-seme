<?php

namespace Model\Admin;

register_namespace(__NAMESPACE__);

use Model;
/**
* Scoped `admin` class model for `a_company` table
*
* @version 1.0.0
*
* @package Model\A_Company\Admin
* @since 1.0.0
*/
class A_Pengguna_Model extends \Model\A_Pengguna_Concern
{
    public $tbl = "a_pengguna";
    public $tbl_as = "ap";

    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }

    public function auth($cred){
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->where("$this->tbl_as.email", $cred, "OR", "="); 
        $this->db->where("$this->tbl_as.username", $cred, "OR", "="); 
        return $this->db->get(); 
    }
    public function getById($id){
		$this->db->from($this->tbl, $this->tbl_as);
		$this->db->where("id",$id);
		return $this->db->get_first('',0);
	}

}
