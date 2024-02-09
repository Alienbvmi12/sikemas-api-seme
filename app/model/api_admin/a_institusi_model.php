<?php

namespace Model\Admin\API;

register_namespace(__NAMESPACE__);

use Model;
/**
* Scoped `api_admin` class model for `a_institusi` table
*
* @version 1.0.0
*
* @package Model\Admin\API
* @since 1.0.0
*/
class A_Institusi_Model extends \Model\A_Institusi_Concern
{

    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }
    public function get ()
    {
        return $this->db->get();
    }

    public function filter_a_institusi_id($a_institusi_id)
    {
        if (strlen($a_institusi_id) > 0) {
			$this->db->where_as("$this->tbl_as.a_institusi_id", $this->db->esc($a_institusi_id));
		}

        return $this;
    }

    public function filter_is_active($is_active)
    {
        if (strlen($is_active) > 0) {
			$this->db->where_as("$this->tbl_as.is_active", $this->db->esc($is_active));
		}

        return $this;
    }

    public function filter_by_keyword($keyword)
    {
        if(strlen($keyword)>0){
			$this->db->where_as("$this->tbl_as.nama",$keyword,"OR","%like%",1,0);
			$this->db->where_as("$this->tbl_as.kode",$keyword,"OR","%like%",0,0);
			$this->db->where_as("$this->tbl_as.alamat",$keyword,"OR","%like%",0,1);
		}

        return $this;
    }
    public function data($page=0,$pagesize=10,$sortCol="identifier",$sortDir="ASC",$keyword='', $is_active='', $a_institusi_id='')
    {
        $this->db->select_as('id, nama, utype, jenjang, alamat1, kode, is_active','is_active');
        $this->db->from($this->tbl, $this->tbl_as);
		$this
            ->filter_a_institusi_id($a_institusi_id)
            ->filter_is_active($is_active)
            ->filter_by_keyword($keyword);
		$this->db->order_by($sortCol,$sortDir)->limit($page,$pagesize);

		return $this->db->get("object", 0);
    }
    public function count($keyword='', $is_active='', $a_institusi_id='')
    {
        $this->db->select_as("COUNT(*)","jumlah",0);
        $this->db->from($this->tbl, $this->tbl_as);
		$this
            ->filter_a_institusi_id($a_institusi_id)
            ->filter_is_active($is_active)
            ->filter_by_keyword($keyword);
		$d = $this->db->get_first("object", 0);

		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
    }
}
