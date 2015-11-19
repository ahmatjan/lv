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

											<!-- BEGIN INTERACTIVE CHART PORTLET-->

											<div class="portlet box blue">

												<div class="portlet-title">

													<div class="caption"><i class="icon-reorder"></i>日访问量抓取量</div>

													<div class="tools">

														<a href="javascript:;" class="collapse"></a>

														<a href="#portlet-config" data-toggle="modal" class="config"></a>

														<a href="javascript:;" class="reload"></a>

														<a href="javascript:;" class="remove"></a>

													</div>

												</div>

												<div class="portlet-body">

													<div id="chart_2" class="chart"></div>

												</div>

											</div>

											<!-- END INTERACTIVE CHART PORTLET-->
											
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
	<script src="<?php echo base_url('public/min/?f=public/js/chart.js')?>"></script>

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