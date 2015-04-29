
<div class="container padding-top-20">
	<div class="container-border">
		
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">
				<h1>Deactivate User</h1>
			</div>
		</div>
		
		<hr>
		
		<div class="col-sm-offset-2 col-sm-10">
		<p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>

		<?php echo form_open('auth/deactivate/' .$user->id, array('class' => 'form-horizontal')); ?>

			<div class="form-group">
			<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
			<input type="radio" name="confirm" value="yes" checked="checked" />
			<?php echo lang('deactivate_confirm_n_label', 'confirm');?>
			<input type="radio" name="confirm" value="no" />
			</div>

		<?php echo form_hidden(array('id'=>$user->id)); ?>
		
		<div class="form-group">
                  <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
        </div>

		<?php echo form_close();?>
		</div>
	
	</div>
</div>