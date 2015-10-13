<?php  
 class Buyer_model extends CI_Model{ 
 	 
     function Buyer_model(){  
         parent::__construct();  
         $this->load->database();
     }  
     
     
     // 获得 花的 左侧 类型列表
     public function get_flower_list(){
     	
     	$data = $this->db->get('flower_list')->result();
     	
     	
     	$count = $this->db->get('flower_list')->num_rows();
     	
     	// 封装成数据
		for($i=0;$i<$count;$i++){
			$result[$i]['breed'] = $data[$i]->breed ;
			$result[$i]['id'] = $data[$i]->id ;
		}
     	$data['count'] = $count;
     //	return $result;
		return $data;
     }
     
     // 根据左侧列表对应选项获取 相应数据
     public function ge_flower_list_info($id){
     	// 全部
     	if($id == 0){
     		$data = $this->db->get('flower_list_info')->result();
     		$count = $this->db->get('flower_list_info')->num_rows();
     	}
     	// 根据类型来分
     	else{
     		$count = $this->db->where('id',$id)->from('flower_list_info')->get()->num_rows();
     		$data = $this->db->where('id',$id)->from('flower_list_info')->get()->result();
     	}

     	$data['count'] = $count;
     	return $data;
     }
     
     // 加入购物车的 指定单个物品
     public function get_flower_only_info($pid){
     	
     	// 肯定 有，不可能找不到吧。 先不些 逻辑处理 错误的时候了
     	$data = $this->db->where('pid',$pid)->from('flower_list_info')->get()->result();
     	
     	return $data;
     }
     
     //订单信息的生成
     /**
      *  @param $id 订单id    $data 订单数据  
      *  @author wei sun
      *   计划将订单数据 存成json 形式
      */
     public function set_charge($id,$userId,$data){
     	
     	//数据库的数据
//      	$database_data = $this->db->where('user_id',$userId)->from('charge')->get()->result();
     	
//      	if($database_data ==null){
//      		exit();
//      	}
//      	else{
     		
     		
//      	}
     	$json_data = json_encode($data);
     	$mydata = array(
     			'id' => $id,
     			'data' =>$json_data,
     			'user_id' =>$userId,
     	);
     	
     	$this->db->insert('charge', $mydata);
     }
     
     //根据订单号 来查看订单信息
     public function find_charge_info_by_id( $id ,$user_id){
     	

     	$data = $this->db->where(array('id' =>$id,'user_id'=>$user_id))->from('charge')->get()->result();
     	$subtotal = 0.00;
    
     	$json_data = (json_decode($data[0]->data,TRUE));
     	
     	
     	foreach($json_data as $key => $value){
     		$subtotal += $value['subtotal'];
     	}
     	
     	$result['subtotal'] = $subtotal;
     	$result['data'] = $json_data;
     	$result['status'] = $data[0]->status;
     	return $result;
     }
     
     
     //根据订单id 来重置 status 的 订单状态
     public  function set_charge_status_by_id($id,$status){
     	
     	$update['status'] = $status;
     	
     	$this->db->update('charge', $update, array('id'=>$id));
     }
     
     //设置 充值 订单的信息 pay_detail 表
     public function set_pay_info($data){
     	     	
     	$this->db->insert('pay_detail', $data);
     	
     }
     public function get_pay_info($id){
     //	$data = $this->db->where('id',$id)->from('pay_detail')->get()->result();
     	
     	$data = $this->db->where('id',$id)->from('pay_detail')->get()->row_array();
     	return $data;
     }
     
     
     
     public function find_self_charge_info_by_id($user_id){
     	
     	$data = $this->db->where('user_id',$user_id)->from('charge')->get()->result();
     	

     	foreach($data as $key =>$value){
     		$subtotal = 0.00;
     		$json_data = (json_decode($value->data,TRUE));
     		
     		foreach($json_data as $keys => $values){
     			$subtotal += $values['subtotal'];
     		}
     		
     		$result[$key]['subtotal']= $subtotal;
     		$result[$key]['data']  = $json_data;
     		$result[$key]['status']  = $value->status;
     		$result[$key]['id'] = $value->id;
     	}
     	
     	

     	return $result;
     }
     
     // 判断订单的信息
     public function j_charge_status($id){
     	
     	$data = $this->db->where('id',$id)->from('charge')->get()->result();
     	$result['status'] = $data[0]->status;
     	$result['user_id'] = $data[0]->user_id;
     	$result['subtotal'] = $data[0]->good_price;
     	return $result;
     }
     
     
     // 筛选功能 购买界面 
     public function search(){
     	
     	
     	
     }
     
     
     
     //根据用户id 来获取订单信息
     // 解压 data 数据信息
     public function get_charge_info_by_userId( $userId ){
     
     	$data = $this->db->where(array('user_id'=>$userId))->from('charge')->get()->result();
     
     	
     	
     	
     	return $data;

     }
     
     
     
     
     
}
?>