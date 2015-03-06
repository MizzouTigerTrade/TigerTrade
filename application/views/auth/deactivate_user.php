
<div class="container padding-top-20">

	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>Deactivate User</h1>
		</div>
	</div>
	
    <hr>
	
	<div class="col-sm-offset-2 col-sm-10">
	<p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>

	<?php echo form_open("auth/deactivate/".$user->id, array('class' => 'form-horizontal')); ?>

	<p>
		<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
		<input type="radio" name="confirm" value="yes" checked="checked" />
		<?php echo lang('deactivate_confirm_n_label', 'confirm');?>
		<input type="radio" name="confirm" value="no" />
	</p>

	<?php echo form_hidden($csrf); ?>
	<?php echo form_hidden(array('id'=>$user->id)); ?>

	<p><button type="submit" class="btn btn-default">Submit</button></p>

	<?php echo form_close();?>
	</div>
</div>