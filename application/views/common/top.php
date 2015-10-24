<body class="page-header-fixed page-boxed">

	<!-- BEGIN HEADER -->

	<div class="header navbar navbar-inverse navbar-fixed-top hidden-phone hidden-tablet">

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

							<!--导航开始-->
							<?php if (is_array($nav)): ?>
	
							<?php foreach ($nav as $item): ?>
							
							<?php if (isset($item['active'])): ?>
							<li class="<?php echo $item['active']?>">
							<?php else: ?>
							<li>
							<?php endif; ?>

								<?php if (empty($item['childs'])): ?>
								
								<a href="<?php echo site_url($item['nav_url'])?>">
								
								<?php else: ?>
							
								<a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
							
								<?php endif; ?>
								
								<span class="selected"></span>

								<?php echo $item['nav_name']?>

								<?php if (!empty($item['childs'])): ?>
		
								<span class="arrow"></span>     

								<?php endif; ?>
								
								</a>

								<?php if (!empty($item['childs'])): ?>
								
								<ul class="dropdown-menu">

									<?php foreach ($item['childs'] as $childs): ?>

									<?php if ($childs['nav_child_url'] == $active): ?>
									<li class="active">
									<?php else: ?>
									<li>
									<?php endif; ?>

										<a href="<?php echo site_url($childs['nav_child_url'])?>">

										<?php echo $childs['nav_child_name']?>

										</a>

									</li>
									
								<?php endforeach; ?>
								
								</ul>
								
								<?php endif; ?>
								
							</li>

							<?php endforeach; ?>

							<?php endif; ?>
							
							<!--导航结束-->
							
							<li>

								<span class="hor-menu-search-form-toggler" title="搜索">&nbsp;</span>

								<div class="search-form hidden-phone hidden-tablet">

									<form action="<?php echo base_url('search/lv.php')?>" method="get" class="form-search">

										<div class="input-append">

											<input type="text" id="search-query" placeholder="热门词..." class="m-wrap" name="query">
											
											<button type="button" class="btn"></button>

										</div>

									</form>

								</div>

							</li>
							
							<li>

								<a href="<?php echo site_url('article/Article_send')?>" class="btn blue disabled margin-no" target="_black">发布</a>

							</li>

						</ul>

					</div>

				</div>

				<!-- END HORIZANTAL MENU -->

				<!-- BEGIN RESPONSIVE MENU TOGGLER -->

				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

				<img src="<?php echo base_url('public/image/menu-toggler.png') ?>" alt="" />

				</a>          

				<!-- END RESPONSIVE MENU TOGGLER -->            

				<!-- BEGIN TOP NAVIGATION MENU -->              
				
				<?php if ($this->session->userdata('logged_in')===TRUE): ?>

				<ul class="nav pull-right hidden-phone">

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

							<li><a href="<?php echo site_url('user/calendar')?>"><i class="icon-calendar"></i>计划</a></li>

							<li><a href="<?php echo site_url('user/User_inbox')?>"><i class="icon-envelope"></i> 我的消息(3)</a></li>

							<li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>

							<li class="divider"></li>

							<li><a href="<?php echo site_url('user/Login_lock')?>"><i class="icon-lock"></i> 锁定帐号</a></li>

							<li><a href="<?php echo site_url('user/login/login_out')?>"><i class="icon-key"></i> 退出</a></li>

						</ul>

					</li>

					<!-- END USER LOGIN DROPDOWN -->

				</ul>
				
				<?php else: ?>

				<ul class="nav pull-right hidden-phone">
					
					<li class="dropdown">

						<a class="dropdown-toggle top-login-right" data-toggle="dropdown">

						IP:云南·楚雄

						</a>

					</li>
				
					<li class="dropdown">

						<a data-toggle="modal" href="#this-login" class="dropdown-toggle top-login-right">

						登陆

						</a>

					</li>
					
					<li class="dropdown">

						<a href="<?php echo site_url('user/login')?>" class="dropdown-toggle top-login-right">

						注册

						</a>

					</li>
				</ul>
				
				<?php endif; ?>

				<!-- END TOP NAVIGATION MENU --> 

			</div>

		</div>

		<!-- END TOP NAVIGATION BAR -->
	</div>
		<!--弹出登陆开始-->
		<div id="this-login" class="modal hide fade jump-login hidden-phone hidden-tablet" tabindex="-1" data-replace="true">

		<div class="modal-body">

			<!-- BEGIN LOGIN FORM -->

		<form action="<?php echo site_url('user/login/user_login')?>" method="post" enctype="multipart/form-data" class="form-vertical login-form" >

			<div class="control-group">

				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

				<label class="control-label visible-ie8 visible-ie9">帐号：</label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-user"></i>

						<input class="m-wrap placeholder-no-fix" type="text" placeholder="帐号" name="username" value="帐号"/>

					</div>

				</div>

			</div>

			<div class="control-group">

				<label class="control-label visible-ie8 visible-ie9">密码：</label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-lock"></i>

						<input class="m-wrap placeholder-no-fix" type="password" placeholder="密码" name="password"/>

					</div>

				</div>

			</div>

			<div class="form-actions">

				<label class="checkbox">

				<input type="checkbox" name="remember" value="1"/> <?php echo $text_remember?>

				</label>

				<!--<button type="submit" class="btn green pull-right">-->
				<button type="submit" class="btn green btn-block">

				<?php echo $text_login ?>  <i class="m-icon-swapright m-icon-white"></i>

				</button>            

			</div>
			
			<div class="forget-password">

				<h4><?php echo $text_forgotpassword ?></h4>

				<p>

				<?php 
				$click_txt='javascript:window.open('."'".site_url('user/login')."')";
				?>
				<a href="#" onclick="<?php echo $click_txt?>"><?php echo $text_findpassword?></a>

				</p>

			</div>

			<div class="create-account">

				<p>

				<?php echo $text_nouser?>&nbsp; 

				<?php 
				$click_txt='javascript:window.open('."'".site_url('user/login')."')";
				?>
				<a href="#" onclick="<?php echo $click_txt?>"><?php echo $text_register?></a>

				</p>

			</div>

			<div>
				<a href="<?php echo site_url('user/sns/session/qq')?>" class="btn red btn-block">用QQ直接登陆<i class="m-icon-swapright m-icon-white"></i></a>
				<!--<a href="<?php echo site_url('user/sns/session/weixin')?>" class="btn green btn-block">微信登陆<i class="m-icon-swapright m-icon-white"></i></a>-->
			</div>
			
		</form>

		<!-- END LOGIN FORM -->

		</div>

		<div class="modal-footer">

			<button type="button" data-dismiss="modal" class="btn">关闭</button>

		</div>

	</div>
		<!--弹出登陆开始-->
		
		<!--开始移动端顶部-->
<!--
	<div class="mobile-top visible-phone navbar-mobile-bottom">
		<li class="list-2">
			<i class="icon-qrcode"></i>
			<span class="text">扫一扫</span>
		</li>
		<li class="list-8">
			<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
<!--
					<form id="mobile-search" class="sidebar-search" action="<?php echo base_url('search/lv.php')?>" method="get">

						<div class="input-box">

							<input type="text" name="query" class="search" placeholder="搜索..." />            
							<input type="hidden" name="search" class="search" value="1"/>            
							<input type="hidden" name="type" class="search" value="and"/>            
							<input type="hidden" name="results" class="search" value="20"/>            

							<input type="submit" value="" class="search-submit"></input>

						</div>

					</form>

					<!-- END RESPONSIVE QUICK SEARCH FORM -->
<!--
		</li>
		<li class="list-2">
			<i class="icon-comments"></i>
			<span class="text">消息中心</span>
		</li>
	</div>
	<!--开始移动端顶部-->
	
	<!--电脑端42像素的点位-->
	<div class="hidden-phone hidden-tablet" style="height:42px"></div>
	<!--电脑端42像素的点位-->
	
	<!--这个是网站顶部-->
	<?php echo $module_top?>
	<!--这个是网站顶部-->

	<div class="container">