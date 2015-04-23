<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/validator.js') ?>"></script>
<script type="text/javascript">
	$('#ad-form').validator()
</script>

<div class="container padding-top-20">
<div class="container-border">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<h1>New User</h1>
		</div>
	</div>
	
      <hr>
      
    <div style="padding: 0 15px;">
      <?php if ($message != "") { ?>
      <div id="infoMessage">
		<div class="alert alert-info" role="alert" style="margin-top: 10px;">
		  <span class="sr-only">Error:</span>
		  <?php echo $message;?>
		</div>
	  </div>
	  <?php }; ?>
      
      
      <form action="<?php echo base_url('auth/create_user') ?>" method="POST" class="form-horizontal" id="ad-form" data-toggle="validator" role="form">

            <div class="form-group">
                  <label for="first_name" class="col-sm-4 control-label label-20">First Name</label>
                  <div class="col-sm-4">
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Joe" required>
                  </div>
                  <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                  <label for="last_name" class="col-sm-4 control-label label-20">Last Name</label>
                  <div class="col-sm-4">
	                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Smith" required>
                  </div>
                  <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                  <label for="email" class="col-sm-4 control-label label-20">Email</label>
                  <div class="col-sm-4">
                  	<div class="input-group">
				      	<input type="text" pattern="^([_A-z0-9]){3,}$" name="email" minlength="6" maxlength="20" class="form-control" id="inputTwitter" placeholder="pawprint" required>
				    	<span class="input-group-addon">
				    		<select name="email_option">
							  <option value="@mail.missouri.edu">@mail.missouri.edu</option>
							  <option value="@missouri.edu">@missouri.edu</option>
							</select>
						</span>
				    </div>
					    <div class="help-block with-errors"></div>
                  </div>
            </div>
            <div class="form-group">
                  <label for="phone" class="col-sm-4 control-label label-20">Phone</label>
                  <div class="col-sm-4">
                        <?php
	                         $data = array(
					          'name'        => 'phone',
					          'id'          => 'phone',
					          'class'       => 'form-control'
					        );
	                        echo form_input($data);
	                    ?>
                  </div>
            </div>
            <div class="form-group">
                  <label for="password" class="col-sm-4 control-label label-20">Password</label>
                  <div class="col-sm-4">
                        <input type="password" data-minlength="8" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
      					<span class="help-block">Minimum of 8 characters</span>
                  </div>
            </div>
            <div class="form-group">
                  <label for="password_confirm" class="col-sm-4 control-label label-20">Confirm Password</label>
                  <div class="col-sm-4">
                        <input type="password" name="password_confirm" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
      					<div class="help-block with-errors"></div>
                  </div>
            </div>
            <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-4">
                        <button type="submit" class="btn btn-default">Create User</button>
                  </div>
            </div>
      </form>
    </div>
</div>
</div>
