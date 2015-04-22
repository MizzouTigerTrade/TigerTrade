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
			<a class="btn btn-success" href="<?php echo base_url('/ad/make_offer/' . $ad->ad_id) ?>">Make an Offer</a>
			
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
			<a class="btn btn-sm btn-success" href="<?php echo base_url('/ad/make_offer/' . $ad->ad_id) ?>">Make an Offer</a>
			
			<?php if ($flagged == false) { ?>
			<a class="btn btn-sm btn-warning" href="<?php echo base_url('/ad/flag_ad/' . $ad->ad_id) ?>">Report Ad</a>
			<?php }; ?> 
			
			<img style="margin-top: 10px;" class="img-thumbnail" src="http://placehold.it/500x500" alt="ad_image" width="100%">
			<p class="text-justify" style="font-size: 1.1em; margin-top: 10px;">Details: <?php echo $ad->description; ?></p>
		</div>
	</div>
	<?php foreach ($result as $comment) {}?>
		<div class="col-xs-12">
			<label for="comments" class="col-sm-10">View Comments:</label>
			<p style="font-size: .9em;"><?php echo $comment->description; ?></p>
		</div>
	<?php } ?>
	<!-- Comment section -->
	<?php if ($this->ion_auth->logged_in()) { ?>
		<div class="row" style="margin-top: 20px;">
			<div class="col-xs-12" style="padding: 0;">
				<?php echo form_open("ad/comment", array('class' => 'form-horizontal', 'id' => 'comment-form', 'enctype' => 'multipart/form-data'));?>	
				<?php echo form_hidden('ad_id', $ad->ad_id); ?>
				<div class="form-group">			
					<div class="col-sm-10">
						<label for="comments" class="col-sm-10">New Comments:</label>
						<textarea type="text" class="form-control description-box" name="comment" id="comment" placeholder="Please keep comments limited to questions about this ad." rows="5" required="true"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10" style="padding: 10px">
						<button type="submit" class="btn btn-default">Submit</button>
					</div>
				</div>
			</div>
			<?php echo form_close();?>
		</div>
	<?php } ?>
</div>				