<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flower_Controller extends CI_Controller {
	
	function Flower_Controller(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->driver('cache');
		$this->load->library('session');
		
	}

	public function index()
	{
		//$this
		$session_user_id = $this->session->userdata('user_id');
		
		//没登陆
		if(null == $session_user_id  ){
				
			return false;
		}
		// 登陆，显示的头是不一样的。
		else{
			return $session_user_id;
		}
	}

}
