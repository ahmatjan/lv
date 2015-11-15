	<div class="content">

		<!-- BEGIN LOGIN FORM -->

		<form action="<?php echo site_url('user/login/user_login')?>" method="post" enctype="multipart/form-data" class="form-vertical login-form" >

			<h5 class="form-title"><?php echo $title?></h5>

			<div class="alert alert-error hide">

				<button class="close" data-dismiss="alert"></button>

				<span>登陆名或密码不正确！</span>

			</div>
			
			<?php if ($error_login): ?>
			<!--如果错误信息存在-->
			<div class="alert alert-error">

				<button class="close" data-dismiss="alert"></button>

				<span><?php echo $error_login?></span>

			</div>

			<?php endif; ?>
			
			<?php if ($info_login): ?>
			<!--如果提示信息存在-->
			<div class="alert alert-info">

				<button class="close" data-dismiss="alert"></button>

				<span><?php echo $info_login?></span>

			</div>

			<?php endif; ?>

			<div class="control-group">

				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

				<label class="control-label visible-ie8 visible-ie9">帐号：</label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-user"></i>

						<input class="m-wrap placeholder-no-fix" type="text" placeholder="<?php echo $text_username?>" name="username" value="<?php echo $val_username?>"/>

					</div>

				</div>

			</div>

			<div class="control-group">

				<label class="control-label visible-ie8 visible-ie9">密码：</label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-lock"></i>

						<input class="m-wrap placeholder-no-fix" type="password" placeholder="<?php echo $text_password?>" name="password"/>

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

			<div>
				<a href="<?php echo site_url('user/sns/session/qq')?>" class="btn red btn-block"><img style="background:none" src="<?php echo base_url('public/image/qq_login_ico.png')?>">&nbsp;QQ直接登陆<i class="m-icon-swapright m-icon-white"></i></a>
				<!--<a href="<?php echo site_url('user/sns/session/weixin')?>" class="btn green btn-block">微信登陆<i class="m-icon-swapright m-icon-white"></i></a>-->
			</div>
			
			<div class="forget-password">

				<h4><?php echo $text_forgotpassword ?></h4>

				<p>

					<a href="javascript:;" class="" id="forget-password"><?php echo $text_findpassword?></a>

				</p>

			</div>

			<div class="create-account">

				<p>

					<?php echo $text_nouser?>&nbsp; 

					<a href="javascript:;" id="register-btn" class=""><?php echo $text_register?></a>

				</p>

			</div>

		</form>

		<!-- END LOGIN FORM -->        

		<!-- BEGIN FORGOT PASSWORD FORM -->

		<form method="post" enctype="multipart/form-data" class="form-vertical forget-form" action="<?php echo site_url('user/login/forgot')?>">

			<h5 class=""><?php echo $text_forgotpassword ?></h5>

			<p><?php echo $text_findpw_email ?></p>

			<div class="control-group">

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-envelope"></i>

						<input class="m-wrap placeholder-no-fix" type="text" placeholder="<?php echo $text_ent_email?>" name="forgot_email" />

					</div>

				</div>

			</div>

			<div class="form-actions">
			
				<label>
					
					未绑定邮箱？<a>通过用户名申诉</a>
					
				</label>

				<button type="button" id="back-btn" class="btn">

				<i class="m-icon-swapleft"></i> <?php echo $text_back?>

				</button>

				<button type="submit" class="btn green pull-right">

				<?php echo $text_submint?> <i class="m-icon-swapright m-icon-white"></i>

				</button>            

			</div>

		</form>

		<!-- END FORGOT PASSWORD FORM -->

		<!-- BEGIN REGISTRATION FORM -->

		<form method="post" enctype="multipart/form-data" class="form-vertical register-form" action="<?php echo site_url('user/login/register')?>">

			<h5 class=""><?php echo $text_signup?></h5>

			<p><?php echo $text_details?></p>

			<div class="control-group">

				<label class="control-label visible-ie8 visible-ie9">帐号</label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-user"></i>

						<input class="m-wrap placeholder-no-fix register-username" type="text" placeholder="<?php echo $text_username?>" name="username"/>

					</div>

				</div>

			</div>

			<div class="control-group">

				<label class="control-label visible-ie8 visible-ie9">密码</label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-lock"></i>

						<input class="m-wrap placeholder-no-fix" type="password" id="register_password" placeholder="<?php echo $text_password?>" name="password"/>

					</div>

				</div>

			</div>

			<div class="control-group">

				<label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-ok"></i>

						<input class="m-wrap placeholder-no-fix" type="password" placeholder="<?php echo $text_confirmpassword?>" name="rpassword"/>

					</div>

				</div>

			</div>

			<div class="control-group">

				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

				<label class="control-label visible-ie8 visible-ie9"><?php echo $text_email ?></label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-envelope"></i>

						<input class="m-wrap placeholder-no-fix register-email" type="text" placeholder="<?php echo $text_email ?>" name="email"/>

					</div>

				</div>

			</div>

			<div class="control-group">

				<div class="controls">

					<label class="checkbox">

					<input type="checkbox" name="tnc"/>我同意<a data-toggle="modal" href="#provision">[注册条款]</a>并且认同<a data-toggle="modal" href="#values">[网站价值观]</a>

					</label>  

					<div id="register_tnc_error"></div>

				</div>

			</div>

			<div class="form-actions">

				<button id="register-back-btn" type="button" class="btn">

				<i class="m-icon-swapleft"></i>  <?php echo $text_back?>

				</button>

				<button type="submit" id="register-submit-btn" class="btn green pull-right">

				<?php echo $text_signupbottom ?> <i class="m-icon-swapright m-icon-white"></i>

				</button>            

			</div>

		</form>

		<!-- END REGISTRATION FORM -->

	</div>
	
	<div class="visible-phone visible-tablet" style="height: 42px"></div>

	<div id="provision" class="modal hide fade" tabindex="-1" data-replace="true">

		<div class="modal-header">

			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

			<h3>注册条款</h3>

		</div>

		<div class="modal-body">

			<a class="btn red" data-toggle="modal" href="#notlong" alt="" style="position: absolute; top: 50%; right: 12px">Not So Long Modal</a>

			<img style="height: 800px" src="<?php echo base_url('public/image/KwPYo.jpg')?>">

		</div>

		<div class="modal-footer">

			<button type="button" data-dismiss="modal" class="btn">Close</button>

		</div>

	</div>
	
	<div id="values" class="modal hide fade" tabindex="-1" data-replace="true">

		<div class="modal-header">

			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

			<h3>网站价值观</h3>

		</div>

		<div class="modal-body">

			<a class="btn red" data-toggle="modal" href="#notlong" alt="" style="position: absolute; top: 50%; right: 12px">Not So Long Modal</a>

			<img style="height: 800px" src="<?php echo base_url('public/image/KwPYo.jpg')?>">

		</div>

		<div class="modal-footer">

			<button type="button" data-dismiss="modal" class="btn">Close</button>

		</div>

	</div>

	<!-- END LOGIN -->

	<?php $this->public_section->get_mobile_footer()?>

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<script src="<?php echo base_url('public/js/jquery.slimscroll.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/js/jquery.blockui.min.js')?>" type="text/javascript"></script>  

	<script src="<?php echo base_url('public/js/jquery.cookie.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/js/jquery.uniform.min.js')?>" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script src="<?php echo base_url('public/js/jquery.validate.min.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/js/bootstrap-modalmanager.js')?>" type="text/javascript"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="<?php echo base_url('public/js/app.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/js/login.js')?>" type="text/javascript"></script>     
	<script src="<?php echo base_url('public/js/ui-modals.js')?>" type="text/javascript"></script>     

	<!-- END PAGE LEVEL SCRIPTS --> 
	<script type="text/javascript">
	$(document).ready(function(){
		var reg = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
		$(".register-username").change(function(){
			if (reg.test($(this).val())) {
				//alert("请输入正确的邮箱格式");
				$(".register-email").val($(this).val()).attr("readonly",true);
			}
			if(!reg.test($(this).val())){
				$(".register-email").val('').removeAttr("readonly");
			}
		});
	});
	</script>

	<script>

		jQuery(document).ready(function() {     

		  App.init();

		  Login.init();

		  UIModals.init();
		});

	</script>
	<!-- END JAVASCRIPTS -->
	<!--加载进度条-->
<script src="<?php echo base_url('public/js/loading/nprogress.js')?>" type="text/javascript"></script>
<script>
    $('body').show();
    $('.version').text(NProgress.version);
    NProgress.start();
    setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
</script>
<!--加载进度条-->
<!--意见反馈-->
<div class="fixedBtn hidden-phone">
	<a rel="nofollow" href="###" class="feedback" title="如果你对我们的网站设计或发展有什么么意见或建议，欢迎加入我们～">意见反馈</a>
	<a href="#top" class="top" title="回到顶部">回到顶部</a>
	<div class="feedbackTips fb-open hide green">
		反馈已发送！
	</div>
	<div class="feedbackCnt">
		<h3><cite class="red">* </cite>您对旅行兔的意见和建议：</h3>
		<textarea name="feedbackCnt">提示：如果您希望反馈的内容得到旅行兔网回复，请留下您的联系方式，谢谢～</textarea>
		<span class="button button-green button-medium">提交反馈</span>
	</div>
</div>
<!-- END BODY -->

</html>