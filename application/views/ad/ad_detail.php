<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-12">
			<h1><?php echo $ad->title; ?></h1>
		</div>
	</div>	
	
	<hr>
	
	<?php if ($message != "") { ?>
      <div id="infoMessage">
		<div class="alert alert-info" role="alert" style="margin-top: 10px;">
		  <span class="sr-only">Error:</span>
		  <?php echo $message;?>
		</div>
	  </div>
	<?php }; ?>
	
	<!-- Devices >= Small -->
	<div class="row hidden-xs">
		<div class="col-sm-7">
			<p style="font-size: .9em;"><?php echo $category->name; ?><?php echo $subcategory; ?></p>
			<div class="row">
				<div class="col-xs-12">
				<?php
				foreach($tags->result() as $tag) { 
					if($tag->ad_id == $ad->ad_id)
					{
						echo '<span class="label label-default">' . $tag->description . '</span> ';
					}
				}
				?>
				</div>
			</div>
			<h2 style="margin-top: 10px;">Asking Price: <span style="color: green;">$<?php echo $ad->price; ?></span></h2>
			<a class="btn btn-success" href="<?php echo base_url('/ad/make_offer/' . $ad->ad_id) ?>">Make an Offer</a>
			
			<?php if ($flagged == false) { ?>
			<a class="btn btn-warning" href="<?php echo base_url('/ad/flag_ad/' . $ad->ad_id) ?>">Report Ad</a>
			<?php }; ?> 
			
			<p class="text-justify" style="font-size: 1.1em; margin-top: 10px;">Details: <?php echo $ad->description; ?></p>
		</div>
		<div class="col-sm-5">
				<img class="img-thumbnail" src="http://placehold.it/500x500" alt="ad_image" width="100%">
		</div>
	</div>
	
	<!-- Devices == Extra Small (Mobile) -->
	<div class="row visible-xs">
		<div class="col-xs-12">
			<p style="font-size: .9em;"><?php echo $category->name; ?><?php echo $subcategory; ?></p>
			<h2 style="margin-top: 10px;">Asking Price: <span style="color: green;">$<?php echo $ad->price; ?></span></h2>
			<a class="btn btn-sm btn-success" href="<?php echo base_url('/ad/make_offer/' . $ad->ad_id) ?>">Make an Offer</a>
			
			<?php if ($flagged == false) { ?>
			<a class="btn btn-sm btn-warning" href="<?php echo base_url('/ad/flag_ad/' . $ad->ad_id) ?>">Report Ad</a>
			<?php }; ?> 
			
			<img style="margin-top: 10px;" class="img-thumbnail" src="http://placehold.it/500x500" alt="ad_image" width="100%">
			<p class="text-justify" style="font-size: 1.1em; margin-top: 10px;">Details: <?php echo $ad->description; ?></p>
		</div>
	</div>
	
	<!-- Comment section -->
	<?php if ($this->ion_auth->logged_in()) { ?>
		<div class="row" style="margin-top: 20px;">
			<div class="col-xs-12" style="padding: 0;">
				<div class="form-group">
					<label for="buyer_message" class="col-xs-12 control-label label-20">Comment:</label>
					<div class="col-xs-12">
						<textarea type="text" class="form-control description-box" name="comment" id="comment" rows="5"></textarea>
						<div class="col-xs-9">
							<p class="help-block">Post a comment anonymously. Please be respectful.</p>
						</div>
						<div class="col-xs-3 text-right">
							<a class="btn btn-xs btn-default" href="<?php echo base_url('/ad/comment/' . $ad->ad_id) ?>">Submit</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>