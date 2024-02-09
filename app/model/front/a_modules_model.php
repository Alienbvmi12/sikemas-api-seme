<?php

namespace Model\Front;

register_namespace(__NAMESPACE__);

use Model;

/**
* Scoped `front` class model for table `a_modules`
*
* @version 1.0.0
*
* @package A_Modules\Front
* @since 1.0.0
*/
class A_Modules_Model extends \Model\A_Modules_Concern
{
    public function __construct()
    {
        parent::__construct();
    }
}
