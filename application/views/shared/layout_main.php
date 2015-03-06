<html>
<head>
	<title><?php if (isset($title)) { echo 'TigerTrade ' . $title; } else { echo 'TigerTrade'; } ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge;text/html;charset=utf-8">
	<!-- <link rel="stylesheet" href="/css/main.css" type="text/css" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-override.css') ?>" rel="stylesheet">
	
	<link rel="stylesheet" href="<?php echo base_url('assets/js/jquery-ui/jquery-ui.min.css') ?>">
	<script src="<?php echo base_url('assets/js/jquery-ui/external/jquery/jquery.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui/jquery-ui.min.js') ?>"></script>

</head>
<body>
	<!-- MAIN NAVIGATION -->
	<?php if (isset($menu)) { $menu; } ?>
	
	<?php echo $content_for_layout ?>
	
    <!-- FOOTER -->
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<footer class="footer">
		<div class="container text-muted">
			<div class="row">
				<div class="col-xs-4">
					<p class="text-center">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
				</div>
				<div class="col-xs-4">
					<p class="text-center">
						<!--<a href="#">Back to top</a><br/>-->
						<a href="<?php echo base_url('content/terms') ?>">Terms of Use</a>
					</p>
				</div>
				<div class="col-xs-4">
					<p class="text-center">&copy; 2015 TigerTrade Team</p>
				</div>
			</div>
		</div>
	</footer>
	
	<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/back_button.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/show_hidden_message.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/new_ad.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/clickable_row.js') ?>"></script>

</body>
</html>