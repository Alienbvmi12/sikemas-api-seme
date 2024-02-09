<?php

namespace Model\Front;

register_namespace(__NAMESPACE__);

use Model;
/**
* Scoped `Front` class model for `c_siswa` table
*
* @version 1.0.0
*
* @package Model\Front
* @since 1.0.0
*/
class C_Siswa_Model extends \Model\C_Siswa_Concern
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

    public function update($id, $du)
    {
        $this->db->where("id",$id);
        $this->db->update($this->tbl,$du);
    }

    public function delete($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->tbl);
    }
}
