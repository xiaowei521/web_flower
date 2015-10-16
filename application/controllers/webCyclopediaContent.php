<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class WebCyclopediaContent extends MY_Controller {
	function WebCyclopediaContent() {
		parent::__construct ();
		
		$this->config->load ( 'view.config', TRUE );
	}
	
	// 真的很多， 醉了
	public function index() {
		$data = $this->config->item ( 'webCyclopediaContent', 'view.config' );
		
		$this->load->view ( 'webCyclopediaContent/index', array (
				'data' => $data ,
				'login_status'=>$this->login_status,
		) );
	}
	public function show() {
		$this->load->view ( 'webCyclopediaContent/show' ,array(
				'login_status'=>$this->login_status,
		));
	}
}