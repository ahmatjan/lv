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

				<?php $this->public_section->get_page_header();?>

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

									<li class="active"><a href="#tab_1_1" data-toggle="tab">结伴</a></li>

									<li><a href="#tab_1_2" data-toggle="tab">诗歌</a></li>

									<li><a href="#tab_1_3" data-toggle="tab">文艺</a></li>
									
									<li><a href="#tab_1_4" data-toggle="tab">攻略</a></li>
									
									<li><a href="#tab_1_5" data-toggle="tab">摄影</a></li>

								</ul>

								<div class="tab-content">

									<div class="tab-pane active" id="tab_1_1">

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											你的结伴信息将会展示在首页及其它页面，同时推送给最近关注过你的目地城市的驴友！详情<a href="#">点击这里</a>

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

												<label class="control-label">出行方式：</label>

												<div class="controls">

													<select class="span12 chosen" data-placeholder="请选择一种出行方式..." tabindex="1">

														<option value=""></option>

														<option value="Category 1">Category 1</option>

														<option value="Category 2">Category 2</option>

														<option value="Category 3">Category 5</option>

														<option value="Category 4">Category 4</option>

													</select>

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">出发城市：</label>

												<div class="controls">

													<select  class="m-wrap span6 margin-bottom15">

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

												<label class="control-label">目的地：</label>

												<div class="controls">

													<select  class="m-wrap span6 margin-bottom15">

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

												<label class="control-label">计划开始结束时间：</label>

												<div class="controls">

													<div id="form-date-range" class="btn">

														<i class="icon-calendar"></i>

														&nbsp;<span></span> 

														<b class="caret"></b>

													</div>

												</div>

											</div>
											
											<!--文本编辑器-->
											<div class="control-group">

												<label class="control-label">行程或个人简介：</label>

												<div class="controls">

													<div id="editor">
													
													</div>

												</div>

											</div>
											<!--文本编辑器-->
											
											<div class="form-actions">

												<button type="submit" class="btn blue">Submit</button>

												<button type="button" class="btn">Cancel</button>                            

											</div>

										</form>

										<!-- END FORM-->  

									</div>

									<div class="tab-pane" id="tab_1_2">

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											如果你是一个喜爱旅行，热爱在路上的感觉，那么这里正好！<a href="#">点击这里</a>相关介绍。

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

											<!--文本编辑器-->
											<div class="control-group">

												<label class="control-label">诗歌：</label>

												<div class="controls">

													<div id="editor-shige">
													
													</div>

												</div>

											</div>
											<!--文本编辑器-->
											
											<div class="form-actions">

												<button type="submit" class="btn blue">Submit</button>

												<button type="button" class="btn">Cancel</button>                            

											</div>

										</form>

										<!-- END FORM--> 

									</div>

									<div class="tab-pane" id="tab_1_3">

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											各种散文、游记、心得或者其它的样式写到这里吧！详情<a href="#">点击这里</a>

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

												<label class="control-label">与这个城市相关：</label>

												<div class="controls">

													<select  class="m-wrap span6">

														<option value="">北京</option>

														<option value="">云南</option>

													</select>
													<select  class="m-wrap span6">

														<option value="">楚雄</option>

														<option value="">大理</option>

													</select>

												</div>

											</div>
											
											<!--文本编辑器-->
											<div class="control-group">

												<label class="control-label">文章内容：</label>

												<div class="controls">

													<div id="editor-wenyi">
													
													</div>

												</div>

											</div>
											<!--文本编辑器-->
											
											<div class="form-actions">

												<button type="submit" class="btn blue">Submit</button>

												<button type="button" class="btn">Cancel</button>                            

											</div>

										</form>

										<!-- END FORM--> 

									</div>
									
									<div class="tab-pane" id="tab_1_4">

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											万卷书，万里路，让你的经验帮助更多的人吧！详情<a href="#">点击这里</a>

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

												<label class="control-label">最佳出行方式：</label>

												<div class="controls">

													<select class="span12 chosen" data-placeholder="请选择一种出行方式..." tabindex="1">

														<option value=""></option>

														<option value="Category 1">Category 1</option>

														<option value="Category 2">Category 2</option>

														<option value="Category 3">Category 5</option>

														<option value="Category 4">Category 4</option>

													</select>

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">出发城市：</label>

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

												<label class="control-label">终点城市：</label>

												<div class="controls">

													<select  class="m-wrap span6">

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

												<label class="control-label">最佳旅行季：</label>

												<div class="controls">

													<div id="form-date-range" class="btn">

														<i class="icon-calendar"></i>

														&nbsp;<span></span> 

														<b class="caret"></b>

													</div>

												</div>

											</div>
											
											<!--文本编辑器-->
											<div class="control-group">

												<label class="control-label">攻略详情：</label>

												<div class="controls">

													<div id="editor-gonglue">
													
													</div>

												</div>

											</div>
											<!--文本编辑器-->
											
											<div class="form-actions">

												<button type="submit" class="btn blue">Submit</button>

												<button type="button" class="btn">Cancel</button>                            

											</div>

										</form>

										<!-- END FORM-->

									</div>
									
									<div class="tab-pane" id="tab_1_5">

										<!-- BEGIN FORM-->

										<p>

											<span class="label label-important">提示:</span>&nbsp;

											直接点点击下方的区域就可以一次上传多张照片了，摄影作品管理请<a href="#">点击这里</a>

										</p>
										
										<form action="assets/plugins/dropzone/upload.php" class="dropzone" id="my-awesome-dropzone"></form>

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

	<script type="text/javascript" src="<?php echo base_url('public/js/date.js')?>"></script>

	<script type="text/javascript" src="<?php echo base_url('public/js/daterangepicker.js')?>"></script> 
	
	<script src="<?php echo base_url('public/js/dropzone.js')?>"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="<?php echo base_url('public/js/app.js')?>"></script>
	<script src="<?php echo base_url('public/js/form-samples.js')?>"></script>
	<script src="<?php echo base_url('public/js/form-components.js')?>"></script>

	<!-- END PAGE LEVEL SCRIPTS -->

	<!--文本编辑器-->
	<script src="<?php echo base_url('public/js/summernote.min.js')?>"></script>
	
	<script>
		//结伴
		$('#editor').summernote({
			height: 150,
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
		
		//诗歌
		$('#editor-shige').summernote({
			height: 150,
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
		
		//文艺
		$('#editor-wenyi').summernote({
			height: 150,
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
	</script>
	<script>

		jQuery(document).ready(function() {       

		   // initiate layout and plugins

		   App.init();
		   FormSamples.init();
		   FormComponents.init();

		});

	</script>

	<!-- END JAVASCRIPTS -->

<!-- END BODY -->

</html>