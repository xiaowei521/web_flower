<?php
abstract class MY_Controller extends CI_Controller {
	var $login_status = false;
	public function __construct() {
		parent::__construct ();
		
		$this->load->library ( 'session' );
		$this->load->helper ( "url" );
		$this->config->load ( 'myconfig', TRUE );
		
		$uri = strtolower ( uri_string ( current_url () ) );
		if ($this->j_session () && $this->check_url ( $uri )) {
			if('' == $uri ){
				redirect ( 'welcome', 'refresh' );
			}
			redirect ( $this->config->item ( 'sw_login_url', 'myconfig' ), 'refresh' );
		}
	}
	private function check_url($url) {
		$config = $this->config->item ( 'sw_pass_url', 'myconfig' );
		
		foreach ( $config as $key => $value ) {
			// 证明config 包含 该url
			if (strstr ( $url, $value )) {
				return false;
			}
		}
		return true;
	}
	// judge session 数据
	public function j_session() {
		
		// 没登陆
		if (null == $this->session->userdata ( 'user_id' )) {
			// 注意 熟悉isset 的判定机制
			$this->login_status = true;
			return true;
		} 		// 登陆，显示的头是不一样的。
		else {
			// $session_user ['user_name'] = $this->session->userdata ( 'name' );
			// $session_user ['user_id'] = $session_user_id;
			$this->login_status = false;
			return false;
		}
	}
	
	public function j_logout(){
	//	 $this->session->setuserdata ( 'user_id' ) = null;
		 
	}
}

?>