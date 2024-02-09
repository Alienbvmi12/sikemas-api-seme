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
class B_Biayarinci_Model extends \Model\B_Biayarinci_Concern
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
    public function delete($id)
    {
        $this->db->where("id", $id);
        $this->db->delete($this->tbl);
    }
    private function filter_keyword($keyword)
    {
        if (strlen($keyword) > 0) {
            $this->db->where("nama", $keyword, "OR", "%like%", 1, 0);
            $this->db->where("b_biaya_id", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("nominal", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("urutan", $keyword, "OR", "%like%", 0, 1);
        }

        return $this;
    }

    public function getAll($page = 0, $pagesize = 10, $sortCol = "id", $sortDir = "desc", $keyword = "")
    {
        $this->db->flushQuery();
        $this->db->select('id');
        $this->db->select('b_biaya_id');
        $this->db->select('nama');
        $this->db->select('nominal');
        $this->db->select('urutan');
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