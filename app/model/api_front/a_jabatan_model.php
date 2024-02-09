<?php

namespace Model\Front\API;

register_namespace(__NAMESPACE__);

use Model;

/**
* Scoped `api_front` class model for table a_jabatan
*
* @version 1.0.0
*
* @package Model\A_jabatan\Front\Api
* @since 1.0.0
*/
class A_jabatan_Model extends \Model\A_jabatan_Concern
{
    public function __construct()
    {
        parent::__construct();
    }
}
