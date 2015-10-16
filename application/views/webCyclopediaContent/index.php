<?php
if ($login_status) {
	require_once ("application/views/public/login_in.php");
} else {
	require_once ("application/views/public/login_out.php");
}
?>
<script type="text/javascript">
		function gotoPage(pn) {
			document.forms.queryform.curPage.value = pn;
			document.forms.queryform.submit();
		}
		function judge() {
			if ($("#currentPage").val() > 1) {
				$("#currentPage").val(1);
			}
		}
	</script>

<ol class="breadcrumb">
	您现在的位置：
	<li><a href="/welcome">首页</a></li>
	<li class="active">花拍百科</li>
</ol>
<form class="form-inline" role="form" id="queryform" name="queryform"
	method="post" action="/webCyclopediaContent">
	<input type="hidden" id="curPage" name="curPage" />
</form>

<div class="row">
	<div class="col-md-3">
		<div class="panel panel-primary" style="margin-bottom: 10px;">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;&nbsp;花拍百科
			</div>
			<div class="panel-body">
			  
			  <?php
					foreach ( $data ['list'] as $key => $value ) {
						echo '<a href="' . $value ['href'] . '" style="padding-bottom: 20px;"><span>' . $key . '、<strong>' . $value ['title'] . '</strong></span></a><br>';
					}
					?>
			  

			  </div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" style="margin-bottom: 10px;">
			<div class="panel-body">
				<div
					style="text-align: center; height: 60px; line-height: 60px; color: #ce2745; font-size: 20px; font-weight: bold; margin: 10px 0 10px 0;">花拍百科</div>
			  	
			  <?php
					foreach ( $data ['list'] as $key => $value ) {
						if ($key == 1) {
							continue;
						}
						echo "<a href=\"" . $value ['href'] . '"> <span style="color:black;">' . ($key - 1) . '、<strong>' . $value ['title'] . '</strong></span><div style="color:#999999;padding-left: 20px;">';
						echo $value ['date'] . '<span class="glyphicon glyphicon-play" style="float: right;padding-right: 20px;"></span></div></a>';
						echo '<div style="overflow:hidden; border-bottom:2px dotted #ce2745; margin:10px 0 10px 0;"></div>';
					}
					?>
			  
					<button type="button" class="btn btn-default btn-sm first disabled"
					tabindex="0" aria-disabled="true">
					<i class="icon-step-backward glyphicon glyphicon-step-backward"></i>
				</button>
				<button type="button" class="btn btn-default btn-sm prev disabled"
					tabindex="0" aria-disabled="true">
					<i class="icon-arrow-left glyphicon glyphicon-backward"></i>
				</button>
				共1页（6条记录） <input
					style="border: 1px solid; width: 27px; height: 27px; margin: 0; text-align: center;"
					type="text" id="currentPage" name="currentPage" value="1"
					onkeyup="judge();" /> <a
					href="javascript:gotoPage($('#currentPage').val());"
					style="width: 60px;">跳转</a>

				<button type="button" class="btn btn-default btn-sm next disabled"
					tabindex="0" aria-disabled="false">
					<i class="icon-arrow-right glyphicon glyphicon-forward"></i>
				</button>
				<button type="button" class="btn btn-default btn-sm last disabled"
					tabindex="0" aria-disabled="false">
					<i class="icon-step-forward glyphicon glyphicon-step-forward"></i>
				</button>
			</div>
		</div>
	</div>
</div>
</div>

<?php
require_once ("application/views/public/footer.php");
?>