	<!-- BEGIN CONTAINER -->

	<div class="page-container row-fluid">

		<!-- BEGIN SIDEBAR -->

		<?php $this->public_section->get_column_left();?>

		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->

		<div class="page-content">

			<!-- BEGIN PAGE CONTAINER-->

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

				<?php $this->public_section->get_user_page_header();?>

				<div class="row-fluid inbox">

					<div class="span2">

						<ul class="inbox-nav margin-bottom-10">

							<li class="compose-btn">

								<a href="<?php echo base_url('article/article_send')?>" data-title="Compose" class="btn green"> 

								<i class="icon-edit"></i> 发布

								</a>

							</li>

							<li class="inbox active">

								<a href="javascript:;" class="btn" data-title="Inbox">未读消息（3）</a>

								<b></b>

							</li>

							<li class="sent"><a class="btn" href="javascript:;"  data-title="Sent">结伴（2）</a><b></b></li>

							<li class="draft"><a class="btn" href="javascript:;" data-title="Draft">诗歌（1）</a><b></b></li>

							<li class="trash"><a class="btn" href="javascript:;" data-title="Trash">文艺（0）</a><b></b></li>
							
							<li class="gonglue"><a class="btn" href="javascript:;" data-title="gonglue">攻略（0）</a><b></b></li>
							
							<li class="sheying"><a class="btn" href="javascript:;" data-title="sheying">摄影作品（0）</a><b></b></li>

						</ul>

					</div>

					<div class="span10">

						<div class="inbox-header">

							<h1 class="pull-left">Inbox</h1>

							<form action="#" class="form-search pull-right">

								<div class="input-append">

									<input class="m-wrap" type="text" placeholder="Search Mail">

									<button class="btn green" type="button">Search</button>

								</div>

							</form>

						</div>

						<div class="inbox-loading">加载中...</div>

						<div class="inbox-content">

						</div>

					</div>

				</div>

			</div>

			<!-- END PAGE CONTAINER-->    

		</div>

		<!-- END PAGE -->
		</div>
	</div>

	<!-- END CONTAINER -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<script src="<?php echo base_url('public/js/breakpoints.min.js')?>" type="text/javascript"></script>  

	<script src="<?php echo base_url('public/js/jquery.slimscroll.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/js/jquery.blockui.min.js')?>" type="text/javascript"></script>  

	<script src="<?php echo base_url('public/js/jquery.cookie.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/js/jquery.uniform.min.js')?>" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script src="<?php echo base_url('public/js/bootstrap-tag.js')?>" type="text/javascript" ></script> 

	<script src="<?php echo base_url('public/js/jquery.fancybox.pack.js')?>" type="text/javascript" ></script>

	<!-- BEGIN:File Upload Plugin JS files-->

	<script src="<?php echo base_url('public/js/jquery.ui.widget.js')?>"></script>

	<!-- The Templates plugin is included to render the upload/download listings -->

	<script src="<?php echo base_url('public/js/tmpl.min.js')?>"></script>

	<!-- The Load Image plugin is included for the preview images and image resizing functionality -->

	<script src="<?php echo base_url('public/js/load-image.min.js')?>"></script>

	<!-- The Canvas to Blob plugin is included for image resizing functionality -->

	<script src="<?php echo base_url('public/js/canvas-to-blob.min.js')?>"></script>

	<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->

	<script src="<?php echo base_url('public/js/jquery.iframe-transport.js')?>"></script>

	<!-- The basic File Upload plugin -->

	<script src="<?php echo base_url('public/js/jquery.fileupload.js')?>"></script>

	<!-- The File Upload file processing plugin -->

	<script src="<?php echo base_url('public/js/jquery.fileupload-fp.js')?>"></script>

	<!-- The File Upload user interface plugin -->

	<script src="<?php echo base_url('public/js/jquery.fileupload-ui.js')?>"></script>

	<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->

	<!--[if gte IE 8]><script src="<?php echo base_url('public/js/jquery.xdr-transport.js')?>"></script><![endif]-->

	<!-- END:File Upload Plugin JS files-->

	<!-- END PAGE LEVEL PLUGINS -->

	<script src="<?php echo base_url('public/js/app.js')?>"></script>      

	<script src="<?php echo base_url('public/js/inbox.js')?>"></script>    

	<script>

		jQuery(document).ready(function() {       

		   // initiate layout and plugins

		   App.init();

		   Inbox.init();

		});

	</script>

	<!-- END JAVASCRIPTS -->

<!-- END BODY -->

</html>