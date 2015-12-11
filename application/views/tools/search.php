<!-- BEGIN CONTAINER -->   
	<div class="page-container row-fluid page-view">
	
		<!-- BEGIN SIDEBAR -->

		<?php //$this->public_section->get_view_sideastop();?>

		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->

			<!-- BEGIN PAGE CONTAINER-->

			<div class="container-fluid">

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">
				
					<!--设置classspan-->
					<?php 
				
						if(!empty($module_left) && !empty($module_right)){
							$class_span='span6';
						}elseif(!empty($module_left) || !empty($module_right)){
							$class_span='span9';
						}else{
							$class_span='span12';
						}
						
					?>
					<!--设置classspan-->
					
					<?php if(!empty($module_left)):?>
					<div class="span3"><?php echo $module_left;?></div>
					<?php endif;?>
					
					<div class="<?php echo $class_span;?> blog-page">
					
						<div class="row-fluid">

							<div class="article-block">
							
								<!-- BEGIN BUTTONS PORTLET-->
								<div class="portlet booking-search">
									<div class="portlet-title">
										<div class="caption tooltips" data-original-title="方便快捷的热门搜索关键词在这里"><i class="icon-reorder"></i>高级搜索标签</div>
										<div class="tools">
											<a href="javascript:;" class="collapse tooltips" data-original-title="展开/收起"></a>
										</div>
									</div>
									<div class="portlet-body">
									
										<div class="accordion-group">

											<div class="accordion-heading">

												<div class="c">
												<a class="btn red-stripe">结伴时间：</a>
												<a href="#" class="btn red-stripe hidden-phone">全部</a>
												<a href="#" class="btn red-stripe hidden-phone">Red Stripe</a>
												<a href="#" class="btn purple-stripe hidden-phone">Purple stripe</a>
											
												<a style="float:right;text-align:right" class="accordion-toggle collapsed tooltips" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1" data-original-title="这里还有更多结伴时间相关的内容">

												<i class="icon-angle-left"></i>

												更多

												</a>
												
												</div>
												
											</div>

											<div id="collapse_1" class="accordion-body collapse">

												<div class="accordion-inner" style="padding: 5px 0">

													<p>
														<a href="#" class="btn red-stripe margin-bottom5">Red Stripe</a>
														<a href="#" class="btn purple-stripe margin-bottom5">Purple stripe</a>
													
														<a href="#" class="btn red-stripe margin-bottom5">Red Stripe</a>
														<a href="#" class="btn purple-stripe margin-bottom5">Purple stripe</a>
													
														<a href="#" class="btn red-stripe margin-bottom5">Red Stripe</a>
														<a href="#" class="btn purple-stripe margin-bottom5">Purple stripe</a>
													</p>

												</div>

											</div>

										</div>
										
										<div class="accordion-group">

											<div class="accordion-heading">

												<div class="c">
												<a class="btn red-stripe">结伴地点：</a>
												<a href="#" class="btn red-stripe hidden-phone">全部</a>
												<a href="#" class="btn purple-stripe hidden-phone">Purple stripe</a>
											
												<a style="float:right;text-align:right" class="accordion-toggle collapsed tooltips" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2" data-original-title="这里还有更多结伴地点相关的内容">

												<i class="icon-angle-left"></i>

												更多

												</a>
												
												</div>
												
											</div>

											<div id="collapse_2" class="accordion-body collapse">

												<div class="accordion-inner" style="padding: 5px 0">

													<p>
														<a href="#" class="btn red-stripe margin-bottom5">Red Stripe</a>
														<a href="#" class="btn purple-stripe margin-bottom5">Purple stripe</a>
													
														<a href="#" class="btn red-stripe margin-bottom5">Red Stripe</a>
														<a href="#" class="btn purple-stripe margin-bottom5">Purple stripe</a>
													
														<a href="#" class="btn red-stripe margin-bottom5">Red Stripe</a>
														<a href="#" class="btn purple-stripe margin-bottom5">Purple stripe</a>
													</p>
													
												</div>

											</div>

										</div>
										
										<div class="accordion-group">

											<div class="accordion-heading">

												<div class="c">
												<a class="btn red-stripe">结伴主题：</a>
												<a href="#" class="btn red-stripe hidden-phone">全部</a>
												<a href="#" class="btn purple-stripe hidden-phone">Purple stripe</a>
											
												<a style="float:right;text-align:right" class="accordion-toggle collapsed tooltips" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3" data-original-title="这里还有更多结伴主题相关的内容">

												<i class="icon-angle-left"></i>

												更多

												</a>
												
												</div>
												
											</div>

											<div id="collapse_3" class="accordion-body collapse">

												<div class="accordion-inner" style="padding: 5px 0">

													<p>
														<a href="#" class="btn red-stripe margin-bottom5">Red Stripe</a>
														<a href="#" class="btn purple-stripe margin-bottom5">Purple stripe</a>
													
														<a href="#" class="btn red-stripe margin-bottom5">Red Stripe</a>
														<a href="#" class="btn purple-stripe margin-bottom5">Purple stripe</a>
													
														<a href="#" class="btn red-stripe margin-bottom5">Red Stripe</a>
														<a href="#" class="btn purple-stripe margin-bottom5">Purple stripe</a>
													</p>

												</div>

											</div>

										</div>
										
									</div>
								</div>
								<!-- END BUTTONS PORTLET--> 
								
								<!--booking-search-->
								
								<div class="booking-search">

										<form action="<?php echo site_url('search')?>" method="get" enctype="multipart/form-data">

											<div class="clearfix margin-bottom-10">

												<label>搜索<?php echo !empty($query) ? '->'.$query.'&nbsp;|&nbsp;找到'.$count.'条符合条件的结果&nbsp;' : '' ?></label>

												<div class="input-icon left">

													<i class="icon-map-marker"></i>

													<input class="m-wrap span12 tooltips" type="text" placeholder="关键词查找..." data-original-title="搜索时间、地点、线路、出行方式等<br/>多个关键词用空格隔开！" value="<?php echo $query;?>" name="query">

												</div>

											</div>
											
											<input type="hidden" value="and" name="type">
											<input type="hidden" value="all" name="url">

											<button class="btn blue btn-block">搜索 <i class="m-icon-swapright m-icon-white"></i></button>

										</form>

										<!--<div class="space20"></div>-->
										
									</div>

									<!--end booking-search-->

								<div class="span12 booking-search" style="margin-left: 0">
								<?php if(isset($results)):?>
								<?php foreach($results as $result):?>
									<div class="booking-blocks">

										<div style="overflow:hidden;">
										
											<h4><a onclick="javascript:window.open('<?php echo $result['url']?>')"><?php echo $result['title']?></a></h4>

											<p><?php echo $result['content']?><a href="#">read more</a></p>
											
											<ul class="unstyled inline">

												<li class="domain"><?php echo parse_url($result['url'])['host']?></li>
												
												<li class="domain"><?php echo !empty($result['weight']) ? '&nbsp;|&nbsp;指数:'.$result['weight'] : '&nbsp;|&nbsp;指数:0' ?></li>

											</ul>

										</div>
				
									</div>
								<?php endforeach;?>
								<?php else:?>
								<?php echo '没有符合条件的内容！';?>
								<?php endif;?>
								</div>
								
								<!--end booking-search-->
								
									<div class="pagination pagination-right span12" style="margin-left:0">

										<?php echo $search_page;?>

										<hr>
										
									</div>
									
							</div>

							<!--end span9-->

						</div>

					</div>
					
					<?php if(!empty($module_right)):?>
					<div class="span3"><?php echo $module_right;?></div>
					<?php endif;?>
				
				</div>
				
				<!-- END PAGE CONTENT-->
				
				
			</div>

		<!--通知的标签-->
		<div id="gritter-notice-wrapper" class="hidden-phone"></div>
		<div id="gritter-notice-wrapper" class="top-left hidden-phone"></div>
		
		<!--底部模块-->
		<?php echo $module_bottom?>
		<!--底部模块-->
		
		<!-- END PAGE -->    
		</div>
	</div>

	<!-- END CONTAINER -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.slimscroll.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.blockui.js')?>" type="text/javascript"></script>  

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.cookie.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.uniform.js')?>" type="text/javascript" ></script>
	
	<script src="<?php echo base_url('public/min/?f=public/js/jquery.gritter.js')?>" type="text/javascript"></script>

	<!-- END CORE PLUGINS -->

	<script src="<?php echo base_url('public/min/?f=public/js/app.js')?>"></script>  
	<script src="<?php echo base_url('public/min/?f=public/js/index.js')?>" type="text/javascript"></script>

	<script type="text/javascript">
	
		jQuery(document).ready(function() {

		   App.init();
		   Index.initIntro();

			$(window).scroll( function(event){
				if($(document).scrollTop()>200){
			   	$(".mobile-top").css("background-color","rgba(15, 76, 115, 0.85)");
			   }else{
			   	$(".mobile-top").css("background-color","rgba(15, 76, 115, 0.13)");
			   }
			} );
		});
	</script>
	
	<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->

</html>