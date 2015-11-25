<!-- BEGIN SAMPLE TABLE PORTLET-->

<div class="portlet box blue filemanager">

	<div class="portlet-title">

		<div class="caption"><i class="icon-cogs"></i>图片管理</div>

		<div class="tools">

			<a href="javascript:;" class="reload" title="刷新"></a>

			<a href="javascript:;" class="remove" title="关闭"></a>

		</div>

	</div>
	
	<div class="portlet-t">

		<div class="caption">
		<a href="#" class="btn icn-only" title="上一级"><i class="icon-hand-left"></i></a>
		<a href="#" class="btn icn-only green" title="上一级"><i class="icon-upload-alt m-icon-white" title="上传"></i></a>
		<a href="#" class="btn icn-only" title="上一级"><i class="icon-folder-close m-icon-white" title="新建"></i></a>
		<a href="#" class="btn icn-only red" title="上一级"><i class="icon-trash" title="删除"></i></a>
		</div>

		<div class="tools hidden-phone hidden-tablet">

		<input class="m-wrap" type="text" /><button class="btn green" type="button">搜索!</button>

		</div>

	</div>

	<div class="portlet-body">
		<?php if(is_array($images) && !empty($images) && !isset($error_info)):?>
		<?php foreach($images as $image):?>
		<?php if($image['type']=='directory'):?>
			<li>
				<a href="<?php echo $image['href']?>">
				<i class="icon-folder-open"></i>
				<div class="filename green"><?php echo $image['name']?></div>
				</a>
			</li>
		<?php else:?>
		<?php endif;?>
		<?php endforeach;?>
		<?php elseif(isset($error_info)):?>
			<li><?php echo $error_info;?></li>
		<?php else:?>
		<li>文件目录为空</li>
		<?php endif;?>
		<li><img src="<?php echo base_url('image/cache/catalog/1-260x173.jpg')?>"></li>
		<li><img src="<?php echo base_url('image/cache/catalog/1-260x173.jpg')?>"></li>
		<li><img src="<?php echo base_url('image/cache/catalog/1-260x173.jpg')?>"></li>
		<li><img src="<?php echo base_url('image/cache/catalog/1-260x173.jpg')?>"></li>

	</div>

</div>

<!-- END SAMPLE TABLE PORTLET-->