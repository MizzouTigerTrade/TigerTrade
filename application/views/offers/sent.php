<div class="container">

	<div class="row">
		<div class="col-xs-2 col-md-1">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-10 col-md-11">
			<h1 class="">Sent Offers</h1>
		</div>
	</div>

	<hr>

	<p>You can see your sent offers here!</p>
	
	<table class="table">
		<th>Ad ID</th>
		<th>Buyer ID</th>
		<th>Seller ID</th>
		<th>Buyer Message</th>
		<th>Status</th>
		<?php foreach ($pending->result() as $row) { ?>
			<td><?php echo $row->ad_id; ?></td>
			<td><?php echo $row->buyer_id; ?></td>
			<td><?php echo $row->seller_id; ?></td>
			<td><?php echo $row->buyer_message; ?></td>
			<td><?php echo $row->status; ?></td>
		<?php } ?>
	</table>	
</div>