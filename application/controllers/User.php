<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function User(){
		parent::__construct();
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
	public function index()
	{
		$this->load->view('login.php');
	}
	public function login()
	{
		$this->load->view('login.php');
	}
	public function register()
	{
		$this->load->view('register.php');
	}
	public function register_select()
	{
		
		// 如果是购买商
		$value = $this->input->post ( 'bsselect', TRUE );
		
		if($value =='supplier'){
			
			$this->load->view('register_supplier');
		}
		else if($value =='buyer'){
			
			$this->load->view('register_buyer');
		}
		else{
			$this->load->view('error');
		}
	}
	// 存储 购买商  信息
	public function set_register_buyer(){
		
	}
	
	// 存储 卖家 信息
	public function set_register_supplier(){
		
	}
	
	
	//判断用户id 唯一性
	public function isUnique(){
		
		$db = $this->load->model('UserModel');
		
		$user_id = $_GET['id'];
		//
		//
		if( $this->UserModel->judge_user_aleardy($user_id)){
			echo 'true';
		}
		else{
			echo 'false';
		}
		exit();
		
	}
}
