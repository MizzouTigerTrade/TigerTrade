<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/validator.js') ?>"></script>
<script type="text/javascript">
	$('#ad-form').validator()
</script>

<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>New User</h1>
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
      

      <form action="<?php echo base_url('application/controller/auth/create_user.php') ?>" class="form-horizontal" id="ad-form" data-toggle="validator" role="form">
            <div class="form-group">
                  <label for="first_name" class="col-sm-4 control-label label-20">First Name</label>
                  <div class="col-sm-4">
                        <?php
	                         $data = array(
					          'name'        => 'first_name',
					          'id'          => 'first_name',
					          'class'       => 'form-control'
					        );
	                        echo form_input($data);
	                    ?>
                  </div>
            </div>
            <div class="form-group">
                  <label for="last_name" class="col-sm-4 control-label label-20">Last Name</label>
                  <div class="col-sm-4">
	                    <?php
	                         $data = array(
					          'name'        => 'last_name',
					          'id'          => 'last_name',
					          'class'       => 'form-control'
					        );
	                        echo form_input($data);
	                    ?>
                  </div>
            </div>
            <div class="form-group">
                  <label for="email" class="col-sm-4 control-label label-20">Email</label>
                  <div class="col-sm-4">
                        <?php
	                         $data = array(
					          'name'        => 'email',
					          'id'          => 'email',
					          'class'       => 'form-control'
					        );
	                        echo form_input($data);
	                    ?>
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
                        <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
      					<span class="help-block">Minimum of 6 characters</span>
                  </div>
            </div>
            <div class="form-group">
                  <label for="password_confirm" class="col-sm-4 control-label label-20">Confirm Password</label>
                  <div class="col-sm-4">
                        <?php
	                         $data = array(
					          'name'        => 'password_confirm',
					          'id'          => 'password_confirm',
					          'class'       => 'form-control'
					        );
	                        echo form_password($data);
	                    ?>
                  </div>
            </div>
            <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-4">
                        <button type="submit" class="btn btn-default">Create User</button>
                  </div>
            </div>
      </form>
      
</div>
