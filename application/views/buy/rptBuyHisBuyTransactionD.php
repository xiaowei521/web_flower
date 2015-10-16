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


<link href="/static/components/jqueryui/Styles/datepicker.css"
	type="text/css" rel="stylesheet" />
<link type="text/css" rel="stylesheet"
	href="/static/components/extremetable/Styles/extremecomponents.css" />
<script
	src="/static/components/jqueryui/Scripts/jquery-ui-1.10.3.custom.min.js"
	type="text/javascript"></script>
<!-- Tablesorter: required -->
<link rel="stylesheet"
	href="/static/components/jquery/Plugin/tablesorter-v2.17.4/css/theme.blue.css" />
<script
	src="/static/components/jquery/Plugin/tablesorter-v2.17.4/js/jquery.tablesorter.js"></script>
<script
	src="/static/components/jquery/Plugin/tablesorter-v2.17.4/js/widgets/widget-math.js"></script>

<script type="text/javascript">
	$(function() {
		$(".datepicker").datepicker(
				{
					showMonthAfterYear : true,
					monthNamesShort : [ '一月', '二月', '三月', '四月', '五月', '六月',
							'七月', '八月', '九月', '十月', '十一月', '十二月' ],
					dayNamesMin : [ '日', '一', '二', '三', '四', '五', '六' ],
					dateFormat : "yy-mm-dd",
					changeYear : true,
					changeMonth : true
				});

		$('#buyerTraHisT')
				.tablesorter(
						{
							theme : 'blue',
							delayInit : true,
							widgets : [ 'zebra', 'filter', 'math' ],
							widgetOptions : {
								math_data : 'math', // data-math attribute
								math_ignore : [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ,12, 16],
								//math_mask : '#,##0.##',
								math_complete : function($cell, wo, result,
										value, arry) {
									var txt = '<span class="align-decimal">'
											+ result + '</span>';
									if ($cell.attr('data-math') === 'all-sum') {
										// when the "all-sum" is processed, add a count to the end
										return txt + ' (Sum of ' + arry.length
												+ ' cells)';
									}
									return txt;
								}
							}
						});
	});
</script>

		<ol class="breadcrumb">
			您现在的位置：
			<li><a href="/welcome">首页</a></li>
			<li><a href="/buyer/myflower">我的花拍</a></li>
			<li class="active">交易明细</li>
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
					<div class="panel-heading">交易明细</div>

					<form class="form-inline" role="form" id="queryform"
						name="queryform" method="post"
						action="/buyer/rptBuyHisBuyTransactionD/query">
						<input type="text" class="form-control" id="PrdCode"
							name="PrdCode" value="" placeholder="品种"> <input type="text"
							class="form-control" id="GrdCode" name="GrdCode" value=""
							placeholder="等级"> <input type="text"
							class="form-control datepicker" id="BeginDate" name="BeginDate"
							value="" size="10" required placeholder="起始日期" /> <input
							type="text" class="form-control datepicker" id="EndDate"
							name="EndDate" value="" size="10" required placeholder="终止日期" />
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</form>
					<br>
					<div class="table-responsive">
						<table id="buyerTraHisT">
							<thead>
								<tr>
									<th class="remove sorter-false">序号</th>
									<th class="remove sorter-false">日期</th>
									<th class="remove sorter-false">交易序号</th>
									<th class="remove sorter-false">供货单号</th>
									<th class="remove sorter-false">品类</th>
									<th class="remove sorter-false">品种</th>
									<th class="remove sorter-false">等级</th>
									<th class="remove sorter-false">品牌</th>

									<th class="remove sorter-false">成交数量</th>
									<th class="remove sorter-false">包装描述</th>

									<th class="remove sorter-false">价格</th>
									<th class="remove sorter-false">成交金额</th>
									<th class="remove sorter-false">佣金</th>
									<th class="remove sorter-false">划账金额</th>

									<th class="remove sorter-false">成交类型</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>合计</th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>

									<th></th>
									<th data-math="col-sum" data-math-mask="##0.00">0</th>
									<th data-math="col-sum" data-math-mask="##0.00">0</th>
									<th data-math="col-sum" data-math-mask="##0.00">0</th>

									<th></th>
								</tr>
							</tfoot>
							<tbody>

							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>


	</div>
		

<?php
require_once ("application/views/public/footer.php"); 
?>