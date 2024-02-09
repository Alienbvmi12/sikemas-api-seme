<?php

namespace Model\Admin\API;

register_namespace(__NAMESPACE__);

use Model;
/**
* Scoped `api_admin` class model for `b_biaya` table
*
* @version 1.0.0
*
* @package Model\Admin\API
* @since 1.0.0
*/
class B_Biaya_Model extends \Model\B_Biaya_Concern
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
}
