	<!-- BEGIN CONTAINER -->   

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
									<a href="#tab_1_2" data-toggle="tab">插件设置</a>
									</li>
								
									<?php if ($tab_position === 'tab_1_3'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_3" data-toggle="tab">节日管理</a>
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

											在这里设置你的节日提示插件

										</p>
										
										<!-- BEGIN FORM-->

										<form action="setting/layout_form/add_layout" class="form-horizontal" method="post" enctype="multipart/form-data">

											<div class="control-group">

												<label class="control-label">名称：</label>

												<div class="controls">

													<input type="text" id="firstName" class="m-wrap span12" placeholder="路由（网页）名称..." name="layout_name" value="<?php echo $layouts['layout_name']?>">
													
												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">路由：</label>

												<div class="controls">

													<input type="text" id="firstName" class="m-wrap span12" placeholder="路由（控制器文件的路径，例如：user/user_center）..." name="layout_route" value="<?php echo $layouts['route']?>">

												</div>

											</div>
											
											<div class="form-actions">

												<input type="hidden" name="layout_id" value="<?php echo $layouts['layout_id']?>">

												<button type="submit" class="btn blue">提交</button>

												<button type="button" class="btn">取消</button>                            

											</div>

										</form>

										<!-- END FORM--> 

									</div>
								
									<?php if ($tab_position === 'tab_1_3'): ?>
									<div class="tab-pane active" id="tab_1_3">
									<?php else :?>
									<div class="tab-pane" id="tab_1_3">
									<?php endif;?>

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											在这里设置你的节日

										</p>
										
										<!-- BEGIN FORM-->

										<form action="setting/layout_form/add_layout_module" class="form-horizontal" method="post" enctype="multipart/form-data">
										
										
											<div class="control-group">

												<label class="control-label">名称：</label>

												<div class="controls">

													<input type="text" id="firstName" class="m-wrap span12" placeholder="模块布局在后台上显示的名称..." name="layout_module_name" value="<?php echo $layout_module['name']?>">

												</div>

											</div>

											<div class="control-group">

												<label class="control-label">选择布局：</label>

												<div class="controls">

													<select class="m-wrap span12" name="layout_id">

														<?php if ($layout_module['layout_name']): ?>
														
														<option value="<?php echo $layout_module['layout_id']?>"><?php echo $layout_module['layout_name']?></option>
														<?php else: ?>
														
														<option value="">--请选择一个布局--</option>
														
														<?php endif; ?>
														
														<?php if (!empty($layouts_info)): ?>
														
														<?php foreach ($layouts_info as $layout): ?>

														<option value="<?php echo $layout['layout_id']?>"><?php echo $layout['layout_name']?></option>

														<?php endforeach; ?>
														
														<?php endif; ?>
														
													</select>

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">选择插件：</label>

												<div class="controls">

													<select class="m-wrap span12" name="module_id">

														<?php if ($layout_module['layout_name']): ?>
														
														<option value="<?php echo $layout_module['module_id']?>"><?php echo $layout_module['module_name']?></option>
														
														<?php else: ?>

														<option value="">--请选择一个插件--</option>

														<?php endif; ?>

														<?php if (!empty($modules_info)): ?>
														
														<?php foreach ($modules_info as $module): ?>

														<option value="<?php echo $module['module_id']?>"><?php echo $module['name']?></option>

														<?php endforeach; ?>
														
														<?php endif; ?>

													</select>

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">外部显示位置：</label>

												<div class="controls">

													<select class="m-wrap span12" name="position">

														<?php if ($layout_module['position']=='top'):?>
														<option value="top" selected="selected">内容顶部</option>
														<option value="">--请选择一个内部位置--</option>
														<option value="bottom">内容底部</option>
														<option value="left">内容左边</option>
														<option value="right">内容右边</option>
														<option value="middle">页面中间</option>
														<?php elseif ($layout_module['position']=='middle'): ?>
														<option value="middle" selected="selected">页面中间</option>
														<option value="">--请选择一个内部位置--</option>
														<option value="top">内容顶部</option>
														<option value="bottom">内容底部</option>
														<option value="left">内容左边</option>
														<option value="right">内容右边</option>
														<?php elseif ($layout_module['position']=='bottom'): ?>
														<option value="bottom" selected="selected">内容底部</option>
														<option value="">--请选择一个内部位置--</option>
														<option value="top">内容顶部</option>
														<option value="left">内容左边</option>
														<option value="right">内容右边</option>
														<option value="middle">页面中间</option>
														<?php elseif ($layout_module['position']=='left'): ?>
														<option value="left" selected="selected">内容左边</option>
														<option value="">--请选择一个内部位置--</option>
														<option value="top">内容顶部</option>
														<option value="bottom">内容底部</option>
														<option value="right">内容右边</option>
														<option value="middle">页面中间</option>
														<?php elseif ($layout_module['position']=='right'): ?>
														<option value="right" selected="selected">内容右边</option>
														<option value="">--请选择一个内部位置--</option>
														<option value="top">内容顶部</option>
														<option value="bottom">内容底部</option>
														<option value="left">内容左边</option>
														<option value="middle">页面中间</option>
														<?php else: ?>
														<option value="" selected="selected">--请选择一个内部位置--</option>
														<option value="top">内容顶部</option>
														<option value="bottom">内容底部</option>
														<option value="left">内容左侧</option>
														<option value="right">内容右侧</option>
														<option value="middle">页面中间</option>
														<?php endif; ?>
													</select>
													
												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">排序：</label>

												<div class="controls">

													<input type="text" id="firstName" class="m-wrap span12" placeholder="排序..." name="sort" value="<?php echo $layout_module['sort']?>">

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">是否在手机上显示：</label>

												<div class="controls">

													<select class="m-wrap span12" name="is_mobile">
														<?php if ($layout_module['is_mobile']=='1'):?>
														<option value="1" selected="selected">是</option>
														<option value="0">否</option>
														<?php elseif ($layout_module['is_mobile']=='0'): ?>
														<option value="0" selected="selected">否</option>
														<option value="1">是</option>
														<?php else:?>
														<option value="0" selected="selected">否</option>
														<option value="1">是</option>
														<?php endif; ?>
													</select>

												</div>

											</div>
											
											<div class="form-actions">

												<input type="hidden" name="layout_module_id" value="<?php echo $layout_module['layout_module_id']?>">

												<button type="submit" class="btn blue">提交</button>

												<button type="button" class="btn">取消</button>                            

											</div>

										</form>

										<!-- END FORM--> 

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
	
	<script type="text/javascript" src="<?php echo base_url('public/js/jquery.multi-select.js')?>"></script>

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