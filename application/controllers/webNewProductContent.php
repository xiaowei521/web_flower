<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class WebNewProductContent extends MY_Controller {
	function WebNewProductContent() {
		parent::__construct ();
	}
	
	// 真的很多， 醉了
	public function index() {
		$this->load->view ( 'webNewProductContent/index',array(
				'login_status'=>$this->login_status,
		));
	}
	public function show() {
		$this->load->view ( 'webNewProductContent/show',array(
				'login_status'=>$this->login_status,
		));
	}
}