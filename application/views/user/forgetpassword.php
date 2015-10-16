<?php
if ($login_status) {
	require_once ("application/views/public/login_in.php");
} else {
	require_once ("application/views/public/login_out.php");
}
?>

<ol class="breadcrumb">
	您现在的位置：
	<li><a href="/welcome">首页</a></li>
	<li class="active">找回密码</li>
</ol>


<form id="queryform" name="queryform" method="post"
	action="/User/findpassword" style="text-align: center;">
	<br> <input type="text" class="form-control" id="id" name="id"
		placeholder="输入您的登录账号" required> <br>
	<button type="submit" class="btn btn-default">找回密码</button>
</form>




</div>
<?php
require_once ("application/views/public/footer.php");
?>