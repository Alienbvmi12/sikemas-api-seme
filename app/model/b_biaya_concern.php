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
class B_Biaya_Concern extends \JI_Model
{
    public $tbl = 'b_biaya';
    public $tbl_as = 'bb';
    const COLUMNS = [
        'a_tahunajaran_id',
        'a_institusi_id',
        'nominal',
        'is_active'
    ];
    const REQUIRED = [
        
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
