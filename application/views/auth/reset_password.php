<div class="container padding-top-20">
<div class="container-border">

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<h1>Reset Password</h1> 
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
	
		<div class="row">
			<div class="col-sm-offset-4 col-sm-8">
			    <p>Please enter a new password.</p>
			</div>
		</div>
		
		<?php echo form_open('auth/reset_password/' . $code, array('class' => 'form-horizontal'));?>
		
		
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4">
				<label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
				<?php echo form_input($new_password);?>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4">
				<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
				<?php echo form_input($new_password_confirm);?>
			</div>
		</div>
		
		<?php echo form_input($user_id);?>
		
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4">
				<button type="submit" style="padding-top: 7px;" class="btn btn-primary">Reset Password</button>
			</div>
		</div>

	<?php echo form_close();?>
	</div>
</div>
</div>