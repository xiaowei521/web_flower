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
	<li class="active">交易规则</li>
</ol>
<div class="row">
	<div class="col-md-3">
		<div class="panel panel-primary" style="margin-bottom: 10px;">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;&nbsp;交易规则
			</div>
			<div class="panel-body">
				<a href="/webRuleContent"> <span style="padding-bottom: 10px;"><strong>
							1、全部</strong></span>
				</a><br> <a href="/webRuleContent?secondColumn=平台介绍"> <span
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
					style="padding-bottom: 10px;"><strong> 9、常见问题</strong></span> <span
					class="glyphicon glyphicon-play"></span></a><br>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" style="margin-bottom: 10px;">
			<div class="panel-body">
				<div
					style="overflow: hidden; border-bottom: 2px dotted #ce2745; margin: 10px 0 10px 0;">

					<div
						style="font-family: 微软雅黑; font-size: 22px; font-weight: normal; color: black; overflow: hidden; text-align: center;">其他问题</div>
					<div
						style="border-bottom: solid 1px #CCC; color: #999; padding: 10px 0; text-align: center;">
						<small>2014-10-14 13:25:59.663</small>
					</div>
					<p>
					
					
					<p>
						<br />
					</p>
					<p>
						<span style="font-size: 19px; font-family: 宋体">1</span><span
							style="font-size: 19px; font-family: 宋体">、如果我有问题或建议我该如何向你们反馈？</span>
					</p>
					<p>
						<span style="font-size: 19px; font-family: 宋体">答：请您将姓名、联系方式及需要反馈的信息填写清楚，以邮件的方式发送至
							15947617098@163.com，或者通过客服QQ反馈给我们。我们会尽快为您处理问题。谢谢！</span>
					</p>
					<p>
						<span style="font-size: 19px; font-family: 宋体">2</span><span
							style="font-size: 19px; font-family: 宋体">、花拍在线客服服务的工作时间是？</span>
					</p>
					<p>
						<span style="font-size: 19px; font-family: 宋体">答：电话客服：早上09：00——下午17:00</span>
					</p>
					<p style="text-indent: 37px">
						<span style="font-size: 19px; font-family: 宋体">QQ</span><span
							style="font-size: 19px; font-family: 宋体">客服： 早上09：00——下午17:00</span>
					</p>
					<p style="text-indent: 37px">
						<span style="font-size: 19px; font-family: 宋体">其他时段你可以通过email联系我们，联系邮件：<a
							href="mailto:kifaonline@126.com">15947617098@163.com</a>。
						</span>
					</p>
					<p>
						<br />
					</p>
					</p>

				</div>
				<button type="button" class="btn btn-default"
					onclick="window.history.go(-1)">
					<span class="glyphicon glyphicon-share-alt">返回</span>
				</button>
			</div>
		</div>
	</div>
</div>


</div>

<?php 
require_once("application/views/public/footer.php"); 
?>