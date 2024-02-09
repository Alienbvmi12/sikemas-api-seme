<?php

namespace Model\Front\API;

register_namespace(__NAMESPACE__);

use Model;

/**
* Scoped `api_front` class model for `b_user_alamat` table
*
* @version 1.0.0
*
* @package Model\api_front
* @since 1.0.0
*/
class B_User_Alamat_Model extends \Model\B_User_Alamat_Concern
{
    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }

    public function get()
    {
        return $this->db->get();
    }

    public function update($id, $du)
    {
        $this->db->where("id", $id);
        $this->db->update($this->tbl, $du);
    }

    public function delete($id)
    {
        $this->db->where("id", $id);
        $this->db->delete($this->tbl);
    }

    private function filter_keyword($keyword)
    {
        if (strlen($keyword)>0) {
            $this->db->where("nama", $keyword, "OR", "%like%", 1, 0);
            $this->db->where("alamat1", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("alamat2", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("kecamatan", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("kabkota", $keyword, "OR", "%like%", 0, 1);
        }

        return $this;
    }

    public function getAll($page=0, $pagesize=10, $sortCol="id", $sortDir="desc", $keyword="", $b_user_id="")
    {
        $this->db->flushQuery();
        $this->db->select('id');
        $this->db->select('nama');
        $this->db->select('alamat1');
        $this->db->select('alamat2');
        $this->db->select('kelurahan');
        $this->db->select('kecamatan');
        $this->db->select('kabkota');
        $this->db->select('provinsi');
        $this->db->select('negara');
        $this->db->select('kodepos');
        $this->db->select('is_active');
        $this->db->select('is_default');

        $this->db->from($this->tbl, $this->tbl_as);
        if (strlen($b_user_id)) {
            $this->db->where("b_user_id", $b_user_id);
        }
        $this->filter_keyword($keyword);

        $this->db->order_by($sortCol, $sortDir)->limit($page, $pagesize);
        return $this->db->get("object", 0);
    }

    public function countAll($keyword="", $b_user_id="")
    {
        $this->db->flushQuery();
        $this->db->select_as("COUNT(*)", "jumlah", 0);
        $this->db->from($this->tbl, $this->tbl_as);
        if ( strlen($b_user_id) ) {
            $this->db->where("b_user_id", $b_user_id);
        }
        $this->filter_keyword($keyword);
        $d = $this->db->get_first("object", 0);
        if (isset($d->jumlah)) {
            return $d->jumlah;
        }
        return 0;
    }
}
