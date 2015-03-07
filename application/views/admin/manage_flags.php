
<?php /*
<link rel="stylesheet" href="<?php echo base_url('assets/js/jquery-ui/jquery-ui.css') ?>">
<script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui/jquery-ui.js') ?>"></script>

<script>

$(function($) 
{
    // Dialog
    $('#dialog').dialog({
            autoOpen: false,
            width: 600,
			modal: true,
            buttons: {
                    "Ok": function() {
                            $(this).dialog("close");
                    },
                    "Cancel": function() {
                            $(this).dialog("close");
                    }
            }
    });

    // Dialog Link
    $('#dialog_link').click(function(){
            $('#dialog').dialog('open');
            return false;
    });
}); 

</script>
*/ ?>

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
	  
	  
	 <?php /* 
	<div id="dialog" title="Dismiss Flag">
	<p>Are you sure you want to dismiss this flag?</p>
	</div>
	*/ ?>

 
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
			<td>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Dismiss</button>

				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Modal title</h4>
							</div>
							<div class="modal-body">
								Are you sure you want to dismiss this flag?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="button" class="btn btn-primary">Yes</button>
							</div>
						</div>
					</div>
				</div>
			
			</td>
			<td><button class="btn btn-default">Delete</button></td>
			<td><?php echo ($flag->active) ? anchor("auth/deactivate/".$flag->id, lang('index_active_link')) : anchor("auth/activate/". $flag->id, lang('index_inactive_link'));?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

</div>
