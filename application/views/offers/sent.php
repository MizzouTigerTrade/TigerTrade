 
<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script>

 $(document).ready(function(){
 
        $('#accepted_button').click(function() {
        $('#pending').hide();
		$('#declined').hide();
		$('#accepted').show();
		$('#accepted_button').addClass('btn-warning');
		$('#declined_button').removeClass('btn-warning');
		$('#pending_button').removeClass('btn-warning');
        });
		
		$('#declined_button').click(function() {
        $('#pending').hide();
		$('#accepted').hide();
		$('#declined').show();
		$('#accepted_button').removeClass('btn-warning');
		$('#declined_button').addClass('btn-warning');
		$('#pending_button').removeClass('btn-warning');
		});
		
		$('#pending_button').click(function() {
        $('#accepted').hide();
		$('#declined').hide();
		$('#pending').show();
		$('#accepted_button').removeClass('btn-warning');
		$('#declined_button').removeClass('btn-warning');
		$('#pending_button').addClass('btn-warning');
        });
		
	});

</script>

<div class="container padding-top-20">
<div class="container-border">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<h1>Sent Offers</h1> 
		</div>
	</div>

	<hr>
	
	<div style="padding: 0 15px;">
	<button type="button" id="pending_button" class="btn btn-default btn-warning offers-button">Pending</button> <button type="button" id="accepted_button" class="btn btn-default offers-button">Accepted <span class="badge"><?php if($accepted_notification>0){echo $accepted_notification ;} ?></span></button> <button type="button" id="declined_button" class="btn btn-default offers-button">Declined <span class="badge"><?php if($declined_notification>0){echo $declined_notification ;} ?></span></button>
	<br>
	<br>
	
	<div id="pending">
	<table class="table">
		<tr style="background-color: white;">
			<th>Ad Title</th>
			<th>Your Message</th>
			<th>Offer Price</th>
			<th>Asking Price</th>
			<!--<th>Status</th>-->
		</tr>

		<?php if($pending->num_rows() == 0) { ?>
		<tr>
			<td colspan="5" class="text-center">No Pending Offers</td>
		</tr>
		<?php } ?>
		
		<?php foreach ($pending->result() as $row) { ?>
		<tr>
			<td><?php echo $row->title; ?></td>
			<td><?php echo $row->buyer_message; ?></td>
			<td><?php echo "$" . $row->offer_price; ?></td>
			<td><?php echo "$" . $row->asking_price; ?></td>
			<?php /* <td><?php echo $row->status; ?></td> */ ?>
		</tr>
		<?php } ?>
	</table>
	</div>
	
	<div id="accepted" style="display: none;">
	<table class="table">
		<tr style="background-color: white;">
			<th>Ad Title</th>
			<th>Seller Response</th>
			<th>Seller Email</th>
			<th>Offer Price</th>
			<th>Asking Price</th>
		</tr>
		
		<?php if($accepted->num_rows() == 0) { ?>
		<tr>
			<td colspan="5" class="text-center">No Accepted Offers</td>
		</tr>
		<?php } ?>

		<?php foreach ($accepted->result() as $row) { ?>
		<tr>
			<td><span class="badge notification-badge"><?php if($row->seen_by_buyer == false){echo "!" ;} ?></span> <?php echo $row->title; ?></td>
			<td><?php echo $row->seller_response; ?></td>
			<td><?php echo $row->email; ?></td>
			<td><?php echo "$" . $row->offer_price; ?></td>
			<td><?php echo "$" . $row->asking_price; ?></td>
		</tr>
		<?php } ?>
	</table>
	</div>
	
	<div id="declined" style="display: none;">
	<table class="table">
		<tr style="background-color: white;">
			<th>Ad Title</th>
			<th>Seller Response</th>
			<th>Offer Price</th>
			<th>Asking Price</th>
		</tr>
		
		<?php if($declined->num_rows() == 0) { ?>
		<tr>
			<td colspan="5" class="text-center">No Declined Offers</td>
		</tr>
		<?php } ?>		
		
		<?php foreach ($declined->result() as $row) { ?>
		<tr>
			<td><span class="badge notification-badge"><?php if($row->seen_by_buyer == false){echo "!" ;} ?></span> <?php echo $row->title; ?></td>
			<td><?php echo $row->seller_response; ?></td>
			<td><?php echo "$" . $row->offer_price; ?></td>
			<td><?php echo "$" . $row->asking_price; ?></td>
		</tr>
		<?php } ?>
	</table>
	</div>
	</div>
</div>
</div>
</div>