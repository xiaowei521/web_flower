<?php echo $header?>
    <style type="text/css">
        .form-signin { max-width: 390px; padding: 15px; margin: 0 auto; text-align:center;
        } .form-signin .form-signin-heading, .form-signin .checkbox { margin-bottom:
        10px; } .form-signin .checkbox { font-weight: normal; } .form-signin .form-control
        { position: relative; height: auto; -webkit-box-sizing: border-box; -moz-box-sizing:
        border-box; box-sizing: border-box; padding: 10px; font-size: 16px; } .form-signin
        .form-control:focus { z-index: 2; } .form-signin input[type="text"] { margin-bottom:
        -1px; border-bottom-right-radius: 0; border-bottom-left-radius: 0; } .form-signin
        input[type="password"] { margin-bottom: 10px; border-top-left-radius: 0;
        border-top-right-radius: 0; } .form-signin img { margin-bottom: 10px; height:44px;
        border-top-left-radius: 0; border-top-right-radius: 0; }
    </style>
    <script>    
    	function login_check(){
    		var username = $("#j_username").val();
    		var passwd = $("#j_password").val();
    		var checkcode = $("#captcha").val();
    		if(username == "" || passwd == "" || checkcode == ""){
        		return ;
    		}
        	$.ajax({ 
            	url: "/user/login_check", 
            	type:'POST',
            	data:{"j_username":username,"j_password":passwd,"captcha":checkcode},
            	success: function(data){
           		    ajaxobj=eval("("+data+")");  
           		    if(ajaxobj.status ==0){
              		 	$('#message_div').css('display','block');
               		    $('#message').html(ajaxobj.info);
           		    }
           		    else{
              		 	$('#message_div').css('display','block');
               		    $('#message').html(ajaxobj.info);
           		    	window.location.href="/user/buy_login_success";
           		    }
                 	           		
              }});
    	}
    </script>
    
    
    </head>
    
    <body>
        <?php echo $login_in?>
            <div class="container">
                <div class="logo">
                    <a href="/default">
                        <img src="/static/images/logo.png" style=" width: 200px; height: 45px; padding-left: 10px; margin-top: 18px;"
                        border="0">
                    </a>
                    <img src="/static/images/wx.jpg" style=" width: 80px; height: 80px; float:right;margin-top:6px;margin-right: 6px;"
                    border="0">
                    <!-- <div class="col-md-12">
                    <img class="img-responsive" alt="Responsive image"  src="/static/images/header.png"  usemap="#planetmap" >
                    <map name="planetmap">
                    <area href="" shape="rect" coords="0,0,230,98">
                    </map>
                    </div> -->
                </div>
                <ol class="breadcrumb">
                    您现在的位置：
                    <li>
                        <a href="/default">
                            首页
                        </a>
                    </li>
                    <li class="active">
                        登录
                    </li>
                </ol>
                <form class="form-signin" role="form" method="post" action="/User/login_check" onsubmit="return false;">
                    <h2 class="form-signin-heading">
                        花拍在线
                    </h2>
                    <br>
                    <div id="message_div" class="alert alert-danger"  style="display:none"> <button data-dismiss="alert" class="close">×</button><span id="message"></span></div>
                    
                    <input type="text" id="j_username" name="j_username" class="form-control" placeholder="账号"
                    required="" autofocus="">
                    <br>
                    <input type="password" id="j_password" name="j_password" class="form-control" placeholder="密码"
                    required="">
                    <br>
                    <div class="input-group">
                        <input type="text" id="captcha" name="captcha" class="form-control" style="width: 175px;margin-right: 5px;"
                        placeholder="效验码" required="">
<img class="login-captcha-img" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/user/getRefreshImg/date/<?php echo time();?>" http_header="<?php echo $_SERVER['HTTP_HOST'];?>" alt="刷新验证码">
                    </div>
                    <br>
                
                    <br>
                    
                    <button class="btn btn-lg btn-primary btn-block" type="submit"  onclick="login_check()">
                        登录
                    </button>
                    <br>
                    <ul class="pager">
                        <li class="previous">
                            <a href="/forgetpassword">
                                忘记密码?
                            </a>
                        </li>
                        <li class="next">
                            <a href="/user/register">
                                注册新用户
                            </a>
                        </li>
                    </ul>
                </div>
                ​
            </form>
            <?php echo $footer?>
            