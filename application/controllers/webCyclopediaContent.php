<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class webCyclopediaContent extends MY_Controller {
	
	function webCyclopediaContent(){
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