<div class="container padding-top-20">
<div class="container-border">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<h1><?php echo $ad->title; ?></h1>
		</div>
	</div>	
	
	<hr>
	
	<div class="row">
	<div class="col-xs-10 col-xs-offset-1" style="padding-bottom: 30px;">
	
	<?php if ($message != "") { ?>
      <div id="infoMessage">
		<div class="alert alert-info" role="alert" style="margin-top: 10px;">
		  <span class="sr-only">Error:</span>
		  <?php echo $message;?>
		</div>
	  </div>
	<?php } ?>


	<!-- Devices >= Small -->
	<div class="row hidden-xs">
		<div class="col-sm-7">
			<div class="row">
				<div class="col-xs-12">
				<?php
				foreach($tags->result() as $tag) { 
					if($tag->ad_id == $ad->ad_id)
					{
						echo '<span class="label label-default">' . $tag->description . '</span> ';
					}
				}
				?>
				</div>
			</div>
			<h2 style="margin-top: 10px;">Asking Price: <span style="color: green;">$<?php echo $ad->price; ?></span></h2>
			
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#makeOffer">Make an Offer</button>
			
				<!--Make Offer Modal-->
				<div class="modal fade" id="makeOffer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h3 class="modal-title" id="myModalLabel">Make Offer: <?php echo $ad->title; ?></h3>
							</div>
					
							<div class="modal-body">
								
								<?php echo form_open("offers/create");?>
									
									<div class="form-group">
										<label for="price" class="control-label">Price</label>
										<div class="input-group col-sm-3">
											<div class="input-group-addon">$</div>
												<input type="number" class="form-control" name="price" id="price" value="<?php echo $ad->price; ?>" placeholder="$<?php echo $ad->price; ?>">
											<div class="input-group-addon">.00</div>
										</div>
									</div>
										
									<input type="hidden" class="form-control" name="ad_id" id="ad_id" value="<?php echo $ad->ad_id; ?>">

									<div class="form-group">
										<label for="buyer_message">Message</label>
										<textarea type="text" class="form-control description-box" name="buyer_message" id="buyer_message" rows="5"></textarea>
										<p class="help-block">Write a message for the seller, including preferred method of contact.</p>
									</div>
									
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
								<button type="button" class="btn btn-xs btn-danger" data-dismiss="modal">Cancel</button>
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
			<?php if(count($images->result()) != 0) { ?> 
			<div id="myCarousel" class="carousel slide" data-ride="carousel" style="background-color: rgba(0, 0, 0, 0.17);">

				<ol class="carousel-indicators">
			<?php 	$inc = 0;
					foreach ($images->result() as $img) { 
						if($inc == 0)
						{ ?>
							<li data-target="#myCarousel" data-slide-to="<?php echo $inc; ?>" class="active"></li>
			<?php 		} 
						else 
						{ ?>
							<li data-target="#myCarousel" data-slide-to="<?php echo $inc; ?>"></li>
			<?php 		}
						$inc++;
					} ?>
				</ol>
				<div class="carousel-inner" role="listbox">
			<?php 	$inc = 0;
					foreach ($images->result() as $img) { 
						$image_link = base_url('/'.$img->image_path);
						if($inc == 0)
						{ ?>
						<div class="item active">
							<div class="col-xs-12" style="padding-bottom: 45px;">
								<img class="img-thumbnail" src="<?php echo $image_link; ?>" onerror="this.src='http://placehold.it/500x500'" alt="Error loading image" max-width="100%" max-height="100%">
							</div>
						</div>
			<?php 		} 
						else { ?>
						<div class="item">
							<div class="col-xs-12" style="padding-bottom: 45px;">
								<img class="img-thumbnail" src="<?php echo $image_link; ?>" onerror="this.src='http://placehold.it/500x500'" alt="Error loading image" max-width="100%" max-height="100%">
							</div>
						</div>
			<?php  		}
						$inc++;
					} ?>

				</div>

				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		<?php } ?>	
		</div>
	</div>
	
	<!-- Devices == Extra Small (Mobile) -->
	<div class="row visible-xs">
		<div class="col-xs-12">
			<div class="row">
				<div class="col-xs-12">
				<?php
				foreach($tags->result() as $tag) { 
					if($tag->ad_id == $ad->ad_id)
					{
						echo '<span class="label label-default">' . $tag->description . '</span> ';
					}
				}
				?>
				</div>
			</div>
			<h2 style="margin-top: 10px;">Asking Price: <span style="color: green;">$<?php echo $ad->price; ?></span></h2>
			<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#makeOfferSM">Make an Offer</button>
			
				<!--Make Offer Modal-->
				<div class="modal fade" id="makeOfferSM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
						
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h3 class="modal-title" id="myModalLabel">Make Offer: <?php echo $ad->title; ?></h3>
							</div>
							
							<div class="modal-body">
								
								<?php echo form_open("offers/create");?>
									
									<div class="form-group">
										<label for="price" class="control-label">Price</label>
										<div class="input-group col-sm-3">
											<div class="input-group-addon">$</div>
												<input type="number" class="form-control" name="price" id="price" value="<?php echo $ad->price; ?>" placeholder="$<?php echo $ad->price; ?>">
											<div class="input-group-addon">.00</div>
										</div>
									</div>
										
									<input type="hidden" class="form-control" name="ad_id" id="ad_id" value="<?php echo $ad->ad_id; ?>">

									<div class="form-group">
										<label for="buyer_message">Message</label>
										<textarea type="text" class="form-control description-box" name="buyer_message" id="buyer_message" rows="5"></textarea>
										<p class="help-block">Write a message for the seller, including preferred method of contact.</p>
									</div>
									
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
								<button type="button" class="btn btn-xs btn-danger" data-dismiss="modal">Cancel</button>
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
			<label for="comments" class="col-sm-10 control-label label-20" style="line-height: 40px">View Comments:</label>
	<?php if(!empty($comments)) { ?>
			<?php foreach($comments as $row) { ?>
				<div class="col-xs-12">
					<p style="font-size: 1.1em; line-height: 30px;"><?php echo $row->ad_comment; ?>. Comment made on: <?php echo $row->comment_time; ?></p>
				</div>
			<?php } ?>
	<?php } else { ?>
				<div class="col-xs-12">
					<p style="font-size: 1.1em; line-height: 30px;">There are no available comments for this ad. If you have questions about the details of this ad, please make an appropriate comment below.</p>
				</div>
			<?php } ?>
			<label for="comments" class="col-sm-10 control-label label-20" style="line-height: 30px">New Comments:</label>
			<div class="col-xs-12" style="padding: 0;">
				<?php echo form_open("ad/comment", array('class' => 'form-horizontal', 'id' => 'comment-form', 'enctype' => 'multipart/form-data'));?>	
				<?php echo form_hidden('ad_id', $ad->ad_id); ?>
				<div class="form-group">				
					<div class="col-sm-10">
						<textarea type="text" class="form-control description-box" name="comment" id="comment" placeholder="Please keep comments limited to questions about this ad." rows="5" required="true"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10" style="padding: 5px">
						<button type="submit" class="btn btn-default">Submit</button>
					</div>
				</div>
			</div>
			<?php echo form_close();?>
		</div>
	<?php } ?>
	</div>
	</div>
</div>
</div>
