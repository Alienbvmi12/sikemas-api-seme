<?php
namespace Model;
register_namespace(__NAMESPACE__);
/**
* Define all general method(s) and constant(s) for c_siswa table,
*   can be inherited a Concern class also can be reffered as class constants
*
* @version 1.0.0
*
* @package Model\C_Siswa
* @since 1.0.0
*/
class C_Siswa_Concern extends \JI_Model
{
    public $tbl = 'c_siswa';
    public $tbl_as = 'cs';
    const COLUMNS = [
        'a_institusi_id',
        'b_user_id',
        'b_user_id_ayah',
        'nomor_induk',
        'nisn',
        'tahun_keluar',
        'is_active'
    ];
    const REQUIRED = [
        'a_institusi_id',
        'b_user_id',
        'nomor_induk',
        'nisn'
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
