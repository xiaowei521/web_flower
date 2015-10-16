<?php
if ($login_status) {
	require_once ("application/views/public/login_in.php");
} else {
	require_once ("application/views/public/login_out.php");
}
?>


<script type="text/javascript"
	src="/static/components/jquery/validation/jquery.validate.min.js"
	type="text/javascript"></script>
<script type="text/javascript"
	src="/static/components/jquery/validation/messages_zh.js"></script>
<script type="text/javascript"
	src="/static/components/jquery/validation/jquery-validate.bootstrap-tooltip.js" /></script>
<script type="text/javascript">
			$(document).ready(function() {
				$("#user").validate({
					rules : {
						oldpswd : {
							required : true,
							minlength : 6,
							maxlength : 20
						},
						newpswd : {
							required : true,
							minlength : 6,
							maxlength : 20
						},
						repeatpswd : {
							required : true,
							equalTo : "#newpswd"
						}
					}
				});
			});
		</script>
<form id="user" name="user" action="/User/set_user_password"
	method="post">
	<fieldset>
		<legend>原始信息</legend>
		<div class="input-group">
			<span class="input-group-addon">账户名</span> <input type="password"
				id="userid" name="userid" class="form-control"
				<?php echo'value="'.$id.'"' ;?>>
		</div>
	</fieldset>
	<br>
	<fieldset>
		<legend>变更信息</legend>
		<div class="input-group">
			<span class="input-group-addon">变更密码</span> <input type="password"
				id="newpswd" name="newpswd" class="form-control" placeholder="变更密码">
		</div>
		<div class="input-group">
			<span class="input-group-addon">确认密码</span> <input type="password"
				id="repeatpswd" name="repeatpswd" class="form-control"
				placeholder="确认密码">
		</div>
	</fieldset>
	<br>
	<button type="submit" class="btn btn-default">
		<span class="glyphicon glyphicon-ok">保存</span>
	</button>
</form>

</div>
</div>
</div>


</div>

<?php
require_once ("application/views/public/footer.php");
?>