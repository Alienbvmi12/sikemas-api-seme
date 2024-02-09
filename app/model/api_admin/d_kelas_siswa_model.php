<?php

namespace Model\Admin\API;

register_namespace(__NAMESPACE__);

use Model;

/**
 * Scoped `api_admin` class model for `d_kelas_siswa` table
 *
 * @version 1.0.0
 *
 * @package Model\Admin\API
 * @since 1.0.0
 */
class D_Kelas_Siswa_Model extends \Model\D_Kelas_Siswa_Concern
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
