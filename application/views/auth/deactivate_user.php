
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
				<label for="yes" class="col-sm-3 control-label label-20">Yes</label>
				<input type="radio" name="yes" value="yes" checked="checked" />
				<label for="no" class="col-sm-3 control-label label-20">No</label>
				<input type="radio" name="no" value="no" />
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