
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


<form name=form1>  
<select name=YYYY onchange="YYYYMM(this.value)">  
<option value="">年</option>  
</select>  
<select name=MM onchange="MMDD(this.value)">  
<option value="">月</option>  
</select>  
<select name=DD>  
<option value="">日</option>  
</select>  
</form>  

<script src="<?php echo base_url('public/js/loading/ymdselect.js')?>" type="text/javascript"></script>