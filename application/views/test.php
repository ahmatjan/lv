<!--
<div class="selectList"> 
<select class="province"> 
<option>请选择</option> 
</select> 
<select class="city"> 
<option>请选择</option> 
</select> 
<select class="district"> 
<option>请选择</option> 
</select> 
</div>
<script src="<?php echo base_url('public/js/loading/linkage.js')?>" type="text/javascript"></script>


<div class="ymdselect">  
<select name="year"><option>年</option></select>
<select name="month"><option>月</option></select>
<select name="day"><option>日</option></select>
</div> 

<script src="<?php echo base_url('public/js/loading/ymdselect.js')?>" type="text/javascript"></script>
-->
<div id="captcha" class="captcha"><span class="img"><?php echo $captcha;?></span>点击刷新验证码</div>

<script type="text/javascript">
$('.captcha').click(function(){
	$(this).find('.img').html("<?php site_url('test/get_img')?>");
});
</script>