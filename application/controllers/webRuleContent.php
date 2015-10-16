
<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class WebRuleContent extends MY_Controller {
	function WebRuleContent() {
		parent::__construct ();
	}
	
	// 真的很多， 醉了
	public function index() {
		$this->load->view ( 'webRuleContent/index' ,array(
				'login_status'=>$this->login_status,
		));
	}
	public function show() {
		$this->load->view ( 'webRuleContent/show' ,array(
				'login_status'=>$this->login_status,
		));
	}
}