<!-- BEGIN SIDEBAR -->

<div class="page-sidebar nav-collapse collapse hidden-phone visible-tablet">

<!-- BEGIN SIDEBAR MENU -->        

<ul class="page-sidebar-menu">

	<li>

		<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

		<div class="sidebar-toggler hidden-phone"></div>

		<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

	</li>

	<li>

		<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->

		<form class="sidebar-search">

			<div class="input-box">

				<a href="javascript:;" class="remove"></a>

				<input type="text" placeholder="搜索..." />

				<input type="button" class="submit" value=" " />

			</div>

		</form>

		<!-- END RESPONSIVE QUICK SEARCH FORM -->

	</li>
	<!--导航开始-->
	<?php if (is_array($navs)): ?>
	
	<?php foreach ($navs as $item): ?>
	
	<li class="start ">

		<?php if (isset($item['nav_url'])): ?>

		<a href="<?php echo site_url($item['nav_url'])?>">

		<?php else: ?>
		
		<a href="javascript:;">

		<?php endif; ?>

		<i class="<?php echo 'icon-'.$item['nav_ico']?>"></i> 

		<span class="title"><?php echo $item['nav_name']?></span>
		
		<?php if (!empty($item['childs'])): ?>
		
		<span class="arrow"></span>
		
		<?php endif; ?>
		
		</a>

		<?php if (is_array($item['childs'])): ?>
		
		<ul class="sub-menu">

			<?php foreach ($item['childs'] as $childs): ?>

			<li >

				<a href="<?php echo site_url($childs['nav_child_url'])?>">

				<?php echo $childs['nav_child_name']?></a>

			</li>
			
			<?php endforeach; ?>

		</ul>
		
		<?php endif; ?>

	</li>

	<?php endforeach; ?>

	<?php endif; ?>
	
	<!--导航结束-->

</ul>

<!-- END SIDEBAR MENU -->

</div>

<!-- END SIDEBAR -->