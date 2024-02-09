<?php

namespace Model\Front;

register_namespace(__NAMESPACE__);

use Model;

/**
* Scoped `front` class model for table `a_institusi`
*
* @version 1.0.0
*
* @package A_pengguna_jabatan\Front
* @since 1.0.0
*/
class A_Pengguna_Jabatan extends \Model\A_pengguna_jabatan_Concern
{
    public function __construct()
    {
        parent::__construct();
    }
}
