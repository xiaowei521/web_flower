<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class webNoticeContent extends MY_Controller {
	
	function webNoticeContent(){
		parent::__construct();
		$this->is_logged_in();

		
	}
	
	// 真的很多， 醉了
	public function index(){
		$this->load->view('webNoticeContent/index');
		
	}
	
	public function show(){
		//id
		
		$this->load->view('webNoticeContent/show.php');
		
	}

}