<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class webNewProductContent extends MY_Controller {
	
	function webNewProductContent(){
		parent::__construct();

		$this->is_logged_in();

		
	}
	
	// 真的很多， 醉了
	public function index(){
		$this->load->view('webNewProductContent/index');
		
	}
	public function show(){
		
		$this->load->view('webNewProductContent/show');
	
	}

}