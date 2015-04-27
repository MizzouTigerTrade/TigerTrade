<div class="container padding-top-20">
<div class="container-border">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<h1>Ad Management</h1>
		</div>
	</div>
	
	<hr>
	
	<div style="padding: 0 15px;">
	 <?php if ($message != "") { ?>
      <div id="infoMessage">
		<div class="alert alert-info" role="alert" style="margin-top: 10px;">
		  <span class="sr-only">Error:</span>
		  <?php echo $message;?>
		</div>
	  </div>
	  <?php }; ?>
	</div>
	
	<div style="padding: 0 15px;">
	<table class="table table-hover">
		<thead>
			<th>Ad Name</th>
			<th>Price</th>
			<th>Category</th>
			<th>Sub-Category</th>
			<th>Status</th>
			<th></th>
		</thead>
		<tbody>
	<?php
	foreach($ads as $ad)
	{
		echo '<tr>';
			echo '<td>'.$ad['title'].'</td>';
			echo '<td>'.$ad['price'].'</td>';
			echo '<td>'.$ad['category'].'</td>';
			echo '<td>'.$ad['subCategory'].'</td>'; ?>
			
			<td> 
				<select class="btn btn-sm" onchange="location=options[selectedIndex].value;" id="status" style="border-color: rgb(51, 51, 51);">
				<?php if ( $ad['expired'] == TRUE ){ ?>
				<option value="<?php echo base_url('ad/set_expiration/' . $ad['ad_id'] . "/1" ) ?>">Inactive</option>
				<option value="<?php echo base_url('ad/set_expiration/' . $ad['ad_id'] . "/0" ) ?>">Active</option>
				<?php } 
				else{ ?>
					<option value="<?php echo base_url('ad/set_expiration/' . $ad['ad_id'] . "/0" ) ?>">Active</option>
					<option value="<?php echo base_url('ad/set_expiration/' . $ad['ad_id'] . "/1" ) ?>">Inactive</option>
				<?php } ?>
				
				</select>
			
			<td><a href="<?php echo base_url('ad/edit/' . $ad['ad_id'] ) ?>">Edit</a> | <a href="" data-toggle="modal" data-target="#deleteModal<?php echo $ad['ad_id']; ?>">Delete</a>
	
					<div class="modal fade" id="deleteModal<?php echo $ad['ad_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" style="width: 425px;">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this Ad?</h4>
								</div>
								<div class="modal-body">
									Title: <?php echo $ad['title']; ?>
								</div>
								<div class="modal-footer">
									<a class="btn btn-sm btn-primary" href="<?php echo base_url('ad/delete') . '/' . $ad['ad_id'] ;?>">Yes</a>
									<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
								</div>
							</div>
						</div>
					</div>
			
			
			</td>
			
		<?php echo '</tr>';
	}
	?>
		</tbody>
	
	
	</table>
	</div>
</div>
</div>