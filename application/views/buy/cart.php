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

<!-- Tablesorter: required -->
<link rel="stylesheet"
	href="/static/components/jquery/Plugin/tablesorter-v2.17.4/css/theme.ice.css">
<script
	src="/static/components/jquery/Plugin/tablesorter-v2.17.4/js/jquery.tablesorter.js"></script>

<!-- render: required -->
<link rel="stylesheet" type="text/css"
	href="/static/components/render/css/default.include.css" media="all" />
<link rel="stylesheet" id="spi-render-css-css"
	href="/static/components/render/css/render.css?ver=3.5.2"
	type="text/css" media="all" />

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
			url : "/buyer/removeFromCart",
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



		<ol class="breadcrumb">
			您现在的位置：
			<li><a href="/welcome">首页</a></li>
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
						<td class="remove sorter-false">图</td>
						<td>等级</td>
						<td>价格</td>
						<td>数量</td>

						<td class="remove sorter-false">购买数量</td>
						<td>订单金额(元)</td>
						<td class="remove sorter-false">删除</td>
					</tr>
				</thead>
				<tbody>
              <?php
														foreach ( $data as $key => $value ) {
															
															echo "<tr><td align=\"center\">" . $value ['name'] . "</td>";
															echo "<td align=\"center\" style=\"font-size:12px\">" . $value ['options'] ['good_brand'] . "</td>";
															echo "<td valign=\"middle\" align=\"left\" style=\"padding-bottom: 0;padding-right: 0;\">
							    <span style=\"font-size:12px\">" . $value ['options'] ['good_variety'] . "</span></td>";
															echo "<td style=\"padding-bottom: 0;padding-right: 0;\"><div id=\"sit-simple\"><a target=\"_blant\" class=\"sit-preview\" " . "href=\"" . $value ['options'] ['good_img_url'] . "\">" . "<img src=\"" . $value ['options'] ['good_img_url'] . "\"" . "data-preview-url=\"" . $value ['options'] ['good_img_url'] . "\"" . " width=\"20\" height=\"20\" border=\"0\" /></a></div></td>";
															echo "<td align=\"center\">" . $value ['options'] ['good_level'] . "</td>";
															echo "<td align=\"center\">" . $value ['price'] . "</td>";
															
															echo "<td align=\"center\"><label style=\"color: red;\">10</label>×20枝</td>";
															
															echo "<td style=\"padding-bottom: 0;padding-left: 0;padding-right: 0;\">" . $value ['qty'] . "</td>";
															
															echo "<td align=\"center\" style=\"font-size:12px\" id=\"tempTotalFee150915000074\">" . $value ['subtotal'] . "</td>";
															
															echo "<td align=\"center\"><A style=\"cursor:hand\" onclick=\"removeFromCart(this.parentNode.parentNode,'" . $value ['rowid'] . "');\"><span class=\"glyphicon glyphicon-trash\"></span></A></td>";
															echo "</tr>";
														}
														?>
				<tr>
						<td colspan=11><label id="total" style="float: right;">商品总计  <?php $this->cart->total_items();?>批,预计订单金额 <?php echo $this->cart->total();?></label></td>
					</tr>
				</tbody>
			</table>
		</div>

		<ul class="pager">
			<li class="previous"><a href="/buyer/">&larr; 继续购物</a></li>

			<li class="next "><a href="/buyer/checkout">确认订单 &rarr;</a></li>

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
		<script type="text/javascript"
			src="/static/components/render/js/default.include.js"></script>


	</div>
		

<?php
require_once ("application/views/public/footer.php"); 
?>