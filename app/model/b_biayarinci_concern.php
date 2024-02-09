<?php
namespace Model;
register_namespace(__NAMESPACE__);
/**
* Define all general method(s) and constant(s) for a_company table,
*   can be inherited a Concern class also can be reffered as class constants
*
* @version 1.0.0
*
* @package Model\A_Company
* @since 1.0.0
*/
class B_Biayarinci_Concern extends \JI_Model
{
    public $tbl = 'b_biaya_rincian';
    public $tbl_as = 'br';
    const COLUMNS = [
        'b_biaya_id',
        'nama',
        'nominal',
        'urutan',
        'is_kategori',
        'is_active'
    ];
    const REQUIRED = [
        'b_biaya_id',
        'nama',
        'nominal',
        'urutan',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
        $this->defined_columns(self::COLUMNS);
        $this->required_columns(self::REQUIRED);
        // $this->enum(self::REQUIRED);
    }
}
