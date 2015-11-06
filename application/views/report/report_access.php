	<!-- 1BEGIN CONTAINER -->   

	<div class="page-container row-fluid">

		<!-- BEGIN SIDEBAR -->

		<?php $this->public_section->get_column_left();?>

		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->

		<div class="page-content">

			<!-- BEGIN PAGE CONTAINER-->

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

				<?php $this->public_section->get_user_page_header();?>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

						<!-- BEGIN SAMPLE FORM PORTLET-->   

						<div class="portlet box blue">

							<div class="portlet-title">

								<div class="caption"><i class="icon-reorder"></i><?php echo $text_select?></div>

							</div>

							<!--BEGIN TABS-->

							<div class="tabbable tabbable-custom" style="margin-bottom: 0">

								<ul class="nav nav-tabs" style="background-color: #FFF">

									<?php if ($tab_position === 'tab_1_2' || $tab_position == NULL): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_2" data-toggle="tab">用户访问统计</a>
									</li>
									
									<?php if ($tab_position === 'tab_1_3'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_3" data-toggle="tab">流量统计</a>
									</li>
									
									<?php if ($tab_position === 'tab_1_5'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_5" data-toggle="tab">抓取统计</a>
									</li>

								</ul>

								<div class="tab-content">

									<?php if ($tab_position === 'tab_1_2' || $tab_position == NULL): ?>
									<div class="tab-pane active" id="tab_1_2">
									<?php else :?>
									<div class="tab-pane" id="tab_1_2">
									<?php endif;?>

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											这里是用户的访问量统计，一个ip只算一次访问

										</p>
									
										<div class="responsive" data-tablet="span12 fix-offset" data-desktop="span12">

											<!-- BEGIN EXAMPLE TABLE PORTLET-->

											<div class="portlet box grey">

												<div class="portlet-title">

													<div class="caption"><i class="icon-user"></i>用户访问统计</div>

												</div>

												<div class="portlet-body">

													<table class="table table-striped table-bordered table-hover" id="sample_2">

														<thead>

															<tr>

																<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" /></th>

																<th class="hidden-480">ID</th>

																<th>IP</th>
																
																<th class="hidden-480">访问时间</th>
																
																<th class="hidden-480">地址</th>
																
																<th class="hidden-480">访问方式</th>
																
																<th class="hidden-480">访问用户</th>
																
															</tr>

														</thead>

														<tbody>

															<?php if ($report_accesss && is_array($report_accesss)): ?>
															<?php foreach ($report_accesss as $report_access): ?>
															<!--判断它是一个数组并且不为空 -->
														
															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $report_access['report_id']?>" /></td>

																<td class="hidden-480"><?php echo $report_access['report_id']?></td>

																<td><div title="<?php echo $report_access['ip']?>"><?php echo substr_cn($report_access['ip'],10)?></div></td>
															
																<td class="hidden-480"><?php echo $report_access['access_time']?></td>
																
																<td class="hidden-480"><div title="<?php echo $report_access['ip_address']['country'].$report_access['ip_address']['region'].$report_access['ip_address']['region']?>"><?php echo substr_cn($report_access['ip_address']['country'].$report_access['ip_address']['region'].$report_access['ip_address']['region'],22)?></div></td>
																
																<td class="hidden-480"><div title="<?php echo $report_access['platform'].$report_access['browser']?>"><?php echo substr_cn($report_access['platform'].$report_access['browser'],16)?></td>
																
																<td class="hidden-480"><a href="<?php echo site_url('user/user_page?user_id='.$report_access['report_id'])?>" target="_blank" title="<?php echo $report_access['user_name']?>"><?php echo substr_cn($report_access['user_name'],15)?></a></td>
																
															</tr>
															
															<?php endforeach; ?>
															
															<?php endif; ?>

														</tbody>

													</table>
													
													<div class="pagination" style="text-align: center;margin: 5px 0">

													<ul>
														
														<li><a href="#">上一页</a></li>

														<li><a href="#">1</a></li>

														<li><a href="#">2</a></li>

														<li class="active"><a href="#">3</a></li>

														<li><a href="#">4</a></li>

														<li><a href="#">5</a></li>

														<li><a href="#">下一页</a></li>

													</ul>

												</div>

												</div>

											</div>

											<!-- END EXAMPLE TABLE PORTLET-->

										</div>

									</div>
								
									<?php if ($tab_position === 'tab_1_3'): ?>
									<div class="tab-pane active" id="tab_1_3">
									<?php else :?>
									<div class="tab-pane" id="tab_1_3">
									<?php endif;?>

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											这里显示所有的流量统计，一个页面算一个流量，但是不包括机器人访问

										</p>
									
										<div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">

											<!-- BEGIN EXAMPLE TABLE PORTLET-->

											<div class="portlet box grey">

												<div class="portlet-title">

													<div class="caption"><i class="icon-user"></i>流量统计</div>

												</div>

												<div class="portlet-body">

													<table class="table table-striped table-bordered table-hover" id="sample_3">

														<thead>

															<tr>

																<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes" /></th>

																<th>ID</th>

																<th class="hidden-480">IP</th>
																
																<th>来源</th>
																
																<th>被访页</th>
																
																<th>访问时间</th>
																
																<th>系统平台</th>
																
																<th>robot</th>
																
																<th>用户代理</th>

															</tr>

														</thead>

														<tbody>

															<?php if ($report_flows && is_array($report_flows)): ?>
															<?php foreach ($report_flows as $report_flow): ?>
															<!--判断它是一个数组并且不为空 -->
														
															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $report_flow['flow_id']?>" /></td>

																<td><?php echo $report_flow['flow_id']?></td>
																
																<td><div title="<?php echo $report_flow['ip']?>"><?php echo substr($report_flow['ip'],0,10)?></div></td>
																
																<td class="hidden-480"><a href="<?php echo $report_flow['referrer_url']?>" title="<?php echo $report_flow['referrer_url']?>" target="_blank"><?php echo strpos_str($report_flow['referrer_url'],'/wwww') ? substr($report_flow['referrer_url'],11,20) : substr($report_flow['referrer_url'],7,16); ?></a></td>
																
																<td><a href="<?php echo $report_flow['current_url']?>" title="<?php echo $report_flow['current_url']?>" target="_blank"><?php echo strpos_str($report_flow['current_url'],'/wwww') ? substr($report_flow['current_url'],11,20) : substr($report_flow['current_url'],7,16); ?></a></td>
																
																<td><?php echo $report_flow['access_time']?></td>
																
																<td><div title="<?php echo $report_flow['platform'].$report_flow['browser']?>"><?php echo substr($report_flow['platform'].$report_flow['browser'],0,15)?></td>
																
																<td><div title="<?php echo $report_flow['robot']?>"><?php echo substr($report_flow['robot'],0,8)?></div></td>
																
																<td><div title="<?php echo $report_flow['user_agent']?>"><?php echo substr($report_flow['user_agent'],0,12)?></div></td>
																
															</tr>

															<?php endforeach; ?>
															
															<?php endif; ?>
															
														</tbody>

													</table>
													
													<?php if(ceil($count_report_flow/$item)>1):?><!--总记录数/每页显示条数大于1才显示-->
													
													<div class="pagination" style="text-align: center;margin: 5px 0">

													<ul>
														<?php if($flow_active > 1):?>
														<li><a href="<?php echo site_url('report/report_access?tab_position=tab_1_3&flow_page=').($flow_active -'1');?>">上一页</a></li>
														<?php endif;?>
														
														<?php
															//如果页数大于10 中间分...
															if(ceil($count_report_flow/$item)>10){
																$flow_frevious='6';
																$flow_next=ceil($count_report_flow/$item)-(ceil($count_report_flow/$item) - 2 );
															}
														?>
															
														<?php if(isset($flow_frevious)):?>
														<?php for($i=1;$i<$flow_frevious;$i++):?>
														<?php if($i==$flow_active):?>
														<li class="active"><a href="<?php echo site_url('report/report_access?tab_position=tab_1_3&flow_page=').$i;?>"><?php echo $i?></a></li>
														<?php else:?>
														<li><a href="<?php echo site_url('report/report_access?tab_position=tab_1_3&flow_page=').$i;?>"><?php echo $i?></a></li>
														<?php endif;?>
														<?php endfor;?>
														<?php endif;?>
														
														<?php if(isset($flow_frevious)):?>
														<li>...</li><!--中间省略的点-->
														<?php endif;?>
														
														<?php if(isset($flow_next)):?>
														<?php for($i=ceil($count_report_flow/$item) - 2;$i< ceil($count_report_flow/$item); $i++):?>
														<?php if($i==$flow_active):?>
														<li class="active"><a href="<?php echo site_url('report/report_access?tab_position=tab_1_3&flow_page=').$i;?>"><?php echo $i?></a></li>
														<?php else:?>
														<li><a href="<?php echo site_url('report/report_access?tab_position=tab_1_3&flow_page=').$i;?>"><?php echo $i?></a></li>
														<?php endif;?>
														<?php endfor;?>
														<?php endif;?>
														
														<?php if(ceil($count_report_flow/$item) <= 10):?>
														<?php for($i=1;$i<$count_report_flow/$item;$i++):?>
														<?php if($i==$flow_active):?>
														<li class="active"><a href="<?php echo site_url('report/report_access?tab_position=tab_1_3&flow_page=').$i;?>"><?php echo $i?></a></li>
														<?php else:?>
														<li><a href="<?php echo site_url('report/report_access?tab_position=tab_1_3&flow_page=').$i;?>"><?php echo $i?></a></li>
														<?php endif;?>
														<?php endfor;?>
														<?php endif;?>
														
														<?php if(ceil($count_report_flow/$item) !== $flow_active ):?>
														<li><a href="<?php echo site_url('report/report_access?tab_position=tab_1_3&flow_page=').ceil($count_report_flow/$item);?>">尾页</a></li>
														<?php endif;?>

													</ul>

												</div>
												
												<?php endif;?>

												</div>

											</div>

											<!-- END EXAMPLE TABLE PORTLET-->

										</div>

									</div>
									
									<!--抓取统计-->
									
									<?php if ($tab_position === 'tab_1_5'): ?>
									<div class="tab-pane active" id="tab_1_5">
									<?php else :?>
									<div class="tab-pane" id="tab_1_5">
									<?php endif;?>

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											这里显示所有的流量统计，一个页面算一个流量，但是不包括机器人访问

										</p>
									
										<div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">

											<!-- BEGIN EXAMPLE TABLE PORTLET-->

											<div class="portlet box grey">

												<div class="portlet-title">

													<div class="caption"><i class="icon-user"></i>抓取统计</div>

												</div>

												<div class="portlet-body">

													<table class="table table-striped table-bordered table-hover" id="sample_5">

														<thead>

															<tr>

																<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_5 .checkboxes" /></th>

																<th>ID</th>

																<th class="hidden-480">IP</th>
																
																<th>抓取平台</th>
																
																<th>URL</th>
																
																<th>抓取时间</th>

															</tr>

														</thead>

														<tbody>

															<?php if ($report_robots && is_array($report_robots)): ?>
															<?php foreach ($report_robots as $report_robot): ?>
															<!--判断它是一个数组并且不为空 -->
														
															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $report_robot['robot_id']?>" /></td>

																<td><?php echo $report_robot['ip']?></td>
																
																<td class="hidden-480"><?php echo $report_robot['robot_name']?></td>

																<td><?php echo $report_robot['url']?></td>
																
																<td><?php echo $report_robot['access_time']?></td>

															</tr>

															<?php endforeach; ?>
															
															<?php endif; ?>
															
														</tbody>

													</table>
													
													<div class="pagination" style="text-align: center;margin: 5px 0">

													<ul>
														
														<li><a href="#">上一页</a></li>

														<li><a href="#">1</a></li>

														<li><a href="#">2</a></li>

														<li class="active"><a href="#">3</a></li>

														<li><a href="#">4</a></li>

														<li><a href="#">5</a></li>

														<li><a href="#">下一页</a></li>

													</ul>

												</div>

												</div>

											</div>

											<!-- END EXAMPLE TABLE PORTLET-->

										</div>

									</div>
									
									<!--抓取统计-->

								</div>

							</div>

							<!--END TABS-->

						</div>

						<!-- END SAMPLE FORM PORTLET-->

				<!-- END PAGE CONTENT-->

			</div>

			<!-- END PAGE CONTAINER--> 

		</div>

		<!-- END PAGE -->    
		</div>
	</div>

	<!-- END CONTAINER -->
	
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<script src="<?php echo base_url('public/js/jquery.slimscroll.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/js/jquery.blockui.min.js')?>" type="text/javascript"></script>  

	<script src="<?php echo base_url('public/js/jquery.cookie.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/js/jquery.uniform.min.js')?>" type="text/javascript" ></script>
	
	<script src="<?php echo base_url('public/js/jquery.validate.js')?>" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script type="text/javascript" src="<?php echo base_url('public/js/bootstrap-fileupload.js')?>"></script>

	<script type="text/javascript" src="<?php echo base_url('public/js/chosen.jquery.min.js')?>"></script>
	
	<script type="text/javascript" src="<?php echo base_url('public/js/select2.min.js')?>"></script>

	<script type="text/javascript" src="<?php echo base_url('public/js/bootstrap-datetimepicker.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/js/jquery.inputmask.bundle.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/js/jquery.input-ip-address-control-1.0.min.js')?>"></script>

	<script type="text/javascript" src="<?php echo base_url('public/js/date.js')?>"></script>
	
	<script type="text/javascript" src="<?php echo base_url('public/js/jquery.multi-select.js')?>"></script>

	<script type="text/javascript" src="<?php echo base_url('public/js/daterangepicker.js')?>"></script> 
	
	<script type="text/javascript" src="<?php echo base_url('public/js/jquery.dataTables.js')?>"></script>
	
	<script type="text/javascript" src="<?php echo base_url('public/js/DT_bootstrap.js')?>"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="<?php echo base_url('public/js/setting.js')?>"></script>
	<script src="<?php echo base_url('public/js/app.js')?>"></script>
	<script src="<?php echo base_url('public/js/form-samples.js')?>"></script>
	<script src="<?php echo base_url('public/js/form-components.js')?>"></script>
	<script src="<?php echo base_url('public/js/table-managed.js')?>"></script>

	<!-- END PAGE LEVEL SCRIPTS -->

	
	<script>

		jQuery(document).ready(function() {       

		   // initiate layout and plugins

		   App.init();
		   FormSamples.init();
		   FormComponents.init();
		   TableManaged.init();

		});

	</script>

	<!-- END JAVASCRIPTS -->

<!-- END BODY -->

</html>