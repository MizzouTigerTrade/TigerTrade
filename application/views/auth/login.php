<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/validator.js') ?>"></script>
<script type="text/javascript">
  $('#ad-form').validator()
</script>

<div class="container padding-top-20">
<div class="container-border">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<h1>Login</h1>
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
      
     <form action="<?php echo base_url('auth/login') ?>" method="POST" class="form-horizontal" id="ad-form" data-toggle="validator" role="form">

      <div class="form-group">
            <label for="first_name" class="col-sm-4 control-label label-20">Email</label>
            <div class="col-sm-4">
                  <input type="text" name="identity" class="form-control" id="identity" placeholder="example@mail.missouri.edu" required>
            </div>
            <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
            <label for="first_name" class="col-sm-4 control-label label-20">Password</label>
            <div class="col-sm-4">
                  <input type="password" name="password" class="form-control" id="password" placeholder="password" required>
            </div>
            <div class="help-block with-errors"></div>
      </div>
	  <div class="col-sm-offset-4 col-sm-6">
			<p style="">New to TigerTrade? <a href="<?php echo base_url('/auth/create_user'); ?>">Create an account.</a></p>
	  </div>
      <div class="form-group">
          <div class="col-sm-offset-4 col-sm-4">
              <div class="checkbox">
	               <button type="submit" style="float: right;" class="btn btn-primary">Login</button>
                <label style="padding-top: 7px;">
                        <?php
                             $data = array(
                      'name'        => 'remember',
                      'id'          => 'remember',
                      'class'       => ''
                    );
                            echo form_checkbox($data);
                        ?>Remember me
                </label>
                <br class="visible-md visible-sm">
				<a style="padding: 10px;" href="<?php echo base_url('/auth/forgot_password'); ?>">Forgot Password?</a>
               
              </div>
              
          </div>
        </div>

      <?php echo form_close();?>
        </div>
</div>
</div>