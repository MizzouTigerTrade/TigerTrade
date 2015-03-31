<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
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
			<p style="font-size: .9em;"><?php echo $category->name; ?> > <?php echo $subcategory->name; ?></p>
			<h2 style="margin-top: 10px;">Asking Price: <span style="color: green;">$<?php echo $ad->price; ?></span></h2>
			<p class="text-justify">Details: <?php echo $ad->description; ?></p>
			<a class="btn btn-default" href="<?php echo base_url('/ad/make_offer/' . $ad->ad_id) ?>">Make an Offer</a>
			<a class="btn btn-warning" href="<?php echo base_url('/ad/flag_ad/' . $ad->ad_id) ?>">Flag Ad</a>
		</div>
		<div class="col-sm-5">
				<img class="img-thumbnail" src="http://placehold.it/500x500" alt="ad_image" width="100%">
		</div>
	</div>
	
	<?php if ($this->ion_auth->logged_in()) { ?>
		<div class="row">
			<div class="col-xs-12" style="padding: 0;">
				<div class="form-group">
					<label for="buyer_message" class="col-xs-12 control-label label-20">Message</label>
					<div class="col-xs-12">
						<textarea type="text" class="form-control description-box" name="comment" id="comment" rows="5"></textarea>
						<p class="help-block">Post a comment anonymously. Please be respectful.</p>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	
	<!-- Devices == Extra Small (Mobile) -->
</div>