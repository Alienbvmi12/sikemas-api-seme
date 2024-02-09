<?php

namespace Model\Front;

register_namespace(__NAMESPACE__);

use Model;

/**
 * Scoped `Front` class model for `b_biaya` table
 *
 * @version 1.0.0
 *
 * @package Model\Front
 * @since 1.0.0
 */
class B_Biaya_Model extends \Model\B_User_Concern
{
    public $tbl = "b_biaya";
    public $tbl_as = "bu";
    public $tbl2 = "c_siswa";
    public $tbl2_as = "cs";
    public $tbl3 = "c_gurutendik";
    public $tbl3_as = "cgt";
    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }
}
