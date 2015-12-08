<?php if (isset($module_bottom)): ?><!--如果不为空-->
<?php if (is_array($module_bottom)): ?><!--如果是一个数组-->

<?php foreach ($module_bottom as $item): ?><!--遍历-->

<?php echo $item?><!--输出-->

<?php endforeach; ?>

<?php endif; ?>
<?php endif; ?>