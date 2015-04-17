 
<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script>

 $(document).ready(function(){
 
        $('#accepted_button').click(function() {
        $('#pending').hide();
		$('#declined').hide();
		$('#accepted').show();
		$('#accepted_button').addClass('btn-primary');
		$('#declined_button').removeClass('btn-primary');
		$('#pending_button').removeClass('btn-primary');
        });
		
		$('#declined_button').click(function() {
        $('#pending').hide();
		$('#accepted').hide();
		$('#declined').show();
		$('#accepted_button').removeClass('btn-primary');
		$('#declined_button').addClass('btn-primary');
		$('#pending_button').removeClass('btn-primary');
		});
		
		$('#pending_button').click(function() {
        $('#accepted').hide();
		$('#declined').hide();
		$('#pending').show();
		$('#accepted_button').removeClass('btn-primary');
		$('#declined_button').removeClass('btn-primary');
		$('#pending_button').addClass('btn-primary');
        });
		
	});

</script>

<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-12">
			<h1>Sent Offers</h1> 
		</div>
	</div>

	<hr>
	
	<button type="button" id="pending_button" class="btn btn-default btn-primary offers-button">Pending</button> <button type="button" id="accepted_button" class="btn btn-default offers-button">Accepted<span class="badge badge-info" style="background-color: #D43F3A;">2</span></button> <button type="button" id="declined_button" class="btn btn-default offers-button">Declined</button>
	
	<div id="pending">
	<h3>Pending</h3>
	<table class="table">
		<tr>
			<th>Ad Title</th>
			<th>Your Message</th>
			<th>Price</th>
			<th>Status</th>
		</tr>
		<?php foreach ($pending->result() as $row) { ?>
		<tr>
			<td><?php echo $row->title; ?></td>
			<td><?php echo $row->buyer_message; ?></td>
			<td><?php echo "$" . $row->price; ?></td>
			<td><?php echo $row->status; ?></td>
		</tr>
		<?php } ?>
	</table>
	</div>
	
	<div id="accepted" style="display: none;">
	<h3>Accepted</h3>
	<table class="table">
		<tr>
			<th>Ad Title</th>
			<th>Seller Response</th>
			<th>Price</th>
			<th>Status</th>
		</tr>
		<?php foreach ($accepted->result() as $row) { ?>
		<tr>
			<td><?php echo $row->title; ?></td>
			<td><?php echo $row->seller_response; ?></td>
			<td><?php echo "$" . $row->price; ?></td>
			<td><?php echo $row->status; ?></td>
		</tr>
		<?php } ?>
	</table>
	</div>
	
	<div id="declined" style="display: none;">
	<h3>Declined</h3>
	<table class="table">
		<tr>
			<th>Ad Title</th>
			<th>Seller Response</th>
			<th>Price</th>
			<th>Status</th>
		</tr>
		<?php foreach ($declined->result() as $row) { ?>
		<tr>
			<td><?php echo $row->title; ?></td>
			<td><?php echo $row->seller_response; ?></td>
			<td><?php echo "$" . $row->price; ?></td>
			<td><?php echo $row->status; ?></td>
		</tr>
		<?php } ?>
	</table>
	</div>
	
</div>