<?php
namespace Model;
register_namespace(__NAMESPACE__);
/**
* Define all general method(s) and constant(s) for c_gurutendik table,
*   can be inherited a Concern class also can be reffered as class constants
*
* @version 1.0.0
*
* @package Model
* @since 1.0.0
*/
class C_Gurutendik_Concern extends \JI_Model
{
    public $tbl = 'c_gurutendik';
    public $tbl_as = 'cg';
    const COLUMNS = [
        'b_user_id',
        'a_institusi_id',
        'utype',
        'kode',
        'nip',
        'nuptk',
        'created_at',
        'updated_at',
        'deleted_at',
        'is_active'
    ];
    const REQUIRED = [
        'b_user_id',
        'a_institusi_id',
        'utype',
        'kode',
        'nip',
        'nuptk',
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
