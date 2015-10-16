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
<div class="alert alert-danger"><?php echo $info['user_id']?>找回密码的链接已发至您的邮箱！</div>
</div>

<?php
require_once ("application/views/public/footer.php");
?>