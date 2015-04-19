<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-12">
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
			<p style="font-size: .9em;"><?php echo $category->name; ?><?php echo $subcategory; ?></p>
			<h2 style="margin-top: 10px;">Asking Price: <span style="color: green;">$<?php echo $ad->price; ?></span></h2>
			
			<a class="btn btn-success" data-toggle="modal" data-target="#makeOffer">Make an Offer</a>
			
				<div class="modal fade" id="makeOffer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h3 class="modal-title" id="myModalLabel">Make Offer: <?php echo $ad->title; ?></h3>
							</div>
							
							<div class="modal-body">
								
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

								<input type="hidden" class="form-control" name="ad_id" id="ad_id" value="<?php echo $ad->ad_id; ?>">

								<div class="form-group">
									<label for="buyer_message" class="col-sm-2 control-label label-20">Message</label>
										<textarea type="text" class="form-control description-box" name="buyer_message" id="buyer_message" rows="5"></textarea>
										<p class="help-block">Write a message for the seller, including good times to meet.</p>
								</div>
								
								<hr>
								
								<div class="form-group">
										<div class="checkbox">
											<label>
												<input type="checkbox" required="true"> <a href="<?php echo base_url('/content/terms') ?>">I Agree to the Terms & Conditions</a> and acknowledge that my contact information with be supplied to the seller in the event that they choose to accept this offer.
											</label>
										</div>
								</div>
		
							</div>
							
							<div class="modal-footer">
								<input class="btn btn-xs btn-primary" type="submit" value="Send">
								</form>
								<button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Cancel</button>
							</div>
							
						</div>
					</div>
				</div>
			
			<?php if ($flagged == false) { ?>
			<a class="btn btn-warning" href="<?php echo base_url('/ad/flag_ad/' . $ad->ad_id) ?>">Report Ad</a>
			<?php }; ?> 
			
			<p class="text-justify" style="font-size: 1.1em; margin-top: 10px;">Details: <?php echo $ad->description; ?></p>
		</div>
		<div class="col-sm-5">
				<img class="img-thumbnail" src="http://placehold.it/500x500" alt="ad_image" width="100%">
		</div>
	</div>
	
	<!-- Devices == Extra Small (Mobile) -->
	<div class="row visible-xs">
		<div class="col-xs-12">
			<p style="font-size: .9em;"><?php echo $category->name; ?><?php echo $subcategory; ?></p>
			<h2 style="margin-top: 10px;">Asking Price: <span style="color: green;">$<?php echo $ad->price; ?></span></h2>
			
			<a class="btn btn-sm btn-success" data-toggle="modal" data-target="#makeOffer">Make an Offer</a>
			
				<div class="modal fade" id="makeOffer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h3 class="modal-title" id="myModalLabel">Make Offer: <?php echo $ad->title; ?></h3>
							</div>
							
							<div class="modal-body">
								
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

								<input type="hidden" class="form-control" name="ad_id" id="ad_id" value="<?php echo $ad->ad_id; ?>">

								<div class="form-group">
									<label for="buyer_message" class="col-sm-2 control-label label-20">Message</label>
										<textarea type="text" class="form-control description-box" name="buyer_message" id="buyer_message" rows="5"></textarea>
										<p class="help-block">Write a message for the seller, including good times to meet.</p>
								</div>
								
								<hr>
								
								<div class="form-group">
										<div class="checkbox">
											<label>
												<input type="checkbox" required="true"> <a href="<?php echo base_url('/content/terms') ?>">I Agree to the Terms & Conditions</a> and acknowledge that my contact information with be supplied to the seller in the event that they choose to accept this offer.
											</label>
										</div>
								</div>
		
							</div>
							
							<div class="modal-footer">
								<input class="btn btn-xs btn-primary" type="submit" value="Send">
								</form>
								<button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Cancel</button>
							</div>
							
						</div>
					</div>
				</div>
			
			<?php if ($flagged == false) { ?>
			<a class="btn btn-sm btn-warning" href="<?php echo base_url('/ad/flag_ad/' . $ad->ad_id) ?>">Report Ad</a>
			<?php }; ?> 
			
			<img style="margin-top: 10px;" class="img-thumbnail" src="http://placehold.it/500x500" alt="ad_image" width="100%">
			<p class="text-justify" style="font-size: 1.1em; margin-top: 10px;">Details: <?php echo $ad->description; ?></p>
		</div>
	</div>
	
	<!-- Comment section -->
	<?php if ($this->ion_auth->logged_in()) { ?>
		<div class="row" style="margin-top: 20px;">
			<div class="col-xs-12" style="padding: 0;">
				<div class="form-group">
					<label for="buyer_message" class="col-xs-12 control-label label-20">Comment:</label>
					<div class="col-xs-12">
						<textarea type="text" class="form-control description-box" name="comment" id="comment" rows="5"></textarea>
						<div class="col-xs-9">
							<p class="help-block">Post a comment anonymously. Please be respectful.</p>
						</div>
						<div class="col-xs-3 text-right">
							<button class="btn btn-xs btn-default" style="margin-top: 5px;">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>