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

									<?php if ($tab_position === 'tab_1_3' || $tab_position == NULL): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_3" data-toggle="tab">导航添加</a>
									</li>
									
									<?php if ($tab_position === 'tab_1_4'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_4" data-toggle="tab">消息群发</a>
									</li>
									
									<?php if ($tab_position === 'tab_1_5'): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>
									<a href="#tab_1_5" data-toggle="tab">公告</a>
									</li>

								</ul>

								<div class="tab-content">

									<?php if ($tab_position === 'tab_1_3' || $tab_position == NULL): ?>
									<div class="tab-pane active" id="tab_1_3">
									<?php else :?>
									<div class="tab-pane" id="tab_1_3">
									<?php endif;?>

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											生成左栏的导航

										</p>
									
										<!-- BEGIN FORM-->

											<form action="<?php echo site_url('setting/setting_form/add_nav')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
												
												<div class="control-group">

													<label class="control-label">上一级目录：</label>

													<div class="controls">
													
													<!--###############################################################-->
													<select data-placeholder="如果是二级分类请选择一个分类..." class="chosen span12" tabindex="-1" id="selS0V" name="top_navid">

														<?php if (!empty($navs['previ_name'])): ?>
														<option value="<?php echo $navs['previ_id']?>"><?php echo $navs['previ_name']?></option>
														<?php else: ?>

														<option value="">---二级目录请选择，一级目录留空---</option>
														
														<?php endif; ?>

														<optgroup label="用户后台左栏">

															<?php foreach ($left_admins as $left_admin): ?>
														
															<option value="<?php echo $left_admin['nav_id']?>"><?php echo $left_admin['nav_name']?></option>
															
															<?php endforeach; ?>

														</optgroup>

														<optgroup label="帮助中心左栏">

															<?php foreach ($left_helpers as $left_helper): ?>
														
															<option value="<?php echo $left_helper['nav_id']?>"><?php echo $left_helper['nav_name']?></option>
															
															<?php endforeach; ?>

														</optgroup>
														
														<optgroup label="前台顶部">

															<?php foreach ($view_tops as $view_top): ?>
														
															<option value="<?php echo $view_top['nav_id']?>"><?php echo $view_top['nav_name']?></option>
															
															<?php endforeach; ?>

														</optgroup>
														
														<optgroup label="后台顶部">

															<?php foreach ($admin_tops as $admin_top): ?>
														
															<option value="<?php echo $admin_top['nav_id']?>"><?php echo $admin_top['nav_name']?></option>
															
															<?php endforeach; ?>

														</optgroup>

													</select>
													<!--###############################################################-->
											
													</div>

												</div>
												
												<div class="control-group">

													<label class="control-label">一级目录图标：</label>

													<div class="controls">

														<select name="top_navico" id="select2_sample4" class="span12 select2">

														<?php if (!empty($navs['nav_ico'])): ?>
														
														<option value="<?php echo $navs['nav_ico']?>"><?php echo $navs['nav_ico']?></option>
														
														<?php else: ?>
														
														<option value="">---如果是一级目录，请选择一个图标---</option>
														
														<?php endif; ?>

														<?php foreach ($icons as $icon): ?>

														<option value="<?php echo $icon['ico_name']?>"><?php echo $icon['ico_name']?></option>
														
														<?php endforeach; ?>
													
														</select>

													</div>

												</div>

												<div class="control-group">

													<label class="control-label">导航名称：</label>

													<div class="controls">

														<?php if (!empty($navs['nav_name'])): ?>

														<input name="navname" type="text" class="m-wrap span12" value="<?php echo $navs['nav_name']?>" placeholder="请输入导航名称...">
														
														<?php else: ?>
														
														<input name="navname" type="text" class="m-wrap span12" placeholder="请输入导航名称...">
														
														<?php endif; ?>

													</div>

												</div>
												
												<div class="control-group">

													<label class="control-label">导航链接：</label>

													<div class="controls">
													
														<?php if (!empty($navs['nav_url'])): ?>

														<input type="text" name="top_navurl" class="m-wrap span12" placeholder="一级目录跳转，二级目录应该有..." value="<?php echo $navs['nav_url']?>">
														
														<?php else: ?>
														
														<input type="text" name="top_navurl" class="m-wrap span12" placeholder="一级目录跳转，二级目录应该有...">
														
														<?php endif; ?>

													</div>

												</div>
												
												<div class="control-group">

													<label class="control-label">排序：</label>

													<div class="controls">

														<?php if (isset($navs['nav_store'])): ?>
														
														<input type="text" name="navstore" class="m-wrap span12" placeholder="数字，越小越靠前..." value="<?php echo $navs['nav_store']?>">
														
														<?php else: ?>

														<input type="text" name="navstore" class="m-wrap span12" placeholder="数字，越小越靠前...">
														
														<?php endif; ?>

													</div>

												</div>
												
												<div class="control-group">

													<label class="control-label">显示位置：</label>

													<div class="controls">

														<select name="navlocation" class="m-wrap span12">
														
															<?php if (!empty($navs['nav_class'])): ?>
														
															<option value="<?php echo $navs['nav_class']?>"><?php echo $navs['nav_class']?></option>
															
															<?php else: ?>

															<option value="">---一级目录请选择，二级跟随一级---</option>
															
															<?php endif; ?>

															<option value="helper">帮助中心左</option>

															<option value="view_top">前台顶部</option>
															
															<option value="admin_top">后台顶部</option>
															
															<option value="admin">后台左栏</option>

														</select>

													</div>

												</div>
												
												<div class="control-group">

													<label class="control-label">是否显示：</label>

													<div class="controls">
													
														<?php if ($navs['nav_view_start']==TRUE): ?>
													
														<label class="radio">
														
														<input type="radio" name="isview" value="1" checked />

														是

														</label>  
														
														<label class="radio">

														<input type="radio" name="isview" value="0" />

														否

														</label>
														
														<?php else: ?>
														
														<label class="radio">
														
														<input type="radio" name="isview" value="1" checked />

														是

														</label>
														
														<label class="radio">

														<input type="radio" name="isview" value="0"/>

														否

														</label>
														
														<?php endif; ?>
														
													</div>

												</div>
												
												<div class="control-group">

													<label class="control-label">是否允许修改：</label>

													<div class="controls">
													
														<?php if ($navs['nav_edit_start']==TRUE): ?>
													
														<label class="radio">
														
														<input type="radio" name="isedit" value="1" checked />

														是

														</label>  
														
														<label class="radio">

														<input type="radio" name="isedit" value="0" />

														否

														</label>
														
														<?php else: ?>
														
														<label class="radio">
														
														<input type="radio" name="isedit" value="1" checked />

														是

														</label>
														
														<label class="radio">

														<input type="radio" name="isedit" value="0"/>

														否

														</label>
														
														<?php endif; ?>
												
													</div>

												</div>
												
												<?php if (!empty($navs['nav_id'])): ?>
												
												<input type="hidden" name="nav_id" value="<?php echo $navs['nav_id']?>" /><!--隐藏域，用于提交类型-->
												
												<?php endif; ?>
												
												<input type="hidden" name="tab_before" value="<?php echo $tab_before?>" /><!--tab_position-->
												
												<?php if (!empty($navs['nav_type'])): ?>
												
												<input type="hidden" name="nav_type" value="<?php echo $navs['nav_type']?>" /><!--隐藏域，用于提交类型-->
												
												<?php endif; ?>
												
												<div class="form-actions">

													<button type="submit" class="btn blue">提交</button>

													<button type="button" class="btn">取消</button>                            

												</div>

											</form>

											<!-- END FORM-->

									</div>
									
									<?php if ($tab_position === 'tab_1_4'): ?>
									<div class="tab-pane active" id="tab_1_4">
									<?php else :?>
									<div class="tab-pane" id="tab_1_4">
									<?php endif;?>

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											给你用户群发信息

										</p>
									
										<!-- BEGIN FORM-->

											<form action="#" class="form-horizontal">

												<div class="control-group">

													<label class="control-label">标题：</label>

													<div class="controls">

														<input type="text" id="firstName" class="m-wrap span12" placeholder="请输入标题...">

													</div>

												</div>
												
												<div class="control-group">

													<label class="control-label">选择或添加标签：</label>

													<div class="controls">

														<input type="hidden" class="span12 select2_sample3" placeholder="输入你自己的标签..." value="">

													</div>

												</div>
												
												<div class="control-group">

													<label class="control-label">地域：</label>

													<div class="controls">

														<select class="m-wrap span6">

															<option value="">北京</option>

															<option value="">云南</option>

														</select>
														<select  class="m-wrap span6">

															<option value="">楚雄</option>

															<option value="">大理</option>

														</select>

													</div>

												</div>
												
												<div class="control-group">

													<label class="control-label">性别：</label>

													<div class="controls">

														<label class="radio">

														<input type="radio" name="optionsRadios2" value="option1" checked/>

														男

														</label>

														<label class="radio">

														<input type="radio" name="optionsRadios2" value="option2"/>

														女

														</label>  

													</div>

												</div>
												
												<div class="control-group">

													<label class="control-label">地址类型：</label>

													<div class="controls">
													
														<label class="radio">

														<input type="radio" name="optionsRadios3" value="option2" checked />

														当前地址

														</label>  

														<label class="radio">

														<input type="radio" name="optionsRadios3" value="option1" />

														注册地址

														</label>

														<label class="radio">

														<input type="radio" name="optionsRadios3" value="option2"/>

														登陆最多

														</label>  

													</div>

												</div>
												
												<div class="control-group">

													<label class="control-label">类型：</label>

													<div class="controls">

														<label class="radio">

														<input type="radio" name="optionsRadios1" value="option1" checked />

														站内信

														</label>

														<label class="radio">

														<input type="radio" name="optionsRadios1" value="option2"/>

														邮件

														</label> 
														
														<label class="radio">

														<input type="radio" name="optionsRadios1" value="option3"/>

														微信

														</label>  

													</div>

												</div>
												
												<!--文本编辑器-->
												<div class="control-group">

													<label class="control-label">内容：</label>

													<div class="controls">

														<div id="editor-gonglue">
														
														</div>

													</div>

												</div>
												<!--文本编辑器-->
												
												<div class="form-actions">

													<button type="submit" class="btn blue">提交</button>

													<button type="button" class="btn">取消</button>                            

												</div>

											</form>

											<!-- END FORM-->

									</div>
									
									<div class="tab-pane" id="tab_1_5">

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											站内公告

										</p>
										
										<!-- BEGIN FORM-->

										<form action="#" class="form-horizontal">

											<div class="control-group">

												<label class="control-label">标题：</label>

												<div class="controls">

													<input type="text" id="firstName" class="m-wrap span12" placeholder="标题,自动根据情况判断是否显示...">

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">位置：</label>

												<div class="controls">

													<select class="m-wrap span12">

														<option value="">首页</option>

													</select>
													
												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">是否显示：</label>

												<div class="controls">

													<label class="radio">

													<input type="radio" name="optionsRadios2" value="option1" checked/>

													是

													</label>

													<label class="radio">

													<input type="radio" name="optionsRadios2" value="option2"/>

													否

													</label>  

												</div>

											</div>
											
											<div class="control-group">

											<label class="control-label">区域显示：</label>

											<div class="controls">

												<select multiple="multiple" id="my_multi_select2" name="my_multi_select2[]">

													<optgroup label="NFC EAST">

														<option>Dallas Cowboys</option>

														<option>New York Giants</option>

														<option>Philadelphia Eagles</option>

														<option>Washington Redskins</option>

													</optgroup>

													<optgroup label="NFC NORTH">

														<option>Chicago Bears</option>

														<option>Detroit Lions</option>

														<option>Green Bay Packers</option>

														<option>Minnesota Vikings</option>

													</optgroup>

													<optgroup label="NFC SOUTH">

														<option>Atlanta Falcons</option>

														<option>Carolina Panthers</option>

														<option>New Orleans Saints</option>

														<option>Tampa Bay Buccaneers</option>

													</optgroup>

													<optgroup label="NFC WEST">

														<option>Arizona Cardinals</option>

														<option>St. Louis Rams</option>

														<option>San Francisco 49ers</option>

														<option>Seattle Seahawks</option>

													</optgroup>

												</select>

											</div>

										</div>
											
											<!--文本编辑器-->
											<div class="control-group">

												<label class="control-label">内容：</label>

												<div class="controls">

													<div id="editor-post">
													
													</div>

												</div>

											</div>
											<!--文本编辑器-->
											
											<div class="form-actions">

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

	<script src="<?php echo base_url('public/js/jquery.slimscroll.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/js/jquery.blockui.min.js')?>" type="text/javascript"></script>  

	<script src="<?php echo base_url('public/js/jquery.cookie.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/js/jquery.uniform.min.js')?>" type="text/javascript" ></script>

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

	<script src="<?php echo base_url('public/js/app.js')?>"></script>
	<script src="<?php echo base_url('public/js/form-samples.js')?>"></script>
	<script src="<?php echo base_url('public/js/form-components.js')?>"></script>
	<script src="<?php echo base_url('public/js/table-managed.js')?>"></script>

	<!-- END PAGE LEVEL SCRIPTS -->

	<!--文本编辑器-->
	<script src="<?php echo base_url('public/js/summernote.min.js')?>"></script>
	
	<script>
		//编辑器	
		//攻略
		$('#editor-gonglue').summernote({
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