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
class Aspirasi_Model extends JI_Model
{
    public $tbl = "aspirasi";
    public $tbl_as = "aspirant";
    public $tbl2 = "users";
    public $tbl2_as = "user";
    public $tbl3 = "warga";
    public $tbl3_as = "warga";
    public $tbl4 = "balasan";
    public $tbl4_as = "bal";
    public $tbl5 = "alamat";
    public $tbl5_as = "alam";
    public $table_columns = [
        "id",
        "pengirim",
        "perihal",
        "status",
        "created_at",
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
            $this->db->where("$this->tbl2_as.username", $keyword, "OR", "%like%", 1, 0);
            $this->db->where("$this->tbl3_as.nama", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl3_as.phone", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl5_as.no_rumah", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl_as.perihal", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl_as.created_at", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl_as.id", $keyword, "AND", "%like%", 0, 1);
        }
        return $this;
    }

    public function read($search, $start, $length, $column, $dir){
        $this->db->select_as("$this->tbl_as.id","id",0);
        $this->db->select_as("concat(
            'Username : ',
            $this->tbl2_as.username,
            '<br>',
            'Nama : ',
            $this->tbl3_as.nama,
            '<br>',
            'Telepon : ',
            $this->tbl3_as.phone,
            '<br>',
            'Alamat : ',
            concat(
                $this->tbl5_as.no_rumah,
                ', RT.',
                $this->tbl5_as.rt
            )
        )","pengirim",0);
        $this->db->select_as("$this->tbl_as.perihal","perihal",0);
        $this->db->select_as("if($this->tbl4_as.id is null, 'Belum dibalas', 'Sudah dibalas')","status",0);
        $this->db->select_as("$this->tbl_as.created_at","created_at",0);

        $this->db->join($this->tbl2, $this->tbl2_as, 'id', $this->tbl_as, 'user_id', 'left');
        $this->db->join($this->tbl3, $this->tbl3_as, 'id', $this->tbl2_as, 'warga_id', 'left');
        $this->db->join($this->tbl4, $this->tbl4_as, 'aspirasi_id', $this->tbl_as, 'id', 'left');
        $this->db->join($this->tbl5, $this->tbl5_as, 'id', $this->tbl3_as, 'alamat_id', 'left');

        $this->filter_keyword($search);
        
        // $this->db->where("deleted_at", "", "AND", "<>", 0, 0);
        $this->db->order_by($this->table_columns[$column], $dir);
        $this->db->limit($start, $length);
        return $this->db->get();
    }

    public function get()
    {
        return $this->db->get();
    }

    public function getById($id)
    {
        $this->db->select_as("$this->tbl_as.id","id",0);
        $this->db->select_as("$this->tbl4_as.id","balasan_id",0);
        $this->db->select_as("$this->tbl_as.perihal","perihal",0);
        $this->db->select_as("$this->tbl_as.pesan","pesan",0);
        $this->db->select_as("$this->tbl4_as.title","judul",0);
        $this->db->select_as("$this->tbl4_as.pesan","pesan_balasan",0);

        $this->db->where("$this->tbl_as.id", $id);

        $this->db->join($this->tbl4, $this->tbl4_as, 'aspirasi_id', $this->tbl_as, 'id', 'left');
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

}
