<?php if (isset($top_module)): ?><!--如果不为空-->
<div class="row-fluid">
	<div class="span12">
<!--上-->
<?php if (is_array($top_module)): ?><!--如果是一个数组-->
<?php foreach ($top_module as $item): ?><!--遍历-->

<?php if (count($top_module) == '1'): ?>
	<div class="span12">
<?php elseif (count($top_module)=='2'): ?>
	<div class="span6">
<?php elseif (count($top_module)=='3'): ?>
	<div class="span4">
<?php else: ?>
	<div class="span3">
<?php endif; ?>

<?php echo $item?><!--输出-->
	</div>
<?php endforeach; ?>
<?php endif; ?>
	</div>
</div>
<?php endif; ?>

<?php if (isset($middle_module)): ?><!--如果不为空-->
<div class="row-fluid">
<div class="span12">
<!--中-->
<?php if (is_array($middle_module)): ?><!--如果是一个数组-->
<?php foreach ($middle_module as $item): ?><!--遍历-->
	<?php if (count($middle_module) == '1'): ?>
	<div class="span12">
<?php elseif (count($middle_module)=='2'): ?>
	<div class="span6">
<?php elseif (count($middle_module)=='3'): ?>
	<div class="span4">
<?php else: ?>
	<div class="span3">
<?php endif; ?>
<?php echo $item?><!--输出-->
	</div>
<?php endforeach; ?>
<?php endif; ?>
	</div>
</div>
<?php endif; ?>

<?php if (isset($bottom_module)): ?><!--如果不为空-->
<div class="row-fluid">
<div class="span12">
<!--下-->
<?php if (is_array($bottom_module)): ?><!--如果是一个数组-->
<?php foreach ($bottom_module as $item): ?><!--遍历-->

<?php if (count($bottom_module) == '1'): ?>
	<div class="span12">
<?php elseif (count($bottom_module)=='2'): ?>
	<div class="span6">
<?php elseif (count($bottom_module)=='3'): ?>
	<div class="span4">
<?php else: ?>
	<div class="span3">
<?php endif; ?>

<?php echo $item?><!--输出-->
</div>
<?php endforeach; ?>
<?php endif; ?>
	</div>
</div>
<?php endif; ?>