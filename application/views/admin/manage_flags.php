
<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>Flag Management</h1>
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

<table class="table table-hover table-condensed">
	<thead>
	<tr>
		<th>Ad</th>
		<th>Flag Count</th>
		<th>Name</th>
		<th>Email</th>
		<th>Dismiss Flag</th>
		<th>Delete Ad</th>
		<th>User Status</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($flags as $flag):?>
		<tr>
            <td><?php echo "<a href='" . base_url() . "ad/details/" . $flag->ad_id  . "'>" . $flag->ad_id . "</a>" ;?></td>
            <td><?php echo $flag->flag_count ;?></td>
            <td><?php echo $flag->first_name . " " . $flag->last_name;?></td>
			<td><?php echo $flag->email ;?> </td>
			<td>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dismissModal<?php echo $flag->ad_id; ?>">Dismiss</button>

				<div class="modal fade" id="dismissModal<?php echo $flag->ad_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Dismiss Flag</h4>
							</div>
							<div class="modal-body">
								Are you sure you want to dismiss the flags on Ad <?php echo $flag->ad_id; ?>?
							</div>
							<div class="modal-footer">
								<a class="btn btn-primary" href="<?php echo base_url('admin/dismiss_flag') . '/' . $flag->ad_id ;?>">Yes</a>
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			
			</td>
			<td>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $flag->ad_id; ?>">Delete</button>

				<div class="modal fade" id="deleteModal<?php echo $flag->ad_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Delete Ad</h4>
							</div>
							<div class="modal-body">
								Are you sure you want to delete Ad <?php echo $flag->ad_id; ?>?<br>
								Message to user:<br>
								<textarea rows="3" cols="10" name="message_to_user"></textarea>
							</div>
							<div class="modal-footer">
								<a class="btn btn-primary" href="<?php echo base_url('admin/delete_ad') . '/' . $flag->ad_id ;?>">Yes</a>
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			
			</td>
			<td><?php echo ($flag->active) ? anchor("auth/deactivate/".$flag->id, lang('index_active_link')) : anchor("auth/activate/". $flag->id, lang('index_inactive_link'));?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

</div>
