<?php  
 class UserModel extends CI_Model{ 
 	 
     function UserModel(){  
         parent::__construct();  
         $this->load->database();
     }  
     function get_last_ten_entries()  
     {        
 		$query = $this->db->get('user', 1);  
        return $query->result();   
     }      
     // 判断用户存不存在
     function judge_user_aleardy($id){
     	
		if($this->db->where(array('user_id'=>$id))->get('user')->num_rows() == 0){
			return true;
		}
		return false;
     }
     // 根据 province_id 去获取  下级 数据
     function get_provice_city($province_id){
     	
     	$this->db
     }
}
?>