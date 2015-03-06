<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>Market: <?php echo ucfirst($category->name); ?></h1>
		</div>
	</div>
	
	<hr>
	
	<div class="row">
			
		<div class="col-xs-3 col-sm-2 hidden-sm hidden-xs">

			<!-- MEDIUM+ Screen Menu -->
			<div id="market-menu" class="text-center">
				<a class="btn btn-default btn-sm wide-button" href="<?php echo base_url('/ad/new_ad') ?>">New Ad</a><br>
				<?php if ($this->ion_auth->is_admin()) { ?>
					<a class="btn btn-default btn-sm wide-button" href="<?php echo base_url('/market/new_category') ?>">New Category</a><br>
					<a class="btn btn-default btn-sm wide-button" href="<?php echo base_url('/market/new_subcategory') ?>">New Subcategory</a>
				<?php } ?>
				<a class="btn btn-default btn-sm wide-button" role="button" href="<?php echo base_url('/market') ?>" style="margin: 13px 0 18px 0;"><b>all</b></a><br>
				<select style="margin-bottom: 5px;" onchange="location = this.options[this.selectedIndex].value;" class="form-control input-sm" id="categorySelectForm" name="category"> 
					<option value="">Category</option>
					<?php
						foreach($categories->result() as $cat) { ?>
							<option <?php if ($category->category_id == $cat->category_id) { echo 'selected'; }) ?> value="/market/category/<?php echo $cat->category_id; ?>"><?php echo $cat->name; ?></option>	
					<?php } ?>	
				</select>
				<select style="margin-bottom: 5px;" onchange="location = this.options[this.selectedIndex].value;" class="form-control input-sm" id="subCategory" name="subCategory">
			    	<option value="">Subcategory<option>	
				</select>
			</div>
			
			<!-- Filter Form -->
			<!--
			<div id="filter-form" class="">
				<div class="form-group">
					<label for="list" class="control-label">Categories</label>
					<select multiple size="<?php echo $categories->num_rows(); ?>" class="form-control" id="category_list" >
					<?php 
						foreach($categories->result() as $cat):
						echo "<option>" . $cat->name . "</option>";
						endforeach; 
					?>
					</select>
				</div>
				<div class="form-group">
					<label for="list" class="control-label">Subcategories</label>
					<select multiple size="10" class="form-control" id="subcategory_list" >
					<?php 
						foreach($subcategories->result() as $sub):
						echo "<option>" . $sub->name . "</option>";
						endforeach; 
					?>
					</select>
				</div>
			</div>
			-->
			
			<!-- Search Form -->
			<div class="search-form">
				<div class="form-group">
					<label for="search" class="control-label">Search</label>
					<input type="text" class="form-control" name="search" ></input>
				</div>
			</div>
		</div>
		
		<div class="col-xs-12 col-md-10">
			
			<div class="col-xs-12">
				
				<!-- SMALL Screen Menu -->
				<div class="row visible-sm text-center">
					<div class="col-sm-3">
						<select class="form-control input-sm" id="categorySelectForm" name="category"> 
							<option value="">Select One</option>
							<?php
								foreach($categories->result() as $category) {
									echo '<option value="'.$category->category_id.'">'.$category->name.'</option>';		
							} ?>	
						</select>
					</div>
					<div class="col-sm-3">
						<select onchange="location = this.options[this.selectedIndex].value;" class="form-control input-sm" id="subCategory" name="subCategory">
					    	<option value=""><option>	
						</select>
					</div>
					<div class="col-sm-6">
						<div class="btn-group">
							<a class="btn btn-default btn-sm" href="<?php echo base_url('/ad/new_ad') ?>">New Ad</a>
							<?php if ($this->ion_auth->is_admin()) { ?>
							<a class="btn btn-default btn-sm" href="<?php echo base_url('/market/new_category') ?>">New Category</a>
							<a class="btn btn-default btn-sm" href="<?php echo base_url('/market/new_subcategory') ?>">New Subcategory</a>
							<?php } ?>
						</div>
					</div>
				</div>
				
				<!-- EXTRA SMALL Screen Menu -->
				<div class="row visible-xs">
					<div class="col-xs-12">
						<a class="btn btn-default btn-sm wide-button" href="<?php echo base_url('/ad/new_ad') ?>">Place an Ad</a><br>
						<?php if ($this->ion_auth->is_admin()) { ?>
						<a class="btn btn-default btn-sm wide-button" href="<?php echo base_url('/market/new_category') ?>">Create a Category</a><br>
						<a class="btn btn-default btn-sm wide-button" href="<?php echo base_url('/market/new_subcategory') ?>">Create a Subcategory</a>
						<?php } ?>
					</div>
				</div>

				<!-- Display Ads -->
				<?php $count = 0; ?>
				<?php foreach ($ads->result() as $row) { ?>
					<?php if ($count == 0 || $count % 3 == 0) { ?><div class="row"><?php } ?>
					<div class="col-sm-4" style="padding-bottom: 10px;">
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