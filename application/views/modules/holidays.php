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
//$("body").css({"background-image":"url(../../../public/image/bg/3.jpg)","background-position-y":"3%",
//"background-repeat":"repeat-y"});
</script>
<?php endif;?>
<?php if(isset($festival)):?>
<link href="<?php echo base_url('public/modules/holidays/banner/howdydo-bar.css');?>" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url('public/modules/holidays/banner/howdydo-bar.js')?>"></script>

<DIV id="howdy">
<!--
<img class="lazy" style="margin: 0 auto" data-original="<?php echo $new_img?>">
-->
<img class="lazy" style="margin: 0 auto" data-original="<?php echo $new_img?>">

<?php 
	if(strstr($festivals['description'],"，")){
		$fes_title=explode('，',$festivals['description']);
	}else{
		$fes_title['0']=$festivals['description'];
		$fes_title['1']='';
	}
?>
<div class="holidays-title"><div class="hol-middle"><h2><?php echo $festivals['name']?></h2><h5><?php echo $fes_title['0']?></h5><h5><?php echo $fes_title['1']?></h5></div><span class="fes-date"><?php echo '日期:'.date("Y-m-d")?></span></div>
</DIV>

<?php $title=date("Y-m-d").'&nbsp;|&nbsp;'.$festivals['name'].'——'.$festivals['description'].'&nbsp;';?>
<SCRIPT type=text/javascript>
	var festival_name='<?php echo $title;?>';
	$(document).ready( function(){
		$( '#howdy' ).howdyDo({
			action		: 'hover',
			effect		: 'slide',
			easing		: 'easeInOutExpo',
			duration	: 200,
			openAnchor	: festival_name+'<i class="icon-chevron-down"></i>',
			closeAnchor	: '收起 <i class="icon-chevron-up"></i>'
		});
	});
	$('.holidays_').css("height","0");
</SCRIPT>
<?php endif;?>