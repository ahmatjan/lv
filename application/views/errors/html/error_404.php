<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>对不起！你访问的页面不存在！</title>

	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->

	<link href="<?php echo $base_url.'public/min/?g=css'?>" rel="stylesheet" type="text/css"/>

	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->

	<link href="<?php echo $base_url.'public/min/?f=public/css/error.css'?>" rel="stylesheet" type="text/css"/>

	<!-- END PAGE LEVEL STYLES -->

	<link rel="shortcut icon" href="../public/image/favicon.ico" />

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-404-full-page">

	<div class="row-fluid">

		<div class="span12 page-404">

			<div class="number">

				404

			</div>

			<div class="details">

				<h4><?php echo $heading; ?></h4>

				<p>

					<!--我们无法找到你要找的页面。<br />-->

					<?php echo $message; ?>
					
				</p>

				<form action="<?echo $base_url.'search/lv.php'?>" method="get"  style="margin: 0">

					<div class="input-append">                      

						<input class="m-wrap" size="16" type="text" name="query" placeholder="请输入关键词..." />

						<input type="hidden" name="search" class="search" value="1"/>            
						<input type="hidden" name="type" class="search" value="and"/>            
						<input type="hidden" name="results" class="search" value="20"/>    
						<button class="btn blue">搜索</button>

					</div>

				</form>

				页面将在 <span id="mes" style="color:blue">3</span> 秒钟后跳转回上一个页面！

			</div>

		</div>

	</div>

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<!-- BEGIN CORE PLUGINS -->

	<script src="../public/js/jquery-1.8.3.min.js" type="text/javascript"></script>   

	<script src="../public/js/bootstrap.min.js" type="text/javascript"></script>

	<!--[if lt IE 9]>

	<script src="../public/js/excanvas.js"></script>

	<script src="../public/js/respond.js"></script>  

	<![endif]-->   

	<script src="../public/js/breakpoints.js" type="text/javascript"></script>  

	<script src="../public/js/jquery.uniform.min.js" type="text/javascript" ></script> 

	<!-- END CORE PLUGINS -->

	<script src="../public/js/app.js"></script>  

	<script>

		jQuery(document).ready(function() {    

		   App.init();

		});

	</script>
	<?php
		echo "<script> var url=\"$jump_url\";</script>";
	?>
	<script> 
		var i = 3; 
		var intervalid; 
		intervalid = setInterval("fun()", 1000); 
		function fun() { 
		if (i == 0) { 
		window.location.href = url; 
		clearInterval(intervalid); 
		} 
		document.getElementById("mes").innerHTML = i; 
		i--; 
		} 
	</script> 

	<!-- END JAVASCRIPTS -->
</body>

<!-- END BODY -->

</html>