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
	
	<h2>$<?php echo $ad->price; ?></h2>
	<p><?php echo $ad->description; ?></p>
	<a class="btn btn-default" href="<?php echo base_url('/ad/make_offer/' . $ad->ad_id) ?>">Make an Offer</a>
	<a class="btn btn-default" href="<?php echo base_url('/ad/flag_ad/' . $ad->ad_id) ?>">Flag Ad</a>
</div>