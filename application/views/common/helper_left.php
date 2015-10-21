<!-- BEGIN SIDEBAR -->

<div class="page-sidebar nav-collapse collapse hidden-phone">

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

	<!--导航第一个开始-->
	<?php if (is_array($nav1)): ?>
	
	<?php foreach ($nav1 as $item1): ?>
	
	<li class="start ">

		<?php if (isset($item1['nav_url'])): ?>

		<a href="<?php echo site_url($item1['nav_url'])?>">

		<?php else: ?>
		
		<a href="javascript:;">

		<?php endif; ?>

		<i class="<?php echo 'icon-'.$item1['nav_ico']?>"></i> 

		<span class="title"><?php echo $item1['nav_name']?></span>
		
		<?php if (!empty($item1['childs'])): ?>
		
		<span class="arrow"></span>
		
		<?php endif; ?>
		
		</a>

		<?php if (is_array($item1['childs'])): ?>
		
		<?php foreach ($item1['childs'] as $childs1): ?>
		
		<ul class="sub-menu">

			<li >

				<a href="<?php echo site_url($childs1['nav_child_url'])?>">

				<?php echo $childs1['nav_child_name']?></a>

			</li>

		</ul>
		
		<?php endforeach; ?>
		
		<?php endif; ?>

	</li>

	<?php endforeach; ?>

	<?php endif; ?>
	
	<!--导航第一个结束-->
	
	<!--导航第二个开始，红色-->
	
	<?php if (is_array($nav2)): ?>
	
	<?php foreach ($nav2 as $item2): ?>
	
	<li class="active">

		<?php if (isset($item2['nav_url'])): ?>

		<a href="<?php echo site_url($item2['nav_url'])?>">

		<?php else: ?>
		
		<a href="javascript:;">

		<?php endif; ?>

		<i class="<?php echo 'icon-'.$item2['nav_ico']?>"></i> 

		<span class="title"><?php echo $item2['nav_name']?></span>
		
		<span class="selected"></span>

		<span class="arrow open"></span>

		</a>

		<?php if (is_array($item2['childs'])): ?>
		
		<?php foreach ($item2['childs'] as $childs2): ?>

		<ul class="sub-menu">

			<li >

				<a href="<?php echo site_url($childs2['nav_child_url'])?>">

				<?php echo $childs2['nav_child_name']?></a>

			</li>

		</ul>

		<?php endforeach; ?>

		<?php endif; ?>

	</li>
	
	<?php endforeach; ?>

	<?php endif; ?>
	
	<!--导航第二个结束，红色-->

	<!--导航第二个之后开始-->

	<?php if (is_array($nav3)): ?>
	
	<?php foreach ($nav3 as $item3): ?>

	<li class="">

		<?php if (isset($item3['nav_url'])): ?>

		<a href="<?php echo site_url($item3['nav_url'])?>">

		<?php else: ?>
		
		<a href="javascript:;">

		<?php endif; ?>

		<i class="<?php echo 'icon-'.$item3['nav_ico']?>"></i> 

		<span class="title"><?php echo $item3['nav_name']?></span>

		<?php if (!empty($item3['childs'])): ?>
		
		<span class="arrow"></span>
		
		<?php endif; ?>

		</a>

		<?php if (!empty($item3['childs']) && is_array($item3['childs'])): ?>
		
		<ul class="sub-menu">

			<?php foreach ($item3['childs'] as $childs3): ?>

			<li >

				<a href="<?php echo site_url($childs3['nav_child_url'])?>">

				<?php echo $childs3['nav_child_name']?></a>

			</li>
			
			<?php endforeach; ?>

		</ul>
		
		<?php endif; ?>

	</li>
	
	<?php endforeach; ?>

	<?php endif; ?>

	<!--导航第二个之后结束-->

</ul>

<!-- END SIDEBAR MENU -->

</div>

<!-- END SIDEBAR -->