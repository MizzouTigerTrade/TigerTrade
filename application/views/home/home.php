<div class="jumbotron">
	<div class="container">
		<h1>Welcome to TigerTrade!</h1>
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>
	
		<p>If you would like to edit this page you'll find it located at:<code>application/views/home/home.php</code></p>
	
		<p>The corresponding controller for this page is found at:<code>application/controllers/home.php</code></p>
	
		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="http://getbootstrap.com/getting-started/">User Guide</a>.</p>
		
		<!--<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>-->
	</div>
</div>

<div class="container">
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<div class="col-xs-12">
			<?php foreach ($categories->result() as $category) { ?>
				<div class="col-xs-6 col-sm-3 col-lg-2">
					<a class="btn btn-primary wide-button" href="<?php echo base_url('/market/category/' . $category->category_id) ?>"><?php echo $category->name ?></a>
					<?php foreach ($subcategories->result() as $subcategory) { ?>
						<?php if ($subcategory->category_id == $category->category_id) { ?>
							<a class="btn btn-default btn-xs wide-button" href="<?php echo base_url('/market/category/' . $subcategory->subcategory_id) ?>"><?php echo $subcategory->name ?></a>
						<?php } ?>
					<?php } ?>
					<br>
				</div>
			<?php } ?>
		</div><!-- /.col-lg-4 -->
		
		<div class="col-md-6">
			
		</div><!-- /.col-lg-4 -->
	</div><!-- /.row -->
</div>
