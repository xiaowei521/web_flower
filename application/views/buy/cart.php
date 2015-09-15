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
		
	<!-- Tablesorter: required -->
	<link rel="stylesheet" href="/static/components/jquery/Plugin/tablesorter-v2.17.4/css/theme.ice.css">
	<script src="/static/components/jquery/Plugin/tablesorter-v2.17.4/js/jquery.tablesorter.js"></script>

<!-- render: required -->
<link rel="stylesheet" type="text/css" href="/static/components/render/css/default.include.css" media="all" />
<link rel="stylesheet" id="spi-render-css-css" href="/static/components/render/css/render.css?ver=3.5.2" type="text/css" media="all" />

<script type="text/javascript">
	$(function() {
		$("#myTable").tablesorter({
			theme : 'ice'
		});
	});

	function removeFromCart(r, id) {
		var root = r.parentNode;
		var allRows = root.getElementsByTagName('tr');
		root.removeChild(r);

		$.ajax({
			type : "GET",
			url : "/buyer/fixPrice/removeFromCart",
			data : {
				fixBrdId : id,
				date : new Date()
			},
			//dataType: "json",
			success : function(data) {
				$("#total").html(data);
				alert("数据删除成功");
			}
		});
	}

	function changeFromCart(input_Q, id) {
		$.ajax({
			type : "GET",
			url : "/buyer/fixPrice/changeFromCart",
			data : {
				fixBrdId : id,
				quantity : $("#" + input_Q).val(),
				date : new Date()
			},
			dataType : "json",
			success : function(result) {

				//if ($("#" + input_Q).val() == result)
				//	alert("数据修改成功");
				//else
				//	alert("数据修改不成功");
				//$("#" + input_Q).val(result);

				if (result[0]['success'] == 'Y') {
					$("#total").html(result[0]['total']);
					$("#tempTotalFee" + id).html(result[0]['tempTotalFee']);
					$("#" + input_Q).val(result[0]['quantity']);
				} else {
					$("#" + input_Q).val(result[0]['quantity']);
				}

			}
		});

	}
</script>

	
		
	</head>
	<body>
		<div class="header">
			<div class="container">
				<div class="row">
					
				  
					
					
						<div class="col-md-6">
							<div style="float: left;">
								weilanchuxia
								(901071)您好，欢迎光临花拍在线[<a href="/j_spring_security_logout">退出</a>]
							</div>
						</div>
						<div class="col-md-6">
							<div style="float: right;">
								
										<a href="/buyer/cart"><span class="glyphicon glyphicon-shopping-cart"></span>购物车</a>&nbsp;|&nbsp;
								
								<a href="/myKIFAOnline">我的花拍</a>&nbsp;|&nbsp; <a href="/default">返回首页</a>&nbsp;|&nbsp;<a href="http://www.kifa.net.cn">KIFA官网</a>&nbsp;|&nbsp;<a href="/webOtherContentForCommon">联系我们</a>
							</div>
						</div>
					
				</div>
			</div>
		</div>
	
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
		<li class="active">购物车</li>
	</ol>
	<img class="img-responsive" src="/static/images/car1.png">
	<div class="table-responsive">
		<table id="myTable" class="table  table-bordered">
			<thead>
				<tr>
					<td>品类</td>
					<td>品牌</td>
					<td>品种</td>
					<td  class="remove sorter-false">图</td>
					<td>等级</td>
					<td>价格</td>
					<td>数量</td>
					
					<td class="remove sorter-false">购买数量</td>
					<td>订单金额(元)</td>
					<td class="remove sorter-false">删除</td>
				</tr>
			</thead>
			<tbody>
				
					<tr>
						<td align="center">百合</td>
						<td align="center" style="font-size:12px">昆明花意浓花卉</td>
						<td valign="middle" align="left" style="padding-bottom: 0;padding-right: 0;">
							<span style="font-size:12px">木门 3</span>
						</td>
						<td align="center">
							<div id="sit-simple"><a target="_blant" class="sit-preview" href="/static/images/product/3023A.jpg"><img src="/static/images/product/3023A.jpg" data-preview-url="/static/images/product/3023A.jpg" width="20" height="20" border="0" /></a></div>
						</td>
						<td align="center">A</td>
						<td align="center">6.20元/枝</td>
						
						<td align="center"><label style="color: red;">10</label>×20枝</td>
						

						<td align="left"><input id="input0" name="text" type="text" value="" size="5" style="color: red;"
							onblur="changeFromCart('input0','150915000074');" onchange="changeFromCart('input0','150915000074');"
							onKeyUp="value=value.replace(/\D/g,'')" onafterpaste="value=value.replace(/\D/g,'')" />×20枝</td>

						<td align="center" style="font-size:12px" id="tempTotalFee150915000074">0</td>

						<td align="center"><A style="cursor:hand" onclick="removeFromCart(this.parentNode.parentNode,'150915000074');"><span class="glyphicon glyphicon-trash"></span></A></td>
					</tr>
				
					<tr>
						<td align="center">百合</td>
						<td align="center" style="font-size:12px">昆明花意浓花卉</td>
						<td valign="middle" align="left" style="padding-bottom: 0;padding-right: 0;">
							<span style="font-size:12px">木门 多</span>
						</td>
						<td align="center">
							<div id="sit-simple"><a target="_blant" class="sit-preview" href="/static/images/product/3024A.jpg"><img src="/static/images/product/3024A.jpg" data-preview-url="/static/images/product/3024A.jpg" width="20" height="20" border="0" /></a></div>
						</td>
						<td align="center">A</td>
						<td align="center">8.20元/枝</td>
						
						<td align="center"><label style="color: red;">10</label>×20枝</td>
						

						<td align="left"><input id="input1" name="text" type="text" value="" size="5" style="color: red;"
							onblur="changeFromCart('input1','150915000075');" onchange="changeFromCart('input1','150915000075');"
							onKeyUp="value=value.replace(/\D/g,'')" onafterpaste="value=value.replace(/\D/g,'')" />×20枝</td>

						<td align="center" style="font-size:12px" id="tempTotalFee150915000075">0</td>

						<td align="center"><A style="cursor:hand" onclick="removeFromCart(this.parentNode.parentNode,'150915000075');"><span class="glyphicon glyphicon-trash"></span></A></td>
					</tr>
				
				<tr>
					<td colspan=11><label id="total" style="float: right;">商品总计2批,预计订单金额0</label></td>
				</tr>
			</tbody>
		</table>
	</div>

	<ul class="pager">
	  <li class="previous"><a href="/index">&larr; 继续购物</a></li>
	  <li class="next "><a href="/buyer/fixPrice/checkout">确认订单 &rarr;</a></li>
	</ul>
	<script type="text/javascript">
	    jQuery(document).ready(function() {
	        jQuery("#sit-simple .sit-preview").smartImageTooltip({previewTemplate: "simple", imageWidth: "480px"});
	        jQuery("#sit-caption .sit-preview").smartImageTooltip({previewTemplate: "caption", scaleDesktop: 70, scaleMobile: 55});
	        jQuery("#sit-envato .sit-preview").smartImageTooltip({previewTemplate: "envato", imageWidth: "500px"});
	        jQuery("#sit-envato-link .sit-preview").smartImageTooltip({previewTemplate: "envato"});
	        jQuery("#sit-nolink img.sit-thumb").smartImageTooltip({previewTemplate: "caption", imageWidth: "480px"});
	    });
	</script>
	<script type="text/javascript" src="/static/components/render/js/default.include.js"></script>

	
		</div>
		
		<div class="footer">
			<div class="container">
				<div style="font-size: 12px; line-height: 15px; text-align: center; color: #666666;">
					公司地址：云南 昆明 斗南 | 邮编：650500 | 客服热线：0871-66200029<br /> Copyright@2014-2018 kifaonline.com.cn All Rights Reserved <br /> 电子商务平台KIFA花拍在线网站备案 滇ICP备滇ICP备53012103402015号
				<br>
				<script type="text/javascript">
					var cnzz_protocol = (("https:" == document.location.protocol) ? " https://"
							: " http://");
					document
							.write(unescape("%3Cspan id='cnzz_stat_icon_1252972050'%3E%3C/span%3E%3Cscript src='"
									+ cnzz_protocol
									+ "s19.cnzz.com/z_stat.php%3Fid%3D1252972050%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));
				</script>
			</div>
			</div>
		</div>
		<!-- Bootstrap core JavaScript-->
    <script src="/static/components/bootstrap-3.2.0/js/bootstrap.min.js"></script>

	
</body>
</html>