<?php

namespace Model\Front;

register_namespace(__NAMESPACE__);

use Model;

/**
* Scoped `front` class model for table `a_company`
*
* @version 1.0.0
*
* @package A_Company\Front
* @since 1.0.0
*/
class A_Company_Model extends \Model\A_Company_Concern
{
    public function __construct()
    {
        parent::__construct();
    }
}
