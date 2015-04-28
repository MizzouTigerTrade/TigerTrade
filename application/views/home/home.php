<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/validator.js') ?>"></script>
<script type="text/javascript">
	$('#ad-form').validator()
</script>

<div class="container padding-top-20">
<div class="container-border">
	
	<div class="row text-center">
		<div class="col-sm-6 col-sm-offset-3">
			<img src="<?= base_url('assets/Images/market/white_logo.png') ?>" alt="">
		</div>
	</div>
      
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
                <br>
				<a style="padding: 10px;" href="<?php echo base_url('/auth/forgot_password'); ?>">Forgot Password?</a>
				
			 </div>
              <button type="submit" style="float: right;" class="btn btn-primary">Login</button>
          </div>
        </div>

      <?php echo form_close();?>
        </div>

</div>
</div>