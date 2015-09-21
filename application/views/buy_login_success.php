
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
	        	$.ajax({ 
	            	url: "/timeSet/getStatus/", 
	            	type:'POST',
	            	data:{"date":new Date()},
	            	success: function(data){
	           		    ajaxobj=eval("("+data+")");  

						if (ajaxobj.status=='Y') {
							$('#statusName').text("离交易结束还剩");
							window.location.href="/buyer";
						} else {
							$('#statusName').text("离交易开始还剩");
							
						}
						timeLeft = ajaxobj.second;
						if (timeLeft <= 0) {
							document.getElementById("hour_show").innerHTML = '00:00:00';
							clearInterval(syncInterval);
							//return;
						} else {
							resetCountdown(timeLeft);
						}
	                 	           		
	              }});

			}
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
			<form class="form-inline" role="form" id="queryform" name="queryform" method="post" action="/buyer/index">
				<input type="hidden" id="breed" name="breed" value="" /> 
				<input type="text" class="form-control" id="search_brdPrdName" name="search_brdPrdName" value="" placeholder="品种" disabled="disabled"> 
				<input type="text" class="form-control" id="search_brdGrdCode" name="search_brdGrdCode" value="" placeholder="等级" disabled="disabled"> 
				<input type="text" class="form-control" id="search_brdName" name="search_brdName" value="" placeholder="品牌" disabled="disabled">
				<button type="submit" class="btn btn-default" disabled="disabled">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</form>
		</ol>
		<div class="row">
			<div class="col-md-2">
				<div class="panel panel-success">
					<div class="panel-heading">产品分类</div>
					<div class="panel-body">
						<li>所有</li>
						
							<li>玫瑰</li>
						
							<li>绣球花</li>
						
							<li>洋桔梗</li>
						
							<li>百合</li>
						
							<li>非洲菊</li>
						
							<li>香石竹</li>
						
							<li>满天星</li>
						
							<li>勿忘我</li>
						
							<li>芍药</li>
						
							<li>多头小菊</li>
						
							<li>一枝黄花</li>
						
							<li>帝王</li>
						
							<li>菊花</li>
						
							<li>彩星</li>
						
							<li>金鱼草</li>
						
							<li>马蹄莲</li>
						
							<li>染色花</li>
						
							<li>红掌</li>
						
							<li>配花</li>
						
							<li>盆花大花蕙兰</li>
						
							<li>石竹梅</li>
						
							<li>千日红</li>
						
							<li>小菊类</li>
						
							<li>郁金香</li>
						
							<li>大花蕙兰</li>
						
							<li>石斛兰</li>
						
							<li>情人草</li>
						
							<li>文心兰</li>
						
							<li>花毛茛</li>
						
							<li>雷丝</li>
						
							<li>雪柳</li>
						
							<li>腊梅</li>
						
							<li>香雪兰</li>
						
							<li>唐菖蒲</li>
						
							<li>朱顶红</li>
						
							<li>羽衣甘蓝</li>
						
							<li>紫罗兰</li>
						
							<li>切叶</li>
						
							<li>切枝</li>
						
							<li>切果</li>
						
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="panel panel-success">
					<div class="panel-heading">今日交易安排</div>
					<table class="table">
						<thead>
							<tr>
								<th>序号</th>
								<th>阶段</th>
								<th>开始时间</th>
							</tr>
						</thead>
						<tbody>
							
								<tr>
									<td>1</td>
									<td>交易开始</td>
									<td>07:00:00</td>
								</tr>
							
								<tr>
									<td>2</td>
									<td>供货录入</td>
									<td>07:30:00</td>
								</tr>
							
								<tr>
									<td>3</td>
									<td>定价销售</td>
									<td>11:00:00</td>
								</tr>
							
								<tr>
									<td>4</td>
									<td>销售结束</td>
									<td>15:00:00</td>
								</tr>
							
								<tr>
									<td>5</td>
									<td>交易结算</td>
									<td>06:00:00</td>
								</tr>
							
								<tr>
									<td>6</td>
									<td>交易结束</td>
									<td>06:30:00</td>
								</tr>
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-success">
					<div class="panel-heading">可用限额</div>
					<div class="panel-body">
						<ul>
							<li id="buyLeftLimit">0.00元</li>
							<br>
							<a href="/buyer/preBankFund" style="color: red;"><span class="glyphicon glyphicon-usd"></span>充值</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="/buyer/buyerLimit"><span class="glyphicon glyphicon-list-alt"></span>详情 </a>
						</ul>
					</div>
				</div>
				<div class="panel panel-success">
					<div class="panel-heading">交易信息</div>
	
					<table id="prictable" class="table">
						<thead>
							<tr>
								<th class="remove sorter-false">品种</th>
								<th class="remove sorter-false">等级</th>
								<th class="remove sorter-false">数量</th>
							</tr>
						</thead>
	
						<tbody>
	
							
						</tbody>
					</table>
					<br> 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/buyer/transaction"><span class="glyphicon glyphicon-list-alt"></span>详情 </a>
				</div>
			</div>
		</div>
	
	
		</div>
		
