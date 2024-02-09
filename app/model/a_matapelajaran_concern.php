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
class A_Matapelajaran_Concern extends \JI_Model
{
    public $tbl = 'a_matapelajaran';
    public $tbl_as = 'ac';
    const COLUMNS = [
        'nama',
        'is_active'
    ];
    const REQUIRED = [
        'nama'
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
