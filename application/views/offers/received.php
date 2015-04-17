<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script>

 $(document).ready(function(){
 
        $('#accepted_button').click(function() {
        $('#pending').hide();
		$('#declined').hide();
		$('#accepted').show();
		$('#accepted_button').addClass('btn-info');
		$('#declined_button').removeClass('btn-info');
		$('#pending_button').removeClass('btn-info');
        });
		
		$('#declined_button').click(function() {
        $('#pending').hide();
		$('#accepted').hide();
		$('#declined').show();
		$('#accepted_button').removeClass('btn-info');
		$('#declined_button').addClass('btn-info');
		$('#pending_button').removeClass('btn-info');
		});
		
		$('#pending_button').click(function() {
        $('#accepted').hide();
		$('#declined').hide();
		$('#pending').show();
		$('#accepted_button').removeClass('btn-info');
		$('#declined_button').removeClass('btn-info');
		$('#pending_button').addClass('btn-info');
        });
		
	});

</script>

<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-12">
			<h1>Received Offers</h1>
		</div>
	</div>

	<hr>

	<button type="button" id="pending_button" class="btn btn-default btn-info offers-button">pending</button> <button type="button" id="accepted_button" class="btn btn-default offers-button">Accepted</button> <button type="button" id="declined_button" class="btn btn-default offers-button">Declined</button>

	<div id="pending">
	<h3>pending Offers</h3>
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>Ad Name</th>
				<!--<th>Buyer ID</th>
				<th>Seller ID</th>-->
				<th>Buyer Message</th>
				<th>Price</th>
			</tr>
			<?php foreach ($pending->result() as $row) { ?>
			<tr style="cursor: hand;" class='clickable-row' data-href='<?php echo base_url('/offers/review_offer/' . $row->offer_id) ?>'>
				<td><?php echo $row->title; ?></td>
				<?php /*<td><?php echo $row->buyer_id; ?></td>
				<td><?php echo $row->seller_id; ?></td> */ ?>
				<td><?php echo $row->buyer_message; ?></td>
				<td><?php echo "$" . $row->price; ?></td>
				<td><button type="button" class="btn btn-xs btn-primary">Reply</button></td>
			</tr>
			<?php } ?>
		</table>
	</div>
	</div>
	
	<div id="accepted" style="display: none;">
	<div class="table-responsive">
		<h3>Accepted</h3>
		<table class="table table-hover">
			<tr>
				<th>Ad Name</th>
				<th>Buyer Message</th>
				<th>Your Response</th>
				<th>Price</th>
				<th>Status</th>
			</tr>
			<?php foreach ($accepted->result() as $row) { ?>
			<tr style="cursor: hand;" class='clickable-row' data-href='<?php echo base_url('/offers/detail/' . $row->offer_id) ?>'>
				<td><?php echo $row->title; ?></td>
				<td><?php echo $row->buyer_message; ?></td>
				<td><?php echo $row->seller_response; ?></td>
				<td><?php echo "$" . $row->price; ?></td>
				<td><?php echo $row->status; ?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
	</div>
	
	<div id="declined" style="display: none;">
	<div class="table-responsive">
		<h3>Declined</h3>
		<table class="table table-hover">
			<tr>
				<th>Ad Name</th>
				<th>Buyer Message</th>
				<th>Your Response</th>
				<th>Price</th>
				<th>Status</th>
			</tr>
			<?php foreach ($declined->result() as $row) { ?>
			<tr style="cursor: hand;" class='clickable-row' data-href='<?php echo base_url('/offers/detail/' . $row->offer_id) ?>'>
				<td><?php echo $row->title; ?></td>
				<td><?php echo $row->buyer_message; ?></td>
				<td><?php echo $row->seller_response; ?></td>
				<td><?php echo "$" . $row->price; ?></td>
				<td><?php echo $row->status; ?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
	</div>
	
	
	
	<?php /*
	<div class="table-responsive">
	<h2>Declined</h2>
		<table class="table table-hover">
			<tr>
				<th>Ad ID</th>
				<th>Buyer ID</th>
				<th>Seller ID</th>
				<th>Buyer Message</th>
				<th>Seller Response</th>
				<th>Status</th>
			</tr>
			<?php foreach ($declined->result() as $row) { ?>
			<tr style="cursor: hand;" class='clickable-row' data-href='<?php echo base_url('/offers/detail/' . $row->offer_id) ?>'>
				<td><?php echo $row->ad_id; ?></td>
				<td><?php echo $row->buyer_id; ?></td>
				<td><?php echo $row->seller_id; ?></td>
				<td><?php echo $row->buyer_message; ?></td>
				<td><?php echo $row->seller_response; ?></td>
				<td><?php echo $row->status; ?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
	*/ ?>
</div>