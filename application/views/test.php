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
<img  title="点击刷新" src="<?php echo site_url('tools/captcha')?>" align="absbottom" onclick="this.src='tools/captcha?'+Math.random();"></img>

<form id="base-setting" action="<?php echo site_url('test/cap')?>" method="post" enctype="multipart/form-data" class="form-horizontal">

<input type="text" name="captcha">
<button type="submit" class="btn blue">提交</button>

</form>