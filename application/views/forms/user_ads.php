<div class="container padding-top-20">
<div class="container-border">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<h1>Ad Management</h1>
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
	
	<div style="padding: 0 15px;">
	<table class="table table-hover">
		<thead>
			<th>Ad Name</th>
			<th>Price</th>
			<th>Category</th>
			<th>Sub-Category</th>
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
			
			<td><a href="'.base_url('ad/edit/'.$ad['ad_id']).'">Edit</a> | <a href="" data-toggle="modal" data-target="#deleteModal">Delete</a>
	
					<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" style="width: 350px;">
							<div class="modal-content">
								<div class="modal-body">
									<b>Are you sure you want to delete this Ad?</b><br><br>
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