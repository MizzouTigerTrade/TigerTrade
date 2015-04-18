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
				<th>Price</th>
				<th></th>
			</tr>
			<?php foreach ($pending->result() as $row) { ?>
			<tr style="cursor: hand;" class='clickable-row' data-target="#replyModal<?php echo $row->offer_id; ?>">
				<td><?php echo $row->title; ?></td>
				<?php /*<td><?php echo $row->buyer_id; ?></td>
				<td><?php echo $row->seller_id; ?></td> */ ?>
				<td><?php echo $row->buyer_message; ?></td>
				<td><?php echo "$" . $row->price; ?></td>
				<td><button type="button" class="btn btn-xs btn-primary">Reply</button>
				
				<div class="modal fade" id="replyModal<?php echo $row->offer_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width: 450px;">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Are you sure you want to delete Ad <?php echo $flag->ad_id; ?>?</h4>
							</div>
							<div class="modal-body">
								Message to user<br>
								<form action="<?php echo base_url('admin/delete_ad') . '/' . $flag->ad_id ;?>"  method="POST">
								<textarea rows="4" cols="50" name="message_to_user" placeholder="reason for deleting ad" required></textarea>
							</div>
							<div class="modal-footer">
								<input class="btn btn-xs btn-primary" type="submit" value="Yes">
								</form>
								<button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Cancel</button>
							</div>
						</div>
					</div>
				</div>
				
				
				</td>
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
		<table class="table table-hover">
			<tr style="background-color: white;">
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
	
</div>