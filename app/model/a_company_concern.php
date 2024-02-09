<?php
namespace Model;
register_namespace(__NAMESPACE__);
/**
* Define all general method(s) and constant(s) for a_company table,
*   can be inherited a Concern class also can be reffered as class constants
*
* @version 1.0.0
*
* @package Model
* @since 1.0.0
*/
class A_Company_Concern extends \JI_Model
{
    public $tbl = 'a_company';
    public $tbl_as = 'ac';
    const UTYPE_TOKO = 'toko';
    const COLUMNS = [
        'utype',
        'kode',
        'nama',
        'is_active'
    ];
    const REQUIRED = [
        'utype',
        'kode',
        'nama'
    ];
    const UTYPE = [
        'pusat',
        'cabang',
        'toko',
        'departemen',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
        $this->defined_columns(self::COLUMNS);
        $this->required_columns(self::REQUIRED);
        // $this->enum(self::REQUIRED);
    }

    public function _toko()
    {
        $this->db->where_as("$this->tbl_as.utype", $this->db->esc('toko'));
        return $this;
    }
}
