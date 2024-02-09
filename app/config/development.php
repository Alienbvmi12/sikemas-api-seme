<?php
/**
 * Configuration file for Development version
 *   You can create one for:
 *   development.php
 *   staging.php
 *   production.php
 */

/****************************/
/* == Base Configuration == */
/* @var string */
/****************************/

/**
 * Site Base URL with http:// or https:// prefix and trailing slash
 * @var string
 */
$site = "http://".$_SERVER['HTTP_HOST']."/dapodikkw/";
/**
 * URL parse method
 *   - REQUEST_URI, suitable for Nginx
 *   - PATH_INFO, suitable for XAMPP
 *   - ORIG_PATH_INFO
 * @var string
 */
$method = "PATH_INFO";//REQUEST_URI,PATH_INFO,ORIG_PATH_INFO,
/**
 * Admin Secret re-routing
 * this is alias for app/controller/admin/*
 * @var string
 */
$admin_secret_url = 'admin';
/**
 * Base URL with http:// or https:// prefix and trailing slash
 * @var string
 */
$cdn_url = '';

/********************************/
/* == Database Configuration == */
/* Database connection information */
/* @var array of string */
/********************************/
$db['host']  = 'localhost';
$db['user']  = 'root';
$db['pass']  = '';
$db['name']  = 'dapodik_kwdb';
$db['port'] = '3306';
$db['charset'] = 'utf8mb4';
$db['engine'] = 'mysqli';
$db['enckey'] = '';

/****************************/
/* == Session Configuration == */
/* @var string */
/****************************/
$saltkey = 's3mEFr4';

/********************************/
/* == Timezone Configuration == */
/* @var string */
/****************************/
$timezone = 'Asia/Jakarta';

/********************************/
/* == Core Configuration == */
/* register your core class, and put it on: */
/*   - app/core/ */
/* all var $core_* value in lower case string*/
/* @var string */
/****************************/
$core_prefix = 'ji_';
$core_controller = 'model';
$core_model = 'controller';

/********************************/
/* == Controller Configuration == */
/* register your onboarding (main) controller */
/*   - make sure dont add any traing slash in array key of routes */
/*   - all var $controller_* value in lower case string */
/*   - example $routes['produk/(:any)'] = 'produk/detail/index/$1' */
/*   - example example $routes['blog/id/(:num)/(:any)'] = 'blog/detail/index/$1/$2'' */
/* @var string */
/****************************/
$controller_main='home';
$controller_404='notfound';

/********************************/
/* == Controller Re-Routing Configuration == */
/* make sure dont add any traing slash in array key of routes */
/* @var array of string */
/****************************/
// $routes['produk/(:any)'] = 'produk/detail/index/$1';
// $routes['blog/id/(:num)/(:any)'] = 'blog/detail/index/$1/$2';


/********************************/
/* == Another Configuration == */
/* configuration are in array of string format */
/*  - as name value pair */
/*  - accessing value by $this->semevar->key in controller extended class */
/*  - accessing value by $this->semevar->key in model extended class */
/****************************/

//firebase messaging
$semevar['fcm'] = new stdClass();
$semevar['fcm']->version = '';
$semevar['fcm']->apiKey = '';
$semevar['fcm']->authDomain = '';
$semevar['fcm']->databaseURL = '';
$semevar['fcm']->projectId = '';
$semevar['fcm']->storageBucket = '';
$semevar['fcm']->messagingSenderId = '';
$semevar['fcm']->appId = '';

// example
$semevar['site_version'] = '1.0.0';
$semevar['site_name'] = 'Dapodik KW';
$semevar['site_title'] = 'Dapodik KW';
$semevar['site_title_suffix'] = ' - '.$semevar['site_title'];
$semevar['admin_site_name'] = 'Administrator';
$semevar['admin_site_title'] = 'Admin Dapodik KW';
$semevar['admin_site_title_suffix'] = ' - '.$semevar['admin_site_title'];
$semevar['site_description'] = 'Dapodik KW';
$semevar['site_author'] = 'cenah.co.id';
$semevar['site_logo'] = 'media/logo.png';
$semevar['site_logo_white'] = 'media/logo-white.png';
$semevar['site_keyword'] = 'cenah.co.id';
$semevar['email_from'] = 'noreply@thecloudalert.com';
$semevar['email_reply'] = 'hi@thecloudalert.com';
$semevar['app_name'] = $semevar['site_name'];
$semevar['app_logo'] = 'media/logo.png';
$semevar['company_name'] = 'PT Cipta Esensi Merenah';
$semevar['company_alias'] = 'Cenah';
$semevar['company_url'] = 'https://www.cenah.co.id';
$semevar['media_pengguna'] = 'media/pengguna';
//yayasan
$semevar['id_yayasan'] = 1;
