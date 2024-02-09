<?php
class Notfound extends \JI_Controller{
	public function __construct(){
    parent::__construct();
	}
	public function index(){
		$data = $this->__init(); //method from app/core/ji_controller
		//set header
		header("HTTP/1.0 404 Not Found");
		$this->setTitle('Not Found '.$this->config->semevar->site_title_suffix);
		$this->setDescription($this->config->semevar->site_description);
		$this->loadLayout('notfound',$data);
		$this->render();
	}
}
