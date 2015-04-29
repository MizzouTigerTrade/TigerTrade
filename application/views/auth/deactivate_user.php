
<div class="container padding-top-20">
	<div class="container-border">
		
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">
				<h1>Deactivate User</h1>
			</div>
		</div>
		
		<hr>
		
		<p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>
		
		<?php echo form_open('auth/deactivate/' . $user->id, array('class' => 'form-horizontal'));?>
		
		

			<div class="form-group">
				<div class="radio col-sm-offset-3">
				  <label><input type="radio" name="optradio" value="yes">Yes</label>
				</div>
				<div class="radio col-sm-offset-3">
				  <label><input type="radio" name="optradio" value="no">No</label>
				</div>
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