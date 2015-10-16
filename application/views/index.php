<?php 
	if($login_status){
		require_once("application/views/public/login_in.php");
	}
	else{
		require_once("application/views/public/login_out.php");
	}
?>
	<div class="row" style="padding-left: 15px;padding-right: 15px;">
	  <div class="col-md-4" style="padding-left: 0px;">
			<div class="panel panel-primary">
			  <div class="panel-heading"><a href="/webNoticeContent" style="color: white;font-weight: bold;margin: 0;"><h4 style="margin: 0;"><span class="glyphicon glyphicon-volume-up"></span>通知公告</h4></a></div>
			  <div class="panel-body">
				  	
								<div class="col-md-12" style="padding-bottom: 6px;">
								<a href="/webNoticeContent/show/77" style="color: black;"><strong>1、花拍在线”客户投诉规定</strong></a><br>
								</div>
						
								<div class="col-md-12" style="padding-bottom: 6px;">
								<a href="/webNoticeContent/show/76" style="color: black;"><strong>2、“花拍在线”时间调整安排</strong></a><br>
								</div>
						
								<div class="col-md-12" style="padding-bottom: 6px;">
								<a href="/webNoticeContent/show/75" style="color: black;"><strong>3、“花拍在线”物流装箱打包标 ...</strong></a><br>
								</div>
						
			  </div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading"><a href="/webProductContent" style="color: white;font-weight: bold;margin: 0;"><h4 style="margin: 0;"><span class="glyphicon glyphicon-leaf"></span>产品描述</h4></a></div>
			  <div class="panel-body">
			  	
						<div class="col-md-4" style="padding-bottom: 6px;">
							<a style="color: black;" href="/webProductContent?prdBreedName=玫瑰"><strong><span class="glyphicon glyphicon-leaf"></span>玫瑰</strong></a>
					  </div>
				  
						<div class="col-md-4" style="padding-bottom: 6px;">
							<a style="color: black;" href="/webProductContent?prdBreedName=绣球花"><strong><span class="glyphicon glyphicon-leaf"></span>绣球花</strong></a>
					  </div>
				  
						<div class="col-md-4" style="padding-bottom: 6px;">
							<a style="color: black;" href="/webProductContent?prdBreedName=洋桔梗"><strong><span class="glyphicon glyphicon-leaf"></span>洋桔梗</strong></a>
					  </div>
				  
						<div class="col-md-4" style="padding-bottom: 6px;">
							<a style="color: black;" href="/webProductContent?prdBreedName=百合"><strong><span class="glyphicon glyphicon-leaf"></span>百合</strong></a>
					  </div>
				  
						<div class="col-md-4" style="padding-bottom: 6px;">
							<a style="color: black;" href="/webProductContent?prdBreedName=非洲菊"><strong><span class="glyphicon glyphicon-leaf"></span>非洲菊</strong></a>
					  </div>
				  
						<div class="col-md-4" style="padding-bottom: 6px;">
							<a style="color: black;" href="/webProductContent?prdBreedName=香石竹"><strong><span class="glyphicon glyphicon-leaf"></span>香石竹</strong></a>
					  </div>
				  
						<div class="col-md-4" style="padding-bottom: 6px;">
							<a style="color: black;" href="/webProductContent?prdBreedName=满天星"><strong><span class="glyphicon glyphicon-leaf"></span>满天星</strong></a>
					  </div>
				  
						<div class="col-md-4" style="padding-bottom: 6px;">
							<a style="color: black;" href="/webProductContent?prdBreedName=勿忘我"><strong><span class="glyphicon glyphicon-leaf"></span>勿忘我</strong></a>
					  </div>
				  
						<div class="col-md-4" style="padding-bottom: 6px;">
							<a style="color: black;" href="/webProductContent?prdBreedName=芍药"><strong><span class="glyphicon glyphicon-leaf"></span>芍药</strong></a>
					  </div>
				  
			  </div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading"><a href="/webCyclopediaContent" style="color: white;font-weight: bold;margin: 0;"><h4 style="margin: 0;"><span class="glyphicon glyphicon-eye-open"></span>花拍百科</h4></a></div>
			  <div class="panel-body">
				  
								<div class="col-md-12" style="padding-bottom: 6px;">
								<a href="/webCyclopediaContent/show/74" style="color: black;"><strong>1、情人节，云南玫瑰还会任性吗 ...</strong></a><br>
								</div>
						
								<div class="col-md-12" style="padding-bottom: 6px;">
								<a href="/webCyclopediaContent/show/43" style="color: black;"><strong>2、亮瞎你的眼，几十个泰兰品种 ...</strong></a><br>
								</div>
						
								<div class="col-md-12" style="padding-bottom: 6px;">
								<a href="/webCyclopediaContent/show/35" style="color: black;"><strong>3、云南玫瑰知多少（二）黄色， ...</strong></a><br>
								</div>
						
			  </div>
			</div>
		</div>
	  <div class="col-md-8" style="padding: 0px;">
	  	<div class="row">
			  <div class="col-md-12">
						<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000" style="width: 100%;height:390px;">
						  <!-- 轮播（Carousel）指标 -->
						  <ol class="carousel-indicators" style="border-radius: 8px;">
					   		
					   			 <li data-target="#myCarousel" data-slide-to="0" class=""></li>
					   		
					   			 <li class="active" data-target="#myCarousel" data-slide-to="1"></li>
					   		
					   			 <li data-target="#myCarousel" data-slide-to="2"></li>
					   		
					   			 <li data-target="#myCarousel" data-slide-to="3"></li>
					   		
						  </ol>   
						  <!-- 轮播（Carousel）项目 -->
						  <div class="carousel-inner" style="border-radius: 8px;">
						  	
					   			 <div class="item">
						         <a href="http://www.baidu.com"  title="1" target="_blank"><img style="width: 100%;height:390px;" class="img-responsive" src="/public/images/carousel_1.png"></a>
						         <div class="carousel-caption" contenteditable="true">
						         	<p>1</p>
						         </div>
						      </div>
					   		
					   			 <div class="item active">
						         <a href="http://www.baidu.com" title="2" target="_blank"><img style="width: 100%;height:390px;" class="img-responsive" src="/public/images/carousel_1.png"></a>
						         <div class="carousel-caption" contenteditable="true">
						         	<p>2</p>
						         </div>
						      </div>
					   		
					   			 <div class="item ">
						          <a href="http://www.baidu.com"  title="3" target="_blank"><img style="width: 100%;height:390px;" class="img-responsive" src="/public/images/carousel_1.png"></a>
						         <div class="carousel-caption" contenteditable="true">
						         	<p>3</p>
						         </div>
						      </div>
					   		
					   			 <div class="item ">
						         <a href="http://www.baidu.com"  title="4" target="_blank"><img style="width: 100%;height:390px;" class="img-responsive" src="/public/images/carousel_1.png"></a>
						         <div class="carousel-caption" contenteditable="true">
						         	<p>4</p>
						         </div>
						      </div>
					   		 	
						  </div>
						  <!-- 轮播（Carousel）导航 -->
						  <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="border-radius: 8px;"></a>
						  <a class="right carousel-control" href="#myCarousel" data-slide="next" style="border-radius: 8px;"></a>
					</div> 
				</div>
			</div>
			<div class="row" style="text-align:center;margin-top:13px">
				<div class="col-md-4">
			  		<a href="/buyer/index" class="btn btn-primary" style="width: 100%;">
				  		<h2 style="color:white;margin-top: 0px;"><span class="glyphicon glyphicon-user"></span><br>会员入口</h2>
				  	 </a>
				</div>
				<div class="col-md-4">
						<a href="/webNewProductContent" class="btn btn-primary" style="width: 100%;">
							<h2 style="color:white;margin-top: 0px;"><span class="glyphicon glyphicon-heart"></span><br>新品推荐</h2>
						</a>
				</div>
				<div class="col-md-4">
						<a href="/webRuleContent" class="btn btn-primary" style="width: 100%;">
							<h2 style="color: white;margin-top: 0px;"><span class="glyphicon glyphicon-info-sign"></span><br>交易规则</h2>
						</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
require_once("application/views/public/footer.php"); 
?>