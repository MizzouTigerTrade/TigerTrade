<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>Login</h1>
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
      

      <?php echo form_open("auth/login", array('class' => 'form-horizontal', 'id' => 'ad-form'));?>
            <div class="form-group">
                  <label for="identity" class="col-sm-4 control-label label-20">Email</label>
                  <div class="col-sm-4">
                        <?php
	                         $data = array(
					          'name'        => 'identity',
					          'id'          => 'identity',
					          'class'       => 'form-control'
					        );
	                        echo form_input($data);
	                    ?>
                  </div>
            </div>
            <div class="form-group" style="margin-bottom: 0px;">
                  <label for="password" class="col-sm-4 control-label label-20">Password</label>
                  <div class="col-sm-4">
	                    <?php
	                         $data = array(
					          'name'        => 'password',
					          'id'          => 'password',
					          'class'       => 'form-control'
					        );
	                        echo form_password($data);
	                    ?>
						<p class="help-block"><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
                  </div> 
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
					    <button type="submit" style="float: right;" class="btn btn-default">Login</button>
	                </div>
	                
                </div>
            </div>

      <?php echo form_close();?>
</div>
