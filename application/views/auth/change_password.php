<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>Change Password</h1>
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
      

      <?php echo form_open("auth/change_password", array('class' => 'form-horizontal', 'id' => 'ad-form'));?>
        <div class="form-group">
              <label for="old_password" class="col-sm-4 control-label label-20">Old Password</label>
              <div class="col-sm-4">
                    <?php
                         $data = array(
				          'name'        => 'old_password',
				          'id'          => 'old_password',
				          'class'       => 'form-control'
				        );
                        echo form_password($data);
                    ?>
              </div>
        </div>
        <div class="form-group">
              <label for="new_password" class="col-sm-4 control-label label-20">New Password</label>
              <div class="col-sm-4">
                    <?php
                         $data = array(
				          'name'        => 'new_password',
				          'id'          => 'new_password',
				          'class'       => 'form-control'
				        );
                        echo form_password($data);
                    ?>
              </div> 
        </div>
        <div class="form-group">
              <label for="new_password_confirm" class="col-sm-4 control-label label-20">Confirm Password</label>
              <div class="col-sm-4">
                    <?php
                         $data = array(
				          'name'        => 'new_password_confirm',
				          'id'          => 'new_password_confirm',
				          'class'       => 'form-control'
				        );
                        echo form_password($data);
                    ?>
              </div> 
        </div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</div>

      <?php echo form_close();?>
</div>