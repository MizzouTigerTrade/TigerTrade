<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>Market: <?php echo ucfirst($category->name) . ' - ' . ucfirst($subcategory->name); ?></h1>
		</div>
	</div>
	
	<hr>
	
	<div class="row">
		<div class="col-xs-3 col-sm-2">
						<!-- Market Menu -->
			<div id="market-menu" class="text-center">
				<a class="btn btn-default btn-sm wide-button" role="button" href="<?php echo base_url('/market') ?>"><b>all</b></a><br><br>
				<?php foreach ($categories->result() as $category) { ?>
				    <a class="btn <?php if ($subcategory->category_id == $category->category_id) { echo 'btn-primary'; } else { echo 'btn-default'; } ?> btn-sm wide-button" role="button" href="<?php echo base_url('/market/category/' . $category->category_id); ?>"><b><?php echo $category->name; ?></b></a><br>
				    <select onchange="location = this.options[this.selectedIndex].value;" class="form-control" id="" >
					    	<option>Subcategory</option>
			    	<?php foreach ($subcategories->result() as $subcategory) { ?>
				    	
			    		<?php if ($subcategory->category_id == $category->category_id) { ?>
			    			
			    			<option value="<?php echo base_url('/market/subcategory/' . $subcategory->subcategory_id); ?>">
			    				<?php echo $subcategory->name; ?>
			    			</option>
						<?php } ?>
				    	
			    	<?php } ?>
			    	</select>
			    	<br>
				<?php } ?>
			</div>
			
			<!-- Filter Form -->
			<div id="filter-form">
				<div class="form-group">
					<label for="list" class="control-label">Categories</label>
					<select multiple size="<?php echo $categories->num_rows(); ?>" class="form-control" id="category_list" >
					<?php 
						foreach($categories->result() as $category):
						echo "<option>" . $category->name . "</option>";
						endforeach; 
					?>
					</select>
				</div>
				<div class="form-group">
					<label for="list" class="control-label">Subcategories</label>
					<select multiple size="10" class="form-control" id="subcategory_list" >
					<?php 
						foreach($subcategories->result() as $subcategory):
						echo "<option>" . $subcategory->name . "</option>";
						endforeach; 
					?>
					</select>
				</div>
			</div>
			
			
			<!-- Search Form -->
			<div class="search-form">
				<div class="form-group">
					<label for="search" class="control-label">Search</label>
					<input type="text" class="form-control" name="search" ></input>
				</div>
			</div>
		</div>
		
		<div class="col-xs-9 col-sm-10">
			<div class="row">
				<div class="row text-center">
					<div class="btn-group hidden-xs">
						<a class="btn btn-default" href="<?php echo base_url('/ad/new_ad') ?>">Place an Ad</a>
						<?php if ($this->ion_auth->is_admin()) { ?>
						<a class="btn btn-default" href="<?php echo base_url('/market/new_category') ?>">Create a Category</a>
						<a class="btn btn-default" href="<?php echo base_url('/ad/new_subcategory') ?>">Create a Subcategory</a>
						<?php } ?>
					</div>
					<div class="visible-xs">
						<a class="btn btn-default" href="<?php echo base_url('/ad/new_ad') ?>">Place an Ad</a><br><br>
						<?php if ($this->ion_auth->is_admin()) { ?>
						<a class="btn btn-default" href="<?php echo base_url('/market/new_category') ?>">Create a Category</a><br><br>
						<a class="btn btn-default" href="<?php echo base_url('/ad/new_subcategory') ?>">Create a Subcategory</a><br>
						<?php } ?>
					</div>
				</div>
				
				<?php $count = 0; ?>
				<?php foreach ($ads->result() as $row) { ?>
					<?php if ($count == 0 || $count % 3 == 0) { ?><div class="row"><?php } ?>
					<div class="col-sm-6 col-md-4" style="padding-bottom: 10px;">
						<a class="market-link" href="<?php echo base_url('/ad/details/' . $row->ad_id) ?>">
						<h3><?php echo $row->title; ?></h3>
							<p style="color: black;">Price: $<?php echo $row->price; ?></p>
							<img src="http://placehold.it/300x200" class="img-thumbnail" alt="Responsive image" style="width: 100%;">
						</a><br><br>
						<p>Description: <?php echo $row->description; ?></p>
						<p>Ad ID: <?php echo $row->ad_id; ?></p>
					</div>
					<?php if ($count == 2 || $count % 3 == 2) { ?></div><?php } $count++; ?>
				<?php } ?>
				<?php if ($count % 3 != 0) { ?></div><?php } $count++; ?>
			</div>
		</div>
	</div>	
</div>