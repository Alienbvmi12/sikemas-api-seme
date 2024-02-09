<?php
namespace Model;
register_namespace(__NAMESPACE__);
/**
* Define all general method(s) and constant(s) for d_kelasrombel table,
*   can be inherited a Concern class also can be reffered as class constants
*
* @version 1.0.0
*
* @package Model\B_Kelasrombel
* @since 1.0.0
*/
class B_Kelasrombel_Concern extends \JI_Model
{
    public $tbl = 'b_kelasrombel';
    public $tbl_as = 'bkr';
    const COLUMNS = [
        'a_institusi_id',
        'jenjang_kelas',
        'nama',
        'konsentrasi',
        'created_at',
        'updated_at',
        'deleted_at',
        'is_deleted',
        'is_active'
    ];
    const REQUIRED = [
        'a_institusi_id',
        'jenjang_kelas',
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
