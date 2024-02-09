<?php
namespace Model;
register_namespace(__NAMESPACE__);
/**
* Define all general method(s) and constant(s) for b_user_invoice table,
*   can be inherited a Concern class also can be reffered as class constants
*
* @version 1.0.0
*
* @package Model
* @since 1.0.0
*/
class B_User_Invoice_Concern extends \JI_Model
{
    public $tbl = 'b_user_invoice';
    public $tbl_as = 'bui';
    const COLUMNS = [
        'a_pengguna_id',
        'b_user_id',
        'b_user_id_siswa',
        'a_institusi_id',
        'b_biaya_id',
        'jenjang_kelas',
        'kode',
        'created_at',
        'updated_at',
        'deleted_at',
        'due_date',
        'confirm_date',
        'confirm_info',
        'paid_at',
        'sub_total',
        'diskon',
        'total',
        'is_bayar',
        'is_batal',
        'is_active'
    ];
    const REQUIRED = [
        'a_pengguna_id',
        'b_user_id',
        'b_user_id_siswa',
        'a_institusi_id',
        'b_biaya_id',
        'jenjang_kelas',
        'kode',
        'sub_total',
        'diskon',
        'total',
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
