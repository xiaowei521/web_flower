<html>
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" /> 
  <meta name="keywords" content="..." /> 
  <title>flower</title> 
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" /> 
  <script src="public/js/jquery.js"></script> 
  <script src="bootstrap/js/bootstrap.js"></script> 

  <style>
  body{
    
  	overflow:auto;
  }
#footer-beta2 {
    margin-top: 20px;
    overflow: hidden;
}
footer{
    display: block;
}
  </style> 
 </head> 
<body> 

<!-- 头部 start-->
  <div id="header">
    <div class="carousel-inner"> 
     <div class="navbar navbar-static-top" style="background:#ffffff; border:2px #000000 solid;"> 
	  <p class="navbar-text pull-right"><a>联系我们</a></p>
 	  <p class="navbar-text pull-right"><a>KM官网</a></p>
 	  <p class="navbar-text pull-right"><a>返回首页</a></p>
      <p class="navbar-text pull-right"><a>我的花拍</a></p>
     
     
     
      <p class="navbar-text pull-left">您好，欢迎光临花拍在线<a type="button" class="btn " onclick="open_modal_login()">【请登陆】</a> </p> 
      <p class="navbar-text pull-left"><a type="button" class="btn " onclick="open_modal_register()">【免费注册】</a> </p> 
     </div> 
    </div> 
   </div> 
  <!-- 头部 end-->

<!--  main start-->
<div id="main">
   <div class="row-fluid">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <img src="public/images/nav_1.png" style="width:100%;"/>
      </div>
   </div>
   
   <div  class="row-fluid">
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
      	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      		<img src="public/images/left_1.png" style="width:100%;"/>
      	</div>
      	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      		<img src="public/images/left_1.png" style="width:100%;"/>
      	</div>
      	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      		<img src="public/images/left_1.png" style="width:100%;"/>
      	</div>
      </div>
      <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
      	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="myCarousel" class="carousel slide">
			   <!-- 轮播（Carousel）指标 -->
			   <ol class="carousel-indicators">
			      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			      <li data-target="#myCarousel" data-slide-to="1"></li>
			      <li data-target="#myCarousel" data-slide-to="2"></li>
			   </ol>   
			   <!-- 轮播（Carousel）项目 -->
			   <div class="carousel-inner">
			      <div class="item active">
			         <img src="/public/images/carousel_1.png" alt="First slide" style="width:100%;">
			         <div class="carousel-caption">1</div>
			      </div>
			      <div class="item">
			         <img src="/public/images/carousel_1.png" alt="Second slide" style="width:100%;">
			         <div class="carousel-caption"> 2</div>
			      </div>
			      <div class="item">
			         <img src="/public/images/carousel_1.png" alt="Third slide" style="width:100%;">
			         <div class="carousel-caption"> 3</div>
			      </div>
			   </div>
      	</div>
      	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      		<img src="/public/images/right_1.png"  style="width:100%;">
      	</div>
      	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      		<img src="/public/images/right_1.png"  style="width:100%;">
      	</div>
      	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      		<img src="/public/images/right_1.png" style="width:100%;">
      	</div>
      </div>
      
      
      
      
   </div>


</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:20px;">
     <div style="background:#ffffff;  bottom:0px;"> 


      <div class="col-sm-12" style="text-align:center">
        <span>
          公司地址：云南 昆明 斗南 | 邮编：650500 | 客服热线：0871-66200029
        </span>
      </div>
      <div class="col-sm-12" style="text-align:center;" >
        <span>
          Copyright@2014-2018 kifaonline.com.cn All Rights Reserved  
        </span>
       </div>
      <div class="col-sm-12" style="text-align:center; " >
        <span>
          电子商务平台KIFA花拍在线网站备案 滇ICP备滇ICP备53012103402015号 
        </span>
       </div>
      </div>
</div>
</div>

<!--  main end-->



<!-- 底部tart-->
<!--  
<div id="bottom" style="bottom:0px;">
   
     <div class="navbar navbar-fixed-bottom" style="background:#ffffff; border:2px #000000 solid; bottom:0px;"> 


      <div class="col-sm-12" style="text-align:center">
        <span>
          公司地址：云南 昆明 斗南 | 邮编：650500 | 客服热线：0871-66200029
        </span>
      </div>
      <div class="col-sm-12" style="text-align:center;" >
        <span>
          Copyright@2014-2018 kifaonline.com.cn All Rights Reserved  
        </span>
       </div>
      <div class="col-sm-12" style="text-align:center; " >
        <span>
          电子商务平台KIFA花拍在线网站备案 滇ICP备滇ICP备53012103402015号 
        </span>
       </div>
      </div>

    
 </div> 
 -->
<!-- 底部end-->

<!--  login start -->
  <div class="modal fade" id="myModal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
   <div class="modal-dialog"> 
    <div class="modal-content"> 
     <div class="modal-body"> 
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times; </button> 
      <div class="loginBox row-fluid"> 
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
        <h2>登陆窗体</h2> 
        <p><input type="text" name="username" placeholder="用户名" style="color:#000000; width:220px;" /></p> 
        <p><input type="password" name="password" placeholder="密码" style="color:#000000;  width:220px;" /></p> 
        <span style="color:red">用来返回ajax 验证错误信息提醒</span> 
        <div class="row-fluid"> 
         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left"> 
          <label><input type="checkbox" name="rememberme" checked="checked" />记住密码</label> 
         </div> 
         <div class="spn6 col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
         </div> 
         <div class="span12 "> 
          <input id ="login_submit" type="button" value=" 登陆 " class="btn btn-primary" style="width:100%; left:0;padding:5px 0px 10px 0px;margin:5px 0 5px 0;" /> 
         </div> 
         <div class="span12 "> 
          <a onclick="open_modal_register();">马上注册</a> 
         </div> 
        </div> 
       </div> 
      </div> 
     </div> 
     <div class="modal-footer">
       		底部
     </div> 
    </div> 
   </div> 
  </div> 
  
<!--  login end -->



<!-- register start -->
<div class="modal fade" id="myModal_register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times; </button>
                <form name="form_reg" method="post" action="{$reg_url}" id="form_reg">
                <div class="loginBox row-fluid">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h2>注册</h2>
                        <p><input type="text" name="username" placeholder="邮箱号/手机号" style="color:#000000; width:220px;" /></p> 
                    </div>
                    <div class="row-fluid">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p><input type="text" name="username" placeholder="请输入密码" style="color:#000000; width:220px;" /></p>
                            <span>密码为6到12位数字或英文组合</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p><input type="text" name="username" placeholder="重复密码" style="color:#000000; width:220px;" /></p>
                            <span>重复密码错误</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="button" value=" 注册 " class="btn btn-primary" style="width:220px; " />
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label><input type="checkbox" name="rememberme" checked="checked" />我已经看过并同意《用户协议》</label>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <div class="modal-footer">
                注册成功---正在登陆~~~666
            </div>
        </div>
    </div>
</div>

<!-- register end -->





 </body>
</html>



