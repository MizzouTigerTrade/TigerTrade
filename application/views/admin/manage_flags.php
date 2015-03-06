
<link rel="stylesheet" href="<?php echo base_url('assets/js/jquery-ui/jquery-ui.min.css') ?>">
<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui/jquery-ui.min.js') ?>"></script>

 <script type="text/javascript">
            $(document).ready(function() {

                $('#dismissConfirm').dialog({
                    autoOpen: false,
                    title: 'Basic Dialog'
                });
                $('#dismissButton').click(function() {
                    $('#dismissConfirm').dialog('open');
          
                });
            });
			
 </script>
 
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
            <td><?php echo $flag->flag_count ;?></td>
            <td><?php echo $flag->first_name . " " . $flag->last_name;?></td>
			<td><?php echo $flag->email ;?> </td>
			<td><button id="dismissButton" class="btn btn-default">Dismiss</button></td>
			<div id="dismissConfirm">
			<p>Some txt goes here</p>
			</div>
			
			<td><button class="btn btn-default">Delete</button></td>
			
			<td><?php echo ($flag->active) ? anchor("auth/deactivate/".$flag->id, lang('index_active_link')) : anchor("auth/activate/". $flag->id, lang('index_inactive_link'));?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

</div>