<!-- BEGIN SAMPLE TABLE PORTLET-->

<div class="portlet box blue filemanager">

	<div class="portlet-title">

		<div class="caption"><i class="icon-cogs"></i>图片管理</div>

		<div class="tools">

			<a href="<?php echo $refresh; ?>" id="button-refresh" class="reload" title="刷新"></a>

			<a href="javascript:;" data-dismiss="modal" class="remove" title="关闭"></a>

		</div>

	</div>
	
	<div class="portlet-t">

		<div class="caption">
		<a href="<?php echo $parent;?>" id="button-parent" class="btn icn-only" title="上一级"><i class="icon-hand-left"></i></a>
		<button type="button" data-toggle="tooltip" id="button-upload" class="btn icn-only green" title="上传"><i class="icon-upload-alt m-icon-white" title="上传"></i></button>
		<button type="button" data-toggle="tooltip" id="button-folder" class="btn icn-only" title="新建"><i class="icon-folder-close m-icon-white" title="新建"></i></button>
		<button type="button" data-toggle="tooltip" id="button-delete" class="btn icn-only red" title="删除"><i class="icon-trash" title="删除"></i></button>
		</div>

		<div class="tools hidden-phone hidden-tablet">

		<input class="m-wrap" type="text" /><button type="button" data-toggle="tooltip" id="button-search" class="btn green" type="button">搜索</button>

		</div>

	</div>

	<div class="portlet-body">
		<?php if(is_array($images) && !empty($images) && !isset($error_info)):?>
		<?php foreach(array_chunk($images, 4) as $image_):?>
		<?php foreach($image_ as $image):?>
		<?php if(@$image['type']=='directory'):?>
			<li>
				<a href="<?php echo $image['href']?>" class="directory">
				<i class="icon-folder-open"></i>
				</a>
				<div class="filename"><input class="filename-i" type="checkbox" name="path[]" value="<?php echo $image['path']; ?>" /><span><?php echo $image['name']?></span></div>
			</li>
		<?php endif;?>
		<?php if(@$image['type']=='image'):?>
			<li>
				<a href="<?php echo $image['href']?>" class="thumbnail">
				<img src="<?php echo $image['thumb']; ?>" alt="<?php echo $image['name']; ?>" title="<?php echo $image['name']; ?>" />
				</a>
				<div class="filename"><input class="filename-i" type="checkbox" name="path[]" value="<?php echo $image['path']; ?>" /><span><?php echo $image['name']?></span></div>
			</li>
		<?php endif;?>
		<?php endforeach;?>
		<?php endforeach;?>
		<?php elseif(isset($error_info)):?>
			<?php echo $error_info;?>
		<?php else:?>
		<li>文件目录为空</li>
		<?php endif;?>
		<!--
		<li><img src="<?php echo base_url('image/cache/catalog/1-260x173.jpg')?>"></li>
		<li><img src="<?php echo base_url('image/cache/catalog/1-260x173.jpg')?>"></li>
		<li><img src="<?php echo base_url('image/cache/catalog/1-260x173.jpg')?>"></li>
		<li><img src="<?php echo base_url('image/cache/catalog/1-260x173.jpg')?>"></li>
		-->
		<div class="pagination"><?php echo $pagination; ?></div>

	</div>

</div>

<!-- END SAMPLE TABLE PORTLET-->
<script type="text/javascript">
$('a.thumbnail').on('click', function(e) {
	e.preventDefault();

	<?php if ($thumb) { ?>
	$('#<?php echo $thumb; ?>').find('img').attr('src', $(this).find('img').attr('src'));
	<?php } ?>
	
	<?php if ($target) { ?>
	$('#<?php echo $target; ?>').attr('value', $(this).parent().find('input').attr('value'));
	<?php } else { ?>
	var range, sel = document.getSelection(); 
	
	if (sel.rangeCount) { 
		var img = document.createElement('img');
		img.src = $(this).attr('href');
	
		range = sel.getRangeAt(0); 
		range.insertNode(img); 
	}
	<?php } ?>

	$('#modal-image').modal('hide');
	$('#modal-backdrop').modal('hide');
});

$('a.directory').on('click', function(e) {
	e.preventDefault();
	
	$('#modal-image').load($(this).attr('href'));
});

$('.pagination a').on('click', function(e) {
	e.preventDefault();
	
	$('#modal-image').load($(this).attr('href'));
});

$('#button-parent').on('click', function(e) {
	e.preventDefault();
	
	$('#modal-image').load($(this).attr('href'));
});

$('#button-refresh').on('click', function(e) {
	e.preventDefault();
	
	$('#modal-image').load($(this).attr('href'));
});

$('input[name=\'search\']').on('keydown', function(e) {
	if (e.which == 13) {
		$('#button-search').trigger('click');
	}
});
$('#button-search').on('click', function(e) {
	//var url = '<?php echo site_url()?>common/filemanager?directory=<?php echo $directory; ?>';
	var c = '/';
	var url = location.protocol+c+c+window.location.host+'/common/filemanager?directory=<?php echo $directory; ?>';
		
	var filter_name = $('input[name=\'search\']').val();
	
	if (filter_name) {
		url += '&filter_name=' + encodeURIComponent(filter_name);
	}
							
	<?php if ($thumb) { ?>
	url += '&thumb=' + '<?php echo $thumb; ?>';
	<?php } ?>
	
	<?php if ($target) { ?>
	url += '&target=' + '<?php echo $target; ?>';
	<?php } ?>
			
	$('#modal-image').load(url);
});
</script> 
<script type="text/javascript">
$('#button-upload').on('click', function() {
	$('#form-upload').remove();
	
	$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" value="" /></form>');
	
	$('#form-upload input[name=\'file\']').trigger('click');
	
	if (typeof timer != 'undefined') {
    	clearInterval(timer);
	}
		
	var c = '/';
	//var url = location.protocol+c+c+window.location.host+'/common/filemanager?directory=<?php echo $directory; ?>';
	timer = setInterval(function() {
		if ($('#form-upload input[name=\'file\']').val() != '') {
			clearInterval(timer);
			
			$.ajax({
				url: location.protocol+c+c+window.location.host+'/common/filemanager/up_load?directory=<?php echo $directory; ?>',
				type: 'post',		
				dataType: 'json',
				data: new FormData($('#form-upload')[0]),
				cache: false,
				contentType: false,
				processData: false,	
				beforeSend: function() {
					$('#button-upload i').replaceWith('<i class="icon-upload-alt m-icon-white"></i>');
					$('#button-upload').prop('disabled', true);
				},
				complete: function() {
					$('#button-upload i').replaceWith('<i class="icon-upload-alt m-icon-white"></i>');
					$('#button-upload').prop('disabled', false);
				},
				success: function(json) {
					if (json['error']) {
						alert(json['error']);
					}
					
					if (json['success']) {
						alert(json['success']);
						$('#button-refresh').trigger('click');
					}
				},			
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});	
		}
	}, 500);
});
$('#button-folder').popover({
	html: true,
	placement: 'bottom',
	trigger: 'click',
	title: '新建文件夹',
	content: function() {
		html  = '<div class="input-group">';
		html += '  <input type="text" name="folder" value="" placeholder="新建文件夹" class="form-control">';
		html += '  <span class="input-group-btn"><button type="button" title="确定" id="button-create" class="btn btn-primary"><i class="icon-ok"></i>确定</button></span>';
		html += '</div>';
		
		return html;	
	}
});

$('#button-folder').on('shown.bs.popover', function() {
	var c = '/';
	//var url = location.protocol+c+c+window.location.host+'/common/filemanager?directory=<?php echo $directory; ?>';
	$('#button-create').on('click', function() {
		$.ajax({
			url: location.protocol+c+c+window.location.host+'/common/filemanager/folder?directory=<?php echo $directory; ?>',
			type: 'post',		
			dataType: 'json',
			data: 'folder=' + encodeURIComponent($('input[name=\'folder\']').val()),
			beforeSend: function() {
				$('#button-create').prop('disabled', true);
			},
			complete: function() {
				$('#button-create').prop('disabled', false);
			},
			success: function(json) {
				if (json['error']) {
					alert(json['error']);
				}
				
				if (json['success']) {
					alert(json['success']);
										
					$('#button-refresh').trigger('click');
				}
			},			
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	});	
});

$('#modal-image #button-delete').on('click', function(e) {
	if (confirm('确定删除？')) {
		var c = '/';
		//var url = location.protocol+c+c+window.location.host+'/common/filemanager?directory=<?php echo $directory; ?>';
		$.ajax({
			url: location.protocol+c+c+window.location.host+'/common/filemanager/delete',
			type: 'post',		
			dataType: 'json',
			data: $('input[name^=\'path\']:checked'),
			beforeSend: function() {
				$('#button-delete').prop('disabled', true);
			},	
			complete: function() {
				$('#button-delete').prop('disabled', false);
			},		
			success: function(json) {
				if (json['error']) {
					alert(json['error']);
				}
				
				if (json['success']) {
					alert(json['success']);
					
					$('#button-refresh').trigger('click');
				}
			},			
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
});
</script>