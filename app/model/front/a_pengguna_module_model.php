<?php

namespace Model\Front;

register_namespace(__NAMESPACE__);

use Model;

/**
* Scoped `front` class model for table `a_pengguna_module`
*
* @version 1.0.0
*
* @package A_Pengguna_Module\Front
* @since 1.0.0
*/
class A_Pengguna_Module extends \Model\A_pengguna_Module_Concern
{
    public function __construct()
    {
        parent::__construct();
    }
}
