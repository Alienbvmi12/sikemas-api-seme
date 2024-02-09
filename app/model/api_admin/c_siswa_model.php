<?php

namespace Model\Admin\API;

register_namespace(__NAMESPACE__);

use Model;

/**
 * Scoped `api_admin` class model for `c_siswa` table
 *
 * @version 1.0.0
 *
 * @package Model\Admin\API
 * @since 1.0.0
 */
class C_Siswa_Model extends \Model\C_Siswa_Concern
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
        return $this->db->get();
    }
}
