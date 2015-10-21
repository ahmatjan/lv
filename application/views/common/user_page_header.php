<!-- BEGIN PAGE HEADER-->

<div class="row-fluid">

	<div class="span12">

		<!-- BEGIN PAGE TITLE & BREADCRUMB-->

		<ul class="breadcrumb">
		
			<?php foreach ($breadcrumbs as $k=>$i): ?>

			<?php if ($k == 'home' && $i['url']): ?>
			
			<li>
			
			<i class="icon-home"></i>
			
			<a href="<?php echo $i['url']?>"><?php echo $i['name']?></a> 

			<i class="icon-angle-right"></i>
			
			</li>
			
			<?php elseif ($i['url']): ?>

			<li>

				<a href="<?php echo $i['url']?>"><?php echo $i['name']?></a>

				<i class="icon-angle-right"></i>

			</li>
			<?php else: ?>

			<li><a href="<?php echo $i['this_url']?>"><?php echo $i['name']?></a></li>
			
			<?php endif; ?>
			
			<?php endforeach; ?>

		</ul>

		<!-- END PAGE TITLE & BREADCRUMB-->

	</div>

</div>

<!-- END PAGE HEADER-->
<?php if ($setting_success): ?>

<div class="alert alert-info">

	<button class="close" data-dismiss="alert"></button>

	<strong>成功!</strong> <?php echo @$setting_success?>

</div> 

<?php endif; ?>

<?php if ($setting_false): ?>

<div class="alert alert-error">

	<button class="close" data-dismiss="alert"></button>

	<strong>失败!</strong> <?php echo @$setting_false?>

</div> 

<?php endif; ?>