<?php
if ($login_status) {
	require_once ("application/views/public/login_in.php");
} else {
	require_once ("application/views/public/login_out.php");
}
?>
<script type="text/javascript">
			var timeLeft;
			var syncInterval;
			$(function() {
				syncInterval = setInterval(syncTimeLeft, 300000);
				syncTimeLeft();
			});
		
			function resetCountdown(timeLeft) {
		
				window.setInterval(function() {
					var day = 0, hour = 0, minute = 0, second = 0;//时间默认值		
					if (timeLeft > 0) {
						day = Math.floor(timeLeft / (60 * 60 * 24));
						hour = Math.floor(timeLeft / (60 * 60)) - (day * 24);
						minute = Math.floor(timeLeft / 60) - (day * 24 * 60)
								- (hour * 60);
						second = Math.floor(timeLeft) - (day * 24 * 60 * 60)
								- (hour * 60 * 60) - (minute * 60);
					}
					if (hour <= 9)
						hour = '0' + hour;
					if (minute <= 9)
						minute = '0' + minute;
					if (second <= 9)
						second = '0' + second;
					document.getElementById("hour_show").innerHTML = '' + hour + ':'
							+ minute + ':' + second + '';
					timeLeft--;
					if (timeLeft == 0) {
						clearInterval(syncInterval);
						location.reload();
					}
				}, 1000);
		
			}
		
			function syncTimeLeft() {
				$
						.getJSON(
								'/timeSet/getStatues2?date=' + new Date(),
								function(data) {
									if (data[0]['statues']=='Y') {
										$('#statusName').text("离交易结束还剩");
									} else {
										$('#statusName').text("离交易开始还剩");
									}
									
									timeLeft = data[0]['second'];
									if (timeLeft <= 0) {
										document.getElementById("hour_show").innerHTML = '00:00:00';
										clearInterval(syncInterval);
										//return;
									} else {
										resetCountdown(timeLeft);
									}
								});
			}
		</script>

<link type="text/css" rel="stylesheet"
	href="/static/components/sdmenu/css/sdmenu.css" />
<script type="text/javascript">
			var myMenu;
			window.onload = function() {
				myMenu = new SDMenu("my_menu");
				myMenu.init();
			};
			function SDMenu(id) {
				if (!document.getElementById || !document.getElementsByTagName)
					return false;
				this.menu = document.getElementById(id);
				this.submenus = this.menu.getElementsByTagName("div");
				this.remember = true;
				this.speed = 3;
				this.markCurrent = true;
				this.oneSmOnly = false;
			}
			SDMenu.prototype.init = function() {
				var mainInstance = this;
				for (var i = 0; i < this.submenus.length; i++)
					this.submenus[i].getElementsByTagName("span")[0].onclick = function() {
						mainInstance.toggleMenu(this.parentNode);
					};
				if (this.markCurrent) {
					var links = this.menu.getElementsByTagName("a");
					for (var i = 0; i < links.length; i++)
						if (document.location.href.indexOf(links[i].href) >= 0) {
							links[i].className = "current";
							break;
						}
				}
				if (this.remember) {
					var regex = new RegExp("sdmenu_" + encodeURIComponent(this.menu.id)
							+ "=([01]+)");
					var match = regex.exec(document.cookie);
					if (match) {
						var states = match[1].split("");
						for (var i = 0; i < states.length; i++)
							this.submenus[i].className = (states[i] == 0 ? "collapsed"
									: "");
					}
				}
			};
			SDMenu.prototype.toggleMenu = function(submenu) {
				if (submenu.className == "collapsed")
					this.expandMenu(submenu);
				else
					this.collapseMenu(submenu);
			};
			SDMenu.prototype.expandMenu = function(submenu) {
				var fullHeight = submenu.getElementsByTagName("span")[0].offsetHeight;
				var links = submenu.getElementsByTagName("a");
				for (var i = 0; i < links.length; i++)
					fullHeight += links[i].offsetHeight;
				var moveBy = Math.round(this.speed * links.length);
		
				var mainInstance = this;
				var intId = setInterval(function() {
					var curHeight = submenu.offsetHeight;
					var newHeight = curHeight + moveBy;
					if (newHeight < fullHeight)
						submenu.style.height = newHeight + "px";
					else {
						clearInterval(intId);
						submenu.style.height = "";
						submenu.className = "";
						mainInstance.memorize();
					}
				}, 30);
				this.collapseOthers(submenu);
			};
			SDMenu.prototype.collapseMenu = function(submenu) {
				var minHeight = submenu.getElementsByTagName("span")[0].offsetHeight;
				var moveBy = Math.round(this.speed
						* submenu.getElementsByTagName("a").length);
				var mainInstance = this;
				var intId = setInterval(function() {
					var curHeight = submenu.offsetHeight;
					var newHeight = curHeight - moveBy;
					if (newHeight > minHeight)
						submenu.style.height = newHeight + "px";
					else {
						clearInterval(intId);
						submenu.style.height = "";
						submenu.className = "collapsed";
						mainInstance.memorize();
					}
				}, 30);
			};
			SDMenu.prototype.collapseOthers = function(submenu) {
				if (this.oneSmOnly) {
					for (var i = 0; i < this.submenus.length; i++)
						if (this.submenus[i] != submenu
								&& this.submenus[i].className != "collapsed")
							this.collapseMenu(this.submenus[i]);
				}
			};
			SDMenu.prototype.expandAll = function() {
				var oldOneSmOnly = this.oneSmOnly;
				this.oneSmOnly = false;
				for (var i = 0; i < this.submenus.length; i++)
					if (this.submenus[i].className == "collapsed")
						this.expandMenu(this.submenus[i]);
				this.oneSmOnly = oldOneSmOnly;
			};
			SDMenu.prototype.collapseAll = function() {
				for (var i = 0; i < this.submenus.length; i++)
					if (this.submenus[i].className != "collapsed")
						this.collapseMenu(this.submenus[i]);
			};
			SDMenu.prototype.memorize = function() {
				if (this.remember) {
					var states = new Array();
					for (var i = 0; i < this.submenus.length; i++)
						states.push(this.submenus[i].className == "collapsed" ? 0 : 1);
					var d = new Date();
					d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000));
					document.cookie = "sdmenu_" + encodeURIComponent(this.menu.id)
							+ "=" + states.join("") + "; expires=" + d.toGMTString()
							+ "; path=/";
				}
			};
		</script>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

<link type="text/css" rel="stylesheet"
	href="/static/components/extremetable/Styles/extremecomponents.css" />
<script type="text/javascript"
	src="/static/components/jquery/validation/jquery.validate.min.js"
	type="text/javascript"></script>
<script type="text/javascript"
	src="/static/components/jquery/validation/messages_zh.js"></script>
<script type="text/javascript"
	src="/static/components/jquery/validation/jquery-validate.bootstrap-tooltip.js" /></script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#queryform").validate({
			rules : {
				search_pbfId : {
					digits : true
				}
			}
		});
	})
	
	
function onload()
{
	var d = new Date();
	//给出定单日期
	fm.date.value = d.getYear() * 10000 + (1+d.getMonth()) * 100 + d.getDate();
	//给出不重复的定单号
	var s = d.getYear() * 366 + d.getMonth() * 31 + d.getDate();
	s = (s *24 + d.getHours() ) * 60 + d.getMinutes();
	s = s * 60 + d.getSeconds();
	fm.billno.value = s.toString().substring(1);
}
function test()
{
	 //window.location.href="netPay"
	 $.ajax({
				type : "GET",
				url : "/buyer/netPay/judgePay",
				data : {
				  date : $("#date").val(),
					billno : $("#billno").val(),
					date1 : new Date()
				},
				dataType: "json",
				async:false,
				success : function(result) {
					//alert(result[0]['success']);
				}
				
			});
			
	 window.location.reload();
}

	function repeatJudgePay(pbfDateTime,pbfFlowId,id) {
		$.ajax({
			type : "GET",
			url : "/buyer/netPay/judgePay",
			data : {
				date : pbfDateTime,
				billno : pbfFlowId,
				date1 : new Date()
			},
			dataType : "json",
			success : function(result) {
				if (result[0]['success'] == 'Y') {
					$("#pbfIsReturn" + id).html('充值成功');
					$("#operate" + id).html('');
				} else if (result[0]['success'] == 'E') {
					$("#pbfIsReturn" + id).html('充值错误');
					$("#operate" + id).html('');
				} else {
					//alert(result[0]['message']);
				}
			}
		});
		return false;
	}

function SubmitPayReq(obj)
{
	
	if(netPayForm.amount.value>0){
		var d = new Date();
		netPayForm.date.value = d.getFullYear()* 10000 + (1+d.getMonth()) * 100 + d.getDate();
		$.ajax({
				type : "GET",
				url : "/buyer/savePay",
				data : {
					amount : $("#amount").val(),
					date : new Date()
				},
				dataType: "json",
				async:false,
				success : function(result) {
					//alert(result[0]['billno']);
					//netPayForm.billno.value=result[0]['billno'];
					//netPayForm.date.value = result[0]['date'];
					//netPayForm.submit();
					//$("#netPayForm").submit();
					//$.post("https://netpay.cmbchina.com/netpayment/basehttp.dll?prepayc", "jsonp");
					//window.location.href="https://netpay.cmbchina.com/netpayment/basehttp.dll?prepayc?branchid=0871&cono=012427&date="+netPayForm.date.value+"&billno="+netPayForm.billno.value+"&amount="+netPayForm.amount.value;
					//window.open("https://netpay.cmbchina.com/netpayment/basehttp.dll?prepayc?branchid=0871&cono=012427&date="+netPayForm.date.value+"&billno="+netPayForm.billno.value+"&amount="+netPayForm.amount.value,"_blank");



					if(result['status']){
						//证明可以去充值
						alert('请ss登陆');
						window.open("/Order/jump_old_index/pay_id/"+result['pay_id']);
						
					}
					else{
						alert('请登陆');
						window.location.href="User/login";
					}
					$('#myModal').modal({show:true});
					
				}
			});
			
	
		//netPayForm.submit();
	//	$('#myModal').modal({show:true});
			
	}else{
		//alert("!!!");
		var d = new Date();
		//给出定单日期
		netPayForm.date.value = d.getFullYear()* 10000 + (1+d.getMonth()) * 100 + d.getDate();
		//给出不重复的定单号
		var s = d.getFullYear() * 366 + d.getMonth() * 31 + d.getDate();
		s = (s *24 + d.getHours() ) * 60 + d.getMinutes();
		s = s * 60 + d.getSeconds();
		netPayForm.billno.value = s.toString().substring(1);
	}
	
}
</script>



<ol class="breadcrumb">
	您现在的位置：
	<li><a href="/welcome">首页</a></li>
	<li><a href="/buyer/myflower">我的花拍</a></li>
	<li class="active">资金预授</li>
</ol>


<div class="row">
	<div class="col-md-3">
		<div class="panel panel-info">
			<div class="panel-heading" style="text-align: center;">
				<a href="/buyer/index">继续交易</a>
			</div>
		</div>
		<div class="panel panel-success">
			<div class="panel-heading">我的花拍</div>
			<div class="panel-body"
				style="padding: 0px 0px 36px 0px; text-align: center">

				<div id="my_menu" class="sdmenu">
					<div class="collapsed">
						<span>个人中心</span> <a href="/buyer/changePassword">密码重置</a> <a
							href="/buyer/ibuyer">信息修改</a>
					</div>
					<div>
						<span>交易中心</span> <a href="/buyer/netPay">网银充值</a> <a
							href="/buyer/drawBack">退款申请</a> <a href="/buyer/buyerLimit">限额查询</a>
						<a href="/buyer/transaction">交易明细</a> <a
							href="/buyer/rptBuyBuyTransactionT">交易汇总</a>
					</div>
					<div class="collapsed">
						<span>结算中心</span> <a href="/buyer/buyRestBill">其它应收应付</a> <a
							href="/buyer/totalBalance">结算查询</a>
					</div>
					<div class="collapsed">
						<span>历史查询</span> <a href="/buyer/rptBuyHisBuyTransactionD">交易明细</a>
						<a href="/buyer/rptBuyHisBuyTransactionT">交易汇总</a> <a
							href="/buyer/rptBuyHisLogdeListD">投诉明细</a> <a
							href="/buyer/rptBuyHisBuyPreBankFundD">充值明细</a> <a
							href="/buyer/rptBuyHisBalanceList">结算明细</a>
					</div>
					<div class="collapsed">
						<span>交易规则</span> <a
							href="/buyer/webInBuyerRuleForBuyerContent/我要购买">我要购买</a> <a
							href="/buyer/webInBuyerRuleForBuyerContent/物流方式">物流方式</a> <a
							href="/buyer/webInBuyerRuleForBuyerContent/支付及结算">支付及结算</a> <a
							href="/buyer/webInBuyerRuleForBuyerContent/质量及标准">质量及标准</a> <a
							href="/buyer/webInBuyerRuleForBuyerContent/我要投诉">我要投诉</a>
					</div>
					<div class="collapsed">
						<span>常见问题</span> <a
							href="/buyer/webInBuyerProblemForBuyerContent/购买问题">购买问题</a> <a
							href="/buyer/webInBuyerProblemForBuyerContent/物流问题">物流问题</a> <a
							href="/buyer/webInBuyerProblemForBuyerContent/支付问题">支付问题</a> <a
							href="/buyer/webInBuyerProblemForBuyerContent/系统操作问题">系统操作问题</a>
						<a href="/buyer/webInBuyerProblemForBuyerContent/其它问题">其它问题</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="col-md-9" style="padding-left: 0px;">
		<div class="panel panel-success">
			<div class="panel-heading">资金预授</div>

			<div class="operations">
				<div class="errorBox">

					<label id="resultMessage"></label>
				</div>
				<div class="operationquery">
					<form id="netPayForm" class="form-horizontal" role="form"
						action="https://netpay.cmbchina.com/netpayment/basehttp.dll?prepayc"
						target="_blank" method="post">
						<input name="branchid" value="0871" type="hidden"> <input
							name="cono" value="012427" type="hidden"> <input id="date"
							name="date" type="hidden"> <input id="billno" name="billno"
							type="hidden">

						<fieldset>
							<legend>银行预授</legend>
							<div class="input-group input-group-lg">
								<span class="input-group-addon">充值金额</span> <input type="text"
									id="amount" name="amount" class="form-control"
									placeholder="0.00"
									onkeyup="if(this.value==this.value2);if(this.value.search(/^\d*(?:\.\d{0,2})?$/)==-1)this.value=(this.value2)?this.value2:'';else this.value2=this.value;"
									onafterpaste="if(this.value==this.value2);if(this.value.search(/^\d*(?:\.\d{0,2})?$/)==-1)this.value=(this.value2)?this.value2:'';else this.value2=this.value;">
							</div>
						</fieldset>
					</form>
					<br>
					<button type="submit" class="btn btn-primary btn-lg btn-block"
						onclick="SubmitPayReq(this);">
						<span class="glyphicon glyphicon-ok">网银充值</span>
					</button>
					<!-- 模态框（Modal） -->
					<div class="modal fade" id="myModal" data-backdrop="static"
						tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
						aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"
										aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">
										<strong>网银充值</strong>
									</h4>
								</div>
								<div class="modal-body">
									<strong>请在新打开页面上完成网银充值，充值完成前请不要关闭或刷新此窗口！</strong>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default"
										data-dismiss="modal">关闭</button>
									<button type="button" class="btn btn-primary"
										data-dismiss="modal" onclick="test();">充值成功</button>
								</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal -->
					</div>
				</div>
			</div>
			<br> <span class="btn-block" style="text-align: center;">今日充值</span>
			<div class="table-responsive">
				<table id="myTable" class="table table-bordered">
					<tr>
						<th>序号</th>
						<th>充值订单号</th>
						<th>充值金额</th>
						<th>充值时间</th>
						<th>充值状态</th>
						<th>充值来源</th>
						<th>操作</th>
					</tr>

				<?php
				foreach ( $data as $key => $row ) {
					echo '<tr><th>' . ($key + 1) . '</th>';
					echo '<th>' . $row->id . '</th>';
					echo '<th>' . $row->value . '</th>';
					echo '<th>' . $row->time . '</th>';
					echo '<th>' . $row->status . '</th>';
					echo '<th>' . $row->type . '</th>';
					if ($row->status) {
						echo '<th> 支付完成' . '</th></tr>';
					} else {
						echo '<th> <a href="http://localhost:10000/Order/jump_old_index/pay_id/' . $row->id . '">支付</a></th></tr>';
					}
				}
				?>
	
						</table>
			</div>
		</div>
	</div>
</div>
</div>

<?php
require_once ("application/views/public/footer.php");
?>