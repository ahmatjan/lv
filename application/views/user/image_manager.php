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

				<!-- BEGIN GALLERY MANAGER PORTLET-->

						<div class="portlet box blue">

							<div class="portlet-title">

								<div class="caption"><i class="icon-reorder"></i>Gallery Manager</div>

								<div class="tools">

									<a href="#portlet-config" data-toggle="modal" class="config"></a>

									<a href="javascript:;" class="reload"></a>

								</div>

							</div>

							<div class="portlet-body">

								<!-- BEGIN GALLERY MANAGER PANEL-->

								<div class="row-fluid">

									<div class="span4">

										<h4>Browsing Category 1</h4>

									</div>

									<div class="span8">

										<div class="pull-right">

											<select data-placeholder="Select Category" class="chosen" tabindex="-1" id="inputCategory">

												<option value="0"></option>

												<option value="1" selected>All</option>

												<option value="1">Category 1</option>

												<option value="1">Category 2</option>

												<option value="1">Category 3</option>

												<option value="1">Category 4</option>

											</select>

											<select data-placeholder="Sort By" class="chosen input-small" tabindex="-1" id="inputSort">

												<option value="0" selected></option>

												<option value="1">Date</option>

												<option value="1">Author</option>

												<option value="1">Title</option>

												<option value="1">Hits</option>

											</select>

											<div class="clearfix space5"></div>

											<a href="" class="btn pull-right green"><i class="icon-plus"></i> Upload</a>

										</div>

									</div>

								</div>

								<!-- END GALLERY MANAGER PANEL-->

								<hr class="clearfix" />

								<!-- BEGIN GALLERY MANAGER LISTING-->

								<div class="row-fluid">

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="<?php echo base_url('public/image/image1.jpg')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/image1.jpg')?>" alt="Photo" height="135" width="203"/>                    

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="<?php echo base_url('public/image/image2.jpg')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/image2.jpg')?>" alt="Photo" height="135" width="203"/>                            

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="<?php echo base_url('public/image/image3.jpg')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/image3.jpg')?>" alt="Photo" height="135" width="203"/>                             

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="<?php echo base_url('public/image/image4.jpg')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/image5.jpg')?>" alt="Photo" height="135" width="203"/>                                 

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

								</div>

								<div class="row-fluid">

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="<?php echo base_url('public/image/preview_02.png')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/preview_02.png')?>" alt="Photo" height="135" width="203"/>         
												
													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="<?php echo base_url('public/image/preview_03.png')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/preview_03.png')?>" alt="Photo" height="135" width="203"/>                           

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="<?php echo base_url('public/image/preview_04.png')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/preview_04.png')?>" alt="Photo" height="135" width="203"/>                           

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="<?php echo base_url('public/image/preview_05.png')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/preview_05.png')?>" alt="Photo" height="135" width="203"/>

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

								</div>

								<div class="space10"></div>

								<div class="row-fluid">

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="<?php echo base_url('public/image/preview_06.png')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/preview_06.png')?>" alt="Photo" height="135" width="203"/>

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="<?php echo base_url('public/image/preview_07.png')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/preview_07.png')?>" alt="Photo" height="135" width="203"/>                           

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="<?php echo base_url('public/image/preview_08.png')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/preview_08.png')?>" alt="Photo" height="135" width="203"/>                            

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="<?php echo base_url('public/image/preview_09.png')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/preview_09.png')?>" alt="Photo" height="135" width="203"/>                            

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

								</div>

								<div class="space10"></div>

								<div class="row-fluid">

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Metronic Desktop Preview" href="<?php echo base_url('public/image/preview_10.png')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/preview_10.png')?>" alt="Photo" height="135" width="203"/> 

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Metronic Notebook Preview" href="<?php echo base_url('public/image/preview_11.png')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/preview_11.png')?>" alt="Photo" height="135" width="203"/> 

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Metronic Tablet Preview" href="<?php echo base_url('public/image/preview_12.png')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/preview_12.png')?>" alt="Photo" height="135" width="203"/> 

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Metronic Phone Preview" href="<?php echo base_url('public/image/preview_13.png')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/preview_13.png')?>" alt="Photo" height="135" width="203"/>    

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

								</div>

								<div class="space10"></div>

								<div class="row-fluid">

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Metronic Desktop Preview" href="<?php echo base_url('public/image/preview_14.png')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/preview_14.png')?>" alt="Photo" height="135" width="203"/>

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Metronic Notebook Preview" href="<?php echo base_url('public/image/preview_15.png')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/preview_15.png')?>" alt="Photo" height="135" width="203"/>

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Metronic Tablet Preview" href="<?php echo base_url('public/image/preview_16.png')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/preview_16.png')?>" alt="Photo" height="135" width="203"/> 

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

									<div class="span3">

										<div class="item">

											<a class="fancybox-button" data-rel="fancybox-button" title="Metronic Tablet Preview" href="<?php echo base_url('public/image/preview_17.png')?>">

												<div class="zoom">

													<img class="lazy" data-original="<?php echo base_url('public/image/preview_17.png')?>" alt="Photo" height="135" width="203"/> 

													<div class="zoom-icon"></div>

												</div>

											</a>

											<div class="details">

												<a href="#" class="icon"><i class="icon-paper-clip"></i></a>

												<a href="#" class="icon"><i class="icon-link"></i></a>

												<a href="#" class="icon"><i class="icon-pencil"></i></a>

												<a href="#" class="icon"><i class="icon-remove"></i></a>    

											</div>

										</div>

									</div>

								</div>

								<!-- END GALLERY MANAGER LISTING-->

								<!-- BEGIN GALLERY MANAGER PAGINATION-->

								<div class="row-fluid">

									<div class="span12">

										<div class="pagination pull-right">

											<ul>

												<li><a href="#">«</a></li>

												<li><a href="#">1</a></li>

												<li><a href="#">2</a></li>

												<li><a href="#">3</a></li>

												<li><a href="#">4</a></li>

												<li><a href="#">5</a></li>

												<li><a href="#">»</a></li>

											</ul>

										</div>

									</div>

								</div>

								<!-- END GALLERY MANAGER PAGINATION-->

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

	<script src="<?php echo base_url('public/min/?f=public/js/breakpoints.min.js')?>" type="text/javascript"></script>  

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.slimscroll.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.blockui.min.js')?>" type="text/javascript"></script>  

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.cookie.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.uniform.min.js')?>" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script src="<?php echo base_url('public/min/?f=public/js/bootstrap-tag.js')?>" type="text/javascript" ></script> 

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.fancybox.pack.js')?>" type="text/javascript" ></script>

	<!-- BEGIN:File Upload Plugin JS files-->

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.ui.widget.js')?>"></script>

	<!-- The Templates plugin is included to render the upload/download listings -->

	<script src="<?php echo base_url('public/min/?f=public/js/tmpl.min.js')?>"></script>

	<!-- The Load Image plugin is included for the preview images and image resizing functionality -->

	<script src="<?php echo base_url('public/min/?f=public/js/load-image.min.js')?>"></script>

	<!-- The Canvas to Blob plugin is included for image resizing functionality -->

	<script src="<?php echo base_url('public/min/?f=public/js/canvas-to-blob.min.js')?>"></script>

	<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.iframe-transport.js')?>"></script>

	<!-- The basic File Upload plugin -->

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.fileupload.js')?>"></script>

	<!-- The File Upload file processing plugin -->

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.fileupload-fp.js')?>"></script>

	<!-- The File Upload user interface plugin -->

	<script src="<?php echo base_url('public/min/?f=public/js/jquery.fileupload-ui.js')?>"></script>

	<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->

	<!--[if gte IE 8]><script src="<?php echo base_url('public/min/?f=public/js/jquery.xdr-transport.js')?>"></script><![endif]-->

	<!-- END:File Upload Plugin JS files-->

	<!-- END PAGE LEVEL PLUGINS -->

	<script src="<?php echo base_url('public/min/?f=public/js/app.js')?>"></script>      

	<script src="<?php echo base_url('public/min/?f=public/js/inbox.js')?>"></script>
	
	<script src="<?php echo base_url('public/min/?f=public/js/gallery.js')?>"></script>

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