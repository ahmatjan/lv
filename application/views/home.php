<!-- BEGIN CONTAINER -->   
	<div class="page-container row-fluid page-view">
	
		<!-- BEGIN SIDEBAR -->

		<?php //$this->public_section->get_view_sideastop();?>

		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->

			<!-- BEGIN PAGE CONTAINER-->

			<div class="container-fluid">

				<!-- BEGIN PAGE CONTENT-->
				<?php echo $module_middle?>
				
			</div>

		<!--通知的标签-->
		<div id="gritter-notice-wrapper" class="hidden-phone"></div>
		<div id="gritter-notice-wrapper" class="top-left hidden-phone"></div>
		
		<!--底部模块-->
		<?php echo $module_bottom?>
		<!--底部模块-->
		
		<!-- END PAGE -->    
		</div>
	</div>

	<!-- END CONTAINER -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<script src="<?php echo base_url('public/js/jquery.slimscroll.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/js/jquery.blockui.js')?>" type="text/javascript"></script>  

	<script src="<?php echo base_url('public/js/jquery.cookie.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/js/jquery.uniform.js')?>" type="text/javascript" ></script>
	
	<script src="<?php echo base_url('public/js/jquery.gritter.js')?>" type="text/javascript"></script>

	<!-- END CORE PLUGINS -->

	<script src="<?php echo base_url('public/js/app.js')?>"></script>  
	<script src="<?php echo base_url('public/js/index.js')?>" type="text/javascript"></script>

	<script type="text/javascript">
	
		jQuery(document).ready(function() {

		   App.init();
		   Index.initIntro();

			$(window).scroll( function(event){
				if($(document).scrollTop()>200){
			   	$(".mobile-top").css("background-color","rgba(15, 76, 115, 0.85)");
			   }else{
			   	$(".mobile-top").css("background-color","rgba(15, 76, 115, 0.13)");
			   }
			} );
		});
	</script>
	
	<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->

</html>