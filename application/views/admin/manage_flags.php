
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
	  
	<div id="dialog" title="Dismiss Flag">
	<p>Are you sure you want to dismiss this flag?</p>
	</div>

 
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
				<!--<button id="dialog_link" class="btn btn-default">Dismiss</button>-->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>

				<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
				<div class="modal-content">
				Are you sure you want to dismiss this Flag?
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
