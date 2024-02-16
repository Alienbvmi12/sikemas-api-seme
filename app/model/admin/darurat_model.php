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
class Darurat_Model extends JI_Model
{
    public $tbl = "emergencies_log";
    public $tbl_as = "elg";
    public $tbl2 = "alamat";
    public $tbl2_as = "alam";
    public $tbl3 = "users";
    public $tbl3_as = "ussr";
    public $tbl4 = "warga";
    public $tbl4_as = "wrg";
    public $table_columns = [
        "id",
        "event",
        "alamat",
        "user",
        "created_at",
        "id"
    ];

    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }

    private function filter_keyword($keyword)
    {
        if (strlen($keyword) > 0) {
            $this->db->where("$this->tbl_as.id", $keyword, "OR", "%like%", 1, 0);
            $this->db->where("$this->tbl_as.event", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl2_as.no_rumah", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl3_as.username", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl4_as.nama", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl4_as.phone", $keyword, "OR", "%like%", 0, 0);
            $this->db->where("$this->tbl_as.created_at", $keyword, "OR", "%like%", 0, 1);
        }
        return $this;
    }

    public function read($search, $start, $length, $column, $dir){
        $this->db->select_as("$this->tbl_as.id","id",0);
        $this->db->select_as("$this->tbl_as.event","event",0);
        $this->db->select_as("concat(
            $this->tbl2_as.no_rumah, 
            \", RT.\",
            $this->tbl2_as.rt, \". \",
        	$this->tbl2_as.kode_pos
        )","alamat",0);
        $this->db->select_as("concat(
            'Username : ',
            $this->tbl3_as.username,
            '<br>',
            'Nama : ',
            $this->tbl4_as.nama,
            '<br>',
            'Telepon : ',
            $this->tbl4_as.phone,
            '<br>',
            'Alamat : ',
            concat(
                $this->tbl2_as.no_rumah,
                ', RT.',
                $this->tbl2_as.rt
            )
        )","user",0);
        $this->db->select_as("$this->tbl_as.created_at","created_at",0);

        $this->db->join($this->tbl2, $this->tbl2_as, 'id', $this->tbl_as, 'alamat_id', 'left');
        $this->db->join($this->tbl3, $this->tbl3_as, 'id', $this->tbl_as, 'user_id', 'left');
        $this->db->join($this->tbl4, $this->tbl4_as, 'id', $this->tbl3_as, 'warga_id', 'left');

        $this->filter_keyword($search);

        // $this->db->where("deleted_at", "", "AND", "<>", 0, 0);
        $this->db->order_by($this->table_columns[$column], $dir);
        $this->db->limit($start, $length);
        return $this->db->get();
    }

    public function count()
    {
        $this->db->select_as("COUNT(*)","count",0);
        return $this->db->get_first();
    }

    public function create($data){
        return $this->db->insert($this->tbl, $data);
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

}
