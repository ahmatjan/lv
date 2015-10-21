<!--右-->
<?php if (isset($module_right)): ?><!--如果不为空-->
<?php if (is_array($module_right)): ?><!--如果是一个数组-->

<?php foreach ($module_right as $item): ?><!--遍历-->

<?php echo $item?><!--输出-->

<?php endforeach; ?>

<?php endif; ?>
<?php endif; ?>