<?php

namespace Model\Admin;

register_namespace(__NAMESPACE__);

use Model;
/**
* Scoped `admin` class model for `a_pesertadidik` table
*
* @version 1.0.0
*
* @package Model\A_Pesertadidik\Admin
* @since 1.0.0
*/
class A_Pesertadidik_Model extends \Model\A_Pesertadidik_Concern
{

    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }
    public function getAll($page=0, $pagesize=10, $sortCol="id", $sortDir="ASC", $keyword="", $utype="", $is_vendor="")
    {
        $this->db->flushQuery();
        $this->db->select_as("$this->tbl_as.id", "id");
        $this->db->select_as("$this->tbl_as.nama", "nama");
        $this->db->select_as("$this->tbl_as.nama_ayah", "nama_ayah");
        $this->db->select_as("$this->tbl_as.nama_wali", "nama_wali");
        $this->db->select_as("$this->tbl_as.nisn", "nisn");
        $this->db->from($this->tbl, $this->tbl_as);
        if (strlen($utype)) {
            $this->db->where_as("$this->tbl_as.utype", $this->db->esc($utype), "AND", "LIKE");
        }
        if (strlen($is_vendor)) {
            $this->db->where_as("$this->tbl_as.is_vendor", $this->db->esc($is_vendor), "AND", "LIKE");
        }
        if (strlen($keyword)>0) {
            $this->db->where("nama", $keyword, "OR", "%like%", 1, 0);
            $this->db->where("nisn", $keyword, "OR", "%like%", 0, 1);
        }
        $this->db->order_by($sortCol, $sortDir)->limit($page, $pagesize);
        return $this->db->get("object", 0);
    }
    public function countAll($keyword="", $sdate="", $edate="")
    {
        $this->db->flushQuery();
        $this->db->select_as("COUNT(*)", "jumlah", 0);
        $this->db->from($this->tbl, $this->tbl_as);
        if (strlen($utype)) {
            $this->db->where_as("$this->tbl_as.utype", $this->db->esc($utype), "AND", "LIKE");
        }
        if (strlen($is_vendor)) {
            $this->db->where_as("$this->tbl_as.is_vendor", $this->db->esc($is_vendor), "AND", "LIKE");
        }
        if (strlen($keyword)>0) {
            $this->db->where("nama", $keyword, "OR", "%like%");
        }
        $d = $this->db->get_first("object", 0);
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
        $this->db->where('utype', Model\A_Pesertadidik_Concern::UTYPE_TOKO);
        $this->scoped()->db->order_by('nama', 'asc');
        return $this->db->get();
    }
}
