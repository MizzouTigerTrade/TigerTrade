<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/validator.js') ?>"></script>
<script type="text/javascript">
	$('#ad-form').validator()
</script>

<div class="container padding-top-20">

<div style="background-color: #333;">&nbsp;</div>
<div style="background-color: #4c4c4c;">&nbsp;</div>

<div class="container-border">

	<div class="row" style="margin-top: 20px;">
		<div class="col-xs-10 col-xs-offset-1">
			<div class="alert alert-info" role="alert" style="margin-top: 10px;">
				<p>Welcome to TigerTrade! Pease login or create an account.</p>
			</div>
		</div>
	</div>
	
	<div class="row">
		
		<div class="col-sm-5 col-sm-offset-1" style="padding: 0 30px;">
			<h2>Login</h2>
			<?php echo form_open("auth/login", array('class' => 'form-horizontal', 'id' => 'ad-form'));?>
            <div class="form-group">
                  <label for="identity" class="col-xs-12 text-left">Email</label>
                  <div class="col-xs-12">
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
                  <label for="password" class="col-xs-12 text-left">Password</label>
                  <div class="col-xs-12">
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
                <div class="col-xs-12">
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
					    <button type="submit" style="float: right;" class="btn btn-primary">Login</button>
	                </div>
	                
                </div>
            </div>

			<?php echo form_close();?>			
		</div>
		<div class="col-sm-5" style="padding: 0 30px;">
			<h2>Register</h2>
			<form action="<?php echo base_url('auth/create_user') ?>" method="POST" class="form-horizontal" id="ad-form" data-toggle="validator" role="form">

	            <div class="form-group">
	                  <label for="first_name" class="col-xs-12 text-left">First Name</label>
	                  <div class="col-xs-12">
	                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Joe" required>
	                  </div>
	                  <div class="help-block with-errors"></div>
	            </div>
	            <div class="form-group">
	                  <label for="last_name" class="col-xs-12 text-left">Last Name</label>
	                  <div class="col-xs-12">
		                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Smith" required>
	                  </div>
	                  <div class="help-block with-errors"></div>
	            </div>
	            <div class="form-group">
	                  <label for="email" class="col-xs-12 text-left">Email</label>
	                  <div class="col-xs-12">
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
	                  <label for="phone" class="col-xs-12 text-left">Phone</label>
	                  <div class="col-xs-12">
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
	                  <label for="password" class="col-xs-12 text-left">Password</label>
	                  <div class="col-xs-12">
	                        <input type="password" data-minlength="8" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
	      					<span class="help-block">Minimum of 8 characters</span>
	                  </div>
	            </div>
	            <div class="form-group" style="margin-bottom: 8px;">
	                  <label for="password_confirm" class="col-xs-12 text-left">Confirm Password</label>
	                  <div class="col-xs-12">
	                        <input type="password" name="password_confirm" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
	      					<div class="help-block with-errors"></div>
	                  </div>
	            </div>
	            <div class="form-group">
	                  <div class="col-xs-12 text-right">
	                        <button type="submit" class="btn btn-primary">Register</button>
	                  </div>
	            </div>
      		</form>

		</div>
	</div>

</div>
</div>

<!-- Carousel
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="background-color: rgba(0, 0, 0, 0.17);">

	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
	</ol>
	
	<div class="carousel-inner text-center" role="listbox" style="min-height: 300px;">
		<div class="item active">
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1" style="padding-bottom: 45px;">
				<h1 style="font-size: 3.5em; margin-top: 30px;">Welcome to the TigerTrade!</h1>
				<p style="font-size: 1.5em;">Lorum ipsum dolem Lorum ipsum dolem Lorum ipsum dolem Lorum ipsum dolem Lorum ipsum dolem.</p>
			</div>
		</div>
			
		<div class="item">
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1" style="padding-bottom: 45px;">
				<h1 style="font-size: 3.5em; margin-top: 30px;">Your source for all things Mizzou!</h1>
				<p style="font-size: 1.5em;">Lorum ipsum dolem Lorum ipsum dolem Lorum ipsum dolem Lorum ipsum dolem Lorum ipsum dolem.</p>
			</div>
		</div>
			
		<div class="item">
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1" style="padding-bottom: 45px;">
				<h1 style="font-size: 3.5em; margin-top: 30px;">Buy!</h1>
				<p style="font-size: 1.5em;">Lorum ipsum dolem Lorum ipsum dolem Lorum ipsum dolem Lorum ipsum dolem Lorum ipsum dolem.</p>
			</div>
		</div>
			
		<div class="item">
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1" style="padding-bottom: 45px;">
				<h1 style="font-size: 3.5em; margin-top: 30px;">Sell!</h1>
				<p style="font-size: 1.5em;">Lorum ipsum dolem Lorum ipsum dolem Lorum ipsum dolem Lorum ipsum dolem Lorum ipsum dolem.</p>
			</div>
		</div>
	</div>
	
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
-->


