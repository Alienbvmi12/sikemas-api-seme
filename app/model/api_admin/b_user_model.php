<?php

namespace Model\Admin\API;

register_namespace(__NAMESPACE__);

use Model;
/**
* Scoped `api_admin` class model for `b_user` table
*
* @version 1.0.0
*
* @package Model\api_admin
* @since 1.0.0
*/
class B_User_Model extends \Model\B_User_Concern
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
