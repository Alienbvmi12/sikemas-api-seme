<?php

namespace Model\Admin\API;

register_namespace(__NAMESPACE__);

use Model;
/**
* Scoped `api_admin` class model for `a_pengguna_jabatan` table
*
* @version 1.0.0
*
* @package Model\Admin\API
* @since 1.0.0
*/
class A_Pengguna_Jabatan_Model extends \Model\A_Pengguna_Jabatan_Concern
{
    public $tbl = 'a_pengguna_jabatan';
    public $tbl_as = 'apj';
    public $tbl2 = 'a_jabatan';
    public $tbl2_as = 'aj';
    public $tbl3 = 'a_pengguna';
    public $tbl3_as = 'ap';

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

    private function filter_keyword($keyword)
    {
        if (strlen($keyword)>0) {
            $this->db->where_as("$this->tbl2_as.nama", $keyword, "OR", "%like%", 1, 0);
            $this->db->where_as("$this->tbl3_as.nama", $keyword, "OR", "%like%", 0, 1);
        }

        return $this;
    }

    private function table_source()
    {
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->join($this->tbl2, $this->tbl2_as, 'id', $this->tbl_as, 'a_jabatan_id');
        $this->db->join($this->tbl3, $this->tbl3_as, 'id', $this->tbl_as, 'a_pengguna_id');
        return $this;
    }

    public function getAll($page=0, $pagesize=10, $sortCol="id", $sortDir="ASC", $keyword="", $utype="")
    {
        $this->db->flushQuery();
        $this->db->select_as("$this->tbl_as.id", "id");
        $this->db->select_as("$this->tbl2_as.nama", "jabatan");
        $this->db->select_as("$this->tbl3_as.nama", "pengguna");
        $this->db->select_as("$this->tbl_as.is_active", "is_active");

        $this
            ->table_source()
            ->filter_keyword($keyword);

        $this->db->order_by($sortCol, $sortDir)->limit($page, $pagesize);
        return $this->db->get("object", 0);
    }

    public function countAll($keyword="", $sdate="", $edate="")
    {
        $this->db->flushQuery();
        $this->db->select_as("COUNT(*)", "jumlah", 0);
        
        $this
        ->table_source()
        ->filter_keyword($keyword);
        
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
