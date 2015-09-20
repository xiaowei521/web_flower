<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->library('session');
	
	
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	//判断用户session
	public function j_session(){
	
		//$this
		$session_user_id = $this->session->userdata('user_id');
	
		//没登陆
		if(null == $session_user_id  ){
			return  false;
		}
		// 登陆，显示的头是不一样的。
		else{
				
			$session_user['user_name'] = $this->session->userdata('name');
			$session_user['user_id'] = $session_user_id;
			return $session_user;
		}
	}
	
	public function index()
	{
		$this->load->view('public/header.php');
		$j_session = $this->j_session();
		
		if(!$j_session){
			$this->load->view('public/login_in.php');;
		}
		//登陆进去显示的状态
		else{	
			$this->load->view('public/login_out.php',$j_session);
		}
		$this->load->view('index.php');
		$this->load->view('public/footer.php');
	}
}
