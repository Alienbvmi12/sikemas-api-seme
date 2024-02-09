<?php

/**
* Main Controller Class 
* Mostly for this controller will resulting HTTP Body Content in HTML format
*
* @version 1.0.0
*
* @package Controller
* @since 1.0.0
*/
class Home extends \JI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = $this->__init();
        // if(!$this->user_login){
        //     redir(base_url('login'));
        //     die();
        //   }
          $this->setTitle($this->config->semevar->site_title);
          $this->setDescription($this->config->semevar->site_description);
          $this->setKeyword($this->config->semevar->site_name);
          $this->setAuthor($this->config->semevar->site_name);

          $this->putJSReady('home/home_bottom',$data);
          $this->putThemeContent('home/home',$data);
          $this->loadLayout('col-1-landing-page',$data);
          $this->render();
    }
}
