<?php

namespace Model\Admin\API;

register_namespace(__NAMESPACE__);

use Model;
/**
* Scoped `api_admin` class model for `a_company` table
*
* @version 1.0.0
*
* @package Model\Admin\API
* @since 1.0.0
*/
class A_Pengguna_Model extends \Model\A_Pengguna_Concern
{


  public function __construct()
  {
    parent::__construct();
    $this->db->from($this->tbl, $this->tbl_as);
  }
  public function getById($id)
    {
        $this->db->where("id", $id);
        return $this->db->get_first();
    }
}
