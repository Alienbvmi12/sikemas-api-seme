<?php

namespace Model\Admin\API;

register_namespace(__NAMESPACE__);

use Model;

/**
 * Scoped `api_admin` class model for `a_tahunajaran` table
 *
 * @version 1.0.0
 *
 * @package Model\Admin\API
 * @since 1.0.0
 */
class A_Tahunajaran_Model extends \Model\A_Tahunajaran_Concern
{
    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }

    public function get($del = 2)
    {
        if ($del !== 2) {
            if ($del == true) {
                $this->db->where('is_deleted', 1);
            } else {
                $this->db->where('is_deleted', 0);
            }
        }
    }
}
