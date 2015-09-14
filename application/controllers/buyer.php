<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buyer extends CI_Controller {
	
	function buyer(){
		parent::__construct();
// 		$this->load->library('captcha');
// 		$this->load->helper('url');
// 		$this->load->driver('cache');
// 		$this->load->library('session');
		$this->load->library('cart');
	}
	
	// 购买
	public function addToCart(){
		$data = array(
				array(
						'id'      => 'sku_123ABC',
						'qty'     => 1,
						'price'   => 10,
						'name'    => 'T-Shirt',
						'options' => array('Size' => 'L', 'Color' => 'Red')
				),
				array(
						'id'      => 'sku_567ZYX',
						'qty'     => 1,
						'price'   => 10,
						'name'    => 'Coffee Mug'
				),
				array(
						'id'      => 'sku_965QRS',
						'qty'     => 1,
						'price'   => 10,
						'name'    => 'Shot Glass'
				)
		);
		
		$this->cart->insert($data);
		$test = $this->cart->total();
		$this->load->view('buy/test.php',array(
				'total' =>$test,
				
		));
	}
	
	
	
	
	//默认交易首页
	public function index(){
		
		// 查询花的类型
		$breed = $this->uri->segment(4);
		//$breed = $_POST['breed'];
		
		
		for($i=0;$i<10;$i++){
			//从数据库 取出来。
			$data[$i]['breed'] = '牡丹花';
			$data[$i]['id'] = $i;
		}
		
		

		
		
		if($breed == ""){
			//所有信息
			//$data[10]['breed'] = '牡00';
			// 数据库查询所有卖的数据
			
			for($all =0;$all < 10;$all++){
					
				$show[$all]['good_category'] = $all; //品类
				$show[$all]['good_brand'] = $all;  //品牌
				$show[$all]['good_variety'] = $all; //品种
				$show[$all]['good_img_url'] = '/static/images/product/test.png';//图
				$show[$all]['good_level'] = $all;//等级
				$show[$all]['good_price'] = $all;//价格
					
				$good_now_info ['pid'] = "leftquantity150914000068" ;
				$good_now_info ['total'] = "111";
				$good_now_info ['now_num'] ="101";
					
				$show[$all]['good_amount'] = $good_now_info;//数量
					
					
				$show[$all]['good_buy_amount'] = 'good_buy_amount';//购买数量<
				$show[$all]['good_desc'] = 'good_desc';//包装描述
				$show[$all]['good_class'] = 'good_class';
					
					
			}
			$page['current'] = "2";
			$page['total'] = "5";
			$page['all_page'] = "111";// 总共 111 个数据
		}
		else{
			//$data[10]['breed'] = '牡00';
			// 个别信息
			for($all =0;$all < 10;$all++){
					
				$show[$all]['good_category'] = "111"; //品类
				$show[$all]['good_brand'] = "111";  //品牌
				$show[$all]['good_variety'] = "111"; //品种
				$show[$all]['good_img_url'] = '/static/images/product/test.png';//图
				$show[$all]['good_level'] = "111";//等级
				$show[$all]['good_price'] = "111";//价格
					
				$good_now_info ['pid'] = "leftquantity150914000068" ;
				$good_now_info ['total'] = "111";
				$good_now_info ['now_num'] ="101";
					
				$show[$all]['good_amount'] = $good_now_info;//数量
				$show[$all]['good_buy_amount'] = 'good_buy_amount';//购买数量<
				$show[$all]['good_desc'] = 'good_desc';//包装描述
				$show[$all]['good_class'] = 'good_class';
	
			}
			$page['current'] = "5";// 当前第几页
			$page['total'] = "10";//总共几页
			$page['all_page'] = "111";// 总共 111 个数据
		}
		
		$this->load->view('buy/index.php',array(
				'data' => $data,
				'show' => $show,
				'page' => $page,
					
		));
		
	}
	
}