<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>Edit Profile</h1>
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
	  

      <?php echo form_open(uri_string(), array('class' => 'form-horizontal', 'id' => 'ad-form'));?>
            <div class="form-group">
                  <label for="first_name" class="col-sm-4 control-label label-20">First Name</label>
                  <div class="col-sm-4">
                        <?php
							$first_name['class'] = 'form-control';
	                        echo form_input($first_name);
	                    ?>
                  </div>
            </div>
            <div class="form-group">
                  <label for="last_name" class="col-sm-4 control-label label-20">Last Name</label>
                  <div class="col-sm-4">
	                    <?php
							$last_name['class'] = 'form-control';
	                        echo form_input($last_name);
	                    ?>
                  </div>
            </div>
            <div class="form-group">
                  <label for="email" class="col-sm-4 control-label label-20">Email</label>
                  <div class="col-sm-4">
                        <?php
							$email['class'] = 'form-control';
							$email['readonly'] = 'true';
	                        echo form_input($email);
	                    ?>
                  </div>
            </div>
            <div class="form-group">
                  <label for="phone" class="col-sm-4 control-label label-20">Phone</label>
                  <div class="col-sm-4">
                        <?php
	                        $phone['class'] = 'form-control';
	                        echo form_input($phone);
	                    ?>
                  </div>
            </div>
            <div class="form-group">
                  <label for="password" class="col-sm-4 control-label label-20">New Password</label>
                  <div class="col-sm-4">
                        <?php
	                        $password['class'] = 'form-control';
	                        echo form_input($password);
	                    ?>
                  </div>
            </div>
            <div class="form-group">
                  <label for="password_confirm" class="col-sm-4 control-label label-20">Confirm New Password</label>
                  <div class="col-sm-4">
                        <?php
	                        $password_confirm['class'] = 'form-control';
	                        echo form_input($password_confirm);
	                    ?>
                  </div>
            </div>
			
			<?php if ($this->ion_auth->is_admin()): ?>
			
				<div class="form-group">
					<label for="checkbox" class="col-sm-4 control-label label-20">Member of groups</label>
					<div id="checkbox" class="col-sm-4">
					<?php foreach ($groups as $group):?>
						<?php
							$gID=$group['id'];
							$checked = null;
							$item = null;
							foreach($currentGroups as $grp) 
							{
								if ($gID == $grp->id) 
								{
									$checked= ' checked="checked"';
									break;
								}
							}
						?>
						<input type="checkbox" id="<?php echo $group['name'];?>" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
						<label for="<?php echo $group['name'];?>"><?php echo $group['name'];?></label>
						<br>
					<?php endforeach?>
					</div>
				</div>
				
			<?php endif ?>
				
			<?php 
			echo form_hidden('id', $user->id);
			echo form_hidden($csrf); 
			?>
			
            <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-4">
                        <button type="submit" class="btn btn-default">Save</button>
                  </div>
            </div>
			
      <?php echo form_close();?>
      
</div>
