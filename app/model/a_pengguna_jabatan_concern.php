<?php
namespace Model;
register_namespace(__NAMESPACE__);
/**
* Define all general method(s) and constant(s) for a_pengguna_jabatan table,
*   can be inherited a Concern class also can be reffered as class constants
*
* @version 1.0.0
*
* @package Model
* @since 1.0.0
*/
class A_Pengguna_Jabatan_Concern extends \JI_Model
{
    public $tbl = 'a_pengguna_jabatan';
    public $tbl_as = 'apj';
    const COLUMNS = [
        'a_jabatan_id',
        'a_pengguna_id',
        'is_active'
    ];
    const REQUIRED = [
        'a_jabatan_id',
        'a_pengguna_id'
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
