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
<?php foreach($searchs as $b):?>
<?php echo '标题：'.$b['title']?>
<br/>
<?php echo $b['url']?>
<br/><br/>
<?php echo '正文：'.$b['content']?>
<br/><br/><br/>
<?php endforeach;?>