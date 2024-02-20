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
class Warga_Model extends JI_Model
{
    public $tbl = "warga";
    public $tbl_as = "wa";
    public $tbl2 = "posisi";
    public $tbl2_as = "posi";
    public $tbl3 = "alamat";
    public $tbl3_as = "alam";
    public $table_columns = [
        "id",
        "foto",
        "nik",
        "nama",
        "phone",
        "tempat_lahir",
        "kelamin",
        "kewarganegaraan",
        "pekerjaan",
        "posisi",
        "alamat",
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

    private function filter_keyword($keyword)
    {
        if (strlen($keyword) > 0) {
            $this->db->where("$this->tbl_as.nik", $keyword, "OR", "%like%", 1, 0);
            $this->db->where("$this->tbl_as.phone", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl_as.tempat_lahir", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl_as.nama", $keyword, "AND", "%like%", 0, 1);
        }
        return $this;
    }

    public function read($search, $start, $length, $column, $dir){
        $this->db->select_as("$this->tbl_as.id","id",0);
        $this->db->select_as("$this->tbl_as.foto","foto",0);
        $this->db->select_as("$this->tbl_as.nik","nik",0);
        $this->db->select_as("$this->tbl_as.nama","nama",0);
        $this->db->select_as("$this->tbl_as.phone","phone",0);
        $this->db->select_as("CONCAT($this->tbl_as.tempat_lahir, ', ', $this->tbl_as.tanggal_lahir)","ttl",0);
        $this->db->select_as("$this->tbl_as.kelamin","kelamin",0);
        $this->db->select_as("$this->tbl_as.kewarganegaraan","kewarganegaraan",0);
        $this->db->select_as("$this->tbl_as.pekerjaan","pekerjaan",0);
        $this->db->select_as("$this->tbl2_as.posisi","posisi",0);
        $this->db->select_as("concat(
            $this->tbl3_as.no_rumah, 
            \", RT.\",
            $this->tbl3_as.rt, \". \",
        	$this->tbl3_as.kode_pos
        )","alamat",0);

        $this->db->join($this->tbl2, $this->tbl2_as, 'id', $this->tbl_as, 'posisi_id', 'left');
        $this->db->join($this->tbl3, $this->tbl3_as, 'id', $this->tbl_as, 'alamat_id', 'left');

        $this->filter_keyword($search);

        // $this->db->where("deleted_at", "", "AND", "<>", 0, 0);
        $this->db->order_by($this->table_columns[$column], $dir);
        $this->db->limit($start, $length);
        return $this->db->get();
    }

    public function count($q)
    {
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->select_as("COUNT(*)","total",0);
        $this->filter_keyword($q);
        return $this->db->get_first();
    }

    public function get()
    {
        return $this->db->get();
    }

    public function getById($id)
    {
        $this->db->where("id", $id);
        return $this->db->get_first();
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

    public function get_by_nik($nik)
    {
        $this->db->where("nik", $nik);
        return $this->db->get_first();
    }
}
