<?php
namespace Model\Admin;
register_namespace(__NAMESPACE__);

/**
* Scoped `admin` class model for `a_company` table
*
* @version 1.0.0
*
* @package Model\A_Jabatan\Admin
* @since 1.0.0
*/

class A_Jabatan_Model extends \Model\A_Jabatan_Concern
{

    var $tbl = 'a_jabatan';
	var $tbl_as = 'aj';
	public function __construct(){
		parent::__construct();
		$this->db->from($this->tbl,$this->tbl_as);
	}
	public function get($is_active=""){
		$this->db->from($this->tbl,$this->tbl_as);
		$this->db->order_by('nama','asc');
		if(strlen($is_active)) $this->db->where('is_active',$is_active);
		return $this->db->get();
	}
	public function getAll($page=0,$pagesize=10,$sortCol="kode",$sortDir="ASC",$keyword="",$sdate="",$edate=""){
		$this->db->flushQuery();
		$this->db->select();
		$this->db->from($this->tbl,$this->tbl_as);
		if(strlen($keyword)>1){
			$this->db->where("nama",$keyword,"OR","%like%",0,1);
		}
		$this->db->order_by($sortCol,$sortDir)->limit($page,$pagesize);
		return $this->db->get("object",0);
	}
	public function countAll($keyword="",$sdate="",$edate=""){
		$this->db->flushQuery();
		$this->db->select_as("COUNT(*)","jumlah",0);
		if(strlen($keyword)>1){
			$this->db->where("nama",$keyword,"OR","%like%",0,1);
		}
		$d = $this->db->from($this->tbl)->get_first("object",0);
		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
	}
	public function getById($id){
		$this->db->where("id",$id);
		return $this->db->get_first();
	}
}
