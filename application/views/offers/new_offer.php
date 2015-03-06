<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>New Offer</h1>
		</div>
	</div>
	
	<hr>
	<?php var_dump($_POST); ?>
	<?php if (isset($error)) { ?>
		<p>Could not create your offer. Please make sure you entered a price and message.</p>
	<?php } ?>
	<?php if ($created) { ?>
		<h2>Offer Sent!</h2>
		<p>buyer_id <?php echo $buyer_id; ?>, your offer for seller_id <?php echo $seller_id; ?>'s ad_id <?php echo $ad_id; ?> has been sent</p>
		<p>You offered $<?php echo $price; ?>.</p>
		<p>You said: <?php echo $buyer_message; ?>.</p>
	<?php } ?>

</div>