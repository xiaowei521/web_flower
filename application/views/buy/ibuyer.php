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

<script type="text/javascript"
	src="/static/components/jquery/validation/jquery.validate.min.js"
	type="text/javascript"></script>
<script type="text/javascript"
	src="/static/components/jquery/validation/messages_zh.js"></script>
<script type="text/javascript"
	src="/static/components/jquery/validation/jquery-validate.bootstrap-tooltip.js" /></script>
<script type="text/javascript">
	$(document).ready(function() {
		jQuery.validator.addMethod("chrnum", function(value, element) {
			return this.optional(element) || (/^([a-zA-Z0-9]+)$/.test(value));
		}, "只能为字母与数字");

		$("#buyer").validate({
			rules : {
				id : {
					required : true,
					chrnum : true
				},
				buyPickPsw : {
					required : true,
					maxlength : 20
				},
				reBuyPickPsw : {
					required : true,
					equalTo : "#buyPickPsw"
				},
				buyConName : {
					required : true,
					maxlength : 16
				},
				buyConPid : {
					required : true,
					minlength : 18,
					maxlength : 18
				},
				buyConTel : {
					required : true,
					maxlength : 16
				},
				buyConMobile : {
					maxlength : 30
				},
				buyMinInfo : {
					maxlength : 30
				},
				buyConQq : {
					maxlength : 20
				},
				buyConEmail : {
					required : true,
					email : true,
					maxlength : 30
				},
				buyAddress : {
					required : true,
					maxlength : 60
				},
				buyZip : {
					digits : true,
					maxlength : 6
				},
				buyIsShip : {
					required : true,
					maxlength : 1
				},
				buyShipAddress : {
					maxlength : 80
				}
			}
		});
	});
	
	function getConCity() {
			$.getJSON("/buyer/ibuyer/getConCity", {
				province : $("#conProvince").val(),
				date : new Date()
			}, function(result) {
				if (result[0]['success'] == 'Y') {
					var conCity = document.getElementById("conCity");
					conCity.length = 0;
					var cityAreas = result[0]["cityAreas"];
					conCity.options.add(new Option("请选择州市", ""));
					for (var i = 0; i < cityAreas.length; i++) {
						conCity.options.add(new Option(cityAreas[i]["asName"],
								cityAreas[i]["asCode"]));
					}
				} 
			});
	};
</script>

		<ol class="breadcrumb">
			您现在的位置：
			<li><a href="/welcome">首页</a></li>
			<li><a href="/buyer/myflower">我的花拍</a></li>
			<li class="active">信息修改</li>
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
					<div class="panel-heading">信息修改</div>



					<br>
					<form id="buyer" name="buyer" class="form-horizontal"
						action="/buyer/ibuyer/update" method="post">
						<fieldset>
							<legend>购买商基本信息</legend>
							<div class="form-group">
								<label for="inputid" class="col-md-2 control-label">登录账号*</label>
								<div class="col-md-4">
									<input type="text" class="form-control" id="id" name="id"
										value="weilanchuxia"
										onblur="this.value = this.value.toLowerCase();"
										readonly="readonly" placeholder="6-20位">
								</div>
								<label for="inputid" class="col-md-2 control-label">店铺名称*</label>
								<div class="col-md-4">
									<input type="text" class="form-control" id="buyName"
										name="buyName" value="微蓝初夏" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="inputbuyPickPsw" class="col-md-2 control-label">提货密码*</label>
								<div class="col-md-4">
									<input type="password" class="form-control" id="buyPickPsw"
										name="buyPickPsw" value="880705" placeholder="">
								</div>
								<label for="inputreBuyPickPsw" class="col-md-2 control-label">确认密码*</label>
								<div class="col-md-4">
									<input type="password" class="form-control" id="reBuyPickPsw"
										name="reBuyPickPsw" value="880705" placeholder="">
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>联系人信息</legend>
							<div class="form-group">
								<label for="inputbuyConName" class="col-md-2 control-label">姓名*</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="buyConName"
										name="buyConName" value="黎安亮" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="inputbuyConPid" class="col-md-2 control-label">身份证号*</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="buyConPid"
										name="buyConPid" value="522121198804063225" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="inputbuyConTel" class="col-md-2 control-label">电话*</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="buyConTel"
										name="buyConTel" value="18275498931" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="inputbuyConMobile" class="col-md-2 control-label">备用电话</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="buyConMobile"
										name="buyConMobile" value="" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="inputbuyConEmail" class="col-md-2 control-label">Email*</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="buyConEmail"
										name="buyConEmail" value="ecoutter@gmail.com" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="inputbuyConQq" class="col-md-2 control-label">微信</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="buyMinInfo"
										name="buyMinInfo" value="" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="inputbuyConQq" class="col-md-2 control-label">QQ</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="buyConQq"
										name="buyConQq" value="" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="inputbuyAddress" class="col-md-2 control-label">地址*</label>
								<div class="col-md-2">
									<select name="conProvince" id="conProvince"
										class="form-control" onchange="getConCity();">
										<option value="">请选择省份</option>

										<option value="11">北京</option>

										<option value="12">天津</option>

										<option value="13">河北省</option>

										<option value="14">山西省</option>

										<option value="15">内蒙古自治区</option>

										<option value="21">辽宁省</option>

										<option value="22">吉林省</option>

										<option value="23">黑龙江省</option>

										<option value="31">上海市</option>

										<option value="32">江苏省</option>

										<option value="33">浙江省</option>

										<option value="34">安徽省</option>

										<option value="35">福建省</option>

										<option value="36">江西省</option>

										<option value="37">山东省</option>

										<option value="41">河南省</option>

										<option value="42">湖北省</option>

										<option value="43">湖南省</option>

										<option value="44">广东省</option>

										<option value="45">广西壮族自治区</option>

										<option value="46">海南省</option>

										<option value="50">重庆市</option>

										<option value="51">四川省</option>

										<option value="52" selected>贵州省</option>

										<option value="53">云南省</option>

										<option value="54">西藏自治区</option>

										<option value="61">陕西省</option>

										<option value="62">甘肃省</option>

										<option value="63">青海省</option>

										<option value="64">宁夏回族自治区</option>

										<option value="65">新疆维吾尔自治区</option>

									</select>
								</div>
								<div class="col-md-2">
									<select name="conCity" id="conCity" class="form-control">
										<option value="">请选择州市</option>

										<option value="5226">黔东南苗族侗族自治州</option>

										<option value="5222">铜仁地区</option>

										<option value="5201">贵阳市</option>

										<option value="5224">毕节地区</option>

										<option value="5203" selected>遵义市</option>

										<option value="5204">安顺市</option>

										<option value="5202">六盘水市</option>

										<option value="5223">黔西南布依族苗族自治州</option>

										<option value="5227">黔南布依族苗族自治州</option>

									</select>
								</div>
								<div class="col-md-6">
									<input type="text" class="form-control" id="buyAddress"
										name="buyAddress" value="中华南路" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="inputbuyZip" class="col-md-2 control-label">邮编</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="buyZip"
										name="buyZip" value="" placeholder="">
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>代理发货信息</legend>
							<div class="form-group">
								<label for="buyIsShip" class="col-md-2 control-label">是否代理</label>
								<div class="col-md-10">
									<select name="buyIsShip" id="buyIsShip" class="form-control"
										disabled="disabled">
										<option value="">是否代理</option>
										<option value="N">不需要</option>
										<option value="Y" selected>需要</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="inputid" class="col-md-2 control-label">发货地址</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="province"
										name="province" value="贵州省" disabled="disabled">
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control" id="city" name="city"
										value="贵阳市" disabled="disabled">
								</div>
								<div class="col-md-6">
									<input type="text" class="form-control" id="buyShipAddress"
										name="buyShipAddress" value="火车站" placeholder="详细地址"
										disabled="disabled">
								</div>
							</div>
						</fieldset>

						<fieldset>
							<legend>退款信息</legend>
							<div class="form-group">
								<label for="inputbuyZip" class="col-md-2 control-label">开户行</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="buyBankCode"
										name="buyBankCode" value="" placeholder="">
								</div>
							</div>

							<div class="form-group">
								<label for="inputbuyZip" class="col-md-2 control-label">账户名</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="buyBankAccName"
										name="buyBankAccName" value="" placeholder="">
								</div>
							</div>

							<div class="form-group">
								<label for="inputbuyZip" class="col-md-2 control-label">账号</label>
								<div class="col-md-10">
									<input type="text" class="form-control" id="buyBankAccount"
										name="buyBankAccount" value="" placeholder="">
								</div>
							</div>
						</fieldset>

						<div class="row">
							<span class="col-md-4"></span>

							<button type="submit" class="btn btn-primary btn-lg col-md-4">
								<span class="glyphicon glyphicon-ok">保存</span>
							</button>
							<span class="col-md-4"></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
	require_once ("application/views/public/footer.php");
	?>