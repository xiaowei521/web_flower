<?php
if ($login_status) {
	require_once ("application/views/public/login_in.php");
} else {
	require_once ("application/views/public/login_out.php");
}
?>

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
<!-- Tablesorter: required -->
<link rel="stylesheet"
	href="/static/components/jquery/Plugin/tablesorter-v2.17.4/css/theme.ice.css" />
<script
	src="/static/components/jquery/Plugin/tablesorter-v2.17.4/js/jquery.tablesorter.js"></script>
<!-- render: required -->
<link rel="stylesheet" type="text/css"
	href="/static/components/render/css/default.include.css" media="all" />
<link rel="stylesheet" id="spi-render-css-css"
	href="/static/components/render/css/render.css" type="text/css"
	media="all" />

<script type="text/javascript">
	$(function() {

		$("#myTable").tablesorter({
			theme : 'ice'
});
});

	function addtocar(id, quantity) {
	$.ajax({
			type : "POST",
			url : "/buyer/addToCart",
			data : {
			fixBrdId : id,
			quantity : $("#" + quantity).val()
			},
			//dataType: "json",
			success : function(data) {
				//$('#resText').empty();
				//$('#resText').html(data);
				alert(data);
			}
			});
			}

			function addtocarD(id) {				
			$.ajax({
				type : "POST",
				url : "/buyer/addToCartD",
				data : {
				fixBrdId : id, // 物品的id
				uid : "用户id",
				date : new Date()
			},
			dataType: "json",
			success : function(data) {
				    if(data.stauts == 1){
						alert(data.info);
				    }
				    else{
					    window.location.href="http://www.novpace.com/User/login";
				    }
				    
			},
			error : function (XMLHttpRequest, textStatus, errorThrown) {
					alert('请前往登陆 (三秒后自动跳转)');
					setTimeout(func,"3000");//三秒后执行
					window.location.href="http://www.novpace.com/User/login";
				
			}
		});
		//return false;
		};
		function func(){
		}

			function fixPrice(id) {
			$.ajax({
					type : "GET",
					url : "/buyer/saveFixPrice",
					data : {
					fixBrdId : id,
					quantity : $("#quantity" + id).val(),
					date : new Date()
					},
					dataType : "json",
			success : function(result) {
			if (result[0]['success'] == 'Y') {
					$("#quantity" + id).val('');
					$("#buyLeftLimit").html(result[0]['buyLeftLimit']);
					$("#leftquantity" + id).html(result[0]['leftquantity']);
					if ($("#fixTable").find('tr').length == 21)
					$("#fixTable").find('tbody>tr:last').remove();
							var $row = result[0]['row'];

							$("#fixTable").find('tbody').prepend($row).trigger(
									'addRows', [ $row ]);

			} else if (result[0]['success'] == 'N') {
			$("#buyLeftLimit").html(result[0]['buyLeftLimit']);
			$("#leftquantity" + id).html(result[0]['leftquantity']);
			alert(result[0]['message']);
				} else {
				alert(result[0]['message']);
			}
			}
		});
		return false;
			}
			function gotoPage(pn) {
			document.forms.queryform.curPage.value = pn;
				document.forms.queryform.submit();
			}
			function judge() {
			if ($("#currentPage").val() > 9) {
			$("#currentPage").val(1);
			}
			}
			</script>


<ol class="breadcrumb">
	<form class="form-inline" role="form" id="queryform" name="queryform"
		method="post" action="/buyer/index">
		<input type="hidden" id="curPage" name="curPage" /> <input
			type="hidden" id="breed" name="breed" value="" /> <input type="text"
			class="form-control" id="search_variety" name="search_fixPrdName"
			value="" placeholder="品种"> <input type="text" class="form-control"
			id="search_level" name="search_fixGrdCode" value="" placeholder="等级">
		<input type="text" class="form-control" id="search_brand"
			name="search_fixName" value="" placeholder="品牌">
		<button type="submit" class="btn btn-default">
			<span class="glyphicon glyphicon-search"></span>
		</button>
	</form>
</ol>
<div class="row">
	<div class="col-md-2">
		<div class="panel panel-success">
			<div class="panel-heading">产品分类</div>
			<div class="panel-body">
				<li><a href="/buyer/index">所有 <span class="glyphicon glyphicon-play"></span></a></li>
					
					<?php
					
					foreach ( $data as $key => $value ) {
						echo "<li><a href=\"/buyer/index/breed/" . $value ['id'] . "\"  title=\"" . $value ['breed'] . "\">" . $value ['breed'] . "</a></li>";
						// echo $value['breed'];
					}
					?>

							</div>
		</div>
	</div>
	<div class="col-md-8" style="padding-left: 0px; padding-right: 0px;">
		<div class="panel panel-success">
			<div class="panel-heading">花卉列表</div>
			<div class="table-responsive">
				<table id="myTable" class="table">
					<thead>
						<tr>
							<th>品类</th>
							<th>品牌</th>
							<th>品种</th>
							<th class="remove sorter-false">图</th>
							<th>等级</th>
							<th>价格</th>
							<th>数量</th>
							<td class="remove sorter-false">购买数量</td>
							<th class="remove sorter-false">操作</th>
							<th class="remove sorter-false">操作</th>
							<th>包装描述</th>
						</tr>
					</thead>
					<tbody>
					
<?php
if ($page ['all_page'] == 0) {
	echo "<tr>没有数据</tr>";
} else {
	foreach ( $show as $key => $value ) {
		
		echo "<tr><td style=\"padding-bottom: 0;padding-left: 3px;padding-right: 0;\">" . $value ['good_category'] . "</td>";
		echo "<td style=\"padding-bottom: 0;padding-left: 0;padding-right: 0;\">" . $value ['good_brand'] . "</td>";
		echo "<td align=\"left\" style=\"padding-bottom: 0;padding-left: 0;padding-right: 0;\"><span style=\"font-size:12px\">" . $value ['good_variety'] . "</span></td>";
		echo "<td style=\"padding-bottom: 0;padding-right: 0;\"><div id=\"sit-simple\"><a target=\"_blant\" class=\"sit-preview\" " . "href=\"" . $value ['good_img_url'] . "\">" . "<img src=\"" . $value ['good_img_url'] . "\"" . "data-preview-url=\"" . $value ['good_img_url'] . "\"" . " width=\"20\" height=\"20\" border=\"0\" /></a></div></td>";
		echo "<td style=\"padding-bottom: 0;padding-right: 0;\">" . $value ['good_level'] . "</td>";
		echo "<td style=\"padding-bottom: 0;padding-left: 0;padding-right: 0;\">" . $value ['good_price'] . "</td>";
		echo "<td style=\"padding-bottom: 0;padding-left: 0;padding-right: 0;\"><label id=\"" . $value ['good_amount'] ['pid'] . "\" style=\"color: red;\">" . $value ['good_amount'] ['now_num'] . "</label>枝</td>";
		
		echo "<td align=\"left\"  style=\"padding-bottom: 0;padding-left: 0;padding-right: 0;\"><input id=\"" . $value ['good_amount'] ['pid'] . "\"  name=\"text\" type=\"text\" size=\"5\"   onKeyUp=\"value=value.replace(/\D/g,'')\" onafterpaste=\"value=value.replace(/\D/g,'')\" style=\"width: 36px;color: red;\">× 枝</td>";
		
		echo "<td style=\"padding-bottom: 0;padding-left: 0;padding-right: 0;\">
												<a href=\"#\" onclick=\"fixPrice('150914000068');return false;\"><strong>购买</strong></a>
												</td>";
		echo "<td style=\"padding-bottom: 0;padding-left: 0;padding-right: 0;\">
												<a href=\"#\" onclick=\"addtocarD('" . $value ['good_amount'] ['pid'] . "')" . ";return false;\"><strong>购物车</strong></a>
												</td>";
		echo "<td>" . $value ['good_desc'] . "</td></tr>";
	}
}
?>
		
							</tbody>
				</table>
			</div>
			<button type="button" class="btn btn-default btn-sm first disabled"
				tabindex="0" aria-disabled="true">
				<i class="icon-step-backward glyphicon glyphicon-step-backward"></i>
			</button>
			<button type="button" class="btn btn-default btn-sm prev disabled"
				tabindex="0" aria-disabled="true">
				<i class="icon-arrow-left glyphicon glyphicon-backward"></i>
			</button>
					共<?php echo $page['total'];?>页（<?php echo $page['all_page'];?>条记录） <input
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
			<button type="button" onclick="javascript:gotoPage(9);"
				class="btn btn-default btn-sm last " tabindex="0"
				aria-disabled="false">
				<i class="icon-step-forward glyphicon glyphicon-step-forward"></i>
			</button>
		</div>
	</div>
	<div class="col-md-2">
		<div class="panel panel-success">
			<div class="panel-heading">
				资金信息&nbsp;&nbsp;&nbsp;&nbsp;<a href="/buyer/netPay"
					style="color: red;"><span class="glyphicon glyphicon-usd"></span>(去充值)</a>
			</div>
			<div class="panel-body">
				<!--
								<li>充值金额(元)</li>
								&nbsp;&nbsp;&nbsp;&nbsp;<label id="buyPreFund"></label>
								<li>预扣金额(元)</li>
								&nbsp;&nbsp;&nbsp;&nbsp;<label id="buycomFund">0</label>
								-->
				<li>可用限额(元)</li> &nbsp;&nbsp;&nbsp;&nbsp;<label id="buyLeftLimit"><?php echo $user_info['money']?>元</label>
				<br> <a href="/buyer/buyerLimit"><span
					class="glyphicon glyphicon-list-alt"></span>详情 </a>
			</div>
		</div>
		<div class="panel panel-success">
			<div class="panel-heading">交易信息</div>

			<table id="fixTable" class="table">
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
			<br> &nbsp;&nbsp;&nbsp;<a href="/buyer/transaction"><span
				class="glyphicon glyphicon-list-alt"></span>详情 </a>
		</div>
	</div>
</div>
<script type="text/javascript">
		    jQuery(document).ready(function() {
		    		jQuery("#sit-simple .sit-preview").smartImageTooltip({previewTemplate: "simple", imageWidth: "480px"});
		    		jQuery("#sit-caption .sit-preview").smartImageTooltip({previewTemplate: "caption", scaleDesktop: 70, scaleMobile: 55});
		    		jQuery("#sit-envato .sit-preview").smartImageTooltip({previewTemplate: "envato", imageWidth: "500px"});
		    		jQuery("#sit-envato-link .sit-preview").smartImageTooltip({previewTemplate: "envato"});
		    		jQuery("#sit-nolink img.sit-thumb").smartImageTooltip({previewTemplate: "caption", imageWidth: "480px"});
		    		});
		    		</script>
<script type="text/javascript"
	src="/static/components/render/js/default.include.js"></script>


</div>

<?php
require_once ("application/views/public/footer.php");
?>