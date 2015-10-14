<?php 

abstract class MY_Controller extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->library('session');
		$this->load->helper("url");
		$this->config->load('myconfig', TRUE);
	
	}
	
	private function check_url($url){
		
		$config = array(
			'webCyclopediaContent',
			'webNewProductContent',
			'webNoticeContent',
			'webProductContent',
			'webRuleContent',
		);
		foreach($config as $key => $value){
			if(strpos($url,$value) !==false){
					return true;
			}
		}
		return false;

	}
	
	public function is_logged_in()
	{
		//$user = $this->session->userdata('user_id');
		$this->load->view('public/header.php');
		$this->load->view('public/footer.php');
		//如果存在且非空
		$data = $this->j_session();
		if(isset($data)){
			$this->load->view('public/login_out',$data);
			//登陆
		}
		else{
			
			
			$this->load->view('public/login_in');
			
			$uri = uri_string ( current_url () );
			
			if(!$this->check_url($uri)){
				if (! in_array ( $uri, $this->config->item ( 'sw_pass_url' ,'myconfig') )) {
						redirect ( $this->config->item ( 'sw_login_url','myconfig' ), 'refresh' );
				}
			}
			
			
		//var_dump($uri);
			//var_dump($this->config->item ( 'sw_pass_url' ,'myconfig'));
			

			//return;
			//header("location:".site_url("user/login"));
			// 跳到登陆界面
		//	redirect('/user/login');
			//redirect('user/login/', 'refresh');

		//	exit();
		}

// 		$this->cur_user=$this->user_model->is_login();//检测是否登陆，如果登陆，返回登陆用户信息，否则返回false
// 		if($this->cur_user === false){
// 			header("location:".site_url("common/login"));
// 		}else{
// 			//如果已经登陆，则重新设置cookie的有效期
// 			$this->input->set_cookie("username",$this->cur_user['username'],60);
// 			$this->input->set_cookie("password",$this->cur_user['password'],00);
// 			$this->input->set_cookie("user_id",$this->cur_user['user_id'],60);
// 		}
	}
	// judge session 数据
	public function j_session(){

		$session_user_id = $this->session->userdata('user_id');
		//没登陆
		if(null == $session_user_id  ){
			// 注意  熟悉isset 的判定机制 
			return  null;
		}
		// 登陆，显示的头是不一样的。
		else{
			$session_user['user_name'] = $this->session->userdata('name');
			$session_user['user_id'] = $session_user_id;
			return $session_user;
		}
	}

}

?>