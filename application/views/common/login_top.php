<body class="login <?php echo $body_css?>">

	<!-- BEGIN HEADER -->

	<div class="header navbar navbar-inverse navbar-fixed-top">

		<!-- BEGIN TOP NAVIGATION BAR -->

		<div class="navbar-inner">

			<div class="container">

				<!-- BEGIN LOGO -->

				<a class="brand" href="<?php echo site_url('home')?>">

				<img src="<?php echo base_url('public/image/logo.png') ?>" alt="logo" />

				</a>

				<!-- END LOGO -->
				<?php if ($this->user->is_Logged()): ?>
				<img class="user-image-phone" src="<?php echo $user_image ?>" alt="<?php echo $nick_name?>" />
				<?php endif;?>

		<!-- END TOP NAVIGATION BAR -->
			</div>
		</div>
	</div>
	<!--开始移动端顶部-->
	
	<!--电脑端42像素的点位-->
	<div class="hidden-phone hidden-tablet" style="height:42px"></div>
	<!--电脑端42像素的点位-->
	<!--这个是网站顶部-->
	<?php echo $module_top?>
	<!--这个是网站顶部-->