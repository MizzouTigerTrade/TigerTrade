<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>Make Offer:</h1>
			<h3><?php echo $ad->title; ?></h3>
		</div>
	</div>
	
	<hr>
	<?php echo form_open("offers/create", array('class' => 'form-horizontal', 'id' => 'make-offer-form', 'enctype' => 'multipart/form-data'));?>
		<div class="form-group">
			<label class="sr-only" for="price">Amount (in dollars)</label>
			<label for="price" class="col-sm-2 control-label label-20">Price</label>
			<div class="input-group col-sm-3 col-sm-offset-2" style="padding: 0 15px;">
				<div class="input-group-addon">$</div>
					<input type="text" class="form-control" name="price" id="price" value="<?php echo $ad->price; ?>" placeholder="$<?php echo $ad->price; ?>">
				<div class="input-group-addon">.00</div>
			</div>
		</div>

		<input type="hidden" class="form-control" name="ad_id" id="ad_id" value="<?php echo $ad_id; ?>">

		<div class="form-group">
			<label for="buyer_message" class="col-sm-2 control-label label-20">Message</label>
			<div class="col-sm-10">
				<textarea type="text" class="form-control description-box" name="buyer_message" id="buyer_message" rows="5"></textarea>
				<p class="help-block">Write a message for the seller, including good times to meet.</p>
			</div>
		</div>
		
		<hr>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label>
						<input type="checkbox" required="true"> <a href="<?php echo base_url('/content/terms') ?>">I Agree to the Terms & Conditions</a> and acknowledge that my contact information with be supplied to the seller in the event that they choose to accept this offer.
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</div>
	<?php echo form_close();?>
	
</div>