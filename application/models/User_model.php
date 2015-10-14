<?php  
 class User_model extends CI_Model{ 
 	 
     function User_model(){  
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
     	//$this->db->where(array('id'=>$province_id))->get('province')->result();
     	return $this->db->where(array('province_id'=>$province_id))->get('city');
     	
     }
     //判断用户登陆账号和密码  是否符合
     public function j_user_info($userId,$passwd){
     	if($this->db->where('user_id',$userId)->from('user')->get()->num_rows() == 0){
     		// 用户肯定不存在
     		$result['status'] = '0';
     		$result['info'] ="用户不存在";
     		return $result;
     	}
     	// 核对 密码
     	else{
     		$query = $this->db->where('user_id',$userId)->from('user')->get()->result();
     		if($query[0]->password == $this->passwd($passwd)){
     			//OK 
     			$result['status'] = '1';
     			$result['info'] ="验证成功";
     			$result['user_id'] = $userId;
     			$result['user_type'] = $query[0]->user_type;
     			$result['name'] = $query[0]->buyName;
     			return $result;
     		}
     		else{
     			$result['status'] = '0';
     			$result['info'] ="密码错误";
     			return $result;
     		}
     	}
     }
     // 修改用户数据库的信息
     // 用户 id  修改 信息 
     public function set_user_database_info($user_id,$user_info){
     	
     	// 注意  是数组形式
		/*$data = array(
               'title' => $title,
               'name' => $name,
               'date' => $date
            );
        */
     	$this->db->where('user_id', $user_id);
     	$user_info['password'] = $this->passwd($user_info['password']);
     	
     //	var_dump($user_info);
     	
     	$this->db->update('user', $user_info);
	//	exit();
     }
     
     // 存储用户信息
     public function set_user_info($userInfo){
     	// 先存储用户信息 在 发送邮件
     	$base_str ="sw_ajax";
     	$userInfo['password'] =$this->passwd($userInfo['password']);
     	$userInfo['token']=  $this->passwd($userInfo['user_id']);
     	$emailInfo['token']= $userInfo['token'];
     	//过期时间 校验码
     	$userInfo['token_exptime'] = time() + 60*60*24;
     	$userInfo['reg_time'] = date('y-m-d H:i:s');
     	
     	$emailInfo['buyName'] = $userInfo['buyName'];
     	$emailInfo['buyConEmail'] = $userInfo['buyConEmail'];
     	$emailInfo['user_id'] = $userInfo['user_id'];
     	$this->db->insert('user',$userInfo);
     	
     	// 去调用 发送邮件
     	return $emailInfo;

     }
     // 检验 用户邮箱 激活 token
     public function get_email_token($token,$userId){
     	if($this->db->where('user_id',$userId)->from('user')->get()->num_rows() == 0){
     		
     		$result['status']  = "fasle";
     		$result['info'] = "该用户不存在无法激活";
     		return $result;
     	}
     	$query = $this->db->where('user_id',$userId)->from('user')->get()->result();
     	// 未激活
     	if($query[0]->status == 1){
     		// 可以去测试验证吗
     		if(time() <= $query[0]->token_exptime ){
     			if($query[0]->token == $this->passwd($userId)){
     				$update['status'] = 0;
     				$this->db->update('user', $update, array('user_id'=>$userId));
     				$result['status']  = "true";
     				$result['info'] = "OK!";
     				return $result;
     			}
     		}
     		else{
     			$result['status']  = "fasle";
     			$result['info'] = "验证码过期";
     			// 验证码过期
     			return $result;	
     		}
     	}
     	// 已经激活
     	else if($query[0]->status == 0){
     		$result['status']  = "fasle";
     		$result['info'] = "已经激活";
     		return $result;
     	}
     	else{
     		// 被封号中！链接失效
     		$result['status']  = "fasle";
     		$result['info'] = "账号异常/被封号，请联系客服";
     		return $result;
     	}
     }
     
     //用户密码丢失
     public function find_user_password($userId){
     
     	
     	$query = $this->db->where('user_id',$userId)->from('user')->get()->result();
     	
     	if($query == null){
     		return false;
     	}
     	else{
     		$result['email'] = $query[0]->buyConEmail;
     		$result['user_id'] = $userId;
     		$result['token'] =  $query[0]->token;
     		return $result;
     	}
     }
     
     //召回密码 校验码
     public function update_user_password($token,$user_id){
     	
     	if($this->db->where('user_id',$userId)->from('user')->get()->num_rows() == 0){
     		 
     		$result['status']  = "fasle";
     		$result['info'] = "该用户不存在无法激活";
     		return $result;
     	}
     	$query = $this->db->where('user_id',$userId)->from('user')->get()->result();
     	// 未激活
     	if($query[0]->status == 1){
     		// 可以去测试验证吗
     		if(time() <= $query[0]->token_exptime ){
     			if($query[0]->token == $this->passwd($userId)){
     				$update['status'] = 0;
     				$this->db->update('user', $update, array('user_id'=>$userId));
     				$result['status']  = "true";
     				$result['info'] = "OK!";
     				return $result;
     			}
     		}
     		else{
     			$result['status']  = "fasle";
     			$result['info'] = "验证码过期";
     			// 验证码过期
     			return $result;
     		}
     	}
     	// 已经激活
     	else if($query[0]->status == 0){
     		
     		
     		
     		$result['status']  = "fasle";
     		$result['info'] = "已经激活";
     		return $result;
     	}
     	else{
     		// 被封号中！链接失效
     		$result['status']  = "fasle";
     		$result['info'] = "账号异常/被封号，请联系客服";
     		return $result;
     	}
     	
     	
     }
     
     
     
     
     
     
     //  加密
     public static function passwd($passwd){
     	$base = "sw_ajax";
     	return md5($passwd.$base);
     }
     
     
     // 获取玩家的 金币 数据~
     public function get_user_info($id){
     	$data = $this->db->where(array('user_id'=>$id))->get('user')->result();
     
     	$result['money'] = $data[0]->money;
     
     	return $result;
     }
     
     // 更新用户金币
     public function set_user_money($userId,$reduce_money){
     	$data = $this->db->where(array('user_id'=>$userId))->get('user')->result();
     	
     	//这个会出现异常么？ 应该不会
     	$update['money'] = $data[0]->money - $reduce_money;
     	
     	$this->db->update('user', $update, array('user_id'=>$userId));
     	
     }
     
     
     // 充值 RMB 成功  后为玩家增加 金币
     public function charge_success($order_id,$userId,$reduce_money){


     	$data = $this->db->where(array('user_id'=>$userId))->get('user')->result();
     	
     	//这个会出现异常么？ 应该不会
     	$update['money'] = $data[0]->money + $reduce_money;
     	$this->db->update('user', $update, array('user_id'=>$userId));
     	
     	
     	//既然能进来 肯定 是没问题了 。这时候我在 更新订单。
     	//$order_id      ********************充值完成  更新订单状态  *********************
     	$charge_data = $this->db->where(array('id'=>$order_id))->get('charge')->result();
     	$charge_update['status'] = 1;
     	$this->db->update('charge', $charge_update, array('id'=>$order_id));
     	
     }
     
     
     // 记录流水号
     public function write_order_info($order_id,$status){
     	
     	$orderInfo['order_id'] = $order_id;
     	$orderInfo['money'] = 5;
     	$orderInfo['status'] = $status;
     	
     	$this->db->insert('order',$orderInfo);
     }
     
}
?>