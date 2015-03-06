<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>Offer Details:</h1>
			<h3><?php echo $ad->title; ?></h3>
		</div>
	</div>
	
	<hr>
		
	<?php echo form_open("" . $offer->offer_id, array('class' => 'form-horizontal', 'id' => 'offer-response-form', 'enctype' => 'multipart/form-data'));?>
		<div class="form-group">
			<label class="sr-only" for="price">Amount (in dollars)</label>
			<label for="price" class="col-sm-2 control-label label-20">Price</label>
			<div class="input-group col-sm-3 col-sm-offset-2" style="padding: 0 15px;">
				<div class="input-group-addon">$</div>
					<input type="text" class="form-control" name="price" id="price" value="<?php echo $offer->price; ?>" placeholder="<?php echo $offer->price; ?>" disabled="true">
				<div class="input-group-addon">.00</div>
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-sm-2 control-label label-20">Message</label>
			<div class="col-sm-10">
				<textarea type="text" class="form-control description-box" id="description" rows="5" disabled="true" value="<?php echo $offer->buyer_message; ?>"><?php echo $offer->buyer_message; ?></textarea>
				<p class="help-block">Buyer message to Seller.</p>
			</div>
		</div>
		
		<hr>
		
		<div class="form-group">
			<label for="description" class="col-sm-2 control-label label-20">Reply</label>
			<div class="col-sm-10">
				<textarea type="text" name="seller_response" class="form-control description-box" id="seller_response" rows="5" value="<?php echo $offer->seller_response; ?>" disabled="true"><?php echo $offer->seller_response; ?></textarea>
				<p class="help-block">Seller response to Buyer.</p>
			</div>
		</div>

		<hr>

		<div class="form-group">
			<label for="status" class="col-sm-2 control-label label-20">Offer Decision</label>
			<div class="col-sm-10">
				<div class="radio">
					<label>
						<input type="radio" id='accept-offer' name="status" id="status1" checked="<?php if ($offer->status == 'Accepted') { ?>true<?php } ?>" value="Accepted" disabled>
						Accept Offer<p class="text-danger" id='offer-warning' style='display: none; padding-left: 10px'> You and the buyer will exchange contact info.</p>
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="status" id="status2" value="Declined" checked="<?php if ($offer->status == 'Declined') { ?>true<?php } ?>" disabled>
						Decline Offer
					</label>
				</div>
			</div>
		</div>

		<hr>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label>
						<input type="checkbox" checked disabled> <a href="<?php echo base_url('/content/terms') ?>">I Agree to the Terms & Conditions</a>
					</label>
				</div>
			</div>
		</div>
	<?php echo form_close();?>
</div>