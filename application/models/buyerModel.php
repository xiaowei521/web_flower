<?php  
 class buyerModel extends CI_Model{ 
 	 
     function buyerModel(){  
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
     
     
     // 筛选功能 购买界面 
     public function search(){
     	
     	
     	
     }
     

     
     
}
?>