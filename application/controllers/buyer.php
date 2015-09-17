<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buyer extends CI_Controller {
	
	function __construct(){
		parent::__construct();

		$this->load->library('cart');
		$this->load->helper('form');
		$this->load->model('buyerModel');
		$this->load->library('session');

		
	}

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
	
	//默认交易首页
	public function index(){

		$this->load->view('public/header.php');
// 		//$this
// 		$session_user_id = $this->session->userdata('user_id');
		
// 		//没登陆
// 		if(null == $session_user_id  ){
			
// 		}
// 		// 登陆，显示的头是不一样的。
// 		else{
			
// 		}

		// 没登陆
		$j_session = $this->j_session();
		
		if(!$j_session){
			 $this->load->view('public/login_in.php');;
		}
		//登陆进去显示的状态
		else{
			
		     $this->load->view('public/login_out.php',$j_session);
			
		}
		
		
		// 查询花的类型
		$breed = $this->uri->segment(4);
		$flower_list = $this->buyerModel->get_flower_list();
		for($i=0;$i<$flower_list['count'];$i++){
			$data[$i]['breed'] = $flower_list[$i]->breed;
			$data[$i]['id'] =$flower_list[$i]->id;
		}
	
		// 数据库获取
		if($breed == ""){
			$list_info = $this->buyerModel->ge_flower_list_info(0);
		}
		else{
			$list_info = $this->buyerModel->ge_flower_list_info($breed);
		}
		// 数据库取出来数据 去 展示
		//		var_dump($breed);
		// 		var_dump($flower_list);
		// 		var_dump($list_info);
		$show = null;
		for($all = 0; $all < $list_info['count'];$all++){
			$show[$all]['good_category'] = $list_info[$all]->good_category; //品类
			$show[$all]['good_brand'] = $list_info[$all]->good_brand;  //品牌
			$show[$all]['good_variety'] = $list_info[$all]->good_variety; //品种
			$show[$all]['good_img_url'] = '/static/images/product/'.$list_info[$all]->good_img_url;//图
			$show[$all]['good_level'] = $list_info[$all]->good_level;//等级
			$show[$all]['good_price'] = $list_info[$all]->good_price;//价格
	
			$good_now_info ['pid'] = $list_info[$all]->pid;
			$good_now_info ['total'] = $list_info[$all]->total;
			$good_now_info ['now_num'] =$list_info[$all]->now_total;
	
			$show[$all]['good_amount'] = $good_now_info;//数量
			//	$show[$all]['good_buy_amount'] =$show[$all]->good_buy_amount;//购买数量<
			$show[$all]['good_desc'] = $list_info[$all]->good_desc;//包装描述
			$show[$all]['good_class'] = 'good_class';
	
		}
		$page['current'] = "1";
		$page['total'] =  (int)($list_info['count'] / 10 + 1);
		$page['all_page'] = $list_info['count'];// 总共 111 个数据
	
		$this->load->view('buy/index.php',array(
				'data' => $data,
				'show' => $show,
				'page' => $page,
		));
		$this->load->view('public/footer.php');
	
	}
	
	
	// 购买界面 搜索 筛选功能
	public function search(){
		
		
		$search_variety =  $_POST['search_variety'];
		$search_level = $_POST['search_level'];
		$search_brand = $_POST['search_brand'];
		
	
		
		
	}
	
	
	
	// 点击直接购买
	public function addToCart(){

	}
	
	// 加入到购物车
	public function addToCartD(){
		
		
		$j_session = $this->j_session();
		
		
		if(!$j_session){
			//跳到登陆界面
			//$this->load->view('public/login_in.php');;
			
			return false;
		}
		//登陆进去显示的状态
		else{
				
			//$this->load->view('public/login_out.php',$j_session);
				
		}
		
	
		$pid = $_POST['fixBrdId'];//加入的id
		$date = $_POST['date'];//加入购物车时间
		
		// 需要去数据库 查询 该pid 的信息 组织成数据 给购物车附加信息
		
		// 往里面 插入 数据
		$flower_only_info = $this->buyerModel->get_flower_only_info($pid);
		
		
		// 存储的时候 id 准备设置为用户id + 物品id  这样 确保唯一性
		$data = array(
				array(
						'id'      => "uid".$pid,
						'qty'     => 1,
						'price'   => $flower_only_info[0]->good_price,
						'name'    => $flower_only_info[0]->good_category, // 品类
						'options' => array('good_brand' => $flower_only_info[0]->good_brand , 'good_variety' => $flower_only_info[0]->good_variety ,'good_level'=>$flower_only_info[0]->good_level,'good_desc'=>$flower_only_info[0]->good_desc,'good_img_url'=>'/static/images/product/'.$flower_only_info[0]->good_img_url,),
				),
		);
		// 点击一下插入一下 
		
		
		
		
		$this->cart->insert($data);
		
		//$this->cart->destroy();
		
		
		$result['info'] = "添加购物车成功！";
		echo json_encode($result);
		exit();
	}
	
	// 用户进入购物车
	public function cart(){
		
		// 这里是不是应该 把 购物车数据传送过去 。
		
		
		
		
		$data = $this->cart->contents();
		
		
		//$this->load->view('buy/view.php');
		var_dump($data);
		$this->load->view('buy/cart.php',array('data' =>$data));
	}
	
	
	//用户更新购物车
	// 初步这么判断的是  根据用户选择 数量 来 异步提交表单 来 更新 购物车内容。
	// 这个参考view 试图 来去获取信息就行了，。    这个应该不难， 接下来 就是 点击进入下一步  交易部分。  这个 到时候再作。 现在  还差哪里？
	public function update_cart(){
		
		
		
	}
	
	
	

	
}