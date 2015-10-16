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



</head>
<body>


	<ol class="breadcrumb">
		您现在的位置：
		<li><a href="/welcome">首页</a></li>
		<li class="active">通知公告</li>
	</ol>
	<form class="form-inline" role="form" id="queryform" name="queryform"
		method="post" action="/webNoticeContent">
		<input type="hidden" id="curPage" name="curPage" />
	</form>

	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-primary" style="margin-bottom: 10px;">
				<div class="panel-heading">
					<span class="glyphicon glyphicon-volume-up"></span>&nbsp;&nbsp;&nbsp;通知公告
				</div>
				<div class="panel-body">
					<a href="/webNoticeContent" style="padding-bottom: 20px;"><span> 1、<strong>全部</strong></span></a><br>

					<a style="padding-bottom: 20px;" href="/webNoticeContent/show/77"><span>
							2、<strong>花拍在线”客户投诉规定</strong>
					</span></a><br> <a style="padding-bottom: 20px;"
						href="/webNoticeContent/show/76"><span> 3、<strong>“花拍在线”时间调整安排</strong></span></a><br>

					<a style="padding-bottom: 20px;" href="/webNoticeContent/show/75"><span>
							4、<strong>“花拍在线”物流装箱打包标 ...</strong>
					</span></a><br> <a style="padding-bottom: 20px;"
						href="/webNoticeContent/show/72"><span> 5、<strong>关于大花蕙兰订购安排的通知</strong></span></a><br>

					<a style="padding-bottom: 20px;" href="/webNoticeContent/show/71"><span>
							6、<strong>“网银充值”上线通知</strong>
					</span></a><br> <a style="padding-bottom: 20px;"
						href="/webNoticeContent/show/70"><span> 7、<strong>关于调整定价交易时间的通知</strong></span></a><br>

					<a style="padding-bottom: 20px;" href="/webNoticeContent/show/66"><span>
							8、<strong>航空运价表</strong>
					</span></a><br> <a style="padding-bottom: 20px;"
						href="/webNoticeContent/show/64"><span> 9、<strong>“花拍在线”试运行期间客服
								...</strong></span></a><br> <a style="padding-bottom: 20px;"
						href="/webNoticeContent/show/62"><span> 10、<strong>关于花拍在线试运作期间免除
								...</strong></span></a><br> <a style="padding-bottom: 20px;"
						href="/webNoticeContent/show/57"><span> 11、<strong>“花拍在线”试运行期间购买
								...</strong></span></a><br>

				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-primary" style="margin-bottom: 10px;">
				<div class="panel-body">
					<div
						style="text-align: center; height: 60px; line-height: 60px; color: #ce2745; font-size: 20px; font-weight: bold; margin: 10px 0 10px 0;">通知公告</div>


					<a href="/webNoticeContent/show/77"> <span style="color: black;">1、<strong>花拍在线”客户投诉规定</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2015-4-23<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
					<div
						style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;"></div>


					<a href="/webNoticeContent/show/76"> <span style="color: black;">2、<strong>“花拍在线”时间调整安排</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2015-3-3<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
					<div
						style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;"></div>


					<a href="/webNoticeContent/show/75"> <span style="color: black;">3、<strong>“花拍在线”物流装箱打包标准</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2015-6-5<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
					<div
						style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;"></div>


					<a href="/webNoticeContent/show/72"> <span style="color: black;">4、<strong>关于大花蕙兰订购安排的通知</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2015-1-20<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
					<div
						style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;"></div>


					<a href="/webNoticeContent/show/71"> <span style="color: black;">5、<strong>“网银充值”上线通知</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2015-3-4<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
					<div
						style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;"></div>


					<a href="/webNoticeContent/show/70"> <span style="color: black;">6、<strong>关于调整定价交易时间的通知</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2015-3-4<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
					<div
						style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;"></div>


					<a href="/webNoticeContent/show/66"> <span style="color: black;">7、<strong>航空运价表</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2015-1-20<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
					<div
						style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;"></div>


					<a href="/webNoticeContent/show/64"> <span style="color: black;">8、<strong>“花拍在线”试运行期间客服工作时间</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2015-3-4<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
					<div
						style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;"></div>


					<a href="/webNoticeContent/show/62"> <span style="color: black;">9、<strong>关于花拍在线试运作期间免除供购双方年费的通知</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-10-18<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
					<div
						style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;"></div>


					<a href="/webNoticeContent/show/57"> <span style="color: black;">10、<strong>“花拍在线”试运行期间购买商资金结算步骤</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-10-20<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
					<div
						style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;"></div>


					<a href="/webNoticeContent/show/56"> <span style="color: black;">11、<strong>“花拍在线”可代理发货城市</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-10-18<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
					<div
						style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;"></div>


					<a href="/webNoticeContent/show/55"> <span style="color: black;">12、<strong>“花拍在线”交易时间安排</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2015-4-30<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
					<div
						style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;"></div>


					<a href="/webNoticeContent/show/54"> <span style="color: black;">13、<strong>“花拍在线”上线时间安排</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-12-23<span class="glyphicon glyphicon-play"
								style="float: right; padding-right: 20px;"></span>
						</div>

					</a>
					<div
						style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;"></div>


					<a href="/webNoticeContent/show/53"> <span style="color: black;">14、<strong>泰国洋兰交易操作介绍</strong></span>
						<div style="color: #999999; padding-left: 20px;">
							2014-12-23<span class="glyphicon glyphicon-play"
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
					共1页（14条记录） <input
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