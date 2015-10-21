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
									<a href="#tab_1_2" data-toggle="tab">布局列表</a>
									</li>
									
									<?php if ($tab_position === 'tab_1_3'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_3" data-toggle="tab">插件列表</a>
									</li>
									
									<?php if ($tab_position === 'tab_1_4'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_4" data-toggle="tab">布局插件设置</a>
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

											布局列表，在这里管理整站的布局路由用来加载相应页面（路由）的模块显示

										</p>
									
										<div class="responsive" data-tablet="span12 fix-offset" data-desktop="span12">

											<!-- BEGIN EXAMPLE TABLE PORTLET-->

											<div class="portlet box grey">

												<div class="portlet-title">

													<div class="caption"><i class="icon-user"></i>网站页面列表</div>

													<div class="actions">

														<a href="<?php echo site_url('setting/layout_form')?>" class="btn blue"><i class="icon-pencil"></i>

														添加

														</a>    
														
														<div class="btn-group">

															<a class="btn green" href="#" data-toggle="dropdown">

															<i class="icon-cogs"></i> 编辑

															<i class="icon-angle-down"></i>

															</a>

															<ul class="dropdown-menu pull-right">

																<!--<li><a href="#"><i class="icon-pencil"></i> Edit</a></li>-->

																<li><a href="#"><i class="icon-trash"></i>删除</a></li>

																<li><a href="#"><i class="icon-ban-circle"></i>不显示</a></li>

																<li class="divider"></li>

																<li><a href="#"><i class="i"></i>禁止其它管理员修改</a></li>

															</ul>

														</div>

													</div>

												</div>

												<div class="portlet-body">

													<table class="table table-striped table-bordered table-hover" id="sample_2">

														<thead>

															<tr>

																<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" /></th>

																<th>布局名称</th>

																<th class="hidden-480">路由</th>

																<th>修改</th>

															</tr>

														</thead>

														<tbody>

															<?php if ($layouts && is_array($layouts)): ?>
															<?php foreach ($layouts as $layout): ?>
															<!--判断它是一个数组并且不为空 -->
														
															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $layout['layout_id']?>" /></td>

																<td><?php echo $layout['layout_name']?></td>

																<td class="hidden-480"><a href="<?php echo site_url($layout['route'])?>"><?php echo $layout['route']?></a></td>

																<td>
																<span class="label label-success"><a href="<?php echo site_url('setting/layout_form').'?layout_id='.$layout['layout_id'].'&tab_position=tab_1_2'?>" style="color: #FFF">修改</a></span>
																<span class="label label-success" style="margin-left: 5px"><a href="<?php echo site_url('setting/layout/del_layout').'?layout_id='.$layout['layout_id']?>" style="color: #FFF">删除</a></span>
																</td>

															</tr>
															
															<?php endforeach; ?>
															
															<?php endif; ?>

														</tbody>

													</table>

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

											插件列表（未安装的插件请单击安装）

										</p>
									
										<div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">

											<!-- BEGIN EXAMPLE TABLE PORTLET-->

											<div class="portlet box grey">

												<div class="portlet-title">

													<div class="caption"><i class="icon-user"></i>插件列表</div>

													<!--
													<div class="actions">

														<a href="<?php echo site_url('setting/layout_form')?>" class="btn blue"><i class="icon-pencil"></i>

														添加

														</a>    
														
														<div class="btn-group">

															<a class="btn green" href="#" data-toggle="dropdown">

															<i class="icon-cogs"></i> 编辑

															<i class="icon-angle-down"></i>

															</a>

															<ul class="dropdown-menu pull-right">

																<!--<li><a href="#"><i class="icon-pencil"></i> Edit</a></li>-->

																<!--
																
																<li><a href="#"><i class="icon-trash"></i>删除</a></li>

																<li><a href="#"><i class="icon-ban-circle"></i>不显示</a></li>

																<li class="divider"></li>

																<li><a href="#"><i class="i"></i>禁止其它管理员修改</a></li>

															</ul>

														</div>

													</div>
													-->
												</div>

												<div class="portlet-body">

													<table class="table table-striped table-bordered table-hover" id="sample_3">

														<thead>

															<tr>

																<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes" /></th>

																<th>插件名称</th>

																<th class="hidden-480">描述</th>
																
																<th class="hidden-480">作者</th>

																<th>操作</th>

															</tr>

														</thead>

														<tbody>

															<?php if ($modules && is_array($modules)): ?>
															<?php foreach ($modules as $module): ?>
															<!--判断它是一个数组并且不为空 -->
														
															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $module['module_id']?>" /></td>

																<td><?php echo $module['name']?></td>
																
																<td class="hidden-480"><?php echo $module['description']?></td>

																<td class="hidden-480"><a href="#"><?php echo $module['author']?></a></td>

																<td>
																<?php if ($module['module_id']): ?>
																<span class="label label-inverse label-margin">已安装</span>
																<span class="label label-success label-margin"><a style="color: #FFF" href="<?php echo site_url('setting/layout/uninstall_module').'?module_id='.$module['module_id']?>">卸载</a></span>
																<span class="label label-success label-margin">管理</span>
																<?php else: ?>
																<span class="label label-success label-margin"><a style="color: #FFF;text-decoration:none;" href="<?php echo site_url('setting/layout/install_module').'?module_id='.$module['module_id'].'&name='.$module['name'].'&description='.$module['description'].'&author='.$module['author'].'&code='.$module['code']?>">安&nbsp;装</a></span>
																<span class="label label-inverse label-margin">卸载</span>
																<span class="label label-inverse label-margin">管理</span>
																<?php endif; ?>
																</td>

															</tr>

															<?php endforeach; ?>
															
															<?php endif; ?>
															
														</tbody>

													</table>

												</div>

											</div>

											<!-- END EXAMPLE TABLE PORTLET-->

										</div>

									</div>
									
									<?php if ($tab_position === 'tab_1_4'): ?>
									<div class="tab-pane active" id="tab_1_4">
									<?php else :?>
									<div class="tab-pane" id="tab_1_4">
									<?php endif;?>

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											布局模块设置

										</p>
										
																				<div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">

											<!-- BEGIN EXAMPLE TABLE PORTLET-->

											<div class="portlet box grey">

												<div class="portlet-title">

													<div class="caption"><i class="icon-user"></i>布局模块列表</div>

													<div class="actions">

														<a href="<?php echo site_url('setting/layout_form')?>" class="btn blue"><i class="icon-pencil"></i>

														添加

														</a>    
														
														<div class="btn-group">

															<a class="btn green" href="#" data-toggle="dropdown">

															<i class="icon-cogs"></i> 编辑

															<i class="icon-angle-down"></i>

															</a>

															<ul class="dropdown-menu pull-right">

																<!--<li><a href="#"><i class="icon-pencil"></i> Edit</a></li>-->

																<li><a href="#"><i class="icon-trash"></i>删除</a></li>

																<li><a href="#"><i class="icon-ban-circle"></i>不显示</a></li>

																<li class="divider"></li>

																<li><a href="#"><i class="i"></i>禁止其它管理员修改</a></li>

															</ul>

														</div>

													</div>

												</div>

												<div class="portlet-body">

													<table class="table table-striped table-bordered table-hover" id="sample_4">

														<thead>

															<tr>

																<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_4 .checkboxes" /></th>

																<th>名称</th>

																<th class="hidden-480">布局名称</th>

																<th class="hidden-480">模块名称</th>
																
																<th class="hidden-480">内部位置</th>
																
																<th class="hidden-480">外部位置</th>
																
																<th class="hidden-480">排序</th>
																
																<th class="hidden-480">手机</th>
																
																<th>操作</th>

															</tr>

														</thead>

														<tbody>

															<?php if ($layout_modules && is_array($layout_modules)): ?>
															<?php foreach ($layout_modules as $layout_module): ?>
															<!--判断它是一个数组并且不为空 -->
														
															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $layout_module['layout_module_id']?>" /></td>

																<td><?php echo $layout_module['name']?></td>

																<?php foreach ($layouts as $layout): ?>
																<?php if ($layout['layout_id']==$layout_module['layout_id']): ?>
																<td class="hidden-480"><?php echo $layout['layout_name']?></td>
																<?php endif; ?>
																<?php endforeach; ?>
																
																<?php foreach ($modules as $module): ?>
																<?php if ($module['module_id']==$layout_module['module_id']): ?>
																<td class="hidden-480"><?php echo $module['name']?></td>
																<?php endif; ?>
																<?php endforeach; ?>
																
																<?php if ($layout_module['position_within']=='page'): ?>
																<td class="hidden-480">通页</td>
																<?php elseif ($layout_module['position_within']=='left'): ?>
																<td class="hidden-480">左</td>
																<?php elseif ($layout_module['position_within']=='right'): ?>
																<td class="hidden-480">右</td>
																<?php elseif ($layout_module['position_within']=='top'): ?>
																<td class="hidden-480">上</td>
																<?php elseif ($layout_module['position_within']=='bottom'): ?>
																<td class="hidden-480">底</td>
																<?php elseif ($layout_module['position_within']=='middle'): ?>
																<td class="hidden-480">中</td>
																<?php endif; ?>
																
																<?php if ($layout_module['position_outer']=='page'): ?>
																<td class="hidden-480">通页</td>
																<?php elseif ($layout_module['position_outer']=='left'): ?>
																<td class="hidden-480">左</td>
																<?php elseif ($layout_module['position_outer']=='right'): ?>
																<td class="hidden-480">右</td>
																<?php elseif ($layout_module['position_outer']=='top'): ?>
																<td class="hidden-480">上</td>
																<?php elseif ($layout_module['position_outer']=='bottom'): ?>
																<td class="hidden-480">底</td>
																<?php elseif ($layout_module['position_outer']=='middle'): ?>
																<td class="hidden-480">中</td>
																<?php endif; ?>
																
																<td class="hidden-480"><?php echo $layout_module['order']?></td>
																
																<?php if ($layout_module['is_mobile']=='1'): ?>
																<td class="hidden-480">是</td>
																<?php else: ?>
																<td class="hidden-480">否</td>
																<?php endif; ?>

																<td><span class="label label-success"><a style="color: #FFF" href="<?php echo site_url('setting/layout_form').'?layout_module_id='.$layout_module['layout_module_id'].'&tab_position=tab_1_3'?>">修改</a></span></td>

															</tr>
															
															<?php endforeach; ?>
															
															<?php endif; ?>

														</tbody>

													</table>

												</div>

											</div>

											<!-- END EXAMPLE TABLE PORTLET-->

										</div>

									</div>

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