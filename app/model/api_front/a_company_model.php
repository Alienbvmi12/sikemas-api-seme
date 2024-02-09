<?php

namespace Model\Front\API;

register_namespace(__NAMESPACE__);

use Model;

/**
* Scoped `api_front` class model for table a_company
*
* @version 1.0.0
*
* @package Model\A_Company\Front\Api
* @since 1.0.0
*/
class A_Company_Model extends \Model\A_Company_Concern
{
    public function __construct()
    {
        parent::__construct();
    }
}
