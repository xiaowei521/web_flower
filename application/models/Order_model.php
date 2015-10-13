<?php  
 class Order_model extends CI_Model{ 
 	 
     function Order_model(){  
         parent::__construct();  
         $this->load->database();
     }  
     
     
     
     //根据用户id 来获取订单信息
     public function get_pay_info_by_userId( $userId ){
     	
     	$data = $this->db->where(array('user_id'=>$userId))->from('pay_detail')->get()->result();
     	
     	return $data;
//      	foreach ($data as $row)
//      	{
//      		echo $row->title;
//      	}
     }
     


     
     
}
?>