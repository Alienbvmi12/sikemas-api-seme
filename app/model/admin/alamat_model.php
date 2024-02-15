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
class Alamat_Model extends JI_Model
{
    public $tbl = "alamat";
    public $tbl_as = "al";
    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }

    public function create($data){
        return $this->db->insert($this->tbl, $data);
    }

    public function get($q)
    {
        return $this->db->query(
            "call get_alamat('%".
            str_replace(".0", ".",
            str_replace(".00", ".",
            str_replace("no ", "no.",
            str_replace("rw ", "rw.",
            str_replace("rt ", "rt.", $q)))))."%')"
        );
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

}
