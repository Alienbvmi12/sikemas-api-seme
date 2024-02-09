<?php

namespace Model\Admin;

register_namespace(__NAMESPACE__);

use Model;
/**
* Scoped `admin` class model for `a_company` table
*
* @version 1.0.0
*
* @package Model\A_Pengguna_Module_model\Admin
* @since 1.0.0
*/
class A_Pengguna_Module extends \Model\A_Pengguna_Module_Concern
{

    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }
}
