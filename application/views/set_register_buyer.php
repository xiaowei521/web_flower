<?php
if ($login_status) {
	require_once ("application/views/public/login_in.php");
} else {
	require_once ("application/views/public/login_out.php");
}
?>
<ol class="breadcrumb">
	您现在的位置：
	<li><a href="/welcome"> 首页 </a></li>
	<li class="active">用户注册</li>
</ol>
<div class="alert alert-warning" role="alert"
	style="text-align: center;">
	1、供购选择 <span class="glyphicon glyphicon-arrow-right"> </span> 2、注册信息 <span
		class="glyphicon glyphicon-arrow-right"> </span> <font color="#FF0000">
		3、注册成功 </font>
</div>
<br>
<div class="alert alert-success" role="alert"
	style="text-align: center;">
	<font color="red" size="+3">
                        恭喜您！注册成功，请您进入注册邮箱
                        <?php echo $returnData['buyConEmail']?>
                            ，激活用户...
                            <br> <label id="message">
                                <?php echo  $returnData['user_id']?>
                            </label>
	</font>
</div>
</div>
<?php
require_once ("application/views/public/footer.php");
?>  