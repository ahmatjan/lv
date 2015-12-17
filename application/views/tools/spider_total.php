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
									<a href="#tab_1_2" data-toggle="tab">爬虫设置</a>
									</li>
									
									<?php if ($tab_position === 'tab_1_3'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_3" data-toggle="tab">网站列表</a>
									</li>
									
									<?php if ($tab_position === 'tab_1_5'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_5" data-toggle="tab">抓取索引</a>
									</li>
									
									<?php if ($tab_position === 'tab_1_6'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_6" data-toggle="tab">IP黑名单</a>
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
													
													<div class="actions">

														<div class="btn-group">

															<a class="btn green" href="#" data-toggle="dropdown">

															<i class="icon-cogs"></i> 清空表

															<i class="icon-angle-down"></i>

															</a>

															<ul class="dropdown-menu pull-right">

																<!--<li><a href="#"><i class="icon-pencil"></i> Edit</a></li>-->

																<li><a href="<?php echo site_url('report/report_access/truncate_report?table_name=report_access')?>"><i class="icon-trash"></i>清空uv统计表</a></li>

																<li><a href="<?php echo site_url('report/report_access/truncate_report?table_name=report_flow')?>"><i class="icon-trash"></i>清空pv统计表</a></li>
																<li><a href="<?php echo site_url('report/report_access/truncate_report?table_name=report_robot')?>"><i class="icon-trash"></i>清空robot统计表</a></li>
																<li><a href="<?php echo site_url('report/report_access/truncate_report?table_name=spider_url')?>"><i class="icon-trash"></i>清空搜索索引表</a></li>

																<li class="divider"></li>

																<li><a href="<?php echo site_url('report/report_access/truncate_report?table_name=report_access-report_flow-report_robot')?>"><i class="i"></i>清空所有统计表</a></li>
																
																<li><a target="_black" href="<?php echo site_url('tools/spider/spider_index?url='.$spider_url)?>"><i class="i"></i>运行抓取爬虫</a></li>

															</ul>

														</div>

													</div>

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

																<td><div title="<?php echo $report_access['ip']?>"><?php echo $report_access['ip']?></div></td>
															
																<td class="hidden-480"><?php echo $report_access['access_time']?></td>
																
																<td class="hidden-480"><div title="<?php echo $report_access['ip_address']['country'].$report_access['ip_address']['region'].$report_access['ip_address']['region']?>"><?php echo $report_access['ip_address']['region'] ? substr_cn($report_access['ip_address']['region'].$report_access['ip_address']['city'],20) : substr_cn($report_access['ip_address']['country'],20)?></div></td>
																
																<td class="hidden-480"><div title="<?php echo $report_access['platform'].$report_access['browser']?>"><?php echo substr_cn($report_access['platform'].$report_access['browser'],16)?></td>
																
																<td class="hidden-480"><a href="<?php echo site_url('user/user_page?user_id='.$report_access['user_id'])?>" target="_blank" title="<?php echo $report_access['user_name']?>"><?php echo substr_cn($report_access['user_name'],15)?></a></td>
																
															</tr>
															
															<?php endforeach; ?>
															
															<?php endif; ?>

														</tbody>

													</table>
													
													
													<div class="pagination" style="text-align: center;margin: 5px 0">

												<?php echo $access_page;?>

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
																
																<th class="hidden-480">域名</th>
																
																<th>名称</th>
																
																<th>操作</th>
																
															</tr>

														</thead>

														<tbody>

															<?php if ($sites && is_array($sites)): ?>
															<?php foreach ($sites as $site): ?>
															<!--判断它是一个数组并且不为空 -->
														
															<tr class="odd gradeX">

																<td><div title="<?php echo $site['site_id']?>"><input type="checkbox" class="checkboxes" value="<?php echo $site['site_id']?>" /></div></td>

																<td><?php echo $site['site_id']?></div></td>
																
																<td class="hidden-480"><?php echo $site['domain']?></td>
																
																<td>
																<!--判断$site['name']是否为空-->
																<?php if(!empty($site['name'])):?>
																<a href="<?php echo $site['domain']?>" title="<?php echo $site['name']?>" target="_blank"><?php echo mb_substr($site['name'],0,20)?></a>
																<?php else:?>
																<a>--空--</a>
																<?php endif;?>
																</td>
																
																<td>
																	<span class="label label-success"><a target="_black" href="<?php echo site_url('tools/spider/spider_index?url='.$site['domain'])?>" style="color: #FFF">重建索引</a></span>
																<span class="label label-success" style="margin-left: 5px"><a href="<?php echo site_url('tools/spider_total/del_site').'?site_id='.$site['site_id']?>" style="color: #FFF">删除</a></span>
																</td>
																
																
															</tr>

															<?php endforeach; ?>
															
															<?php endif; ?>
															
														</tbody>

													</table>
													
													<div class="pagination" style="text-align: center;margin: 5px 0">

													<ul>
													
													<?php echo $site_page?>

													</ul>

												</div>
												
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
																
																<th class="hidden-480">ID</th>

																<th class="hidden-480">URL</th>
																
																<th>抓取时间</th>
																
																<th>标题</th>

															</tr>

														</thead>

														<tbody>

															<?php if ($spider_urls && is_array($spider_urls)): ?>
															<?php foreach ($spider_urls as $spider_url): ?>
															<!--判断它是一个数组并且不为空 -->
														
															<tr class="odd gradeX">

																<td><span title="<?php echo $spider_url['url_id']?>"><input type="checkbox" class="checkboxes" value="<?php echo $spider_url['url_id']?>" /></span></td>
																
																<td class="hidden-480"><?php echo $spider_url['url_id']?></td>

																<td><a href="<?php echo $spider_url['url']?>" title="<?php echo $spider_url['url']?>"><?php echo mb_substr($spider_url['url'],7,15)?></a></td>
																
																<td class="hidden-480"><div title="<?php echo $spider_url['addtime']?>"><?php echo mb_substr($spider_url['addtime'],5,20)?></div></td>

																<td><?php echo mb_substr($spider_url['title'],0,45)?></td>

															</tr>

															<?php endforeach; ?>
															
															<?php endif; ?>
															
														</tbody>

													</table>
													
													<div class="pagination" style="text-align: center;margin: 5px 0">

													<ul>
														<?php echo $spider_page?>
													</ul>

												</div>
												
												</div>

											</div>

											<!-- END EXAMPLE TABLE PORTLET-->

										</div>

									</div>
									
									<!--抓取统计-->
									
									<!--未知统计-->
									
									<?php if ($tab_position === 'tab_1_6'): ?>
									<div class="tab-pane active" id="tab_1_6">
									<?php else :?>
									<div class="tab-pane" id="tab_1_6">
									<?php endif;?>

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											这里显示IP黑名单

										</p>
									
										<div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">

											<!-- BEGIN EXAMPLE TABLE PORTLET-->

											<div class="portlet box grey">

												<div class="portlet-title">

													<div class="caption"><i class="icon-user"></i>抓取统计</div>

												</div>

												<div class="portlet-body">

													<table class="table table-striped table-bordered table-hover" id="sample_6">

														<thead>

															<tr>

																<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_6 .checkboxes" /></th>
																
																<th>IP</th>
																
																<th>状态</th>
																
																<th class="hidden-480">备注</th>
																
															</tr>

														</thead>

														<tbody>

															<?php if ($black_ips && is_array($black_ips)): ?>
															<?php foreach ($black_ips as $black_ip): ?>
															<!--判断它是一个数组并且不为空 -->
														
															<tr class="odd gradeX">

																<td><span title="<?php echo $black_ip['id']?>"><input type="checkbox" class="checkboxes" value="<?php echo $black_ip['id']?>" /></span></td>
																
																<td><?php echo $black_ip['ip']?></td>

																<td><?php echo $black_ip['start']?></td>
																
																<td class="hidden-480"><?php echo mb_substr($black_ip['remark'],0,25)?></td>
																
															</tr>

															<?php endforeach; ?>
															
															<?php endif; ?>
															
														</tbody>

													</table>
													
													<div class="pagination" style="text-align: center;margin: 5px 0">

													<ul>
														<?php echo $black_page?>
													</ul>

												</div>
												
												</div>

											</div>

											<!-- END EXAMPLE TABLE PORTLET-->

										</div>

									</div>
									
									<!--未知抓取-->

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

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.slimscroll.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.blockui.min.js')?>" type="text/javascript"></script>  

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.cookie.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.uniform.min.js')?>" type="text/javascript" ></script>
	
	<script src="<?php echo base_url('public/min/?f=public/js/jquery.validate.js')?>" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/bootstrap-fileupload.js')?>"></script>

	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/chosen.jquery.min.js')?>"></script>
	
	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/select2.min.js')?>"></script>

	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/bootstrap-datetimepicker.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/jquery.inputmask.bundle.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/jquery.input-ip-address-control-1.0.min.js')?>"></script>

	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/date.js')?>"></script>
	
	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/jquery.multi-select.js')?>"></script>

	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/daterangepicker.js')?>"></script> 
	
	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/jquery.dataTables.min.js')?>"></script>
	
	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/DT_bootstrap.js')?>"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="<?php echo base_url('public/min/?f=public/js/setting.js')?>"></script>
	<script src="<?php echo base_url('public/min/?f=public/js/app.js')?>"></script>
	<script src="<?php echo base_url('public/min/?f=public/js/form-samples.js')?>"></script>
	<script src="<?php echo base_url('public/min/?f=public/js/form-components.js')?>"></script>
	<script src="<?php echo base_url('public/min/?f=public/js/table-managed.js')?>"></script>

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