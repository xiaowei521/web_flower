<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class webCyclopediaContent extends MY_Controller {
	
	function webCyclopediaContent(){
		parent::__construct();


		
		$this->is_logged_in();
		
	}
	
	// 真的很多， 醉了
	public function index(){
		
		
	//	$this->is_logged_in();
		
		$this->load->view('webCyclopediaContent/index');
		
	}
	public function show(){
		//$this->is_logged_in();
		$this->load->view('webCyclopediaContent/show');
	}

}