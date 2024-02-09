<?php

namespace Model\Admin\API;
register_namespace(__NAMESPACE__);

use Model;

/**
* Scoped `api_admin` class model for `c_gurutendik_jabatan` table
*
* @version 1.0.0
*
* @package Model\Admin\API
* @since 1.0.0
*/
class C_Gurutendik_Jabatan_Model extends \Model\C_Gurutendik_Jabatan_Concern
{
    public $tbl = 'a_institusi';
    public $tbl_as = 'ai';
    public $tbl2 = 'c_gurutendik';
    public $tbl2_as = 'cgt';
    public $tbl3 = 'a_jabatan';
    public $tbl3_as = 'aj';
    public $tbl4 = 'a_matapelajaran';
    public $tbl4_as = 'amp';
    public function __construct()
    {
        parent::__construct();
        $this->point_of_view = 'admin';
        $this->db->from($this->tbl, $this->tbl_as);
    }

    public function allData()
    {
        $this->db->flushQuery();
        $this->db->select_as("$this->tbl_as.id", "id");
        $this->db->select_as("$this->tbl_as.a_institusi", "a_institusi");
        $this->db->select_as("$this->tbl_as.c_gurutendik", "c_gurutendik");
        $this->db->select_as("$this->tbl_as.a_jabatan", "a_jabatan");
        $this->db->select_as("$this->tbl_as.a_matapelajaran", "a_matapelajaran");
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->where("$this->tbl_as.is_active", 1);
        $this->db->where_as("$this->tbl_as.is_deleted", $this->db->esc(0));
        $this->db->order_by("id", "ASC");
        return $this->db->get("object", 0);
    }

	public function count($keyword='', $is_active='')
	{
		$this->db->select_as("COUNT($this->tbl_as.id)", "jumlah", 0);
        $this->db->from($this->tbl, $this->tbl_as);
        $this->scoped()->_filter($keyword, $is_active);
        $d = $this->db->get_first("object", 0);
        if (isset($d->jumlah)) {
            return $d->jumlah;
        }
        return 0;
	}

    public function data($page=0, $pagesize=10, $sortCol="id", $sortDir="ASC", $keyword='', $is_active='')
    {
        $this->datatables['admin']->selections($this->db);
        $this->db->from($this->tbl, $this->tbl_as);
        $this->scoped()->_filter($keyword, $is_active);
        $this->db->order_by($sortCol, $sortDir)->limit($page, $pagesize);
        return $this->db->get("object", 0);
    }

    private function _filter($keyword='', $is_active='')
	{
		if(strlen($is_active) > 0)
			$this->db->where_as("$this->tbl_as.is_active", $this->db->esc($is_active));
        if (strlen($keyword) > 0)
		{
			$this->db->where("a_institusi", $keyword, "OR", "%like%", 1, 0);
            $this->db->where("c_gurutendik", $keyword, "OR", "%like%", 0, 1);
            $this->db->where("a_jabatan", $keyword, "OR", "%like%", 1, 0);
            $this->db->where("a_matapelajaran", $keyword, "OR", "%like%", 0, 1);
		}
        return $this;
    }

    public function getLastId()
    {
        $this->db->select_as("MAX($this->tbl_as.id)+1", "last_id", 0);
        $this->db->from($this->tbl, $this->tbl_as);
        $d = $this->db->get_first('', 0);
        if (isset($d->last_id)) {
            return $d->last_id;
        }
        return 0;
    }

    public function id($id)
    {
        $this->db->where("id", $id);
        return $this->db->get_first();
    }
    public function get()
    {
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->where("is_active", 1);
        return $this->db->get();
    }
    
    public function getSearch($keyword='')
    {
        $this->db->select_as("$this->tbl_as.id", "id", 0);
        $this->db->select_as("$this->tbl_as.nama", "text", 0);
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->where("is_active", 1);
        if ($keyword) {
            $this->db->where("a_institusi", $keyword, "like%%", "AND", "!=");
            $this->db->where("c_gurutendik", $keyword, "like%%", "AND", "!=");
            $this->db->where("a_jabatan", $keyword, "like%%", "AND", "!=");
            $this->db->where("a_matapelajaran", $keyword, "like%%", "AND", "!=");
        }
        return $this->db->get();
    }
}
