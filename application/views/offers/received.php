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
	<div class="row">
		<div class="col-xs-12">
			<h1>Received Offers</h1>
		</div>
	</div>

	<hr>

	<button type="button" id="pending_button" class="btn btn-default btn-warning offers-button">Pending</button> <button type="button" id="accepted_button" class="btn btn-default offers-button">Accepted</button> <button type="button" id="declined_button" class="btn btn-default offers-button">Declined</button>
	<br>
	<br>
	
	<div id="pending">
	<div class="table-responsive">
		<table class="table table-hover">
			<tr style="background-color: white;">
				<th>Ad Name</th>
				<th>Buyer Message</th>
				<th>Offer Price</th>
				<th></th>
			</tr>
			<?php foreach ($pending->result() as $row) { ?>
			<tr style="cursor: hand;" data-toggle="modal" data-target="#replyModal<?php echo $row->offer_id; ?>">
			
			<div class="modal fade" id="replyModal<?php echo $row->offer_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Offer: <?php echo $row->title; ?></h4>
							</div>
							<div class="modal-body">
								Offer Price: <?php echo "$" . $row->offer_price; ?><br>
								Asking Price: <?php echo "$" . $row->asking_price; ?><br>
								Buyer Message: <?php echo $row->buyer_message; ?><br>
							</div>
							<div class="modal-footer">
								<a class="btn btn-xs btn-primary" href="">Send</a>
								<button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Cancel</button>
							</div>
						</div>
					</div>
				</div>
				
				<td><?php echo $row->title; ?></td>
				<td><?php echo $row->buyer_message; ?></td>
				<td><?php echo "$" . $row->offer_price; ?></td>
				<td><button type="button" class="btn btn-xs btn-primary">Reply</button></td>
			</tr>
			<?php } ?>
		</table>
	</div>
	</div>
	
	<div id="accepted" style="display: none;">
	<div class="table-responsive">
		<table class="table table-hover">
			<tr style="background-color: white;">
				<th>Ad Name</th>
				<th>Buyer Message</th>
				<th>Your Response</th>
				<th>Offer Price</th>
				<th>Status</th>
			</tr>
			<?php foreach ($accepted->result() as $row) { ?>
			<tr style="cursor: hand;" class='clickable-row' data-href='<?php echo base_url('/offers/detail/' . $row->offer_id) ?>'>
				<td><?php echo $row->title; ?></td>
				<td><?php echo $row->buyer_message; ?></td>
				<td><?php echo $row->seller_response; ?></td>
				<td><?php echo "$" . $row->offer_price; ?></td>
				<td><?php echo $row->status; ?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
	</div>
	
	<div id="declined" style="display: none;">
	<div class="table-responsive">
		<table class="table table-hover">
			<tr style="background-color: white;">
				<th>Ad Name</th>
				<th>Buyer Message</th>
				<th>Your Response</th>
				<th>Offer Price</th>
				<th>Status</th>
			</tr>
			<?php foreach ($declined->result() as $row) { ?>
			<tr style="cursor: hand;" class='clickable-row' data-href='<?php echo base_url('/offers/detail/' . $row->offer_id) ?>'>
				<td><?php echo $row->title; ?></td>
				<td><?php echo $row->buyer_message; ?></td>
				<td><?php echo $row->seller_response; ?></td>
				<td><?php echo "$" . $row->offer_price; ?></td>
				<td><?php echo $row->status; ?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
	</div>
	
</div>