<body class="page-header-fixed page-boxed <?php echo $body_css?>">

	<!-- BEGIN HEADER -->

	<!--<div class="header navbar navbar-inverse navbar-fixed-top hidden-phone hidden-tablet">-->
	<div class="header navbar navbar-inverse navbar-fixed-top">

		<!-- BEGIN TOP NAVIGATION BAR -->

		<div class="navbar-inner">

			<div class="container">

				<!-- BEGIN LOGO -->

				<a class="brand" href="<?php echo site_url('home')?>">

				<img src="<?php echo $logo ?>" alt="logo" />

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
<!--手机平板上的下拉菜单
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

				<img src="<?php echo base_url('public/image/menu-toggler.png') ?>" alt="" />

				</a>          
-->
				<!-- END RESPONSIVE MENU TOGGLER -->            

				<!-- BEGIN TOP NAVIGATION MENU -->              
				
				<?php if ($this->user->is_Logged()): ?>

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

						<img class="user-image lazy" data-original="<?php echo $user_image ?>" alt="<?php echo $nick_name?>" />

						<span class="username  hidden-phone"><?php echo $nick_name?></span>

						<i class="icon-angle-down  hidden-phone"></i>

						</a>

						<ul class="dropdown-menu  hidden-phone">

							<li><a href="<?php echo site_url('user') ?>"><i class="icon-user"></i> 个人中心</a></li>

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
				
				<img class="user-image-phone lazy visible-phone" data-original="<?php echo $user_image ?>" alt="<?php echo $nick_name?>" />
				
				<?php else: ?>

				<ul class="nav pull-right hidden-phone">
					
					<li class="dropdown">

						<a class="dropdown-toggle top-login-right" data-toggle="dropdown">
						
						<i class="icon-map-marker" style="font-size: 14px;color: #FFF !important"></i>

						<?php echo @$ip_address['county'] ? @$ip_address['county'] : @$ip_address['city'];?>

						</a>

					</li>
				
					<li class="dropdown">

						<a data-toggle="modal" href="#this-login" class="dropdown-toggle top-login-right">
						
						<i class="icon-user" style="font-size: 14px;color: #FFF !important"></i>
						
						登陆

						</a>

					</li>
					
					<li class="dropdown">

						<a href="<?php echo site_url('user/login')?>" class="dropdown-toggle top-login-right">
						
						<i class=" icon-pencil" style="font-size: 14px;color: #FFF !important"></i>

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
		
		<div class="modal-footer">
		
			<h4>用户登陆</h4>

			<button type="button" data-dismiss="modal" class="btn"><i class="icon-remove" style="font-size: 18px;cursor:pointer"></i></button>

		</div>

		<div class="modal-body">

			<!-- BEGIN LOGIN FORM -->

		<div class="form-vertical login-form" >

			<div class="control-group">

				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

				<label class="control-label visible-ie8 visible-ie9">帐号：</label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-user"></i>

						<input class="m-wrap placeholder-no-fix m-bottom luser_name" type="text" placeholder="帐号" name="username" value="<?php echo $user_name;?>"/>

					</div>

				</div>

			</div>

			<div class="control-group">

				<label class="control-label visible-ie8 visible-ie9">密码：</label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-lock"></i>

						<input class="m-wrap placeholder-no-fix m-bottom lpass_word" type="password" name="password" placeholder="密码" />

					</div>

				</div>

			</div>

			<div class="form-actions">

				<label class="checkbox"">

				<input type="checkbox" name="remember" value="1"/> <?php echo $text_remember?>

				 <span class="login-info"></span>
				
				</label>

				<!--<button type="submit" class="btn green pull-right">-->
				
				<div class="btn green btn-block sub-login">

				<?php echo $text_login ?>  <i class="m-icon-swapright m-icon-white"></i>

				</div>            

			</div>
			<div class="fr-login">
			
				<div class="forget-password">

					<?php 
					$click_txt='javascript:window.open('."'".site_url('user/login')."')";
					?>
					<a href="#" onclick="<?php echo $click_txt?>"><?php echo $text_forgotpassword ?></a>
				</div>

				<div class="create-account">

					<?php 
					$click_txt='javascript:window.open('."'".site_url('user/login')."')";
					?>
					<a href="#" onclick="<?php echo $click_txt?>">注册</a>

				</div>
			</div>

			<div>
				<?php 
				$click_txt='javascript:window.open('."'".site_url('user/sns/session/qq')."')";
				?>
				<a class="btn red btn-block" href="#" onclick="<?php echo $click_txt?>">
				用QQ直接登陆<i class="m-icon-swapright m-icon-white"></i></a>
				<!--<a href="<?php echo site_url('user/sns/session/weixin')?>" class="btn green btn-block">微信登陆<i class="m-icon-swapright m-icon-white"></i></a>-->
			</div>
			
		</div>

		<!-- END LOGIN FORM -->

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
	<!--登陆js-->
	<script>
	
	$(document).ready(function(){
	  $(".sub-login").click(function(){
	  	var user_name=$(".luser_name").val();
	  	var pass_word=$(".lpass_word").val();
	  	//判断验证用户输入
	  	//验证用户名
	  	if(user_name){
			//如果用户名不为空
			$(".luser_name").css({"border":"1px solid green"});
			var is_login=1;
		}else{
			//如果用户名为空
			$(".luser_name").css({"border":"1px solid red"});
			var is_login=0;
		}
		
		//验证密码
		if(pass_word){
			//如果密码不为空
			if(pass_word.length > 25 || pass_word.length < 5){
				$(".lpass_word").css({"border":"1px solid red"});
				var is_login=0;
			}else{
				var is_login=1;
			}
		}else{
			//如果密码为空
			$(".lpass_word").css({"border":"1px solid red"});
			var is_login=0;
		}
		
		//错误信息
		if(is_login == 0){
			if(!$(".login-info").text()){
				//如果错误提示为空添加
				$(".login-info").append("用户名或密码不正确!");
			}
		}else{
			if($(".login-info").text()){
				//如果错误提示为空添加
				$(".login-info").text("");
				$(".lpass_word").css({"border":"1px solid green"});
			}
		}
		
		//如果验证通过提交
		if(is_login == 1){
			$.post("user/login/ajax_login",
		    {
		      username: user_name,
		      password: pass_word
		    },
		    function(data){
		      //判断返回的数据
		      if(data==1){
			  	//刷新当前页面
			  	location.reload();
			  }else{
			  	//如果返回数据不通过
				if(!$(".login-info").text()){
				//如果错误提示为空添加
					$(".login-info").append("用户名或密码不正确!");
					$(".lpass_word").css({"border":"1px solid red"});
					$(".luser_name").css({"border":"1px solid red"});
				}
			  }
		    });
		}
		
	  });
	});
	</script>
	<!--登陆js-->