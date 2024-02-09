<?php

namespace Model\Front\API;

register_namespace(__NAMESPACE__);

use Model;

/**
 * Scoped `api_front` class model for `b_user` table
 *
 * @version 1.0.0
 *
 * @package Model\api_front
 * @since 1.0.0
 */
class B_User_Model extends \Model\B_User_Concern
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        return $this->db->get();
    }

    private function filter_keyword($keyword)
    {
        if (strlen($keyword) > 0) {
            $this->db->where("fnama", $keyword, "OR", "%like%", 1, 0);
            $this->db->where("lnama", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("kelamin", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("telp", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("b_user_id_pendaftar", $keyword, "OR", "%like%", 0, 1);
        }

        return $this;
    }

    public function getAll($page = 0, $pagesize = 10, $sortCol = "id", $sortDir = "desc", $keyword = "")
    {
        $this->db->flushQuery();
        $this->db->select('id');
        $this->db->select('b_user_id_pendaftar');
        $this->db->select_as("concat_ws(' ',fnama, lnama)") ;
        $this->db->select("kelamin");
        $this->db->select('telp');
        $this->db->select('is_active');

        $this->db->from($this->tbl, $this->tbl_as);
        $this->filter_keyword($keyword);

        $this->db->order_by($sortCol, $sortDir)->limit($page, $pagesize);
        return $this->db->get("object", 0);
    }

    public function countAll($keyword = "")
    {
        $this->db->flushQuery();
        $this->db->select_as("COUNT(*)", "jumlah", 0);
        $this->db->from($this->tbl, $this->tbl_as);
        $this->filter_keyword($keyword);
        $d = $this->db->get_first("object", 0);
        if (isset($d->jumlah)) {
            return $d->jumlah;
        }
        return 0;
    }
}
