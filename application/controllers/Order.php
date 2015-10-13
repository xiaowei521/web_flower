<?php
// 订单控制器类

class Order extends CI_Controller{
	// ...
	
	function Order(){
		parent::__construct();

		$this->load->model('buyer_model');
		$this->load->model('user_model');
	}
	
	public function index(){
		$this->load->view('alipay/index');
	}
	public function j_alipayapi(){
		$this->load->view('alipay/alipayapi');
	}
	
	public function j_notify_url(){
		$this->load->view('alipay/notify_url');
	}
	public function j_return_url(){
		$this->load->view('alipay/return_url');
	}
	
	
	
	//充值信息 充值金钱
	public function jump_old_index(){
		
		$pay_id = $this->uri->segment(4);
		//$pay_id = $_GET['pay_id'];
		$pay_data = $this->buyer_model->get_pay_info($pay_id);
		
		var_dump($pay_data) ;
		
		$this->load->view('oldalipay/index',array(
				'payId' =>$pay_id,
				'data' =>$pay_data,
		));
	}
	public function jump_old_alipayapi(){
		$this->load->view('oldalipay/alipayapi');
	}
	public function jump_old_notify_url(){
		$this->load->view('oldalipay/notify_url');
	}
	public function jump_old_return_url(){
		
		//这里获取参数试试吧
		require_once("application/config/alipay.config.php");
		require_once("application/libraries/oldalipay/alipay_notify.class.php");
		$alipayNotify = new AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyReturn();
		
		if($verify_result) {//验证成功
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//请在这里加上商户的业务逻辑程序代码
			//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
			//获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表
			//商户订单号
			$out_trade_no = $_GET['out_trade_no'];
			//支付宝交易号
			$trade_no = $_GET['trade_no'];
			//交易状态
			$trade_status = $_GET['trade_status'];
		
			if($_GET['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
				//判断该笔订单是否在商户网站中已经做过处理
				//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
				//如果有做过处理，不执行商户的业务程序
			}
			else {
				echo "trade_status=".$_GET['trade_status'];
			}
			echo "验证成功<br />";
			echo "trade_no=".$trade_no;
			$this->charge_success($out_trade_no,true);

		}
		else {
			//验证失败
			//如要调试，请看alipay_notify.php页面的verifyReturn函数
			echo "验证失败";
		   // $this->charge_success('1111111',false);
		
		}
		//$this->load->view('oldalipay/return_url');
	}
	
	/**
	 *   孙伟warning : 无论是用户充值下的单子 还是 购物下的单子 都会生成 记录在charge 中，
	 */
	
	// 对用户充值成功 后 进行 金额的增加
	// $order_id 是订单号， $status 是状态
	public function charge_success($order_id,$status){
		
		// 先去判断这个订单的状态
		// 判断 charge 的单子状态
		$charge_info = $this->buyer_model-> j_charge_status ();
		
		// 成功+100
		if($status && !$charge_info['status']){
			//为用户增加钱， 并且重置 订单状态
			
			//根据订单 来去查询用户的 信息
			
			$this->user_model->charge_success($order_id,$charge_info['user_id'],$charge_info['subtotal']);
			
			$result_status  = 1;
		}
		
		//失败  +1  // 理论上来说 他是不可能进入到失败操作的。 因为失败的话  屏蔽掉
		else{
		//	$this->user_model->charge_success('sunwei',0);
			$result_status  = 0;
		}
		// 记录 流水号，充值记录;
		$this->user_model->write_order_info($order_id,$result_status);
	}
	
	

	
	
}