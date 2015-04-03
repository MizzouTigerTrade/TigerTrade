<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-12">
			<h1>Offer Response</h1>
		</div>
	</div>

	<hr>

	<?php var_dump($_POST); ?>
	
	<?php if ($status == 'Accepted') { ?>
		<h2>Offer Accepted!</h2>
		<p>You will receive an email with your buyer's contact information.</p>
	<?php } else if ($status == 'Declined') { ?>
		<h2>Offer Declined!</h2>
		<p>You'll get a better one, anyway!</p>
	<?php } else { ?>
		<h2>Something went wrong!</h2>
		<p>The status was not set to 'Accepted' or 'Declined'...!</p>
	<?php } ?>
</div>