<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-2">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-10">
			<h1 class="back-button-header">Ad Index</h1>
		</div>
	</div>
	
	<p>Main page for ads.</p>
	<br>
	<p>Form for new ad: <a href="<?php echo base_url('/ad/new_ad') ?>">Place an Ad</a></p>
	<br>
	<p>Form for new offer: <a href="<?php echo base_url('/ad/make_offer') ?>">Make an Offer</a></p>
	<br>
	<p>Form to respond to an offer: <a href="<?php echo base_url('/ad/review_offer') ?>">Review an Offer</a></p>
</div>