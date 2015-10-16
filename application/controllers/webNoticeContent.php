<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class WebNoticeContent extends MY_Controller {
	function WebNoticeContent() {
		parent::__construct ();
	}
	
	// 真的很多， 醉了
	public function index() {
		$this->load->view ( 'webNoticeContent/index',array(
				'login_status'=>$this->login_status,
		) );
	}
	public function show() {
		// id
		$this->load->view ( 'webNoticeContent/show.php',array(
				'login_status'=>$this->login_status,
		) );
	}
}