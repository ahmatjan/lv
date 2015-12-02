	<!-- BEGIN CONTAINER -->   
	<div class="page-container row-fluid">

		<!-- BEGIN PAGE -->

			<!-- BEGIN PAGE CONTAINER-->

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

				<?php $this->public_section->get_user_page_header();?>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">

					<div class="span12">

						<!--BEGIN TABS-->

						<div class="tabbable tabbable-custom tabbable-full-width">

							<ul class="nav nav-tabs">

								<li class="active"><a href="#tab_1_1" data-toggle="tab">个人信息</a></li>

							</ul>

							<div class="tab-content">

								<div class="tab-pane row-fluid active" id="tab_1_1">
								
									<div class="span12 user-info1">
									
										<ul class="unstyled profile-nav span3">

											<li><img src="<?php echo $this->image->rezice($user_infos['image'],250,250)?>" alt="<?php echo $user_infos['nick_name']?>"/></li>

										</ul>
										
										<div class="row-fluid span9">

											<div class="span8 profile-info">

												<h1><?php echo $user_infos['nick_name']?></h1>

												<p><?php echo isset($user_infos['signature']) ? $user_infos['signature'] : '这个用户好懒，还没有简介...' ?></p>

												<p><?php echo isset($user_infos['blog']) ? '<span style="color: #00A4CC" title="复制到浏览器打开">'.$user_infos['blog'].'</span>' : '还没有博客...' ?></p>

												<ul class="unstyled inline">

													<li><i class="icon-map-marker"></i><?php echo isset($user_infos['hobby']) ? $user_infos['hobby'] : '...' ;?></li>

													<li><i class="icon-calendar"></i><?php echo isset($user_infos['birthday']) ? $user_infos['birthday'] : '...' ;?></li>

													<li><i class="icon-briefcase"></i><?php echo isset($user_infos['job']) ? $user_infos['job'] : '...' ;?></li>

													<li><i class="icon-star"></i><?php echo isset($user_infos['location']) ? $user_infos['location'] : '...' ;?></li>

													<li><i class="icon-heart"></i>资料完善度：20%</li>

												</ul>

											</div>

											<!--end span8-->

											<div class="span4">

												<div class="portlet sale-summary">

													<div class="portlet-title">

														<div class="caption">Sales Summary</div>

														<div class="tools">

															<a class="reload" href="javascript:;"></a>

														</div>

													</div>

													<ul class="unstyled">

														<li>

															<span class="sale-info">TODAY SOLD <i class="icon-img-up"></i></span> 

															<span class="sale-num">23</span>

														</li>

														<li>

															<span class="sale-info">WEEKLY SALES <i class="icon-img-down"></i></span> 

															<span class="sale-num">87</span>

														</li>

														<li>

															<span class="sale-info">TOTAL SOLD</span> 

															<span class="sale-num">2377</span>

														</li>

														<li>

															<span class="sale-info">EARNS</span> 

															<span class="sale-num">$37.990</span>

														</li>

													</ul>

												</div>

											</div>

											<!--end span4-->

										</div>

										<!--end row-fluid-->
									
									</div>

									<div class="span12" style="margin:0">

										<div class="tabbable tabbable-custom tabbable-custom-profile">

											<ul class="nav nav-tabs">

												<li class="active"><a href="#tab_1_11" data-toggle="tab">Latest Customers</a></li>

												<li class=""><a href="#tab_1_22" data-toggle="tab">Feeds</a></li>

											</ul>

											<div class="tab-content">

												<div class="tab-pane active" id="tab_1_11">

													<div class="portlet-body" style="display: block;">

														<table class="table table-striped table-bordered table-advance table-hover">

															<thead>

																<tr>

																	<th><i class="icon-briefcase"></i> Company</th>

																	<th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>

																	<th><i class="icon-bookmark"></i> Amount</th>

																	<th></th>

																</tr>

															</thead>

															<tbody>

																<tr>

																	<td><a href="#">Pixel Ltd</a></td>

																	<td class="hidden-phone">Server hardware purchase</td>

																	<td>52560.10$ <span class="label label-success label-mini">Paid</span></td>

																	<td><a class="btn mini green-stripe" href="#">View</a></td>

																</tr>

																<tr>

																	<td>

																		<a href="#">

																		Smart House

																		</a>  

																	</td>

																	<td class="hidden-phone">Office furniture purchase</td>

																	<td>5760.00$ <span class="label label-warning label-mini">Pending</span></td>

																	<td><a class="btn mini blue-stripe" href="#">View</a></td>

																</tr>

																<tr>

																	<td>

																		<a href="#">

																		FoodMaster Ltd

																		</a>

																	</td>

																	<td class="hidden-phone">Company Anual Dinner Catering</td>

																	<td>12400.00$ <span class="label label-success label-mini">Paid</span></td>

																	<td><a class="btn mini blue-stripe" href="#">View</a></td>

																</tr>

																<tr>

																	<td>

																		<a href="#">

																		WaterPure Ltd

																		</a>

																	</td>

																	<td class="hidden-phone">Payment for Jan 2013</td>

																	<td>610.50$ <span class="label label-danger label-mini">Overdue</span></td>

																	<td><a class="btn mini red-stripe" href="#">View</a></td>

																</tr>

																<tr>

																	<td><a href="#">Pixel Ltd</a></td>

																	<td class="hidden-phone">Server hardware purchase</td>

																	<td>52560.10$ <span class="label label-success label-mini">Paid</span></td>

																	<td><a class="btn mini green-stripe" href="#">View</a></td>

																</tr>

																<tr>

																	<td>

																		<a href="#">

																		Smart House

																		</a>  

																	</td>

																	<td class="hidden-phone">Office furniture purchase</td>

																	<td>5760.00$ <span class="label label-warning label-mini">Pending</span></td>

																	<td><a class="btn mini blue-stripe" href="#">View</a></td>

																</tr>

																<tr>

																	<td>

																		<a href="#">

																		FoodMaster Ltd

																		</a>

																	</td>

																	<td class="hidden-phone">Company Anual Dinner Catering</td>

																	<td>12400.00$ <span class="label label-success label-mini">Paid</span></td>

																	<td><a class="btn mini blue-stripe" href="#">View</a></td>

																</tr>

															</tbody>

														</table>

													</div>

												</div>

												<!--tab-pane-->

												<div class="tab-pane" id="tab_1_22">

													<div class="tab-pane active" id="tab_1_1_1">

														<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">

															<ul class="feeds">

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-success">                        

																					<i class="icon-bell"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					You have 4 pending tasks.

																					<span class="label label-important label-mini">

																					Take action 

																					<i class="icon-share-alt"></i>

																					</span>

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			Just now

																		</div>

																	</div>

																</li>

																<li>

																	<a href="#">

																		<div class="col1">

																			<div class="cont">

																				<div class="cont-col1">

																					<div class="label label-success">                        

																						<i class="icon-bell"></i>

																					</div>

																				</div>

																				<div class="cont-col2">

																					<div class="desc">

																						New version v1.4 just lunched!   

																					</div>

																				</div>

																			</div>

																		</div>

																		<div class="col2">

																			<div class="date">

																				20 mins

																			</div>

																		</div>

																	</a>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-important">                      

																					<i class="icon-bolt"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					Database server #12 overloaded. Please fix the issue.                      

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			24 mins

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">                        

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			30 mins

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-success">                        

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			40 mins

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-warning">                        

																					<i class="icon-plus"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New user registered.                

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			1.5 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-success">                        

																					<i class="icon-bell-alt"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					Web server hardware needs to be upgraded. 

																					<span class="label label-inverse label-mini">Overdue</span>             

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			2 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label">                       

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			3 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-warning">                        

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			5 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">                        

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			18 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label">                       

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			21 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">                        

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			22 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label">                       

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			21 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">                        

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			22 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label">                       

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			21 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">                        

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			22 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label">                       

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			21 hours

																		</div>

																	</div>

																</li>

																<li>

																	<div class="col1">

																		<div class="cont">

																			<div class="cont-col1">

																				<div class="label label-info">                        

																					<i class="icon-bullhorn"></i>

																				</div>

																			</div>

																			<div class="cont-col2">

																				<div class="desc">

																					New order received. Please take care of it.                 

																				</div>

																			</div>

																		</div>

																	</div>

																	<div class="col2">

																		<div class="date">

																			22 hours

																		</div>

																	</div>

																</li>

															</ul>

														</div>

													</div>

												</div>

												<!--tab-pane-->

											</div>

										</div>

									</div>

									<!--end span9-->

								</div>

								<!--end tab-pane-->

							</div>

						</div>

						<!--END TABS-->

					</div>

				</div>

				<!-- END PAGE CONTENT-->

			</div>

			<!-- END PAGE CONTAINER--> 

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

	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/bootstrap-fileupload.js')?>"></script>

	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/chosen.jquery.min.js')?>"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="<?php echo base_url('public/min/?f=public/js/app.js')?>"></script>      

	<!-- END PAGE LEVEL SCRIPTS -->
	<script>

		jQuery(document).ready(function() {       

		   // initiate layout and plugins

		   App.init();

		});

	</script>

	<!-- END JAVASCRIPTS -->

<!-- END BODY -->

</html>