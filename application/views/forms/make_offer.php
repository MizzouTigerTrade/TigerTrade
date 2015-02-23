<div class="container">
	
	<div class="row">
		<div class="col-xs-2 col-md-1">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-10 col-md-11">
			<h1 class="">Make Offer:</h1>
			<h3 class="">LISTING_TITLE_HERE</h3>
		</div>
		<div class="clearfix visible-sm-block"></div>
	</div>
	
	<hr>
<?php echo form_open("offer/new_offer", array('class' => 'form-horizontal', 'id' => 'make-offer-form', 'enctype' => 'multipart/form-data'));?>

		<div class="form-group">
			<label class="sr-only" for="price">Amount (in dollars)</label>
			<label for="price" class="col-sm-2 control-label label-20">Price</label>
			<div class="input-group col-sm-3 col-sm-offset-2" style="padding: 0 15px;">
				<div class="input-group-addon">$</div>
					<input type="text" class="form-control" id="price" placeholder="Amount">
				<div class="input-group-addon">.00</div>
			</div>
		</div>



		<div class="form-group">
			<label for="description" class="col-sm-2 control-label label-20">Message</label>
			<div class="col-sm-10">
				<textarea type="text" class="form-control description-box" id="description" rows="5"></textarea>
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