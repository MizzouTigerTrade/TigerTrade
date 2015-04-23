<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-12">
			<h2>New Offer</h2>
		</div>
	</div>
	
	<hr>
	<?php if (isset($error)) { ?>
		<p>Could not create your offer. Please make sure you entered a price and message.</p>
	<?php } ?>
	<?php if ($created) { ?>
		<h3>Offer Sent!</h3>
		<p>You offered $<?php echo $price; ?>.</p>
		<p>You said: <?php echo $buyer_message; ?>.</p>
	<?php } ?>
	
	

</div>