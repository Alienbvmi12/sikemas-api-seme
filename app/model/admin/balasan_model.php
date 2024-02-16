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
class Balasan_Model extends JI_Model
{
    public $tbl = "balasan";
    public $tbl_as = "balasan";
    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }

    public function create($data){
        return $this->db->insert($this->tbl, $data);
    }

    public function count()
    {
        $this->db->select_as("COUNT(*)","count",0);
        return $this->db->get_first();
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

}
