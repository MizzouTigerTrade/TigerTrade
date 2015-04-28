<div class="container padding-top-20">
<div class="container-border">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<h1>Forgot Password</h1> 
		</div>
	</div>

	<hr>
	
	<div style="padding: 0 15px;">
      <div class="row">
			<div class="col-sm-offset-4 col-sm-8">
			    <p>Enter the email address you used to sign up.</p>
                <p>TigerTrade will send you an email about resetting your password.</p>
			</div>
      </div>
      <?php if ($message != "") { ?>
      <div id="infoMessage">
		<div class="alert alert-info" role="alert" style="margin-top: 10px;">
		  <span class="sr-only">Error:</span>
		  <?php echo $message;?>
		</div>
	  </div>
	  <?php }; ?>
      
	  <form action="<?php echo base_url('auth/forgot_password') ?>" method="POST" class="form-horizontal" id="ad-form" data-toggle="validator" role="form">

      <div class="form-group">
            <label for="first_name" class="col-sm-4 control-label label-20">Email</label>
            <div class="col-sm-4">
                  <input type="text" name="identity" class="form-control" id="identity" placeholder="example@mail.missouri.edu" required>
            </div>
            <div class="help-block with-errors"></div>
      </div>
	  <div class="form-group">
		<div class="col-sm-4 col-sm-offset-4">
			<button type="submit" style="padding: 7px; float: right;" class="btn btn-primary">Send Email</button>
		</div>
	  </div>

      <!-- <?php echo form_open("auth/forgot_password", array('class' => 'form-horizontal', 'id' => 'ad-form'));?>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
					<div class="input">
                        <?php
	                         $data = array(
					          'name'        => 'identity',
					          'id'          => 'identity',
					          'class'       => 'form-control'
					        );
	                    ?>
						<button type="submit" style="padding: 7px; float: right;" class="btn btn-primary">Send Email</button>
                  </div>
            </div>
		</div> -->

      <?php echo form_close();?>
	</div>
</div>
</div>