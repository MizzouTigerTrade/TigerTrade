<div class="jumbotron">

		
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>
		
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox" style="height: 300px;">
			<div class="item active text-center" >
				<h1>Welcome to the TigerTrade!</h1>
			</div>
				
			<div class="item">
				<img src="" alt="Chania">
			</div>
				
			<div class="item">
				<img src="" alt="Flower">
			</div>
				
			<div class="item">
				<img src="" alt="Flower">
			</div>
		</div>
		
		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>


</div>

<div class="container">
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<div class="col-xs-12">
			<?php foreach ($categories->result() as $category) { ?>
				<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
					<a class="btn btn-primary btn-xs wide-button" href="<?php echo base_url('/market/category/' . $category->category_id) ?>"><?php echo $category->name ?></a>
					<?php foreach ($subcategories->result() as $subcategory) { ?>
						<?php if ($subcategory->category_id == $category->category_id) { ?>
							<a class="btn btn-default btn-xs wide-button" href="<?php echo base_url('/market/category/' . $subcategory->subcategory_id) ?>"><?php echo $subcategory->name ?></a>
						<?php } ?>
					<?php } ?>
					<br><br>
				</div>
			<?php } ?>
		</div><!-- /.col-lg-4 -->
	</div><!-- /.row -->
</div>
