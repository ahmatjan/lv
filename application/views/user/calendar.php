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

				<div class="row-fluid">

					<div class="portlet box blue calendar">

						<div class="portlet-title">

							<div class="caption"><i class="icon-reorder"></i>Calendar</div>

						</div>

						<div class="portlet-body light-grey">

							<div class="row-fluid">

								<div class="span3 responsive" data-tablet="span12 fix-margin" data-desktop="span8">

									<!-- BEGIN DRAGGABLE EVENTS PORTLET-->    

									<h3 class="event-form-title">Draggable Events</h3>

									<div id="external-events">

										<form class="inline-form">

											<input type="text" value="" class="m-wrap span12" placeholder="Event Title..." id="event_title" /><br />

											<a href="javascript:;" id="event_add" class="btn green">Add Event</a>

										</form>

										<hr />

										<div id="event_box">

										</div>

										<label for="drop-remove">

										<input type="checkbox" id="drop-remove" />remove after drop                         

										</label>

										<hr class="visible-phone" />

									</div>

									<!-- END DRAGGABLE EVENTS PORTLET-->            

								</div>

								<div class="span9">

									<div id="calendar" class="has-toolbar"></div>

								</div>

							</div>

							<!-- END CALENDAR PORTLET-->

						</div>

					</div>

				</div>

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

	<script src="<?php echo base_url('public/js/fullcalendar.min.js')?>"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="<?php echo base_url('public/js/app.js')?>"></script>   
	<script src="<?php echo base_url('public/js/calendar.js')?>"></script>

	<!-- END PAGE LEVEL SCRIPTS -->

	<script>

		jQuery(document).ready(function() {       

		   // initiate layout and plugins

		    App.init();
			Calendar.init();
		});

	</script>

	<!-- END JAVASCRIPTS -->

<!-- END BODY -->

</html>