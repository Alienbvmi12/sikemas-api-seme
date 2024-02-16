<?php

namespace Model\Front;

register_namespace(__NAMESPACE__);

use JI_Model;
use Model;

/**
 * Scoped `Front` class model for `b_user` table
 *
 * @version 1.0.0
 *
 * @package Model\Front
 * @since 1.0.0
 */
class Ronda_Model extends JI_Model
{
    public $tbl = "jadwal_ronda";
    public $tbl_as = "jr";
    public $tbl2 = "warga";
    public $tbl2_as = "wr";
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

    public function get_jadwal_by_hari($day)
    {
        $this->db->select_as("$this->tbl_as.id","id",0);
        $this->db->select_as("$this->tbl_as.hari","hari",0);
        $this->db->select_as("$this->tbl2_as.nama","nama",0);
        $this->db->select_as("$this->tbl2_as.phone","phone",0);
        $this->db->select_as("$this->tbl2_as.foto","foto",0);
        $this->db->join($this->tbl2, $this->tbl2_as, 'id', $this->tbl_as, 'warga_id', 'left');
        $this->db->where("hari", $day);
        return $this->db->get();
    }
}
