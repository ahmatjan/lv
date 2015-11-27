<!-- BEGIN BODY -->

<body>

	<div class="page-lock">

		<div class="page-body">

			<img class="page-lock-img" src="<?php echo $user_image;?>" alt="<?php echo $user_name;?>">

			<div class="page-lock-info">

				<h1><?php echo $user_name;?></h1>

				<span><?php echo $user_email;?></span>

				<span><em>锁定</em></span>

				<form action="<?php echo site_url('user/login/user_login')?>" method="post" enctype="multipart/form-data">

					<div class="input-append">

						<input type="password" name="password" class="m-wrap" placeholder="请输入密码...">
						
						<input type="hidden" name="username" value="<?php echo $user_name;?>"/>

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

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.slimscroll.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.blockui.min.js')?>" type="text/javascript"></script>  

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.cookie.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.uniform.min.js')?>" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.backstretch.min.js')?>" type="text/javascript"></script>

	<!-- END PAGE LEVEL PLUGINS -->   

	<script src="<?php echo base_url('public/min/?f=public/js/app.js')?>"></script>  

	<script src="<?php echo base_url('public/min/?f=public/js/lock.js')?>"></script>      

	<script>

		jQuery(document).ready(function() {    

		   App.init();

		   Lock.init();

		});

	</script>

	<!-- END JAVASCRIPTS -->

<!-- END BODY -->

</html>