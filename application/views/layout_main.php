<html>
<head>
	<title><?php $title_for_layout ?></title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!-- <link rel="stylesheet" href="/css/main.css" type="text/css" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!--<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>-->
	
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container" >
		<!--
		<div class="navbar navbar-fixed-top" >
			<div class="navbar-inner">
			<a class="brand" href="#">Title</a>
				<ul class="nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
				</ul>
			</div>
		</div>
		-->
		<div class="row" >
			<div class="span2" >
				<p>This is Menu</p>
			</div>
			<div class="span10" >
				<?php echo $content_for_layout ?>
			</div>
		</div>
		<div> Footer </div>
	</div>
</body>
</html>