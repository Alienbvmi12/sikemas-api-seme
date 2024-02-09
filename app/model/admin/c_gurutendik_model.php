<?php

namespace Model\Admin\API;

register_namespace(__NAMESPACE__);

use Model;
/**
* Scoped `api_admin` class model for `c_gurutendik` table
*
* @version 1.0.0
*
* @package Model\Admin\API
* @since 1.0.0
*/
class c_Gurutendik_Model extends \Model\c_Gurutendik_Concern
{
    public $tbl = 'c_gurutendik';
    public $tbl_as = 'cgt';
    public $tbl2 = 'b_user';
    public $tbl2_as = 'bu';
    public $tbl3 = 'a_institusi';
    public $tbl3_as = 'ai';

    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }
    public function get ($is_active="")
    {
        $this->db->where('is_active',$is_active);
        return $this->db->get();
    }
    public function getAll($page=0, $pagesize=10, $sortCol="id", $sortDir="ASC", $keyword="", $utype="")
    {
        $this->db->flushQuery();
        $this->db->select_as("$this->tbl_as.id", "id");
        $this->db->select_as("$this->tbl2_as.fnama", "fnama");
        $this->db->select_as("$this->tbl3_as.nama", "institusi");
        $this->db->select_as("$this->tbl_as.utype", "utype");
        $this->db->select_as("$this->tbl_as.kode", "kode");
        $this->db->select_as("$this->tbl_as.nip", "nip");
        $this->db->select_as("$this->tbl_as.nuptk", "nuptk");
        $this->db->select_as("$this->tbl_as.is_active", "is_active");
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->join($this->tbl2, $this->tbl2_as, 'id', $this->tbl_as, 'b_user_id');
        $this->db->join($this->tbl3, $this->tbl3_as, 'id', $this->tbl_as, 'a_institusi_id');
        
        if (strlen($keyword)>0) {
            $this->db->where_as("$this->tbl2_as.fnama", $keyword, "OR", "%like%", 1, 0);
            $this->db->where_as("$this->tbl3_as.nama", $keyword, "OR", "%like%", 0, 1);
        }
        $this->db->order_by($sortCol, $sortDir)->limit($page, $pagesize);
        return $this->db->get("object", 0);
    }
    public function countAll($keyword="", $sdate="", $edate="")
    {
        $this->db->flushQuery();
        $this->db->select_as("COUNT(*)", "jumlah", 0);
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->join($this->tbl2, $this->tbl2_as, 'id', $this->tbl_as, 'b_user_id');
        $this->db->join($this->tbl3, $this->tbl3_as, 'id', $this->tbl_as, 'a_institusi_id');

        if (strlen($keyword)>0) {
            $this->db->where_as("$this->tbl2_as.fnama", $keyword, "OR", "%like%", 1, 0);
            $this->db->where_as("$this->tbl3_as.nama", $keyword, "OR", "%like%", 0, 1);
        }
        
        $d = $this->db->from($this->tbl)->get_first("object", 0);
        if (isset($d->jumlah)) {
            return $d->jumlah;
        }
        return 0;
    }
    public function getById($id)
    {
        $this->db->where("id", $id);
        return $this->db->get_first();
    }
}
