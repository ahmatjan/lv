	<!-- BEGIN FOOTER1 -->

	<?php $this->public_section->get_mobile_footer()?>
    <div class="visible-phone visible-tablet" style="height: 42px"></div>
	<div class="hidden-phone footer">
	
		<div class="container">

			<div class="footer-inner">

				2013 &copy; 旅行兔版权所有！|滇ICP备15003514号-1 |
	
			</div>
<!--
			<div class="footer-tools">

				<span class="go-top">

				<i class="icon-angle-up"></i>

				</span>

			</div>
-->
		</div>

	</div>
	<!-- END FOOTER -->

<script src="<?php echo base_url('public/min/?f=public/js/jquery.lazyload.js')?>" type="text/javascript"></script>
<!--延迟加载图片-->
<script>
	$(function() {
    	$("img.lazy").lazyload({
    		threshold : 100,
    		effect : "fadeIn",
    		failure_limit : 100,
    		skip_invisible : false
    	});
	}); 
	
	$(function() {
    $("img.lazy-auto").lazyload({
        event : "sporty"
    });
});

$(window).bind("load", function() {
    var timeout = setTimeout(function() { $("img.lazy-auto").trigger("sporty") }, 1500);
});
</script>
<!--延迟加载图片-->
<script>
jQuery(document).ready(function() {
if(window.console&&window.console.error){
	console.log('这是一个开发中的测试网站\n现在我们还不能提供完整的功能');
}
});
</script>
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
