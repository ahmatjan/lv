<!DOCTYPE html>

<!--[if IE 8]> <html lang="zh" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="zh" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="zh"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

<meta charset="utf-8" />
<title><?php echo $title.$website_title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<meta name="description" content="<?php echo $mate_description?>"/>

<meta name="keywords" content="<?php echo $mate_key?>"/>

<base href="<?php echo base_url()?>" />

<meta name="author" content="<?php echo $mate_author?>"/>

<!--缓存dns-->
<link rel="dns-prefetch" href="<?php echo base_url()?>">
<link rel="shortcut icon" href="<?php echo base_url('public/image/favicon.ico')?>" />

<!-- BEGIN GLOBAL MANDATORY STYLES -->

<link href="<?php echo base_url('public/min/?g=css')?>" rel="stylesheet" type="text/css"/>
<!--
<link href="<?php echo base_url('public/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url('public/css/bootstrap-responsive.min.css');?>" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url('public/css/font-awesome.min.css" rel="stylesheet')?>" type="text/css"/>

<link href="<?php echo base_url('public/css/style-metro.css');?>" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url('public/css/style.css');?>" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url('public/css/style-responsive.css');?>" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url('public/css/default.css')?>" rel="stylesheet" type="text/css" id="style_color"/>

<link href="<?php echo base_url('public/css/uniform.default.css')?>" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url('public/css/select2_metro.css')?>" rel="stylesheet" type="text/css"/>
<!--加载进度条-->

<!--
<link href="<?php echo base_url('public/css/loading/nprogress.css')?>" rel="stylesheet" type="text/css"/>
<!--加载进度条-->
<!--意见反馈回顶部-->
<!--
<link href="<?php echo base_url('public/css/loading/feedback.css')?>" rel="stylesheet" type="text/css"/>
-->
<!--意见反馈回顶部-->

<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL STYLES -->
<?php if(!empty($css_page_style)):?>
<link href="<?php echo base_url('public/min/?f=').$css_page_style?>" rel="stylesheet" type="text/css"/>
<?php endif;?>

<!--
<?php if ($css_page_style !== NULL && is_array($css_page_style)): ?>
<?php foreach ($css_page_style as $item): ?>

<link href="<?php echo base_url() . $item?>" rel="stylesheet" type="text/css"/>

<?php endforeach; ?>
<?php endif; ?>
-->
<!-- END PAGE LEVEL STYLES -->

	<script src="<?php echo base_url().'public/min/?g=js'?>" type="text/javascript"></script>

	<!-- BEGIN CORE PLUGINS -->
<!--
	<script src="<?php echo base_url('public/js/jquery-1.10.1.min.js')?>" type="text/javascript"></script>

	<script src="<?php echo base_url('public/js/jquery-migrate-1.2.1.min.js')?>" type="text/javascript"></script>
-->
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<!--
	<script src="<?php echo base_url('public/js/jquery-ui-1.10.1.custom.min.js')?>" type="text/javascript"></script>      

	<script src="<?php echo base_url('public/js/bootstrap.min.js')?>" type="text/javascript"></script>
-->
	<!--用min方式加载-->
	<!--[if lt IE 9]>

	<script src="<?php echo base_url('public/min/?f=public/js/excanvas.min.js')?>"></script>

	<script src="<?php echo base_url('public/min/?f=public/js/respond.min.js')?>"></script>  

	<![endif]-->  
	
	<?php echo $style;?>

</head>

<!-- END HEAD -->