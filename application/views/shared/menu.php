<?php 
	if($user = $this->ion_auth->user()->row()){		
		$user_id = $this->ion_auth->get_user_id();
		$flag_notification = $this->ad_model->get_flagged_ads_count();
		$sent_offer_notification = $this->offer_model->get_sent_offer_notification($user_id);
		$received_offer_notification = $this->offer_model->get_received_offer_notification($user_id);
		$total_offer_notification = $sent_offer_notification + $received_offer_notification;
	}
	else{
		$flag_notification = 0;
		$sent_offer_notification = 0;
		$received_offer_notification = 0;
		$total_offer_notification = 0;
	}
	
	$categories = $this->category_model->get_all_categories();
?>
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
			<a class="navbar-brand" href='<?= base_url() ?>'><span id='left-header'>Tiger</span><span id='right-header'>Trade</span></a>
		</div>
		<!-- MENU OPTIONS -->
		<nav class="collapse navbar-collapse bs-navbar-collapse" id="navbar">
			<ul class="nav navbar-nav">
				<li class="<?php if ($this->uri->segment(1) == '' ) { ?>active<?php } ?>">
					<a href='<?= base_url() ?>'>Home</a>
				</li>
				<!--
				<li class="<?php if (in_array($this->uri->segment(1), array('market', 'ad'))) { ?>active<?php } ?>">
					<a href='<?= base_url("/market") ?>'>Market</a>
				</li>
				-->
				<li class="<?php if (in_array($this->uri->segment(1), array('market', 'ad'))) { ?>active<?php } ?>>">
					<a href='<?= base_url("/market") ?>'>Market </a>
				</li>
				<li class="dropdown <?php if (in_array($this->uri->segment(1), array('market', 'ad'))) { ?>active<?php } ?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">&nbsp;<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href='<?= base_url("/market") ?>'>All</a></li>
						<?php foreach ($categories->result() as $category) { ?>
						<li><a href='<?= base_url("/market/index/" . $category->category_id) ?>'><?= ucwords($category->name) ?></a></li>
						<?php } ?>
						<li role="presentation" class="divider"></li>
						<li><a href='<?= base_url("/ad/new_ad") ?>'>New Ad</a></li>
						
					</ul>
				</li>

				
				<li class="dropdown <?php if ($this->uri->segment(1) == 'content' ) { ?>active<?php } ?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href='<?= base_url("/content/team") ?>'>Development Team</a></li>
						<li><a href='<?= base_url("/content/terms") ?>'>Terms of Use</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if (!$this->ion_auth->logged_in()) { ?>
					<li class="<?php if (in_array($this->uri->segment(2), array('create_user'))) { ?>active<?php } ?>"><a href='<?= base_url("auth/create_user") ?>'>Register</a></li>
					<li class="<?php if (in_array($this->uri->segment(2), array('login'))) { ?>active<?php } ?>"><a href='<?= base_url("auth/login") ?>'>Login</a></li>
				<?php } else { ?>
				
				<?php if($this->ion_auth->is_admin()){?>
				
					<li class="dropdown <?php if (in_array($this->uri->segment(1), array('auth', 'admin'))) { ?>active<?php } ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <span class="badge notification-badge"><?php if($flag_notification>0){echo $flag_notification ;} ?></span><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('/admin/manage_flags') ?>">Manage Flags &nbsp <span class="badge notification-badge"><?php if($flag_notification>0){echo $flag_notification ;} ?></span></a></li>
							<li><a href="<?php echo base_url('/auth') ?>">Manage Users</a></li>
							<li><a href="<?php echo base_url('/admin/new_category') ?>">Create Category</a></li>
							<li><a href="<?php echo base_url('/admin/new_subcategory') ?>">Create Subcategory</a></li>
						</ul>
					</li>
				
				<?php } ?>
				
					<li class="dropdown <?php if (in_array($this->uri->segment(1), array('user', 'offers'))) { ?>active<?php } ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->first_name; ?> <span class="badge notification-badge"><?php if($total_offer_notification>0){echo $total_offer_notification ;} ?></span> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('/ad/user_ads') ?>">My Ads</a></li>
							<li><a href="<?php echo base_url('/offers/sent') ?>">Sent Offers <span class="badge notification-badge"><?php if($sent_offer_notification>0){echo $sent_offer_notification ;} ?></span></a></li>
							<li><a href="<?php echo base_url('/offers/received') ?>">Received Offers <span class="badge notification-badge"><?php if($received_offer_notification>0){echo $received_offer_notification ;} ?></span></a></li>
							<li><a href="<?php echo base_url('/user/edit_profile/' . $this->ion_auth->get_user_id() ) ?>">Edit Profile</a></li>
						</ul>
					</li>
	
					<li><a href='<?= base_url("auth/logout") ?>'>Logout</a></li>
				<?php } ?>
			</ul>
		</nav>
	</div>
</nav>	
