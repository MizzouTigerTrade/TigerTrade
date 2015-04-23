<div class="container padding-top-20">
<div class="container-border" style="padding: 0 10px;">

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<h1>TigerTrade</h1>
		</div>
	</div>
	
	<hr>
	
	<div class="row">
		<div class="col-sm-5 col-sm-offset-1">
			Login
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
					    <button type="submit" style="float: right;" class="btn btn-default">Login</button>
	                </div>
	                
                </div>
            </div>

			<?php echo form_close();?>			
		</div>
		<div class="col-sm-5">
			Register
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


