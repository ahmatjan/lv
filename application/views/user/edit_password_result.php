	<div class="content">
		<!-- BEGIN LOGIN FORM -->

		<form class="form-vertical login-form" >
		
			<?php if(@$info_login):?>
			<i class="icon-ok-sign" style="font-size: 132px;color: green;"></i>

			<span><?php echo $info_login?><a href="<?php echo site_url('user/login');?>">登陆</a></span>
			<?php endif;?>
			
			<?php if(@$error_login):?>
			<i class="icon-remove-sign" style="font-size: 132px;color: green;"></i>

			<span><?php echo $error_login?><a href="<?php echo site_url('user/login');?>">重新修改</a></span>
			<?php endif;?>

		</form>

		<!-- END LOGIN FORM -->        

	</div>

	<!-- END LOGIN -->

	<?php $this->public_section->get_mobile_footer()?>

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.slimscroll.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.blockui.min.js')?>" type="text/javascript"></script>  

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.cookie.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.uniform.min.js')?>" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.validate.min.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('public/min/?f=public/js/bootstrap-modalmanager.js')?>" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/jquery.bootstrap.wizard.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/min/?f=public/js/select2.min.js')?>"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="<?php echo base_url('public/min/?f=public/js/app.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/min/?f=public/js/login.js')?>" type="text/javascript"></script>     
	<script src="<?php echo base_url('public/min/?f=public/js/ui-modals.js')?>" type="text/javascript"></script>

	<!-- END PAGE LEVEL SCRIPTS --> 
	
	<script>
		jQuery(document).ready(function() {
			App.init();
			Login.init();
			UIModals.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
	<!--加载进度条-->
<script src="<?php echo base_url('public/min/?f=public/js/loading/nprogress.js')?>" type="text/javascript"></script>
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