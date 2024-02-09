<?php
namespace Model;
register_namespace(__NAMESPACE__);
/**
* Define all general method(s) and constant(s) for c_gurutendik_jabatan table,
*   can be inherited a Concern class also can be reffered as class constants
*
* @version 1.0.0
*
* @package Model
* @since 1.0.0
*/
class C_Gurutendik_Jabatan_Concern extends \JI_Model
{
    public $tbl = 'c_gurutendik_jabatan';
    public $tbl_as = 'cgj';
    const COLUMNS = [
        'a_institusi_id',
        'c_gurutendik_id',
        'a_jabatan_id',
        'a_matapelajaran_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'is_active'
    ];
    const REQUIRED = [
        'a_institusi_id',
        'c_gurutendik_id',
        'a_jabatan_id',
        'a_matapelajaran_id'
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
