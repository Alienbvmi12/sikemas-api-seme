<?php
namespace Model;
register_namespace(__NAMESPACE__);
/**
* Define all general method(s) and constant(s) for b_user_alamat table,
*   can be inherited a Concern class also can be reffered as class constants
*
* @version 1.0.0
*
* @package Model
* @since 1.0.0
*/
class B_User_Alamat_Concern extends \JI_Model
{
    public $tbl = 'b_user_alamat';
    public $tbl_as = 'bul';
    const UTYPE_b_user = 'b_user';
    const COLUMNS = [
        'b_user_id',
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
        'is_default',
        'is_active'
    ];
    const REQUIRED = [
        'b_user_id',
        'nama',
        'alamat1',
        'alamat2',
        'kelurahan',
        'kecamatan',
        'kabkota',
        'provinsi',
        'negara',
        'kodepos',
        'telp'
    ];
    const UTYPE = [
        'fnama'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
        $this->defined_columns(self::COLUMNS);
        $this->required_columns(self::REQUIRED);
        // $this->enum(self::REQUIRED);
    }

    public function _b_user()
    {
        $this->db->where_as("$this->tbl_as.utype", $this->db->esc('b_user'));
        return $this;
    }
}
