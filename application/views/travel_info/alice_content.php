	<!-- BEGIN CONTAINER -->   

	<div class="page-container row-fluid page-view">

		<!-- BEGIN PAGE -->

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

				<?php $this->public_section->get_page_header();?>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">

					<div class="span12 blog-page">

						<div class="row-fluid">

							<div class="article-block">

								<h4><?php echo $travels['title']?></h4>

								<hr>

								<div class="blog-tag-data">
								
									<div class="row-fluid">
									
										<div class="span6">
									
											<img class="span3" style="width: 90px;margin-bottom: 0" src="<?php echo $travels['user_img']?>" alt="<?php echo $travels['user_name']?>">
										<div class="span9"><?php echo $travels['user_description']?></div>
										</div>

										<div class="span6">

											<ul class="unstyled inline blog-tags">

												<li>

													<i class="icon-tags"></i> 

													<a href=""><?php echo $travels['label']?></a> 
													<!--
													<a href="#">Education</a>

													<a href="#">Internet</a>
													-->

												</li>

											</ul>

										</div>

										<div class="span6">

											<ul class="unstyled inline">

												<li><i class="icon-time"></i> <a href=""><?php echo $travels['go_date']?></a></li>

												<li><i class="icon-comments"></i> <a href="#">38 Comments</a></li>
												
											</ul>

										</div>
										
										<div class="span6">

											<ul class="unstyled inline">

												<li><i class="icon-plane"></i> <a href=""><?php echo $travels['route']?></a></li>
											</ul>

										</div>
										
									</div>

									<hr>

								</div>

								<!--end news-tag-data-->

								<div>

									<div style="text-align: center;margin-bottom: 15px">
									<img src="<?php echo $travels['content_img']?>">
									</div>
									<p style=" text-indent:2em"><?php echo $travels['content']?></p>

								</div>

								<hr>

							<!--end media-->
							
				<!-- END PAGE CONTENT-->

						<div class="span12" style="margin-left: 0">
								
							<!-- BEGIN PORTLET-->

							<div class="portlet">

								<div class="portlet-title line">

									<div class="caption"><i class="icon-comments"></i>交流回复区</div>

									<div class="tools">

										<a href="" class="collapse"></a>

										<a href="" class="reload"></a>

									</div>

								</div>

								<div class="portlet-body" id="chats">

									<div>
									<!--<div class="scroller" data-height="435px" data-always-visible="1" data-rail-visible1="1">-->

										<ul class="chats">
										
											<?php if ($reviews !== NULL): ?>
											<?php foreach ($reviews as $k=>$item): ?>
											<?php if ($k%2==0): ?>

											<li class="in" style="border-bottom:1px dashed rgb(207, 207, 207)">

												<img class="avatar" alt="<?php echo $item['user_name']?>" src="<?php echo $item['user_img']?>" />

												<div class="message">

													<span class="arrow"></span>

													<a class="name"><?php echo $item['user_name']?></a>

													<span class="datetime">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $item['user_info']?></span>
													
													<span class="datetime">&nbsp;&nbsp;&nbsp;回复时间：<?php echo $item['add_date']?></span>

													<span class="body">

													<?php echo $item['content']?>

													</span>

												</div>

											</li>
											
											<?php else: ?>
											
											<li class="out" style="border-bottom:1px dashed rgb(207, 207, 207)">

												<img class="avatar" alt="<?php echo $item['user_name']?>" src="<?php echo $item['user_img']?>" />

												<div class="message">

													<span class="arrow"></span>

													<a class="name"><?php echo $item['user_name']?></a>

													<span class="datetime">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $item['user_info']?></span>
													
													<span class="datetime">&nbsp;&nbsp;&nbsp;回复时间：<?php echo $item['add_date']?></span>

													<span class="body">

													<?php echo $item['content']?>

													</span>

												</div>

											</li>
											<?php endif; ?>
											<?php endforeach; ?>
											<?php endif; ?>
											
										</ul>

											<?php if ($recount > $this->base_setting->get_setting('quantity_view')): ?><!--记录条数不为空并且可以分页才显示-->
											
											<div class="pagination" style="text-align: center;margin: 5px 0">

												<ul>
													
													<li><a href="#">上一页</a></li>
													<?php for($i=1;$i<ceil($recount/$this->base_setting->get_setting('quantity_view'));$i++):?>
													<li><a href="<?php echo site_url('travel_info/Alice_content?id=').$travels['spider_id'].'&revie_page='.$i?>"><?php echo $i?></a></li>
													<?php endfor;?>
													<li><a href="#">下一页</a></li>

												</ul>

											</div>
											
											<?php endif; ?>
										
									</div>

									<div class="chat-form">

										<div class="input-cont">   

											<input class="m-wrap" type="text" placeholder="发表你的看法，参与讨论..." />

										</div>

										<div class="btn-cont"> 

											<span class="arrow"></span>

											<a href="" class="btn blue icn-only"><i class="icon-ok icon-white"></i></a>

										</div>

									</div>
									
								</div>

							</div>
							<!-- END PORTLET-->
						</div>
						
						<hr>
						<!--摄影墙-->
						<div class="row-fluid">

						<div class="portlet">

							<div class="portlet-title">

								<div class="caption"><i class="icon-reorder"></i>摄影墙</div>
								<div class="tools">

									<a href="" class="collapse"></a>

									<a href="" class="reload"></a>

								</div>

							</div>

							<div class="portlet-body">

								<ul class="unstyled blog-images">

						<li>

							<a  class="fancybox-button" data-rel="fancybox-button" title="390 x 220 - keenthemes.com" href="<?php echo base_url('public/image/1.jpg')?>">

							<img alt="" src="<?php echo base_url('public/image/1.jpg')?>">

							</a>

						</li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/2.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/3.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/4.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/5.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/6.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/8.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/10.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/11.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/1.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/2.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/7.jpg')?>"></a></li>
						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/2.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/3.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/4.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/5.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/6.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/8.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/10.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/11.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/1.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/2.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/7.jpg')?>"></a></li>
						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/2.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/3.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/4.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/5.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/6.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/8.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/10.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/11.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/1.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/2.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/7.jpg')?>"></a></li>
						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/2.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/3.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/4.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/5.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/6.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/8.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/10.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/11.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/1.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/2.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/7.jpg')?>"></a></li>
						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/2.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/3.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/4.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/5.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/6.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/8.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/10.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/11.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/1.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/2.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/7.jpg')?>"></a></li>
						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/2.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/3.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/4.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/5.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/6.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/8.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/10.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/11.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/1.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/2.jpg')?>"></a></li>

						<li><a href="#"><img alt="" src="<?php echo base_url('public/image/7.jpg')?>"></a></li>

					</ul>

								<!-- END CALENDAR PORTLET-->

							</div>

						</div>

					</div>
						
					</div>

				<!--end span9-->

					</div>

				</div>

			</div>

			<!-- END PAGE CONTENT-->

		</div>

	<!-- END PAGE -->    
		</div>
	</div>

	<!-- END CONTAINER -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.slimscroll.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.blockui.min.js')?>" type="text/javascript"></script>  

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.cookie.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.uniform.min.js')?>" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script src="<?php echo base_url('public/min/?f=public/js/fullcalendar.min.js')?>"></script>

	<!-- END PAGE LEVEL PLUGINS -->
	
	<script src="<?php echo base_url('public/min/?f=public/js/app.js')?>"></script>   
	<script src="<?php echo base_url('public/min/?f=public/js/calendar.js')?>"></script>

	<script>

		jQuery(document).ready(function() {    

		   App.init();
		   Calendar.init();

		});

	</script>

	<!-- END JAVASCRIPTS -->

<!-- END BODY -->

</html>