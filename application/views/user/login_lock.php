<!-- BEGIN BODY -->

<body>

	<div class="page-lock">

		<div class="page-body">

			<img class="page-lock-img" src="<?php echo base_url('public/image/profile.jpg')?>" alt="">

			<div class="page-lock-info">

				<h1>Bob Nilson</h1>

				<span>bob@keenthemes.com</span>

				<span><em>Locked</em></span>

				<form class="form-search" action="index.html">

					<div class="input-append">

						<input type="text" class="m-wrap" placeholder="Password">

						<button type="submit" class="btn blue icn-only"><i class="m-icon-swapright m-icon-white"></i></button>

					</div>

					<div class="relogin">

						<a href="<?php echo site_url('user/Login')?>">不是这个帐号?</a>

					</div>

				</form>

			</div>

		</div>

		<div class="page-footer">

			2013-<?php echo date('Y')?> &copy; 旅行兔版权所有。

		</div>

	</div>

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<script src="<?php echo base_url('public/js/jquery.slimscroll.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/js/jquery.blockui.min.js')?>" type="text/javascript"></script>  

	<script src="<?php echo base_url('public/js/jquery.cookie.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/js/jquery.uniform.min.js')?>" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script src="<?php echo base_url('public/js/jquery.backstretch.min.js')?>" type="text/javascript"></script>

	<!-- END PAGE LEVEL PLUGINS -->   

	<script src="<?php echo base_url('public/js/app.js')?>"></script>  

	<script src="<?php echo base_url('public/js/lock.js')?>"></script>      

	<script>

		jQuery(document).ready(function() {    

		   App.init();

		   Lock.init();

		});

	</script>

	<!-- END JAVASCRIPTS -->

<!-- END BODY -->

</html>