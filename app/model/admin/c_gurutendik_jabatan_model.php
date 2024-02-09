<?php
namespace Model\Admin;
register_namespace(__NAMESPACE__);

/**
* Scoped `admin` class model for `a_company` table
*
* @version 1.0.0
*
* @package Model\C_Gurutendik_Jabatan\Admin
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
	}
	public function countAll($keyword="",$sdate="",$edate=""){
		$this->db->flushQuery();
		$this->db->select_as("COUNT(*)","jumlah",0);
		$this->db->from($this->tbl,$this->tbl_as);
		if(strlen($keyword)>0){
			$this->db->where("a_institusi",$keyword,"OR","%like%");
            $this->db->where("c_gurutendik",$keyword,"OR","%like%");
            $this->db->where("a_jabatan",$keyword,"OR","%like%");
            $this->db->where("a_matapelajaran",$keyword,"OR","%like%");
		}
		$d = $this->db->get_first("object",0);
		if(isset($d->jumlah)) return $d->jumlah;
		return 0;
	}
	public function id($id){
		$this->db->where("id",$id);
		return $this->db->get_first();
	}
	public function set($di){
		if(!is_array($di)) return 0;
		return $this->db->insert($this->tbl,$di,0,0);
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
	public function trans_start(){
		$r = $this->db->autocommit(0);
		if($r) return $this->db->begin();
		return false;
	}
	public function trans_commit(){
		return $this->db->commit();
	}
	public function trans_rollback(){
		return $this->db->rollback();
	}
	public function trans_end(){
		return $this->db->autocommit(1);
	}
	public function getLastId(){
		$this->db->select_as("MAX($this->tbl_as.id)+1", "last_id", 0);
		$this->db->from($this->tbl, $this->tbl_as);
		$d = $this->db->get_first('',0);
		if(isset($d->last_id)) return $d->last_id;
		return 0;
	}
	public function get($level=0){
		$this->db->from($this->tbl, $this->tbl_as);
		$this->db->where("is_active",1);
		if ($level > 0)
			$this->db->where_as("$this->tbl_as.level", $this->db->esc($level), "AND", ">=");
		return $this->db->get();
	}
	public function count(){
		$this->db->select_as("COUNT(*)","total",0);
		$this->db->from($this->tbl, $this->tbl_as);
		$this->db->where("is_active",1);
		$d = $this->db->get_first();
		if(isset($d->total)) return $d->total;
		return 0;
	}
}
