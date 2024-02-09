<?php
namespace Model;
register_namespace(__NAMESPACE__);
/**
* Define all general method(s) and constant(s) for b_user table,
*   can be inherited a Concern class also can be reffered as class constants
*
* @version 1.0.0
*
* @package Model
* @since 1.0.0
*/
class B_User_Concern extends \JI_Model
{
    public $tbl = 'b_user';
    public $tbl_as = 'bu';
    const UTYPE_a_institusi_id_owner = 'a_institusi';
    const COLUMNS = [
        'a_institusi_id_owner',
        'email',
        'password',
        'fnama',
        'lnama',
        'kelamin',
        'telp',
        'birth_place',
        'birth_date',
        'created_at',
        'active_date',
        'expire_date',
        'umur',
        'pekerjaan',
        'api_reg_date',
        'api_reg_token',
        'api_web_date',
        'api_web_token',
        'api_mobile_date',
        'api_mobile_token',
        'fcm_token',
        'device',
        'foto',
        'is_agree',
        'is_mentor',
        'is_confirmed',
        'is_active',
        'b_user_id_pendaftar'
    ];
    const REQUIRED = [
        'a_institusi_id_owner',
        'email',
        'password',
        'fnama',
        'kelamin',
        'telp',
        'birth_place',
        'birth_date',
        'umur',
        'pekerjaan',
        'foto',
    ];
    const UTYPE = [
        'yayasan',
        'sekolah'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
        $this->defined_columns(self::COLUMNS);
        $this->required_columns(self::REQUIRED);
        // $this->enum(self::REQUIRED);
    }

    public function _a_institusi_id_owner()
    {
        $this->db->where_as("$this->tbl_as.utype", $this->db->esc('a_institusi_id_owner'));
        return $this;
    }
}
