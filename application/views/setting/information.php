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
									<a href="#tab_1_2" data-toggle="tab">文章列表</a>
									</li>

									<?php if ($tab_position === 'tab_1_3'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_3" data-toggle="tab">添加文章</a>
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

											显示所有添加的文章

										</p>
									
										<div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">

											<!-- BEGIN EXAMPLE TABLE PORTLET-->

											<div class="portlet box grey">

												<div class="portlet-title">

													<div class="caption"><i class="icon-user"></i>文章列表</div>

													<div class="actions">

														<a href="<?php echo site_url('setting/setting_form')?>" class="btn blue"><i class="icon-pencil"></i>

														添加

														</a>    
														
													</div>

												</div>

												<div class="portlet-body">

													<table class="table table-striped table-bordered table-hover" id="sample_2">

														<thead>

															<tr>

																<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" /></th>

																<th>名称</th>
																
																<th class="hidden-480">上一级目录</th>

																<th class="hidden-480">图标</th>

																<th>链接</th>
																
																<th>显示位置</th>
																
																<th class="hidden-480">是否显示</th>
																
																<th class="hidden-480">允许修改</th>
																
																<th>修改</th>

															</tr>

														</thead>

														<tbody>

															<?php foreach ($navs as $item): ?>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $item['nav_id']?>" /></td>

																<td><?php echo $item['nav_name']?></td>
																
																<td>-----无-----</td>

																<td class="hidden-480"><i class="<?php echo 'icon-'.$item['nav_ico']?>"></i><?php echo $item['nav_ico']?></td>

																<td class="hidden-480"><?php echo $item['nav_url']?></td>
																
																<td><?php echo $item['nav_class']?></td>
																
																<?php if ($item['view_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<?php if ($item['edit_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<td><a href="<?php echo site_url('setting/setting_form').'?nav_id='.$item['nav_id'].'&tab_position=tab_1_3&tab_before=tab_1_2'?>"><span class="label label-success">修改</span></a></td>

															</tr>

															<?php if ($item['childs'] && is_array($item['childs'])): ?>
															<?php foreach ($item['childs'] as $childs): ?>
															
															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $childs['nav_child_id']?>" /></td>

																<td><?php echo $item['nav_name'].'=>'.$childs['nav_child_name']?></td>
																
																<td class="hidden-480"><?php echo $item['nav_name']?></td>

																<td class="hidden-480">-----无-----</td>

																<td><?php echo $childs['nav_child_url']?></td>
																
																<td><?php echo $item['nav_class']?></td>
																
																<?php if ($childs['view_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<?php if ($childs['edit_start']==FALSE):?>
																
																<td class="hidden-480">否</td>
																
																<?php else: ?>

																<td class="hidden-480">是</td>
																
																<?php endif; ?>
																
																<td><a href="<?php echo site_url('setting/setting_form').'?nav_child_id='.$childs['nav_child_id'].'&tab_position=tab_1_3&tab_before=tab_1_2'?>"><span class="label label-success">修改</span></a></td>

															</tr>

															<?php endforeach; ?>

															<?php endif; ?>

															<?php endforeach; ?>

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

											添加一个文章用于前台显示

										</p>
									
										<form id="base-setting" action="<?php echo site_url('setting/informations/add_information')?>" method="post" enctype="multipart/form-data" class="form-horizontal">

											<div class="control-group">

												<label class="control-label">标题：</label>

												<div class="controls">

													<input type="text" id="firstName" class="m-wrap span12" placeholder="文章标题..." name="title" value="">

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">类型：</label>

												<div class="controls">

													<select class="small m-wrap" tabindex="1" name="class">

														<option value="rule">规则</option>

														<option value="helper">帮助</option>

													</select>

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">位置</label>

												<div class="controls">

													<select class="small m-wrap" tabindex="1" name="position">

														<option value="register_rule">注册条款</option>

														<option value="values">网站价值观</option>

														<option value="healper">网站帮助</option>

														<option value="user_healper">用户中心帮助</option>

													</select>

												</div>

											</div>
											
											<!--文本编辑器-->
											<div class="control-group">

												<label class="control-label">内容：</label>

												<div class="controls">

													<textarea id="editor-post" name="information_content">
													
													</textarea>

												</div>

											</div>
											<!--文本编辑器-->
											
											<div class="form-actions">

												<button type="submit" class="btn blue">提交</button>

												<button type="button" class="btn">取消</button>                            

											</div>
											
										</from>

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
	<script src="<?php echo base_url('public/js/summernote.min.js')?>"></script>

	<!-- END PAGE LEVEL SCRIPTS -->

	
	<script>

		jQuery(document).ready(function() {       

		   // initiate layout and plugins

		   App.init();
		   FormSamples.init();
		   FormComponents.init();
		   TableManaged.init();

		});
		
		//公告
		$('#editor-post').summernote({
			height: 350,
			toolbar: [
			//[groupname, [button list]]
			  
			['style', ['fontname','bold', 'italic', 'underline', 'clear']],
			['font', ['strikethrough']],
			['fontsize', ['fontsize']],
			['para', ['ul', 'ol', 'paragraph']],
			['height', ['height']],
			['insert',['picture','video','link','table']]
		  ]
		});

	</script>

	<!-- END JAVASCRIPTS -->

<!-- END BODY -->

</html>