<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-12">
			<h1>Sent Offers</h1>
		</div>
	</div>

	<hr>
	
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
	
	<h3>Declined</h3>
	<table class="table">
		<tr>
			<th>Ad ID</th>
			<th>Buyer ID</th>
			<th>Seller ID</th>
			<th>Buyer Message</th>
			<th>Seller Response</th>
			<th>Status</th>
		</tr>
		<?php foreach ($declined->result() as $row) { ?>
		<tr>
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