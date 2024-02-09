<?php
namespace Model;
register_namespace(__NAMESPACE__);
/**
* Define all general method(s) and constant(s) for a_institusi table,
*   can be inherited a Concern class also can be reffered as class constants
*
* @version 1.0.0
*
* @package Model\A_Institusi
* @since 1.0.0
*/
class A_Institusi_Concern extends \JI_Model
{
    public $tbl = 'a_institusi';
    public $tbl_as = 'ai';
    const COLUMNS = [
        'utype',
        'jenjang',
        'nama',
        'alamat1',
        'alamat2',
        'kelurahan',
        'kecamatan',
        'kabkota',
        'provinsi',
        'negara',
        'kodepos',
        'telp',
        'created_at',
        'updated_at',
        'deleted_at',
        'is_active',
        'a_institusi_id'
    ];
    const REQUIRED = [
        'utype',
        'jenjang',
        'nama',
        'alamat1',
        'alamat2',
        'kelurahan',
        'kecamatan',
        'kabkota',
        'provinsi',
        'negara',
        'kodepos',
        'telp',
    ];
    const UTYPES = [
        'institute',
        'lembaga',
        'yayasan',
        'sekolah',
	    'universitas'
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