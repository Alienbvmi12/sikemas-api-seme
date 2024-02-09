<?php
namespace Model;
register_namespace(__NAMESPACE__);
/**
* Define all general method(s) and constant(s) for d_kelas_siswa table,
*   can be inherited a Concern class also can be reffered as class constants
*
* @version 1.0.0
*
* @package Model\D_Kelas_Concern
* @since 1.0.0
*/
class D_Kelas_Siswa_Concern extends \JI_Model
{
    public $tbl = 'd_kelas_siswa';
    public $tbl_as = 'dks';
    const COLUMNS = [
        'd_kelas_id',
        'c_siswa_id',
        'is_deleted',
        'is_active'
    ];
    const REQUIRED = [
        'd_kelas_id',
        'c_siswa_id'
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
