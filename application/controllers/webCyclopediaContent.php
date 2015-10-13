<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebCyclopediaContent extends MY_Controller {
	
	function WebCyclopediaContent(){
		parent::__construct();


		
		$this->is_logged_in();
		
		$this->config->load('view.config', TRUE);
		
		
	 

	}
	
	// 真的很多， 醉了
	public function index(){
		
		
	//	$this->is_logged_in();
		
		
	     $data = $this->config->item ( 'webCyclopediaContent','view.config' );
		
		
		
		$this->load->view('webCyclopediaContent/index',array(
				'data' => $data,
		));
		
	}
	public function show(){
		//$this->is_logged_in();
		$this->load->view('webCyclopediaContent/show');
	}

}