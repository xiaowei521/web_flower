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
			if ($("#currentPage").val() > 3) {
				$("#currentPage").val(1);
			}
		}
	</script>
<ol class="breadcrumb">
	您现在的位置：
	<li><a href="/welcome">首页</a></li>
	<li class="active">交易规则</li>
</ol>
<form class="form-inline" role="form" id="queryform" name="queryform"
	method="post" action="/webRuleContent">
	<input type="hidden" id="curPage" name="curPage" />
</form>

<div class="row">
	<div class="col-md-3">
		<div class="panel panel-primary" style="margin-bottom: 10px;">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;&nbsp;交易规则
			</div>
			<div class="panel-body">
				<a href="/webRuleContent"> <span style="padding-bottom: 20px;"><strong>
							1、全部</strong></span> <span class="glyphicon glyphicon-play"></span></a><br>
				<a href="/webRuleContent?secondColumn=平台介绍"> <span
					style="padding-bottom: 10px;"><strong> 2、平台介绍</strong></span>
				</a><br> <a href="/webRuleContent?secondColumn=我要购买"> <span
					style="padding-bottom: 10px;"><strong> 3、我要购买</strong></span>
				</a><br> <a href="/webRuleContent?secondColumn=我要供货"> <span
					style="padding-bottom: 10px;"><strong> 4、我要供货</strong></span>
				</a><br> <a href="/webRuleContent?secondColumn=物流方式"> <span
					style="padding-bottom: 10px;"><strong> 5、物流方式</strong></span>
				</a><br> <a href="/webRuleContent?secondColumn=支付及结算"> <span
					style="padding-bottom: 10px;"><strong> 6、支付及结算</strong></span>
				</a><br> <a href="/webRuleContent?secondColumn=质量及标准"> <span
					style="padding-bottom: 10px;"><strong> 7、质量及标准</strong></span>
				</a><br> <a href="/webRuleContent?secondColumn=我要投诉"> <span
					style="padding-bottom: 10px;"><strong> 8、我要投诉</strong></span>
				</a><br> <a href="/webRuleContent?secondColumn=常见问题"> <span
					style="padding-bottom: 10px;"><strong> 9、常见问题</strong></span>
				</a><br>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" style="margin-bottom: 10px;">
			<div class="panel-body">
				<div
					style="text-align: center; height: 60px; line-height: 60px; color: #ce2745; font-size: 22px; font-weight: bold; border-bottom: solid 1px #CCC; margin: 10px 0 10px 0;">

					交易规则</div>

				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;">
					<a href="/webRuleContent/show/69"> <span style="color: black;">1、<strong>澳洲腊梅——质量标准及包装</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-11-14<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
				</div>

				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;">
					<a href="/webRuleContent/show/68"> <span style="color: black;">2、<strong>银叶菊——质量标准及包装</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-11-14<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
				</div>

				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;">
					<a href="/webRuleContent/show/65"> <span style="color: black;">3、<strong>航空运价表</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-10-23<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
				</div>

				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;">
					<a href="/webRuleContent/show/63"> <span style="color: black;">4、<strong>“花拍在线”试运行期间可代理发货城市</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-10-18<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
				</div>

				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;">
					<a href="/webRuleContent/show/61"> <span style="color: black;">5、<strong>“花拍在线”试运行期间购买商资金结算步骤</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-10-18<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
				</div>

				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;">
					<a href="/webRuleContent/show/60"> <span style="color: black;">6、<strong>购买商注册操作流程</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-11-3<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
				</div>

				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;">
					<a href="/webRuleContent/show/59"> <span style="color: black;">7、<strong>花拍在线上线了</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2015-3-4<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
				</div>

				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;">
					<a href="/webRuleContent/show/47"> <span style="color: black;">8、<strong>“花拍在线”平台介绍</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-12-23<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
				</div>

				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;">
					<a href="/webRuleContent/show/42"> <span style="color: black;">9、<strong>购买问题</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2015-3-4<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
				</div>

				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;">
					<a href="/webRuleContent/show/41"> <span style="color: black;">10、<strong>供货问题</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2015-3-4<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
				</div>

				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;">
					<a href="/webRuleContent/show/40"> <span style="color: black;">11、<strong>物流问题</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-10-18<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
				</div>

				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;">
					<a href="/webRuleContent/show/39"> <span style="color: black;">12、<strong>支付问题</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-10-18<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
				</div>

				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;">
					<a href="/webRuleContent/show/38"> <span style="color: black;">13、<strong>产品问题</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-12-23<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
				</div>

				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;">
					<a href="/webRuleContent/show/37"> <span style="color: black;">14、<strong>系统操作问题</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-10-14<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
				</div>

				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;">
					<a href="/webRuleContent/show/36"> <span style="color: black;">15、<strong>其他问题</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-10-14<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
				</div>


				<button type="button" class="btn btn-default btn-sm first disabled"
					tabindex="0" aria-disabled="true">
					<i class="icon-step-backward glyphicon glyphicon-step-backward"></i>
				</button>
				<button type="button" class="btn btn-default btn-sm prev disabled"
					tabindex="0" aria-disabled="true">
					<i class="icon-arrow-left glyphicon glyphicon-backward"></i>
				</button>
				共3页（36条记录） <input
					style="border: 1px solid; width: 27px; height: 27px; margin: 0; text-align: center;"
					type="text" id="currentPage" name="currentPage" value="1"
					onkeyup="judge();" /> <a
					href="javascript:gotoPage($('#currentPage').val());"
					style="width: 60px;">跳转</a>

				<button type="button" onclick="javascript:gotoPage(2);"
					class="btn btn-default btn-sm next " tabindex="0"
					aria-disabled="false">
					<i class="icon-arrow-right glyphicon glyphicon-forward"></i>
				</button>
				<button type="button" onclick="javascript:gotoPage(3);"
					class="btn btn-default btn-sm last " tabindex="0"
					aria-disabled="false">
					<i class="icon-step-forward glyphicon glyphicon-step-forward"></i>
				</button>
			</div>
		</div>
	</div>
</div>


</div>


<?php 
require_once("application/views/public/footer.php"); 
?>