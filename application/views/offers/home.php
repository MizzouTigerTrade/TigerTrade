<div class="container">

	<div class="row">
		<div class="col-xs-2 col-md-1">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-10 col-md-11">
			<h1 class="">Offers</h1>
		</div>
	</div>

	<hr>

	<p>You can see your offer statuses here!</p>
	<div class="row">
		<a href="<?php echo base_url('/offers/sent') ?>">
		<div class="col-sm-6">
			<h2 class="text-center">Sent Offers</h2>
			<img src="http://placehold.it/350x250" class="img-thumbnail" alt="Responsive image" style="width: 100%;">
		</div>
		</a>
		<a href="<?php echo base_url('/offers/received') ?>">
		<div class="col-sm-6">
			<h2 class="text-center">Received Offers</h2>
			<img src="http://placehold.it/350x250" class="img-thumbnail" alt="Responsive image" style="width: 100%;">
		</div>
		</a>
	</div>
	
</div>