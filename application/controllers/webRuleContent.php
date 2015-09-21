
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class webRuleContent extends MY_Controller {

	function __construct(){
		parent::__construct();

		$this->is_logged_in();

	}

	// 真的很多， 醉了
	public function index(){
		$this->load->view('webRuleContent/index');

	}
	public function show(){
		$this->load->view('webRuleContent/show');
	}

}