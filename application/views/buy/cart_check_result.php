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
		<img class="img-responsive" src="/static/images/car3.png">
		<div class="alert alert-success" role="alert" style="margin-top: 100px;margin-bottom: 100px;	text-indent: 40px;font-size: 16px;font-weight: bold;color: #FF0000;text-align: center;"><span class="glyphicon glyphicon-gift">资金限额不足！</span></div>
		<ul class="pager">
		  <li class="previous"><a href="/index">&larr; 继续购物</a></li>
		  <li class="next"><a href="/buyer/cart">返回购物车 &rarr;</a></li>
		</ul>
	
	
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