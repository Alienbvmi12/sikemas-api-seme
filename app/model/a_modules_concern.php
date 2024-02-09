<?php
namespace Model;
register_namespace(__NAMESPACE__);
/**
* Define all general method(s) and constant(s) for a_modulestable,
*   can be inherited a Concern class also can be reffered as class constants
*
* @version 1.0.0
*
* @package Model\A_Modules
* @since 1.0.0
*/
class A_Modules_Concern extends \JI_Model
{
    public $tbl = 'a_modules';
    public $tbl_as = 'am';
    const COLUMNS = [
        'identifier',
        'name',
        'path',
        'level',
        'has_submenu',
        'children_identifie',
        'is_active',
        'is_default',
        'is_visible',
        'priority',
        'fa_icon',
        'utype'
    ];
    const REQUIRED = [
        'identifier',
        'name',
        'path',
        'level',
        'has_submenu',
        'children_identifie',
        'priority',
        'fa_icon',
        'utype'
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
