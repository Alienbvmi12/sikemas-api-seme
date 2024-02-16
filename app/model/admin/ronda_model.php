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
    public $tbl_as = "jero";
    public $tbl2 = "warga";
    public $tbl2_as = "wara";
    public $tbl3 = "alamat";
    public $tbl3_as = "alam";
    public $table_columns = [
        "id",
        "hari",
        "warga",
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
        $keypad = 0;
        if(str_contains("SENIN",strtoupper($keyword))){
            $keypad = 1;
        }
        else if(str_contains("SELASA",strtoupper($keyword))){
            $keypad = 2;
        }
        else if(str_contains("RABU",strtoupper($keyword))){
            $keypad = 3;
        }
        else if(str_contains("KAMIS",strtoupper($keyword))){
            $keypad = 4;
        }
        else if(str_contains("JUMAT",strtoupper($keyword))){
            $keypad = 5;
        }
        else if(str_contains("JUM'AT",strtoupper($keyword))){
            $keypad = 5;
        }
        else if(str_contains("SABTU",strtoupper($keyword))){
            $keypad = 6;
        }
        else if(str_contains("MINGGU/AHAD", strtoupper($keyword))){
            $keypad = 7;
        }
        if (strlen($keyword) > 0) {
            $this->db->where("$this->tbl_as.hari", $keypad, "OR", "%like%", 1, 0);
            $this->db->where("$this->tbl2_as.nama", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl2_as.phone", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl3_as.no_rumah", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl_as.id", $keyword, "AND", "%like%", 0, 1);
        }
        return $this;
    }

    public function read($search, $start, $length, $column, $dir){
        $this->db->select_as("$this->tbl_as.id","id",0);
        $this->db->select_as("$this->tbl_as.hari","hari",0);
        $this->db->select_as("concat(
            $this->tbl2_as.nama,
            '<br>',
            $this->tbl2_as.phone,
            '<br>',
            concat(
                $this->tbl3_as.no_rumah,
                ', RT.',
                $this->tbl3_as.rt
            )
        )","warga",0);

        $this->db->join($this->tbl2, $this->tbl2_as, 'id', $this->tbl_as, 'warga_id', 'left');
        $this->db->join($this->tbl3, $this->tbl3_as, 'id', $this->tbl2_as, 'alamat_id', 'left');

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
