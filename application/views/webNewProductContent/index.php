<?php
if ($login_status) {
	require_once ("application/views/public/login_in.php");
} else {
	require_once ("application/views/public/login_out.php");
}
?>


<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
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
	<li class="active">新品推荐</li>
</ol>
<form class="form-inline" role="form" id="queryform" name="queryform"
	method="post" action="/webNewProductContent">
	<input type="hidden" id="curPage" name="curPage" />
</form>

<div class="row">
	<div class="col-md-3">
		<div class="panel panel-primary" style="margin-bottom: 10px;">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-heart"></span>&nbsp;&nbsp;&nbsp;新品推荐
			</div>
			<div class="panel-body">
				<a href="/webNewProductContent"><span style="padding-bottom: 10px;">
						1、<strong>全部</strong>
				</span></a><br> <a href="/webNewProductContent/show/78"><span
					style="padding-bottom: 10px;"> 2、<strong>优质新品赏析——帝王花、乒乓菊、绣球</strong></span></a><br>

			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" style="margin-bottom: 10px;">
			<div class="panel-body">
				<div
					style="text-align: center; height: 60px; line-height: 60px; color: #ce2745; font-size: 20px; font-weight: bold; margin: 10px 0 10px 0;">新品推荐</div>


				<a href="/webNewProductContent/show/78"> <span style="color: black;">1、<strong>优质新品赏析——帝王花、乒乓菊、绣球</strong></span>
					<div style="color: #999999; padding-left: 20px;">
						2015-4-27<span class="glyphicon glyphicon-play"
							style="float: right; padding-right: 20px;"></span>
					</div>

				</a>
				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;"></div>


				<button type="button" class="btn btn-default btn-sm first disabled"
					tabindex="0" aria-disabled="true">
					<i class="icon-step-backward glyphicon glyphicon-step-backward"></i>
				</button>
				<button type="button" class="btn btn-default btn-sm prev disabled"
					tabindex="0" aria-disabled="true">
					<i class="icon-arrow-left glyphicon glyphicon-backward"></i>
				</button>
				共1页（1条记录） <input
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