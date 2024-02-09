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
class A_Pesertadidik_Model extends \Model\A_pesertadidik_Concern
{
    public $tbl = 'c_siswa';
    public $tbl_as = 'cs';
    public $tbl2 = 'b_user';
    public $tbl2_as = 'bu';
    public $tbl3 = 'a_institusi';
    public $tbl3_as = 'ai';
    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }
    public function getAll($page=0, $pagesize=10, $sortCol="id", $sortDir="ASC", $keyword="", $utype="", $is_vendor="")
    {
        $this->db->flushQuery();
        $this->db->select_as("$this->tbl_as.id", "id");
        $this->db->select_as("$this->tbl2_as.fnama", "fnama");
        $this->db->select_as("$this->tbl3_as.nama", "institusi");
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

    public function get()
    {
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->where("is_active", 1);
        $this->db->order_by("utype", "desc");
        $this->db->order_by("nama", "asc");
        return $this->db->get('', 0);
    }

    public function count()
    {
        $this->db->select_as("COUNT(*)", "total", 0);
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->where("is_active", 1);
        $d = $this->db->get_first();
        if (isset($d->total)) {
            return $d->total;
        }
        return 0;
    }

    public function toko()
    {
        $this->db->where('utype', Model\A_Company_Concern::UTYPE_TOKO);
        $this->scoped()->db->order_by('nama', 'asc');
        return $this->db->get();
    }
}
