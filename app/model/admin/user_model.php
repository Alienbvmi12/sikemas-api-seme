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
class User_Model extends JI_Model
{
    public $tbl = "users";
    public $tbl_as = "ussr";
    public $tbl2 = "warga";
    public $tbl2_as = "wrg";
    public $tbl3 = "alamat";
    public $tbl3_as = "alam";
    public $table_columns = [
        "id",
        "username",
        "email",
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

    private function filter_keyword($keyword)
    {
        if (strlen($keyword) > 0) {
            $this->db->where("$this->tbl_as.id", $keyword, "OR", "%like%", 1, 0);
            $this->db->where("$this->tbl_as.email", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl_as.username", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl_as.created_at", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl2_as.nama", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl2_as.phone", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl3_as.no_rumah", $keyword, "OR", "%like%", 0, 1);
        }
        return $this;
    }

    public function read($search, $start, $length, $column, $dir){
        $this->db->select_as("$this->tbl_as.id","id",0);
        $this->db->select_as("$this->tbl_as.username","username",0);
        $this->db->select_as("$this->tbl_as.email","email",0);
        $this->db->select_as("concat(
            'ID : ',
            $this->tbl2_as.id,
            '<br>',
            'Nama : ',
            $this->tbl2_as.nama,
            '<br>',
            'Telepon : ',
            $this->tbl2_as.phone,
            '<br>',
            concat(
                $this->tbl3_as.no_rumah,
                ', RT.',
                $this->tbl3_as.rt
            )
        )","warga",0);
        $this->db->select_as("$this->tbl_as.created_at","created_at",0);

        $this->db->join($this->tbl2, $this->tbl2_as, 'id', $this->tbl_as, 'warga_id', 'left');
        $this->db->join($this->tbl3, $this->tbl3_as, 'id', $this->tbl2_as, 'alamat_id', 'left');

        $this->filter_keyword($search);

        // $this->db->where("deleted_at", "", "AND", "<>", 0, 0);
        $this->db->order_by($this->table_columns[$column], $dir);
        $this->db->limit($start, $length);
        return $this->db->get();
    }

    public function count($q)
    {
        $this->db->from($this->tbl, $this->tbl_as);
        $this->db->select_as("COUNT(*)","count",0);
        $this->db->join($this->tbl2, $this->tbl2_as, 'id', $this->tbl_as, 'warga_id', 'left');
        $this->db->join($this->tbl3, $this->tbl3_as, 'id', $this->tbl2_as, 'alamat_id', 'left');
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
