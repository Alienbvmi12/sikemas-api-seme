<?php

namespace Model\Admin\API;

register_namespace(__NAMESPACE__);

use Model;
/**
* Scoped `api_admin` class model for 'c_gurutendik' table
*
* @version 1.0.0
*
* @package Model\Admin\API

* @since 1.0.0
*/
class C_Gurutendik_Model extends \Model\C_Gurutendik_Concern
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

    public function get()
    {
        return $this->db->get();
    }

    public function update($id,$du){
		if(!is_array($du)) return 0;
		$this->db->where("id",$id);
        return $this->db->update($this->tbl,$du,0);
	}

	public function del($id){
		$this->db->where("id",$id);
		return $this->db->delete($this->tbl);
	}
    
    private function filter_keyword($keyword){
        if (strlen($keyword)>0) {
            $this->db->where_as("$this->tbl2_as.fnama", $keyword, "OR", "%like%", 1, 0);
            $this->db->where_as("$this->tbl_as.utype", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.kode", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.nip", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.nuptk", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl3_as.nama", $keyword, "OR", "%like%", 0, 1);
        }

        return $this;
    }

    private function table_source(){
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->join($this->tbl2, $this->tbl2_as, 'id', $this->tbl_as, 'b_user_id');
        $this->db->join($this->tbl3, $this->tbl3_as, 'id', $this->tbl_as, 'a_institusi_id');
        return $this;
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
