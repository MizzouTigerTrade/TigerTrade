<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>Market: All</h1>
		</div>
	</div>
	
	<hr>
	
	<div class="row">
		<div class="col-xs-12" id="market_background">
			
			<div class="col-xs-12">
				
				<!-- SMALL+ Screen Menu -->
				<div class="row hidden-xs text-center">
					<div class="col-sm-3 col-md-offset-1">
						<select onchange="location = 'market/category/' + this.options[this.selectedIndex].value;" class="form-control input-sm" id="categorySelectForm" name="category"> 
							<option value="">Select Category</option>
							<?php
								foreach($categories->result() as $cat) { ?>
									<option value="<?php echo $cat->category_id; ?>"><?php echo $cat->name; ?></option>	
							<?php } ?>	
						</select>
					</div>
					<div class="col-sm-3">
						<select disabled="true" class="form-control input-sm" id="subCategory" name="subCategory">
							<option value="">Select Subcategory</option>
						</select>
					</div>
					<div class="col-sm-6 col-md-4">
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
						<select onchange="location = 'market/category/' + this.options[this.selectedIndex].value;" class="form-control input-sm" id="categorySelectForm" name="category"> 
							<option value="">Select Category</option>
							<?php
								foreach($categories->result() as $cat) { ?>
									<option value="<?php echo $cat->category_id; ?>"><?php echo $cat->name; ?></option>	
							<?php } ?>	
						</select>
					</div>
					<div class="col-xs-12" style="margin: 5px 0 10px 0;">
						<select disabled="true" class="form-control input-sm" id="subCategory" name="subCategory">
							<option value="">Select Subcategory</option>
						</select>
					</div>
					<div class="col-xs-12">
						<a class="btn btn-default btn-sm wide-button" href="<?php echo base_url('/ad/new_ad') ?>">Place an Ad</a><br>
						<?php if ($this->ion_auth->is_admin()) { ?>
						<a class="btn btn-default btn-sm wide-button" href="<?php echo base_url('/market/new_category') ?>">Create a Category</a><br>
						<a class="btn btn-default btn-sm wide-button" href="<?php echo base_url('/market/new_subcategory') ?>">Create a Subcategory</a>
						<?php } ?>
					</div>
				</div>

				<!-- Display Ads: rows of 1 -->
				
				<?php foreach ($ads->result() as $row) { ?>
				<div class="row">
					<div class="media" style="margin-top: 20px; margin-bottom: 20px;">
						<div class="media-left col-xs-3 col-md-2 col-md-offset-1">
							<a class="market-link" href="<?php echo base_url('/ad/details/' . $row->ad_id) ?>">
							<img class="img-thumbnail" src="http://placehold.it/500x500" alt="ad_image" width="100%" height="100%">
							</a>
						</div>
						<div class="media-body col-xs-9 col-md-8">
							<h4 class="media-heading"><?php echo $row->title; ?>: $<?php echo $row->price; ?></h4>
							<?php echo $row->description; ?>
						</div>
					</div>
				</div><hr>
				<? } ?>
				
				<!-- Display Ads: rows of 3 -->
				
				<?php $count = 0; ?>
				<?php foreach ($ads->result() as $row) { ?>
					<?php if ($count == 0 || $count % 3 == 0) { ?><div class="row"><?php } ?>
					<div class="col-sm-4" style="margin-bottom: 10px;">
						<a class="market-link" href="<?php echo base_url('/ad/details/' . $row->ad_id) ?>">
						<h3><?php echo $row->title; ?></h3>
							<p style="color: black;">Price: $<?php echo $row->price; ?></p>
							<img src="http://placehold.it/300x200" class="img-thumbnail" alt="Responsive image" width="100%">
						</a><br><br>
						<p>Description: <?php echo $row->description; ?></p>
						<p>Ad ID: <?php echo $row->ad_id; ?></p>
					</div>
					<?php if ($count == 2 || $count % 3 == 2) { ?></div><hr><?php } $count++; ?>
				<?php } ?>
				<?php if ($count % 3 != 0) { ?></div><?php } $count++; ?>
		
			</div>
		</div>
	</div>
</div>