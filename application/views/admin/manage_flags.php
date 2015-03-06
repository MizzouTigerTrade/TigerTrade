<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>Flag Management</h1>
		</div>
	</div>
	
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
	<?php foreach ($flags->result() as $flag):?>
		<tr>
            <td><?php echo "<a href='" . base_url() . "/ad/details/" . $flag->ad_id  . "'>" . $flag->ad_id . "</a>" ;?></td>
            <td><?php echo htmlspecialchars($flag->flag_count,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($flag->first_name . " " . $flag->last_name ,ENT_QUOTES,'UTF-8');?></td>
			<td><?php echo $flag->email ;?> </td>
			<td><button class="btn btn-default">Dismiss</button></td>
			<td><button class="btn btn-default">Delete Ad</button></td>
			<td><?php echo ($flag->active) ? anchor("auth/deactivate/".$flag->id, lang('index_active_link')) : anchor("auth/activate/". $flag->id, lang('index_inactive_link'));?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

</div>