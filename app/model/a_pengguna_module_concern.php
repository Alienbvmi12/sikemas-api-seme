<?php
namespace Model;
register_namespace(__NAMESPACE__);
/**
* Define all general method(s) and constant(s) for a_pengguna_module table,
*   can be inherited a Concern class also can be reffered as class constants
*
* @version 1.0.0
*
* @package Model\a_pengguna_module
* @since 1.0.0
*/
class A_Pengguna_Module_Concern extends \JI_Model
{
    public $tbl = 'a_pengguna_module';
    public $tbl_as = 'apm';
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
