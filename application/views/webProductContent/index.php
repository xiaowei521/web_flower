<?php
if ($login_status) {
	require_once ("application/views/public/login_in.php");
} else {
	require_once ("application/views/public/login_out.php");
}
?>

<script type="text/javascript">
		function gotoPage(pn) {
			document.forms.queryform.curPage.value = pn;
			document.forms.queryform.submit();
		}
		function judge() {
			if ($("#currentPage").val() > 77) {
				$("#currentPage").val(1);
			}
		}
	</script>
<ol class="breadcrumb">
	您现在的位置：
	<li><a href="/welcome">首页</a></li>
	<li class="active">交易产品</li>
</ol>
<form class="form-inline" role="form" id="queryform" name="queryform"
	method="post" action="/webProductContent">
	<input type="hidden" id="curPage" name="curPage" /> <input
		type="hidden" id="prdBreedName" name="prdBreedName" value="">
</form>

<div class="row">
	<div class="col-md-3">
		<div class="panel panel-primary" style="margin-bottom: 10px;">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-leaf"></span>&nbsp;&nbsp;&nbsp;交易产品
			</div>
			<div class="panel-body">
				<li><a href="/webProductContent"><span style="padding-bottom: 10px;">
							全部</span> <span class="glyphicon glyphicon-play"></span></a><br></li>
					<?php
					
foreach ( $data as $key => $value ) {
						echo "<li><a href=\"/webProductContent/index/breed/" . $value ['id'] . "\"  title=\"" . $value ['breed'] . "\">" . $value ['breed'] . "</a></li>";
					}
					?>		
			  </div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" style="margin-bottom: 10px;">
			<div class="panel-body">
				<div
					style="text-align: center; height: 60px; line-height: 60px; color: #ce2745; font-size: 20px; font-weight: bold; margin: 10px 0 10px 0;">交易产品</div>
				<div class="row">
						<?php
						if ($page ['all_page'] == 0) {
							echo "<tr>没有数据</tr>";
						} else {
							foreach ( $show as $key => $value ) {
								echo '<div class="col-md-4" id="sit-simple">';
								echo '<a class="sit-preview" href="' . $value ['good_img_url'] . '"> <img src=" ' . $value ['good_img_url'] . ' " data-preview-url= "' . $value ['good_img_url'] . '"width="240" height="240" border="0" /></a>';
								echo '<div style="font-size:12px;text-align:center">' . $value ['good_brand'] . "</div></div>";
							}
						}
						?>
					</div>
				<div class="col-md-12">
					<button type="button" class="btn btn-default btn-sm first disabled"
						tabindex="0" aria-disabled="true">
						<i class="icon-step-backward glyphicon glyphicon-step-backward"></i>
					</button>
					<button type="button" class="btn btn-default btn-sm prev disabled"
						tabindex="0" aria-disabled="true">
						<i class="icon-arrow-left glyphicon glyphicon-backward"></i>
					</button>
					共77页（462条记录） <input
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
					<button type="button" onclick="javascript:gotoPage(77);"
						class="btn btn-default btn-sm last " tabindex="0"
						aria-disabled="false">
						<i class="icon-step-forward glyphicon glyphicon-step-forward"></i>
					</button>
				</div>
			</div>
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