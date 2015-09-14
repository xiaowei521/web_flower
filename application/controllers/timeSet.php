<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class timeSet extends CI_Controller {
	
	function timeSet(){
		parent::__construct();
// 		$this->load->library('captcha');
// 		$this->load->helper('url');
// 		$this->load->driver('cache');
// 		$this->load->library('session');
		
	}
	
	public function getStatus(){
		
		$_POST['date'];
		
		
		$result['status'] ="N";
		$result['second'] ="1000";
		echo json_encode($result);
		
	}
	
}