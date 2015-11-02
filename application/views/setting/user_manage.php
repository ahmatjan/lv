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
									<a href="#tab_1_2" data-toggle="tab">用户列表</a>
									</li>
									
									<?php if ($tab_position === 'tab_1_3'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_3" data-toggle="tab">用户组列表</a>
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

											在这里可以查看所有的用户

										</p>
									
										<div class="responsive" data-tablet="span12 fix-offset" data-desktop="span12">

											<!-- BEGIN EXAMPLE TABLE PORTLET-->

											<div class="portlet box grey">

												<div class="portlet-title">

													<div class="caption"><i class="icon-user"></i>用户列表</div>

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

																<th class="hidden-480">ID</th>

																<th>用户名</th>
																
																<th class="hidden-480">昵称</th>
																
																<th class="hidden-480">手机号</th>
																
																<th class="hidden-480">邮箱</th>
																
																<th class="hidden-480">微信</th>
																
																<th class="hidden-480">QQ</th>
																
																<th>用户组</th>
																
																<th class="hidden-480">状态</th>

																<th>操作</th>

															</tr>

														</thead>

														<tbody>

															<?php if ($user_infos && is_array($user_infos)): ?>
															<?php foreach ($user_infos as $user_info): ?>
															<!--判断它是一个数组并且不为空 -->
														
															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $user_info['user_id']?>" /></td>

																<td class="hidden-480"><?php echo $user_info['user_id']?></td>

																<td><a href="<?php echo site_url('user/user_page?user_id='.$user_info['user_id'])?>" target="_blank"><?php echo $user_info['user_name']?></a></td>
																
																<?php if(isset($user_info['nick_name'])):?>
																
																<td class="hidden-480"><?php echo $user_info['nick_name']?></td>
																
																<?php else : ?>
																
																<td class="hidden-480">--未填写--</td>
																
																<?php endif;?>
																
																<?php if(isset($user_info['mobile'])):?>
																
																<td class="hidden-480"><?php echo $user_info['mobile']?></td>
																
																<?php else : ?>
																
																<td class="hidden-480">--未填写--</td>
																
																<?php endif;?>
																
																<?php if(isset($user_info['email'])):?>
																
																<td class="hidden-480"><?php echo $user_info['email']?></td>
																
																<?php else : ?>
																
																<td class="hidden-480">--未填写--</td>
																
																<?php endif;?>
																
																<?php if(isset($user_info['wechat'])):?>
																
																<td class="hidden-480"><?php echo $user_info['wechat']?></td>
																
																<?php else : ?>
																
																<td class="hidden-480">--未填写--</td>
																
																<?php endif;?>
																
																<?php if(isset($user_info['QQ'])):?>
																
																<td class="hidden-480"><?php echo $user_info['QQ']?></td>
																
																<?php else : ?>
																
																<td class="hidden-480">--未填写--</td>
																
																<?php endif;?>
																
																<td><?php echo $user_info['group_name']?></td>
																
																<?php if($user_info['status']=='1'):?>
																
																<td class="hidden-480">正常<span class="label label-inverse"><a" style="color: #FFF;cursor:pointer">拉黑</a></span></td>
																
																<?php else : ?>
																
																<td class="hidden-480">禁止<span class="label label-success"><a" style="color: #FFF;cursor:pointer">解禁</a></span></td>
																
																<?php endif;?>

																<td>
																
																<span class="label label-success"><a href="<?php echo site_url('setting/user_manage/login_user').'?user_id='.$user_info['user_id']?>" style="color: #FFF">登陆</a></span>
																<span class="label label-success" style="margin-left: 5px"><a href="<?php echo site_url('setting/layout/del_layout').'?layout_id='?>" style="color: #FFF">删除</a></span>
																
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

											这里显示所有的用户分组信息

										</p>
									
										<div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">

											<!-- BEGIN EXAMPLE TABLE PORTLET-->

											<div class="portlet box grey">

												<div class="portlet-title">

													<div class="caption"><i class="icon-user"></i>分组列表</div>

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

																<li><a href="#"><i class="icon-pencil"></i> Edit</a></li>

																<li><a href="#"><i class="icon-trash"></i>删除</a></li>

																<li><a href="#"><i class="icon-ban-circle"></i>不显示</a></li>

																<li class="divider"></li>

																<li><a href="#"><i class="i"></i>禁止其它管理员修改</a></li>

															</ul>

														</div>

													</div>
													
												</div>

												<div class="portlet-body">

													<table class="table table-striped table-bordered table-hover" id="sample_3">

														<thead>

															<tr>

																<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes" /></th>

																<th>用户组名称</th>

																<th class="hidden-480">描述</th>
																
																<th>操作</th>

															</tr>

														</thead>

														<tbody>

															<?php if ($groups && is_array($groups)): ?>
															<?php foreach ($groups as $group): ?>
															<!--判断它是一个数组并且不为空 -->
														
															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $group['group_id']?>" /></td>

																<td><?php echo $group['name']?></td>
																
																<td class="hidden-480"><?php echo $group['description']?></td>

																<td>
																<span class="label label-success label-margin"><a style="color: #FFF" href="<?php echo site_url('setting/user_manage/edit_usergroup').'?group_id='.$group['group_id']?>">修改</a></span>
																<span class="label label-success label-margin"><a style="color: #FFF;text-decoration:none;" href="<?php echo site_url('setting/layout/install_module').'?module_id='?>">删除</a></span>
																
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