<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Buyer extends MY_Controller {
	function Buyer() {
		parent::__construct ();
		$this->load->helper ( 'url' );
		$this->load->library ( 'cart' );
		$this->load->helper ( 'form' );
		$this->load->model ( 'buyer_model' );
		$this->load->model ( 'user_model' );
		$this->load->model ( 'order_model' );
	}
	
	// 默认交易首页
	public function index() {
		
		// 查询花的类型
		$breed = $this->uri->segment ( 4 );
		$flower_list = $this->buyer_model->get_flower_list ();
		for($i = 0; $i < $flower_list ['count']; $i ++) {
			$data [$i] ['breed'] = $flower_list [$i]->breed;
			$data [$i] ['id'] = $flower_list [$i]->id;
		}
		
		// 数据库获取
		if ($breed == "") {
			$list_info = $this->buyer_model->ge_flower_list_info ( 0 );
		} else {
			$list_info = $this->buyer_model->ge_flower_list_info ( $breed );
		}
		// 数据库取出来数据 去 展示
		// var_dump($breed);
		// var_dump($flower_list);
		// var_dump($list_info);
		$show = null;
		for($all = 0; $all < $list_info ['count']; $all ++) {
			$show [$all] ['good_category'] = $list_info [$all]->good_category; // 品类
			$show [$all] ['good_brand'] = $list_info [$all]->good_brand; // 品牌
			$show [$all] ['good_variety'] = $list_info [$all]->good_variety; // 品种
			$show [$all] ['good_img_url'] = '/static/images/product/' . $list_info [$all]->good_img_url; // 图
			$show [$all] ['good_level'] = $list_info [$all]->good_level; // 等级
			$show [$all] ['good_price'] = $list_info [$all]->good_price; // 价格
			
			$good_now_info ['pid'] = $list_info [$all]->pid;
			$good_now_info ['total'] = $list_info [$all]->total;
			$good_now_info ['now_num'] = $list_info [$all]->now_total;
			
			$show [$all] ['good_amount'] = $good_now_info; // 数量
			                                               // $show[$all]['good_buy_amount'] =$show[$all]->good_buy_amount;//购买数量<
			$show [$all] ['good_desc'] = $list_info [$all]->good_desc; // 包装描述
			$show [$all] ['good_class'] = 'good_class';
		}
		$page ['current'] = "1";
		$page ['total'] = ( int ) ($list_info ['count'] / 10 + 1);
		$page ['all_page'] = $list_info ['count']; // 总共 111 个数据
		                                           
		// 查询用户的信息。
		$userInfo = null;
		if (! $this->j_session ())
			$userInfo = $this->user_model->get_user_info ( $this->session->userdata ( 'user_id' ) );
		
		$this->load->view ( 'buy/index.php', array (
				'data' => $data,
				'show' => $show,
				'page' => $page,
				'user_info' => $userInfo,
				'login_status' => $this->login_status 
		) );
	}
	
	// 购买界面 搜索 筛选功能
	public function search() {
		$search_variety = $_POST ['search_variety'];
		$search_level = $_POST ['search_level'];
		$search_brand = $_POST ['search_brand'];
	}
	
	// 点击直接购买
	public function addToCart() {
	}
	
	// 加入到购物车
	public function addToCartD() {
		$j_session = $this->j_session ();
		
		if ($j_session) {
			// 跳到登陆界面
			$result['stauts'] = 0;
			$result ['info'] = "请登录后再购买";
			echo json_encode ( $result );
			exit ();
			// return false;
		} 		// 登陆进去显示的状态
		else {
			$pid = $_POST ['fixBrdId']; // 加入的id
			$date = $_POST ['date']; // 加入购物车时间
			                         
			// 需要去数据库 查询 该pid 的信息 组织成数据 给购物车附加信息
			                         
			// 往里面 插入 数据
			$flower_only_info = $this->buyer_model->get_flower_only_info ( $pid );
			
			// 存储的时候 id 准备设置为用户id + 物品id 这样 确保唯一性
			$data = array (
					array (
							'id' => $pid,
							'qty' => 1,
							'price' => $flower_only_info [0]->good_price,
							'name' => $flower_only_info [0]->good_category, // 品类
							'options' => array (
									'good_brand' => $flower_only_info [0]->good_brand,
									'good_variety' => $flower_only_info [0]->good_variety,
									'good_level' => $flower_only_info [0]->good_level,
									'good_desc' => $flower_only_info [0]->good_desc,
									'good_img_url' => '/static/images/product/' . $flower_only_info [0]->good_img_url 
							) 
					) 
			);
			// 点击一下插入一下
			$this->cart->insert ( $data );
			
			$result['stauts'] = 1;
			$result ['info'] = "添加购物车成功！";
			echo json_encode ( $result );
			exit ();
		}
	}
	
	// 用户进入购物车
	public function cart() {
		
		// 这里是不是应该 把 购物车数据传送过去 。
		$data = $this->cart->contents ();
		
		// $this->load->view('buy/view.php');
		// var_dump($data);
		$this->load->view ( 'buy/cart.php', array (
				'data' => $data,
			     'login_status' => $this->login_status 
		) );
	}
	public function redirect_checkout() {
		$user_id = $this->session->userdata ( 'user_id' );
		$data = $this->cart->contents ();
		if ($data == null) {
			// 检测重复提交订单， 这个是不可能的。 我这里做的判断是 用户提交订单后移除 session 存储数据库
			exit ();
		}
		$charge_id = $this->produce_chargeId ();
		$this->buyer_model->set_charge ( $charge_id, $user_id, $data );
		$userInfo = $this->user_model->get_user_info ( $user_id );
		$this->cart->destroy ();
		
		$this->load->view ( 'buy/cart_checkout.php', array (
				'data' => $data,
				'user_info' => $userInfo,
				'charge_id' => $charge_id ,
				'login_status' => $this->login_status
		) );
	}
	
	// 检查用户购物车 属性 进行到下一步
	public function checkout() {
		
		// 这部分 应该很重要的。 但是应该做什么安全检测那？ 待定把。
		// $this->cart->total();
		//
		redirect ( 'buyer/redirect_checkout', 'refresh' );
		
		$user_id = $this->session->userdata ( 'user_id' );
		
		$data = $this->cart->contents ();
		if ($data == null) {
			// 检测重复提交订单， 这个是不可能的。 我这里做的判断是 用户提交订单后移除 session 存储数据库
			exit ();
		}
		// 我觉得这一步是进行 订单号 的生成
		// 存储 订单的 信息
		
		// 检测这个唯一的 物品是否提交过单子
		
		// $RowIdArray = $this -> session ->userdata('row_id_array');
		
		// if(null == $RowIdArray ){
		// $RowIdArray = array();
		// }
		
		// $biaoji1 = 0 ;
		// $biaoji2 = 0;
		// foreach($data as $key =>$value){
		// $biaoji2++;
		// if (! in_array ( $key, $RowIdArray )) {
		// array_push($RowIdArray,$key);
		// }
		// else{
		// $biaoji1 ++;
		// // exit();
		// //属于重复提交订单
		// }
		// }
		
		// //证明这个单子的数量全存在 证明是一个单子
		
		// if($biaoji1 == $biaoji2){
		// exit();
		// }
		// else{
		
		// }
		
		// $this -> session ->set_userdata('row_id_array',$RowIdArray);
		
		$charge_id = $this->produce_chargeId ();
		$this->buyer_model->set_charge ( $charge_id, $user_id, $data );
		
		// redirect ( 'buy/cart_checkout.php', 'refresh' );
		
		$userInfo = $this->user_model->get_user_info ( $user_id );
		
		// header('location:cart_checkout');
		
		// 销毁购物车session 缓存。 不保存session。
		
		// 存储到数据库
		
		$this->cart->destroy ();
		
		$this->load->view ( 'buy/cart_checkout.php', array (
				'data' => $data,
				'user_info' => $userInfo,
				'charge_id' => $charge_id ,
				'login_status' => $this->login_status
		) );
	}
	public function cart_checkout() {
		$user_id = $this->session->userdata ( 'user_id' );
		
		$data = $this->cart->contents ();
		if ($data == null) {
			
			exit ();
		}
		// 我觉得这一步是进行 订单号 的生成
		// 存储 订单的 信息
		$charge_id = $this->produce_chargeId ();
		$this->buyer_model->set_charge ( $charge_id, $user_id, $data );
		
		$userInfo = $this->user_model->get_user_info ( $user_id );
		$this->load->view ( 'buy/cart_checkout.php', array (
				'data' => $data,
				'user_info' => $userInfo,
				'charge_id' => $charge_id ,
				'login_status' => $this->login_status
				
		) );
	}
	
	// 用户 付款 操作。 保存购物车
	public function saveCart() {
		$charge_id = $this->uri->segment ( 4 );
		$user_id = $this->session->userdata ( 'user_id' );
		$charge_info = $this->buyer_model->find_charge_info_by_id ( $charge_id, $user_id );
		
		if ($charge_info ['status'] == 1) {
			
			$this->load->view ( 'buy/cart_check_result.php', array (
					'status' => 1,
					'info' => '购买成功,请入频繁刷新！',
					'data' => $charge_info ,
					'login_status' => $this->login_status
					
			) );
			return;
		}
		
		$cart_total = $charge_info ['subtotal'];
		
		// 如何确认付款是当前数据
		$userInfo = $this->user_model->get_user_info ( $user_id );
		
		// 付款成功操作
		// 需要 存在数据库中
		if ($userInfo ['money'] >= $cart_total) {
			$this->user_model->set_user_money ( $user_id, $cart_total );
			// 支付成功
			$status = 1; // 成功标志
			$info = "购买成功！";
		} else {
			$status = 0; // 失败标志
			
			$info = "余额不足，请充值！";
			// alert('余额不足，请充值');
		}
		
		$this->buyer_model->set_charge_status_by_id ( $charge_id, $status );
		
		// 存储到 订单数据库 。
		
		// 搞定 订单
		$cartInfo = $charge_info ['data'];
		
		$this->load->view ( 'buy/cart_check_result.php', array (
				'status' => $status,
				'info' => $info,
				'data' => $cartInfo ,
				'login_status' => $this->login_status
		) );
	}
	
	// 从购物车移除 数量设置为0 移除
	public function removeFromCart() {
		$rid = $_GET ['fixBrdId'];
		$data = array (
				'rowid' => $rid,
				'qty' => 0 
		);
		$this->cart->update ( $data );
	}
	public function test2() {
		$this->load->view ( 'buy/test.php' );
	}
	
	// 跳转到 我的花派
	public function myFlower() {
		$this->load->view ( 'buy/myFlower.php', array (
				'login_status' => $this->login_status 
		) );
	}
	
	// 用户信息修正
	public function ibuyer() {

		$this->load->view ( 'buy/ibuyer.php',array(
				'login_status' => $this->login_status
		));
	}
	
	// 网银充值
	public function netPay() {
		
		// 我要去查询单子， pay_detail 信息的展示
		$user_id = $this->session->userdata ( 'user_id' );
		
		$data = $this->order_model->get_pay_info_by_userId ( $user_id );
		
		$this->load->view ( 'buy/netPay.php', array (
				'data' => $data ,
				'login_status' => $this->login_status
		) );
	}
	
	// 修改密码
	public function changePassword() {
		$this->load->view ( 'buy/changePassword.php' ,array(
				'login_status' => $this->login_status
		));
	}
	public function changePsw() {
		$oldpswd = $_POST ['oldpswd'];
		$newpswd = $_POST ['newpswd'];
		$repeatpswd = $_POST ['repeatpswd'];
		
		// 这里需要校验 一下
		$user_id = $this->session->userdata ( 'user_id' );
		
		$result = $this->user_model->j_user_info ( $user_id, $oldpswd );
		
		// 成功
		if ($result ['status']) {
			if ($newpswd == $repeatpswd) {
				$setInfo = array (
						'password' => $newpswd 
				);
				$this->user_model->set_user_database_info ( $user_id, $setInfo );
			}
		} 		// 初始密码失败
		else {
		}
		
		$this->load->view ( 'buy/changePassword.php',array(
				'login_status' => $this->login_status
		) );
	}
	
	// 退款查询
	public function drawBack() {
		$this->load->view ( 'buy/drawBack.php',array(
				'login_status' => $this->login_status
		) );
	}
	// 限额查询
	public function buyerLimit() {
		$this->load->view ( 'buy/buyerLimit.php', array(
				'login_status' => $this->login_status
		) );
	}
	// 交易明细
	public function transaction() {
		$user_id = $this->session->userdata ( 'user_id' );
		// 提供买家的交易明细
		$data = $this->buyer_model->get_charge_info_by_userId ( $user_id );
		
		$this->load->view ( 'buy/transation.php', array (
				'data' => $data ,
				'login_status' => $this->login_status
		) );
	}
	
	// 交易汇总
	public function rptBuyBuyTransactionT() {
		$this->load->view ( 'buy/rptBuyBuyTransactionT.php', array(
				'login_status' => $this->login_status
		) );
	}
	
	// 结算查询
	public function totalBalance() {
		$this->load->view ( 'buy/totalBalance.php' , array(
				'login_status' => $this->login_status
		));
	}
	// 交易明细
	public function rptBuyHisBuyTransactionD() {
		$this->load->view ( 'buy/rptBuyHisBuyTransactionD.php' , array(
				'login_status' => $this->login_status
		));
	}
	// 交易汇总
	public function rptBuyHisBuyTransactionT() {
		$this->load->view ( 'buy/rptBuyHisBuyTransactionT.php', array(
				'login_status' => $this->login_status
		) );
	}
	// 投诉明细
	public function rptBuyHisLogdeListD() {
		$this->load->view ( 'buy/rptBuyHisLogdeListD.php', array(
				'login_status' => $this->login_status
		) );
	}
	// 充值明细
	public function rptBuyHisBuyPreBankFundD() {
		$this->load->view ( 'buy/rptBuyHisBuyPreBankFundD.php' , array(
				'login_status' => $this->login_status
		));
	}
	// 结算明细
	public function rptBuyHisBalanceList() {
		$this->load->view ( 'buy/rptBuyHisBalanceList.php' , array(
				'login_status' => $this->login_status
		));
	}
	// 我的订单
	public function myorder() {
		$user_id = $this->session->userdata ( 'user_id' );
		$charge_info = $this->buyer_model->find_self_charge_info_by_id ( $user_id );
		
		$this->load->view ( 'buy/myorder', array (
				'info' => $charge_info ,
				'login_status' => $this->login_status 
		) );
	}
	
	// 用户更新购物车
	// 初步这么判断的是 根据用户选择 数量 来 异步提交表单 来 更新 购物车内容。
	// 这个参考view 试图 来去获取信息就行了，。 这个应该不难， 接下来 就是 点击进入下一步 交易部分。 这个 到时候再作。 现在 还差哪里？
	public function update_cart() {
	}
	
	// 重要！！！ 充值问题
	public function savePay() {
		$userId = $this->session->userdata ( 'user_id' );
		if ($userId != null) {
			
			// 充值金额
			$amount = $_GET ['amount'];
			// 单号
			$payId = $this->produce_payId ();
			
			$result ['status'] = 1;
			$result ['pay_id'] = $payId;
			$result ['amount'] = $amount;
			
			// 封装 充值信息
			$result_database ['id'] = $payId;
			$result_database ['value'] = $amount;
			$result_database ['user_id'] = $userId;
			$result_database ['status'] = 0;
			$this->buyer_model->set_pay_info ( $result_database );
		} else {
			$result ['status'] = 0;
		}
		$result ['info'] = "充值金钱";
		echo json_encode ( $result );
		exit ();
	}
	
	// 生成 充值 卡号
	public function produce_payId() {
		$c1 = rand ( 10, 99 );
		$c2 = rand ( 10, 99 );
		return $c1 . time () . $c2;
	}
	
	// 生成订单号
	public function produce_chargeId() {
		$c1 = rand ( 10, 99 );
		$c2 = rand ( 10, 99 );
		return $c1 . $c2 . time ();
	}
}