<?php

namespace Model\Admin\API;

register_namespace(__NAMESPACE__);

use Model;
/**
* Scoped `api_admin` class model for `a_company` table
*
* @version 1.0.0
*
* @package Model\Admin\API
* @since 1.0.0
*/
class A_Company_Model extends \Model\A_Company_Concern
{
    public $tbl_as2 = 'a';

    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }

    private function __joinTbl2()
    {
        $cps = array();
        $cps[] = $this->db->composite_create("$this->tbl_as.d_provinsi_id", "=", "$this->tbl2_as.id");
        return $cps;
    }
    private function __joinTbl3()
    {
        $cps = array();
        $cps[] = $this->db->composite_create("$this->tbl_as.d_kabkota_id", "=", "$this->tbl3_as.id");
        return $cps;
    }
    private function __joinTbl4()
    {
        $cps = array();
        $cps[] = $this->db->composite_create("$this->tbl_as.d_kecamatan_id", "=", "$this->tbl4_as.id");
        return $cps;
    }

    public function getTblAs()
    {
        return $this->tbl_as;
    }

    protected function _scoped()
    {
        $this->db->where_as("$this->tbl_as.is_deleted", $this->db->esc('0'));
        return $this;
    }

    protected function _selected()
    {
        $this->db->select_as("$this->tbl_as.id", "id");
        $this->db->select_as("$this->tbl_as.kode", "kode");
        $this->db->select_as("CONCAT($this->tbl_as.nama,' - ',COALESCE($this->tbl_as2.nama,''))", "nama");
        $this->db->select_as("CONCAT($this->tbl_as.kabkota,', ',$this->tbl_as.negara)", "alamat");
        $this->db->select_as("$this->tbl_as.telp", "telp");
        $this->db->select_as("$this->tbl_as.is_active", "is_active");
        $this->db->select_as("$this->tbl_as.is_vendor", "is_vendor");
        return $this;
    }

    protected function _selectedDepartemen()
    {
        $this->db->select_as("$this->tbl_as.id", "id");
        $this->db->select_as("$this->tbl_as.kode", "kode");
        $this->db->select_as("CONCAT($this->tbl_as.nama,' - ',COALESCE($this->tbl_as2.nama,''))", "nama");
        $this->db->select_as("$this->tbl_as.telp", "telp");
        $this->db->select_as("$this->tbl_as.is_active", "is_active");
        $this->db->select_as("$this->tbl_as.is_vendor", "is_vendor");
        return $this;
    }

    protected function _joins()
    {
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->join($this->tbl, $this->tbl_as2, 'id', $this->tbl_as, 'a_company_id', 'left');
        return $this;
    }

    protected function _filter_keyword($keyword='')
    {
        if (strlen($keyword)>0) {
            $this->db->where_as("$this->tbl_as.nama", $keyword, "OR", "%like%", 1, 0);
            $this->db->where_as("$this->tbl_as.kode", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.kabkota", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.provinsi", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.negara", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.kodepos", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.alamat", $keyword, "OR", "%like%", 0, 1);
        }

        return $this;
    }

    protected function _filterData($keyword='',$utype='',$is_vendor='',$badan_hukum='',$is_active='',$a_company_id_parent='')
    {
        if (strlen($utype)) {
            $this->db->where_as("$this->tbl_as.utype", $this->db->esc($utype), "AND", "LIKE");
        }
        if (strlen($is_vendor)) {
            $this->db->where_as("$this->tbl_as.is_vendor", $this->db->esc($is_vendor), "AND", "LIKE");
        }
        if (strlen($badan_hukum)) {
            $this->db->where_as("$this->tbl_as.badan_hukum", $this->db->esc($badan_hukum), "AND", "LIKE");
        }
        if (strlen($is_active)) {
            $this->db->where_as("$this->tbl_as.is_active", $this->db->esc($is_active), "AND", "=");
        }
        if (strlen($a_company_id_parent)) {
            $this->db->where_as("$this->tbl_as.id", $this->db->esc($a_company_id_parent), "OR", "=", 1, 0);
            $this->db->where_as("$this->tbl_as.a_company_id", $this->db->esc($a_company_id_parent), "AND", "=", 0, 1);
            $this->db->order_by("$this->tbl_as.a_company_id", "asc");
        }
        if (strlen($keyword)>0) {
            $this->db->where_as("$this->tbl_as.nama", $keyword, "OR", "%like%", 1, 0);
            $this->db->where_as("$this->tbl_as.kode", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.kabkota", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.provinsi", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.negara", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.kodepos", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.alamat", $keyword, "OR", "%like%", 0, 1);
        }
        return $this;
    }

    public function data($page=0,$pagesize=10,$sortCol="id",$sortDir="ASC",$keyword='',$utype='',$is_vendor='',$badan_hukum='',$is_active='',$a_company_id_parent='')
    {
        $this->_selected()->_joins()->_filterData($keyword,$utype,$is_vendor,$badan_hukum,$is_active,$a_company_id_parent);
        $this->db->order_by($sortCol, $sortDir)->limit($page, $pagesize);
        return $this->_scoped()->db->get("object", 0);
    }

    public function count($keyword='',$utype='',$is_vendor='',$badan_hukum='',$is_active='',$a_company_id_parent='')
    {
        $this->db->select_as("COUNT(DISTINCT $this->tbl_as.id)", "jumlah", 0);
        $this->_joins()->_filterData($keyword,$utype,$is_vendor,$badan_hukum,$is_active,$a_company_id_parent);
        $d = $this->_scoped()->db->get_first("object", 0);
        if (isset($d->jumlah)) {
            return $d->jumlah;
        }
        return 0;
    }

    public function dataDepartemen($page=0,$pagesize=10,$sortCol="id",$sortDir="ASC",$keyword='',$utype='',$is_vendor='',$badan_hukum='',$is_active='',$a_company_id_parent='')
    {
        $this->_selectedDepartemen()->_joins()->_filterData($keyword,$utype,$is_vendor,$badan_hukum,$is_active,$a_company_id_parent);
        $this->db->order_by($sortCol, $sortDir)->limit($page, $pagesize);
        return $this->_scoped()->db->get("object", 0);
    }

    public function countDepartemen($keyword='',$utype='',$is_vendor='',$badan_hukum='',$is_active='',$a_company_id_parent='')
    {
        $this->db->select_as("COUNT(DISTINCT $this->tbl_as.id)", "jumlah", 0);
        $this->_joins()->_filterData($keyword,$utype,$is_vendor,$badan_hukum,$is_active,$a_company_id_parent);
        $d = $this->_scoped()->db->get_first("object", 0);
        if (isset($d->jumlah)) {
            return $d->jumlah;
        }
        return 0;
    }

    public function getAll($page=0,$pagesize=10,$sortCol="id",$sortDir="ASC",$keyword='',$utype='',$is_vendor='',$badan_hukum='',$is_active='',$a_company_id_parent='')
    {
        $this->db->flushQuery();
        $this->_selected()->_joins()->_filterData();
        $this->db->order_by($sortCol, $sortDir)->limit($page, $pagesize);
        $this->db->order_by($sortCol, $sortDir)->limit($page, $pagesize);
        return $this->db->get("object", 0);
    }
    public function countAll($keyword='',$utype='',$is_vendor='',$badan_hukum='',$is_active='',$a_company_id_parent='')
    {
        $this->db->flushQuery();
        $this->_joins()->_filterData();
        $d = $this->db->get_first("object", 0);
        if (isset($d->jumlah)) {
            return $d->jumlah;
        }
        return 0;
    }

    public function getAllVendor($page=0,$pagesize=10,$sortCol="id",$sortDir="ASC",$keyword='',$utype='',$badan_hukum='')
    {
        $this->db->flushQuery();
        $this->db->select_as("$this->tbl_as.id", "id");
        $this->db->select_as("$this->tbl_as.badan_hukum", "badan_hukum");
        $this->db->select_as("$this->tbl_as.kode", "kode");
        $this->db->select_as("$this->tbl_as.nama", "nama");
        $this->db->select_as("CONCAT($this->tbl_as.kabkota,', ',$this->tbl_as.negara)", "alamat");
        $this->db->select_as("$this->tbl_as.telp", "telp");
        $this->db->select_as("$this->tbl_as.is_active", "is_active");
        $this->db->select_as("$this->tbl_as.is_vendor", "is_vendor");
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->where_as("$this->tbl_as.is_vendor", $this->db->esc('1'), "AND", "LIKE");
        if (strlen($utype)) { $this->db->where_as("$this->tbl_as.utype", $this->db->esc($utype), "AND", "LIKE");
        }
        if (strlen($badan_hukum)) { $this->db->where_as("$this->tbl_as.badan_hukum", $this->db->esc($badan_hukum), "AND", "LIKE");
        }
        if (strlen($keyword)>0) {
            $this->db->where_as("$this->tbl_as.nama", $keyword, "OR", "%like%", 1, 0);
            $this->db->where_as("$this->tbl_as.kode", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.kabkota", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.provinsi", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.negara", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.kodepos", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.alamat", $keyword, "OR", "%like%", 0, 1);
        }
        $this->db->order_by($sortCol, $sortDir)->limit($page, $pagesize);
        return $this->db->get("object", 0);
    }
    public function countAllVendor($keyword='',$utype='',$is_vendor='',$badan_hukum='')
    {
        $this->db->flushQuery();
        $this->db->select_as("COUNT(DISTINCT $this->tbl_as.id)", "jumlah", 0);
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->where_as("$this->tbl_as.is_vendor", $this->db->esc('1'), "AND", "LIKE");
        if (strlen($utype)) { $this->db->where_as("$this->tbl_as.utype", $this->db->esc($utype), "AND", "LIKE");
        }
        if (strlen($badan_hukum)) { $this->db->where_as("$this->tbl_as.badan_hukum", $this->db->esc($badan_hukum), "AND", "LIKE");
        }
        if (strlen($keyword)>0) {
            $this->db->where_as("$this->tbl_as.nama", $keyword, "OR", "%like%", 1, 0);
            $this->db->where_as("$this->tbl_as.kode", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.kabkota", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.provinsi", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.negara", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.kodepos", $keyword, "OR", "%like%", 0, 0);
            $this->db->where_as("$this->tbl_as.alamat", $keyword, "OR", "%like%", 0, 1);
        }
        $d = $this->db->get_first("object", 0);
        if (isset($d->jumlah)) { return $d->jumlah;
        }
        return 0;
    }

    public function id($id)
    {
        $this->db->where("id", $id);
        return $this->db->get_first();
    }
    public function set($di)
    {
        if (!is_array($di)) { return 0;
        }
        return $this->db->insert($this->tbl, $di, 0, 0);
    }
    public function update($id,$du)
    {
        if (!is_array($du)) { return 0;
        }
        $this->db->where("id", $id);
        return $this->db->update($this->tbl, $du, 0);
    }
    public function del($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete($this->tbl);
    }
    public function trans_start()
    {
        $r = $this->db->autocommit(0);
        if ($r) { return $this->db->begin();
        }
        return false;
    }
    public function trans_commit()
    {
        return $this->db->commit();
    }
    public function trans_rollback()
    {
        return $this->db->rollback();
    }
    public function trans_end()
    {
        return $this->db->autocommit(1);
    }
    public function getLastId()
    {
        $this->db->select_as("MAX($this->tbl_as.id)+1", "last_id", 0);
        $this->db->from($this->tbl, $this->tbl_as);
        $d = $this->db->get_first('', 0);
        if (isset($d->last_id)) { return $d->last_id;
        }
        return 0;
    }
    public function get()
    {
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->where("is_active", 1);
        return $this->db->get();
    }
    public function checkKode($kode)
    {
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->where("kode", $kode);
        return $this->db->get_first();
    }
    public function getSearch($keyword='')
    {
        $this->db->select_as("$this->tbl_as.id", "id", 0);
        $this->db->select_as("$this->tbl_as.nama", "text", 0);
        $this->db->from($this->tbl, $this->tbl_as);
        if (strlen($keyword)>0) {
            $this->db->where_as("$this->tbl_as.nama", ($keyword), "OR", "LIKE%%", 1, 0);
            $this->db->where_as("$this->tbl_as.alamat", ($keyword), "OR", "LIKE%%", 0, 0);
            $this->db->where_as("$this->tbl_as.kode", ($keyword), "OR", "LIKE%%", 0, 1);
        }
        $this->db->order_by("$this->tbl_as.a_company_id", "desc");
        $this->db->order_by("$this->tbl_as.utype", "desc");
        $this->db->order_by("$this->tbl_as.nama", "asc");
        return $this->db->get('', 0);
    }
    public function getParentSearch($keyword='')
    {
        $this->db->select_as("$this->tbl_as.id", "id", 0);
        $this->db->select_as("$this->tbl_as.nama", "text", 0);
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->where("$this->tbl_as.a_company_id", "IS NULL");
        if (strlen($keyword)>0) {
            $this->db->where_as("$this->tbl_as.nama", ($keyword), "OR", "LIKE%%", 1, 0);
            $this->db->where_as("$this->tbl_as.alamat", ($keyword), "OR", "LIKE%%", 0, 0);
            $this->db->where_as("$this->tbl_as.kode", ($keyword), "OR", "LIKE%%", 0, 1);
        }
        $this->db->order_by("$this->tbl_as.utype", "desc");
        $this->db->order_by("$this->tbl_as.nama", "asc");
        return $this->db->get('', 0);
    }
    public function getSearchByIsVendor($is_vendor="0", $keyword='')
    {
        $this->db->select_as("$this->tbl_as.id", "id", 0);
        $this->db->select_as("$this->tbl_as.nama", "text", 0);
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->where_as("$this->tbl_as.is_vendor", $this->db->esc($is_vendor));
        if (strlen($keyword)>0) {
            $this->db->where_as("$this->tbl_as.nama", ($keyword), "OR", "LIKE%%", 1, 0);
            $this->db->where_as("$this->tbl_as.alamat", ($keyword), "OR", "LIKE%%", 0, 0);
            $this->db->where_as("$this->tbl_as.kode", ($keyword), "OR", "LIKE%%", 0, 1);
        }
        $this->db->order_by("$this->tbl_as.utype", "desc");
        $this->db->order_by("$this->tbl_as.nama", "asc");
        return $this->db->get('', 0);
    }
    public function getSearchVendor($keyword='')
    {
        $this->db->select_as("$this->tbl_as.id", "id", 0);
        $this->db->select_as("$this->tbl_as.nama", "text", 0);
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->where_as("$this->tbl_as.is_vendor", $this->db->esc(1));
        if (strlen($keyword)>0) {
            $this->db->where_as("$this->tbl_as.nama", ($keyword), "OR", "LIKE%%", 1, 0);
            $this->db->where_as("$this->tbl_as.alamat", ($keyword), "OR", "LIKE%%", 0, 0);
            $this->db->where_as("$this->tbl_as.kode", ($keyword), "OR", "LIKE%%", 0, 1);
        }
        $this->db->order_by("$this->tbl_as.utype", "desc");
        $this->db->order_by("$this->tbl_as.nama", "asc");
        return $this->db->get('', 0);
    }

    public function departementSupportSearch($keyword='')
    {
        $this->db->select_as("$this->tbl_as.id", "id", 0);
        $this->db->select_as("$this->tbl_as.nama", "text", 0);
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->where_as("$this->tbl_as.utype", $this->db->esc('departemen'));
        $this->db->where_as("$this->tbl_as.is_vendor", $this->db->esc(0));
        $this->db->where_as("$this->tbl_as.is_support", $this->db->esc(1));
        if (strlen($keyword)>0) {
            $this->db->where_as("$this->tbl_as.nama", ($keyword), "OR", "LIKE%%", 1, 0);
            $this->db->where_as("$this->tbl_as.alamat", ($keyword), "OR", "LIKE%%", 0, 0);
            $this->db->where_as("$this->tbl_as.kode", ($keyword), "OR", "LIKE%%", 0, 1);
        }
        $this->db->order_by("$this->tbl_as.utype", "desc");
        $this->db->order_by("$this->tbl_as.nama", "asc");
        return $this->db->get('', 0);
    }
    public function toko($keyword='')
    {
        $this->db->select_as("$this->tbl_as.id", "id", 0);
        $this->db->select_as("$this->tbl_as.nama", "text", 0);
        $this->_joins()->_scoped()->_filter_keyword($keyword);
        $this->_toko()->db->order_by("$this->tbl_as.nama", "asc");
        return $this->db->get('', 0);
    }
}
