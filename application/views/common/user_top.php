<body class="page-boxed page-header-fixed">

	<!-- BEGIN HEADER -->

	<!--
	<div class="header navbar navbar-inverse navbar-fixed-top">
	-->
	<div class="header navbar navbar-inverse navbar-fixed-top">

		<!-- BEGIN TOP NAVIGATION BAR -->

		<div class="navbar-inner">

			<div class="container">

				<!-- BEGIN LOGO -->

				<a class="brand" href="<?php echo site_url('home')?>">

				<img src="<?php echo base_url('public/image/logo.png') ?>" alt="logo" />

				</a>

				<!-- END LOGO -->

				<!-- BEGIN HORIZANTAL MENU -->

				<div class="navbar hor-menu hidden-phone hidden-tablet">

					<div class="navbar-inner">

						<ul class="nav">

							<li class="visible-phone visible-tablet">

								<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->

								<form class="sidebar-search">

									<div class="input-box">

										<a href="javascript:;" class="remove"></a>

										<input type="text" placeholder="Search..." />            

										<input type="button" class="submit" value=" " />

									</div>

								</form>

								<!-- END RESPONSIVE QUICK SEARCH FORM -->

							</li>

							<!--导航第一个开始-->
							<?php if (is_array($nav1)): ?>
	
							<?php foreach ($nav1 as $item1): ?>
							
							<li class="active">

								<?php if (isset($item1['nav_url'])): ?>
								
								<a href="<?php echo site_url($item1['nav_url'])?>" target="_black">
								
								<?php else: ?>
							
								<a href="javascript:;">
							
								<?php endif; ?>

								<?php echo $item1['nav_name']?>

								</a>

								<?php if (!empty($item1['childs'])): ?>
								
								<ul class="dropdown-menu">

									<?php foreach ($item1['childs'] as $childs1): ?>

									<li>

										<a href="<?php echo site_url($childs1['nav_child_url'])?>" target="_black">

										<?php echo $childs1['nav_child_name']?>

										</a>

									</li>
									
									<?php endforeach; ?>
								
								</ul>
								
								<?php endif; ?>
								
							</li>

							<?php endforeach; ?>

							<?php endif; ?>
							
							<!--导航第一个结束-->
							<!--导航第二个开始-->
							<?php if (is_array($nav2)): ?>
	
							<?php foreach ($nav2 as $item2): ?>
							
							<li>
							
								<?php if (isset($item2['nav_url'])): ?>
								<a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo site_url($item2['nav_url'])?>" target="_black">
								
								<?php else: ?>
								
								<a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
								
								<?php endif; ?>

								<span class="selected"></span>

								<?php echo $item2['nav_name']?>

								<?php if (!empty($item2['childs'])): ?>
								
								<span class="arrow"></span>     

								<?php endif; ?>
								
								</a>

								<?php if (is_array($item2['childs']) && !empty($item2['childs'])): ?>

								<ul class="dropdown-menu">

									<?php foreach ($item2['childs'] as $childs2): ?>

									<li>

										<a href="<?php echo site_url($childs2['nav_child_url'])?>" target="_black">

										<?php echo $childs2['nav_child_name']?>                  
										</a>

									</li>
									
									<?php endforeach; ?>
									
								</ul>           

								<?php endif; ?>
								
							</li>
							<?php endforeach; ?>

							<?php endif; ?>
							<!--第二个结束-->

							<li>

								<span class="hor-menu-search-form-toggler">&nbsp;</span>

								<div class="search-form hidden-phone hidden-tablet">

									<form class="form-search">

										<div class="input-append">

											<input type="text" placeholder="搜索..." class="m-wrap">

											<button type="button" class="btn"></button>

										</div>

									</form>

								</div>

							</li>
							
							<li>

								<a href="<?php echo site_url('article/Article_send')?>" class="btn blue disabled margin-no">发布</a>

							</li>

						</ul>

					</div>

				</div>

				<!-- END HORIZANTAL MENU -->

				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
<!--
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

				<img src="<?php echo base_url('public/image/menu-toggler.png') ?>" alt="" />

				</a>          

				<!-- END RESPONSIVE MENU TOGGLER -->            

				<!-- BEGIN TOP NAVIGATION MENU -->              

				<ul class="nav pull-right">

					<!-- BEGIN NOTIFICATION DROPDOWN -->   

					<li class="dropdown" id="header_notification_bar">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<i class="icon-bell"></i>

						<span class="badge">6</span>

						</a>

						<ul class="dropdown-menu extended notification">

							<li>

								<p>你有14条新的消息</p>

							</li>

							<li>

								<a href="#">

								<span class="label label-success"><i class="icon-plus"></i></span>

								New user registered. 

								<span class="time">Just now</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-important"><i class="icon-bolt"></i></span>

								Server #12 overloaded. 

								<span class="time">15 mins</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-warning"><i class="icon-bell"></i></span>

								Server #2 not respoding.

								<span class="time">22 mins</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-info"><i class="icon-bullhorn"></i></span>

								Application error.

								<span class="time">40 mins</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-important"><i class="icon-bolt"></i></span>

								Database overloaded 68%. 

								<span class="time">2 hrs</span>

								</a>

							</li>

							<li>

								<a href="#">

								<span class="label label-important"><i class="icon-bolt"></i></span>

								2 user IP blocked.

								<span class="time">5 hrs</span>

								</a>

							</li>

							<li class="external">

								<a href="#">去查看所有消息<i class="m-icon-swapright"></i></a>

							</li>

						</ul>

					</li>

					<!-- END NOTIFICATION DROPDOWN -->

					<!-- BEGIN INBOX DROPDOWN -->

					<li class="dropdown" id="header_inbox_bar">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<i class="icon-envelope"></i>

						<span class="badge">5</span>

						</a>

						<ul class="dropdown-menu extended inbox">

							<li>

								<p>你有12条新邮件</p>

							</li>

							<li>

								<a href="inbox.html?a=view">

								<span class="photo"><img src="<?php echo base_url('public/image/avatar2.jpg') ?>" alt="" /></span>

								<span class="subject">

								<span class="from">Lisa Wong</span>

								<span class="time">Just Now</span>

								</span>

								<span class="message">

								Vivamus sed auctor nibh congue nibh. auctor nibh

								auctor nibh...

								</span>  

								</a>

							</li>

							<li>

								<a href="inbox.html?a=view">

								<span class="photo"><img src="<?php echo base_url('public/image/avatar3.jpg') ?>" alt="" /></span>

								<span class="subject">

								<span class="from">Richard Doe</span>

								<span class="time">16 mins</span>

								</span>

								<span class="message">

								Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh

								auctor nibh...

								</span>  

								</a>

							</li>

							<li>

								<a href="inbox.html?a=view">

								<span class="photo"><img src="<?php echo base_url('public/image/avatar1.jpg') ?>" alt="" /></span>

								<span class="subject">

								<span class="from">Bob Nilson</span>

								<span class="time">2 hrs</span>

								</span>

								<span class="message">

								Vivamus sed nibh auctor nibh congue nibh. auctor nibh

								auctor nibh...

								</span>  

								</a>

							</li>

							<li class="external">

								<a href="inbox.html">去查看所有邮件 <i class="m-icon-swapright"></i></a>

							</li>

						</ul>

					</li>

					<!-- END INBOX DROPDOWN -->

					<!-- BEGIN USER LOGIN DROPDOWN -->

					<li class="dropdown user">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<img alt="" src="<?php echo base_url('public/image/avatar1_small.jpg') ?>" />

						<span class="username">Bob Nilson</span>

						<i class="icon-angle-down"></i>

						</a>

						<ul class="dropdown-menu">

							<li><a href="<?php echo site_url('user/user_center') ?>"><i class="icon-user"></i> My Profile</a></li>

							<li><a href="<?php echo site_url('user/calendar')?>"><i class="icon-calendar"></i> 计划</a></li>

							<li><a href="<?php echo site_url('user/User_inbox')?>"><i class="icon-envelope"></i>的的消息(3)</a></li>

							<li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>

							<li class="divider"></li>

							<li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li>

							<li><a href="<?php echo site_url('user/login')?>"><i class="icon-key"></i> 退出</a></li>

						</ul>

					</li>

					<!-- END USER LOGIN DROPDOWN -->

				</ul>

				<!-- END TOP NAVIGATION MENU --> 

			</div>

		</div>

		<!-- END TOP NAVIGATION BAR -->

	</div>

	<!-- END HEADER -->
	
	<!--电脑端42像素的点位-->
	<div class="hidden-phone hidden-tablet" style="height:42px"></div>
	<!--电脑端42像素的点位-->
	
	<!--这个是网站顶部-->
	<?php echo $module_top?>
	<!--这个是网站顶部-->
	
<div class="container">