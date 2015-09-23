<?php
// 订单控制器类

class Order extends CI_Controller{
	// ...
	
	function Order(){
		parent::__construct();

		
	}
	
	public function index(){
		$this->load->view('alipay/index');
	}
	public function j_alipayapi(){
		$this->load->view('alipay/alipayapi');
	}
	
	public function j_notify_url(){
		$this->load->view('alipay/notify_url');
	}
	

	public function j_return_url(){
		$this->load->view('alipay/return_url');
	}

}