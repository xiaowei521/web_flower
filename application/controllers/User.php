<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function User(){
		parent::__construct();
		$this->load->library('captcha');
		$this->load->helper('url');
		$this->load->driver('cache');
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
	public function index()
	{
		$login_in =  $this->load->view('public/login_in.php','',true);
		$footer = $this->load->view('public/footer.php','',true);
		$header = $this->load->view('public/header.php','',true);
		$this->load->view('login.php',array(
				'footer' =>$footer,
				'login_in' =>$login_in,
				'header' =>$header,
			));
	}
	// 用户登陆界面
	public function login()
	{
		$login_in =  $this->load->view('public/login_in.php','',true);
		$footer = $this->load->view('public/footer.php','',true);
		$header = $this->load->view('public/header.php','',true);
		$this->load->view('login.php',array(
				'footer' =>$footer,
				'login_in' =>$login_in,
				'header' =>$header,
			)
		);
	}
	
	
	
	
	// 用户 登陆校验
	public function login_check(){
		$userId = $_POST['j_username'];
		$passwd = $_POST['j_password'];
		$captcha = $_POST['captcha']; //验证码 稍等再弄
		
		if($captcha !=$this->session->userdata('checkcode')){
			$result['status'] = 0;
			$result['info'] ="验证码错误";
			
		}
		else{

			$this->load->model('UserModel');
			
			$result = $this->UserModel->j_user_info($userId,$passwd);
			// 如果登陆成功保存session
			if($result['status'] == 1){
				$this->session->set_userdata('user_id'  ,$result['user_id']);
				$this->session->set_userdata('user_type',$result['user_type']);
				$this->session->set_userdata('name',$result['name']);
			}
			
		}
		echo json_encode($result);
		exit();
		
	}
	
	//用户登陆成功后
	public function buy_login_success(){
		$login_in =  $this->load->view('public/login_out.php','',true);
		$footer = $this->load->view('public/footer.php','',true);
		$header = $this->load->view('public/header.php','',true);
		
		
		if($this->session->userdata('user_id') == NULL){
			$this->login();
			
		}
		$data['user_id'] = $this->session->userdata('user_id');
		$data['user_type'] = $this->session->userdata('user_type');
		$data['user_name'] = $this->session->userdata('name');
		
		$this->load->view('public/login_out.php',$data);
		
		$this->load->view('buy_login_success.php',array(
				'footer' =>$footer,
				'header' =>$header,
		));
	}
	 
	//用户   交易时间到   购买记录显示
	public function buy_data_show(){
		$this->load->view('buy/index.php');
		
	}
	
	// 用户退出
	public function j_logout(){
// 		if($this->session->userdata('user_id') == NULL){
// 			//
// 		}
// 		else{
			
// 		}
        //清空user_id
		$this->session->unset_userdata('user_id');
		
		$this->index();
		
	}
	
	
	// 用户刷新 获取验证码
	public function getRefreshImg()
	{
		echo $this->captcha->doimg();
		$this->session->set_userdata('checkcode', $this->captcha->getCode());
	}
	
	public function register()
	{
		$login_in =  $this->load->view('public/login_in.php','',true);
		$footer = $this->load->view('public/footer.php','',true);
		$header = $this->load->view('public/header.php','',true);
		$this->load->view('register.php',array(
				'footer' =>$footer,
				'login_in' =>$login_in,
				'header' =>$header,
			));
	}
	public function register_select()
	{
		$login_in =  $this->load->view('public/login_in.php','',true);
		$footer = $this->load->view('public/footer.php','',true);
		$header = $this->load->view('public/header.php','',true);
		
		// 如果是购买商
		$value = $this->input->post ( 'bsselect', TRUE );
		
		if($value =='supplier'){
			
			$this->load->view('register_supplier',array(
				'footer' =>$footer,
				'login_in' =>$login_in,
				'header' =>$header,
			));
		}
		else if($value =='buyer'){
			
			
			$this->load->view('register_buyer',array(
				'footer' =>$footer,
				'login_in' =>$login_in,
				'header' =>$header,
			));
		}
		else{
			$this->load->view('error');
		}
	}
	// 注册信息填充 --  发送邮箱存储 购买商  信息 --去验证用户
	public function set_register_buyer(){

		$returnData['user_id'] = $_POST['id'];;
		$returnData['buyConEmail'] = $_POST['buyConEmail'];
		$returnData['buyName'] = $_POST['buyName'];
		$returnData['user_type'] = '1'; // 用户类型 1： 购买商
		$returnData['password'] = $_POST['passWD'];
		
		// 去model 里面处理 先生成 用户 基础数据
		$this->load->model('UserModel');
		$sendEmailInfo = $this->UserModel->set_user_info($returnData);
		
		$this->sendMail($sendEmailInfo);
		
		
		$login_in =  $this->load->view('public/login_in.php','',true);
		$footer = $this->load->view('public/footer.php','',true);
		$header = $this->load->view('public/header.php','',true);
		
		
		$this->load->view('set_register_buyer.php',array(
				'footer' =>$footer,
				'login_in' =>$login_in,
				'header' =>$header,
				'returnData' =>$returnData,
			));
	}
	// 发送邮箱
	public function sendMail($data) {
		
		$config['protocol'] = 'smtp'; //采用smtp方式
		$config['smtp_host'] = 'smtp.163.com'; //简便起见，只支持163邮箱
		$config['smtp_user'] = '15947617098@163.com'; //你的邮箱帐号
		$config['smtp_pass'] = '547966965'; //你的邮箱密码
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = "html";
		$this->load->library('email'); //加载email类
		$this->email->initialize($config);//参数配置
		$this->email->from('15947617098@163.com', '孙伟测试');
		$this->email->to($data['buyConEmail']);
		$this->email->subject('注册用户激活');
		
		$returnUrl = "亲爱的".$data['buyName']."：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/> 
    <a href='localhost:10000/User/active/verify/".$data['token']."/user_id/".$data['user_id']."' target= 
'_blank'>localhost:10000/User/active/verify=".$data['token']."</a><br/> 
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。";
		
		$this->email->message($returnUrl);
		
		//显示发送邮件的结果，加载到res_view.php视图文件中
		if (!$this->email->send()) {
			//$data['result'] = "<font color='red' size='10px'>邮件发送失败，可能是由您的发件人或者密码填写不匹配造成</font>";
			//$this->load->view('set_register_buyer.php', $data);
		} else {
			//$data['result'] = "<font color='red' size='10px'>邮件发送成功</font>";
			//$this->load->view('set_register_buyer.php', $data);
		}
	}
	
	//检验 用户 通过邮箱激活账号
	public function active(){
		
		//$token = $_REQUEST["verify"];
		//$userId = $_GET["user_id"];
		$token = $this->uri->segment(4);
		$userId = $this->uri->segment(6);
		
		$this->load->model('UserModel');
		
		 // 如果激活成功，成功界面。
		$result = $this->UserModel->get_email_token($token,$userId);
		
		$this->load->view('active.php',$result);

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
	
	
	// 用户城市
	public function getCity(){
		
		//echo $_GET['p']

		if(isset($_GET['province'])){
			
			
			// 查询数据库返回的数据
			$returnArray = $this->UserModel->get_provice_city($_GET['province']);
			if(count($returnArray) ==0){
				$data['success'] = 'N';
			}
			else{
				$data['success'] = 'Y';
			}
			
			foreach($returnArray as $key =>$value){
				$data['cityAreas'][$key] = array('asName'=>$value['name'],'asCode'=>$value['id']);
			}
			//$data['cityAreas'][0] = array('asName'=>'河南','asCode'=>'1');
			echo json_encode($data);
			
		}
		
	}
	// 用户选择城市
	public function getConCity(){
		
	}
}
