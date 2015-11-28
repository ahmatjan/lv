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

												</div>

												<div class="portlet-body">

													<table class="table table-striped table-bordered table-hover" id="sample_2">

														<thead>

															<tr>

																<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" /></th>

																<th>标题</th>
																
																<th class="hidden-480">作者</th>

																<th class="hidden-480">添加时间</th>

																<th>类型</th>
																
																<th>显示位置</th>
																
																<th>修改</th>

															</tr>

														</thead>

														<tbody>

															<?php foreach ($informations as $information): ?>

															<tr class="odd gradeX">

																<td><input type="checkbox" class="checkboxes" value="<?php echo $information['information_id']?>" /></td>

																<td><?php echo $information['title']?></td>
																
																<td class="hidden-480"><?php echo $information['author']?></td>

																<td class="hidden-480"><?php echo $information['addtime']?></td>
																
																<td><?php echo $information['class']?></td>
																
																<td><?php echo $information['position']?></td>
																
																<td><a href="<?php echo site_url('setting/informations?tab_position=tab_1_3&information_id='.$information['information_id']);?>"><span class="label label-success">修改</span></a></td>

															</tr>

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

													<input type="text" id="firstName" class="m-wrap span12" placeholder="文章标题..." name="title" value="<?php echo $title?>">

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">类型：</label>

												<div class="controls">

													<select class="small m-wrap" tabindex="1" name="class">
													
														<?php if(!isset($class)):?>

														<option value="" selected="selected">请选择</option>
														
														<?php endif;?>
														<option value="">请选择</option>
														<?php foreach($select_rules as $k=>$v):?>
														<?php if($k==$class):?>
														<option value="<?php echo $k?>" selected="selected"><?php echo $v?></option>
														<?php else:?>
														<option value="<?php echo $k?>"><?php echo $v?></option>
														<?php endif;?>
														
														<?php endforeach;?>

													</select>

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">位置</label>

												<div class="controls">

													<select class="small m-wrap" tabindex="1" name="position">
													
														<?php if(empty($position)):?>

														<option value="" selected="selected">请选择一个位置</option>
														
														<?php endif;?>
														<option value="">请选择一个位置</option>
														<?php foreach($select_position as $k=>$v):?>
														<?php if($position == $k):?>
														<option value="<?php echo $k?>" selected="selected"><?php echo $v?></option>
														<?php else:?>
														<option value="<?php echo $k?>"><?php echo $v?></option>
														<?php endif;?>

														<?php endforeach;?>

													</select>

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">排序</label>

												<div class="controls">

													<input type="text" id="firstName" class="m-wrap span12" placeholder="排序" name="order" value="<?php echo $order?>">
												</div>

											</div>
											
											<!--文本编辑器-->
											<div class="control-group">

												<label class="control-label">内容：</label>

												<div class="controls">

													<textarea id="editor-post" name="information_content">
														<?php echo $content?>
													</textarea>

												</div>

											</div>
											<!--文本编辑器-->
											
											<div class="form-actions">
											
												<input type="hidden" value="<?php echo $information_id;?>" name="information_id">

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
	<script src="<?php echo base_url('public/min/?f=public/js/summernote.min.js')?>"></script>

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
			height: 250,
			toolbar: [
			//[groupname, [button list]]
			  
			['style', ['fontname','bold', 'italic', 'underline', 'clear']],
			['font', ['strikethrough']],
			['fontsize', ['fontsize']],
			['para', ['ul', 'ol', 'paragraph']],
			['height', ['height']],
			['insert',['picture','video','link','table']],
			['misc',['codeview']]
		  ]
		});

	</script>

	<!-- END JAVASCRIPTS -->

<!-- END BODY -->

</html>