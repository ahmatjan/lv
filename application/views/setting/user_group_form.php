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

								<div class="caption"><i class="icon-reorder"></i>请选择一个类型</div>

							</div>

							<!--BEGIN TABS-->

							<div class="tabbable tabbable-custom" style="margin-bottom: 0">

								<ul class="nav nav-tabs" style="background-color: #FFF">

									<li class="active">
									<a href="#tab_1_5" data-toggle="tab">用户组修改</a>
									</li>

								</ul>

								<div class="tab-content">
									
									<div class="tab-pane active" id="tab_1_5">

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											用户组修改

										</p>
										
										<!-- BEGIN FORM-->

										<form action="<?php echo site_url('setting/user_manage/edit_groupinfo')?>" class="form-horizontal" method="post" enctype="multipart/form-data">

											<div class="control-group">

												<label class="control-label">名称：</label>

												<div class="controls">

													<input type="text" id="firstName" class="m-wrap span12" name="group_name" placeholder="请填写用户组名称..." value="<?php echo $group_name?>">

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">描述：</label>

												<div class="controls">

													<input type="text" id="firstName" class="m-wrap span12" name="group_description" placeholder="请填写用户组描述..." value="<?php echo $group_description?>">

												</div>

											</div>
											
											<div class="control-group">

											<label class="control-label">查看权限：</label>

											<div class="controls">

												<select multiple="multiple" id="my_multi_select1" name="my_multi_select1[]">
												
													<optgroup label="没有查看权限">
													
													<?php foreach ($permission_view2 as $permission_view2_): ?>
													<!--遍历控制器-->
														
														<option><?php echo $permission_view2_?></option>;
														
													<?php endforeach; ?>
													
													</optgroup>
													
													<optgroup label="已有权限">

														<?php foreach ($permission_view1 as $permission_view1_): ?>
														<!--遍历控制器文件夹下内容-->
													
														<option selected="selected"><?php echo $permission_view1_?></option>;
														
														<?php endforeach; ?>

													</optgroup>
													
												</select>

											</div>

										</div>
										
										<div class="control-group">

											<label class="control-label">编辑权限：</label>

											<div class="controls">

												<select multiple="multiple" id="my_multi_select2" name="my_multi_select2[]">
												
													<optgroup label="没有编辑权限">
													
													<?php foreach ($permission_edit2 as $permission_edit2_): ?>
													<!--遍历控制器-->

														<option><?php echo $permission_edit2_;?></option>

													<?php endforeach; ?>
													
													</optgroup>
													
													<optgroup label="已有编辑权限">

														<?php foreach ($permission_edit1 as $permission_edit1_): ?>
														<!--遍历控制器文件夹下内容-->
													
														<option selected="selected"><?php echo $permission_edit1_;?></option>
														
														<?php endforeach; ?>

													</optgroup>
													
												</select>

											</div>

										</div>
										
										<div class="control-group">

											<label class="control-label">图片管理权限：</label>

											<div class="controls">

												<select multiple="multiple" id="my_multi_select3" name="my_multi_select3[]">
												
													<optgroup label="没有管理权限">
													
													<?php foreach ($file_manager2 as $file_manager2_): ?>
													<!--遍历控制器-->

														<option><?php echo $file_manager2_;?></option>

													<?php endforeach; ?>
													
													</optgroup>
													
													<optgroup label="已有管理权限">

														<?php foreach ($file_manager1 as $file_manager1_): ?>
														<!--遍历控制器文件夹下内容-->
													
														<option selected="selected"><?php echo $file_manager1_;?></option>
														
														<?php endforeach; ?>

													</optgroup>
													
												</select>

											</div>

										</div>
										
										<div class="form-actions">
										
												<input type="hidden" name="group_id" value="<?php echo $group_id?>">

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