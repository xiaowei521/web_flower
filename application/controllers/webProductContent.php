<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class WebProductContent extends MY_Controller {
	function WebProductContent() {
		parent::__construct ();
		
		$this->load->model ( 'buyer_model' );
		$this->load->model ( 'user_model' );
	}
	
	// 真的很多， 醉了
	public function index() {
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

		
		$this->load->view ( 'webProductContent/index', array (
				'data' => $data,
				'show' => $show,
				'page' => $page ,
				'login_status'=>$this->login_status,
	
		));
	}
}