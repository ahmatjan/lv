<?php if(strpos($festival,'冬')!==FALSE || strpos($festival,'雪')!==FALSE):?>
<!--下雪-->
<script src="<?php echo base_url('public/modules/holidays/jq.snow/jq.snow.js')?>"></script>
<!--下面是调用方法和参数说明-->

<script>
$(function(){
	$.fn.snow({ 
		minSize: 5,		//雪花的最小尺寸
		maxSize: 50, 	//雪花的最大尺寸
		newOn: 100		//雪花出现的频率 这个数值越小雪花越多
	});
});
$("body").css({"background-image":"url(../../../public/image/bg/3.jpg)","background-position-y":"3%",
"background-repeat":"repeat-y"});
</script>
<?php endif;?>
<div style="margin: 1px auto;">
	<img class="lazy" style="width: 100%;margin: 0 auto" data-original="<?php echo $new_img?>">
</div>