<?php

class checkEmail extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->load->helper('url'); //加载url函数，因为在视图文件中用到了base_url();
        $this->load->view('mail_view'); //加载mail_view.php视图文件
        
    }
    public function sendMail() {
        $config['protocol'] = 'smtp'; //采用smtp方式
        $config['smtp_host'] = 'smtp.163.com'; //简便起见，只支持163邮箱
        
//         $config['smtp_user'] = $_POST['sendfrom']; //你的邮箱帐号
//         $config['smtp_pass'] = $_POST['password']; //你的邮箱密码
                $config['smtp_user'] = '15947617098@163.com'; //你的邮箱帐号
                $config['smtp_pass'] = '547966965'; //你的邮箱密码
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = "html";
        $this->load->library('email'); //加载email类          
        $this->email->initialize($config);//参数配置
        $this->email->from('15947617098@163.com', '我是发件人');
        $this->email->to('15754962108@163.com');
        $this->email->subject('11');
        $this->email->message('22');
        //显示发送邮件的结果，加载到res_view.php视图文件中
        if (!$this->email->send()) {
            $data['result'] = "<font color='red' size='10px'>邮件发送失败，可能是由您的发件人或者密码填写不匹配造成</font>";
            $this->load->view('test.php', $data);
        } else {
            $data['result'] = "<font color='red' size='10px'>邮件发送成功</font>";
            $this->load->view('test.php', $data);
        }
    }
};
?> 


