<!-- BEGIN BODY -->

<body>

	<div class="page-lock">

		<div class="page-body">

			<div class="page-lock-info">

				<span><em>请输入验证码</em></span>
				
				<img  title="点击刷新" src="<?php echo site_url('tools/captcha')?>" align="absbottom" onclick="this.src='tools/captcha?'+Math.random();"></img><span style="margin-top: 5px;float: right">看不清？点击图片刷新！</span>

				<form action="<?php echo site_url('tools/captcha/confirm_captcha')?>" method="post" enctype="multipart/form-data">

					<div class="input-append">

						<input type="text" name="captcha" class="m-wrap" placeholder="请输入验证码...">
						
						<button type="submit" class="btn blue icn-only"><i class="m-icon-swapright m-icon-white"></i></button>

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