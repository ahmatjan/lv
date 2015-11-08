<?php if (!empty($module_middle)): ?><!--如果不为空-->
<div class="row-fluid">
<!--中-->
<?php $count_modules = count($module_middle);?>
<?php if ($count_modules == 1): ?><!--如果是一个数组-->
	<div class="span12">
	<div class="span12">
	<?php echo $module_middle['0']?><!--输出-->
	</div>
	</div>
<?php endif;?>

<?php if ($count_modules == '2'): ?>
	<div class="span6">
	<div class="span12">
	<?php echo $module_middle['0']?><!--输出-->
	</div>
	</div>
	<div class="span6">
	<div class="span12">
	<?php echo $module_middle['1']?><!--输出-->
	</div>
	</div>
<?php endif;?>

<?php if ($count_modules == '3'): ?>
	<div class="span4">
	<div class="span12">
	<?php echo $module_middle['0']?><!--输出-->
	</div>
	</div>
	<div class="span4">
	<div class="span12">
	<?php echo $module_middle['1']?><!--输出-->
	</div>
	</div>
	<div class="span4">
	<div class="span12">
	<?php echo $module_middle['2']?><!--输出-->
	</div>
	</div>
<?php endif;?>

<?php if ($count_modules == '4'): ?>
	<div class="span3">
	<div class="span12">
	<?php echo $module_middle['0']?><!--输出-->
	</div>
	</div>
	<div class="span3">
	<div class="span12">
	<?php echo $module_middle['1']?><!--输出-->
	</div>
	</div>
	<div class="span3">
	<div class="span12">
	<?php echo $module_middle['2']?><!--输出-->
	</div>
	</div>
	<div class="span3">
	<div class="span12">
	<?php echo $module_middle['3']?><!--输出-->
	</div>
	</div>
<?php endif;?>


<?php if ($count_modules > '4'): ?>
	<div class="span3">
	<?php for($i=0;$i<$count_modules;$i++):?>
	<?php if($i%4=='0'):?>
	<div class="span12">
	<?php echo $module_middle[$i]?><!--输出-->
	</div>
	<?php endif;?>
	<?php endfor;?>
	</div>
	
	<div class="span3">
	<?php for($i=1;$i<$count_modules;$i++):?>
	<?php if($i%5=='0' || $i == '1'):?>
	<div class="span12">
	<?php echo $module_middle[$i]?><!--输出-->
	</div>
	<?php endif;?>
	<?php endfor;?>
	</div>
	
	<div class="span3">
	<?php for($i=2;$i<$count_modules;$i++):?>
	<?php if($i%6 == '0' || $i == '2'):?>
	<div class="span12">
	<?php echo $module_middle[$i]?><!--输出-->
	</div>
	<?php endif;?>
	<?php endfor;?>
	</div>
	
	<div class="span3">
	<?php for($i=3;$i<$count_modules;$i++):?>
	<?php if($i%7 == '0' || $i == '3'):?>
	<div class="span12">
	<?php echo $module_middle[$i]?><!--输出-->
	</div>
	<?php endif;?>
	<?php endfor;?>
	</div>
<?php endif;?>
</div>
<?php endif; ?>