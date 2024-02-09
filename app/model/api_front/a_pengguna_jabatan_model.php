<?php

namespace Model\Front\API;

register_namespace(__NAMESPACE__);

use Model;

/**
* Scoped `api_front` class model for table a_institusi
*
* @version 1.0.0
*
* @package Model\A_Pengguna_Jabatan\Front\Api
* @since 1.0.0
*/
class A_Pengguna_Jabatan_Model extends \Model\A_pengguna_jabatan_Concern
{
    public function __construct()
    {
        parent::__construct();
    }
}
