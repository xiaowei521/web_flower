<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class check extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * http://example.com/index.php/welcome
	 * - or -
	 * http://example.com/index.php/welcome/index
	 * - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * 
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->load->view ( 'index.php' );
	}
	public function test1() {
		$y = 100;
		$z = 1012;
		$c = $y . $y;
		var_dump ( $c );
		var_dump ( $c + $z );
		
		var_dump ( $y . $y + $z );
		exit ();
	}
	
	// 发送html邮件模板处理函数
	function emailmoban($body) {
		if (is_array ( $body )) {
			$file = array_keys ( $body );
			$file = $file [0];
			$data = array_values ( $body );
			$data = $data [0];
			/* 检查邮件模板文件是否存在 */
			if (! file_exists ( $file )) {
				echo '模板不存在!';
			}
			$body = file_get_contents ( $file );
			if (is_array ( $data )) {
				foreach ( $data as $key => $val ) {
					$body = str_replace ( '{' . $key . '}', $val, $body );
				}
				return $body;
			}
		}
	}
	
	/**
	 * 生成一个随机码
	 * $length 随机码的长度
	 */
	function random($length) {
		$strStartName = "";
		$strChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$max = strlen ( $strChars ) - 1;
		mt_srand ( ( double ) microtime () * 1000000 );
		for($i = 0; $i < $length; $i ++) {
			$strStartName .= $strChars [mt_rand ( 0, $max )];
		}
		return $strStartName;
	}
	public function test() {
		
		// 发送邮件
		$config = @include (APPPATH . 'config/email.php' . EXT);
		
		$this->load->library ( 'email' ); // 加载邮件类
		$this->email->initialize ( $config );
		$this->email->from ( 'service@gamehetu.com', '世纪鹤图' ); // 邮件发送邮箱和邮件主题
		                                                     // $this->email->to($toemail);
		$this->email->to ( '15947617098@163.com' );
		// $this->email->cc('another@another-example.com' ); //抄送
		// $this->email->bcc('them@their-example.com' ); //暗送
		$this->email->subject ( '世纪鹤图会员中心-邮箱认证' ); // 邮件主题
		                                        // $this->email->message(stripcslashes($emailbody)); //邮件内容
		$this->email->message ( stripcslashes ( "111" ) ); // 邮件内容
		if ($this->email->send () == 1) {
			$this->Model_showmsg->success ( "邮件发送成功,请到邮箱验证", 3, "?c=userzx" );
		} else {
			$this->Model_showmsg->error ( "邮件发送失败,请重新发送", 3, "" );
		}
		// debug($this->email->print_debugger()); //邮件内容编码
	}
}
