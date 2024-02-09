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
class B_Biayarinci_Model extends \Model\B_Biayarinci_Concern
{
    public $tbl = "b_biaya_rincian";
    public $tbl_as = "brm";

    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }
}
