<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-12">
			<h1>Sent Offers</h1> 
		</div>
	</div>

	<hr>
	
	<button type="button" id="pending_button" class="btn btn-warning offers-button active">Pending</button> <button type="button" id="accepted_button" class="btn btn-warning offers-button">Accepted</button> <button type="button" id="declined_button" class="btn btn-warning offers-button">Declined</button>
	<br>
	
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
			<td><?php echo $row->price; ?></td>
			<td><?php echo $row->status; ?></td>
		</tr>
		<?php } ?>
	</table>
	</div>
	
	<div id="accepted">
	<h3>Accepted</h3>
	<table class="table">
		<tr>
			<th>Ad Title</th>
			<th>Seller Response</th>
			<th>Status</th>
		</tr>
		<?php foreach ($accepted->result() as $row) { ?>
		<tr>
			<td><?php echo $row->title; ?></td>
			<td><?php echo $row->seller_response; ?></td>
			<td><?php echo $row->status; ?></td>
		</tr>
		<?php } ?>
	</table>
	</div>
	
	<div id="declined">
	<h3>Declined</h3>
	<table class="table">
		<tr>
			<th>Ad Title</th>
			<th>Seller Response</th>
			<th>Status</th>
		</tr>
		<?php foreach ($declined->result() as $row) { ?>
		<tr>
			<td><?php echo $row->title; ?></td>
			<td><?php echo $row->seller_response; ?></td>
			<td><?php echo $row->status; ?></td>
		</tr>
		<?php } ?>
	</table>
	</div>
	
</div>