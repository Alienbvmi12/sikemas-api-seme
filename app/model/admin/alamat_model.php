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
    public $table_columns = [
        "id",
        "rt",
        "no_rumah",
        "kode_pos",
        "id"
    ];
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

    private function filter_keyword($keyword)
    {
        if (strlen($keyword) > 0) {
            $this->db->where("$this->tbl_as.rt", $keyword, "OR", "%like%", 1, 0);
            $this->db->where("$this->tbl_as.no_rumah", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl_as.kode_pos", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl_as.id", $keyword, "AND", "%like%", 0, 1);
        }
        return $this;
    }

    public function read($search, $start, $length, $column, $dir){
        $this->filter_keyword($search);

        // $this->db->where("deleted_at", "", "AND", "<>", 0, 0);
        $this->db->order_by($this->table_columns[$column], $dir);
        $this->db->limit($start, $length);
        return $this->db->get();
    }

    public function get($q = "")
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
