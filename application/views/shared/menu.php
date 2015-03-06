<?php $user = $this->ion_auth->user()->row(); ?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- HEADER/MOBILE NAVIGATION TOGGLE -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href='<?= base_url() ?>'>TigerTrade</a>
		</div>
		<!-- MENU OPTIONS -->
		<nav class="collapse navbar-collapse bs-navbar-collapse" id="navbar">
			<ul class="nav navbar-nav">
				<li class="<?php if ($this->uri->segment(1) == '' ) { ?>active<?php } ?>">
					<a href='<?= base_url() ?>'>Home</a>
				</li>
				<li class="<?php if (in_array($this->uri->segment(1), array('market', 'ad'))) { ?>active<?php } ?>">
					<a href='<?= base_url("/market") ?>'>Market</a>
				</li>
				
				<li class="<?php if ($this->uri->segment(1) == 'content' ) { ?>active<?php } ?>">
					<a href='<?= base_url("/content/terms") ?>'>Terms of Use</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if (!$this->ion_auth->logged_in()) { ?>
					<li class="<?php if (in_array($this->uri->segment(2), array('create_user'))) { ?>active<?php } ?>"><a href='<?= base_url("auth/create_user") ?>'>Register</a></li>
					<li class="<?php if (in_array($this->uri->segment(2), array('login'))) { ?>active<?php } ?>"><a href='<?= base_url("auth/login") ?>'>Login</a></li>
				<?php } else { ?>
				
					<li class="dropdown <?php if (in_array($this->uri->segment(1), array('user', 'auth', 'offers'))) { ?>active<?php } ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->first_name; ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('/auth/edit_user/' . $this->ion_auth->get_user_id() ) ?>">Edit Profile</a></li>
							<li><a href="<?php echo base_url('/offers') ?>">Offers</a></li>
							<li><a href="<?php echo base_url('/user') ?>">User</a></li>
						</ul>
					</li>
	
					<li><a href='<?= base_url("auth/logout") ?>'>Logout</a></li>
				<?php } ?>
			</ul>
		</nav>
	</div>
</nav>	
