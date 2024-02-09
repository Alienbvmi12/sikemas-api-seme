<?php

namespace Model\Front;

register_namespace(__NAMESPACE__);

use Model;

/**
* Scoped `front` class model for table `a_institusi`
*
* @version 1.0.0
*
* @package A_institusi\Front
* @since 1.0.0
*/
class A_institusi_Model extends \Model\A_institusi_Concern
{
    public $tbl = "a_institusi";
    public $tbl_as = "ai";

    public function __construct()
    {
        parent::__construct();
    }

    public function getInstitusi($id){
        $this->db->where("id", $id);
        return $this->db->get();
    }

    public function sdmit(){
        return $this->db->get();
    }
    
    public function getSchools(){
        $this->db->where("$this->tbl_as.utype", "yayasan", "AND", "<>");
        return $this->db->get();
    }
}
