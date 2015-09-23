<!DOCTYPE HTML>






<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="description" content="昆明国际花卉拍卖交易中心:花拍在线 ">
		<meta name="author" content="zgh">
		<link rel="icon" href="/static/images/favicon.ico">
		
		<title>花拍在线 </title>
		
		<!-- Bootstrap core CSS -->
	  <link href="/static/components/bootstrap-3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="/static/css/sitemesh/decorator.css" rel="stylesheet">
		<script src="/static/components/jquery/jquery.js"></script>
		
		
		
		<link href="/static/css/sitemesh/decorator-in.css" rel="stylesheet">
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
		
		<link type="text/css" rel="stylesheet" href="/static/components/sdmenu/css/sdmenu.css" />
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
		
		<script type="text/javascript" src="/static/components/jquery/validation/jquery.validate.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="/static/components/jquery/validation/messages_zh.js"></script>
		<script type="text/javascript" src="/static/components/jquery/validation/jquery-validate.bootstrap-tooltip.js" /></script>
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
							minlength : 6,
							maxlength : 20,
							equalTo : "#newpswd"
						}
					}
				});
			});
		</script>
		
	
	
	
	
		
	</head>
	<body>

	
		<div class="container">
			
	
		<div class="logo">
			<a href="/default"><img src="/static/images/logo.png" style=" width: 200px; height: 45px; padding-left: 10px; margin-top: 18px;" border="0" /></a>
			<img src="/static/images/wx.jpg" style=" width: 80px; height: 80px; float:right;margin-top:6px;margin-right: 6px;" border="0" />
			<div class="time">
				<label id=statusName></label>
				<br>
				<strong id="hour_show" style="background:#C71C60;padding: 2px 4px 2px 4px;border-radius:5px;"></strong><br>
				
			</div>
		</div>
		

		<ol class="breadcrumb">
			您现在的位置：
		  <li><a href="/default">首页</a></li>
		  <li><a href="/myKIFAOnline">我的花拍</a></li>
		  <li class="active">密码重置</li>
		</ol>
		
		
		<div class="row">
			<div class="col-md-3">
				<div class="panel panel-info">
					<div class="panel-heading" style=" text-align: center; "><a href="/index">继续交易</a></div>
				</div>
				<div class="panel panel-success">
					<div class="panel-heading">我的花拍</div>
					<div class="panel-body" style="padding: 0px 0px 36px 0px;text-align:center">
						
							<div id="my_menu" class="sdmenu">
								<div class="collapsed">
									<span>个人中心</span> 
									<a href="/buyer/changePassword">密码重置</a>
									<a href="/buyer/ibuyer">信息修改</a>
								</div>
								<div>
									<span>交易中心</span> 
									<a href="/buyer/netPay">网银充值</a>
									<a href="/buyer/drawBack">退款申请</a>
									<a href="/buyer/buyerLimit">限额查询</a> 
									<a href="/buyer/transaction">交易明细</a>
									<a href="/buyer/rptBuyBuyTransactionT">交易汇总</a>
								</div>
								<div class="collapsed">
									<span>结算中心</span> 
									<a href="/buyer/buyRestBill">其它应收应付</a> 
									<a href="/buyer/totalBalance">结算查询</a>
								</div>
								<div class="collapsed">
									<span>历史查询</span> 

									<a href="/buyer/rptBuyHisBuyTransactionD">交易明细</a>
									<a href="/buyer/rptBuyHisBuyTransactionT">交易汇总</a>									
									<a href="/buyer/rptBuyHisLogdeListD">投诉明细</a>
									<a href="/buyer/rptBuyHisBuyPreBankFundD">充值明细</a>
									<a href="/buyer/rptBuyHisBalanceList">结算明细</a>
								</div>
								<div class="collapsed">
									<span>交易规则</span> 
									<a href="/buyer/webInBuyerRuleForBuyerContent/我要购买">我要购买</a>
									<a href="/buyer/webInBuyerRuleForBuyerContent/物流方式">物流方式</a>									
									<a href="/buyer/webInBuyerRuleForBuyerContent/支付及结算">支付及结算</a>
									<a href="/buyer/webInBuyerRuleForBuyerContent/质量及标准">质量及标准</a>
									<a href="/buyer/webInBuyerRuleForBuyerContent/我要投诉">我要投诉</a>
								</div>
								<div class="collapsed">
									<span>常见问题</span> 
									<a href="/buyer/webInBuyerProblemForBuyerContent/购买问题">购买问题</a>
									<a href="/buyer/webInBuyerProblemForBuyerContent/物流问题">物流问题</a>									
									<a href="/buyer/webInBuyerProblemForBuyerContent/支付问题">支付问题</a>
									<a href="/buyer/webInBuyerProblemForBuyerContent/系统操作问题">系统操作问题</a>
									<a href="/buyer/webInBuyerProblemForBuyerContent/其它问题">其它问题</a>
								</div>
							</div>
							
					</div>			
				</div>
			</div>
			<div class="col-md-9" style=" padding-left: 0px; ">
				<div class="panel panel-success">
					<div class="panel-heading">密码重置</div>
					
		
		<form id="user" name="user" action="/buyer/changePsw" method="post">
			<fieldset>
				<legend>原始信息</legend>
				<div class="input-group">
				  <span class="input-group-addon">原始密码</span>
				  <input type="password" id="oldpswd" name="oldpswd" class="form-control" placeholder="原始密码">
				</div>
			</fieldset>
			<br>
			<fieldset>
				<legend>变更信息</legend>
				<div class="input-group">
				  <span class="input-group-addon">变更密码</span>
				  <input type="password" id="newpswd" name="newpswd" class="form-control" placeholder="变更密码">
				</div>
				<div class="input-group">
				  <span class="input-group-addon">确认密码</span>
				  <input type="password" id="repeatpswd" name="repeatpswd" class="form-control" placeholder="确认密码">
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
		
	