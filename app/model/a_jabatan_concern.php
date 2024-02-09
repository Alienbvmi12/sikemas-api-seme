<?php
namespace Model;
register_namespace(__NAMESPACE__);
/**
* Define all general method(s) and constant(s) for a_company table,
*   can be inherited a Concern class also can be reffered as class constants
*
* @version 1.0.0
*
* @package Model\A_Company
* @since 1.0.0
*/
class A_Jabatan_Concern extends \JI_Model
{
    public $tbl = 'a_jabatan';
    public $tbl_as = 'ac';
    const COLUMNS = [
        'nama',
        'is_active'
    ];
    const REQUIRED = [
        'nama'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
        $this->defined_columns(self::COLUMNS);
        $this->required_columns(self::REQUIRED);
        // $this->enum(self::REQUIRED);
        $this->datatables['admin'] = new \Seme_Datatable([
            ["$this->tbl_as.id", 'id', 'ID'],
            ["$this->tbl_as.nama", 'nama', 'Nama'],
            ["$this->tbl_as.is_active", 'is_active', 'Status']
        ]);
    }
}
