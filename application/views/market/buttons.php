<!-- Buttons on top of page -->
<div class="row text-center">
	<div class="btn-group hidden-xs">
		<a class="btn btn-default btn-sm" href="<?php echo base_url('/ad/new_ad') ?>">Place an Ad</a>
		<?php if ($this->ion_auth->is_admin()) { ?>
		<a class="btn btn-default btn-sm" href="<?php echo base_url('/market/new_category') ?>">Create a Category</a>
		<a class="btn btn-default btn-sm" href="<?php echo base_url('/ad/new_subcategory') ?>">Create a Subcategory</a>
		<?php } ?>
	</div>
	<div class="visible-xs">
		<a class="btn btn-default btn-sm" href="<?php echo base_url('/ad/new_ad') ?>">Place an Ad</a><br><br>
		<?php if ($this->ion_auth->is_admin()) { ?>
		<a class="btn btn-default btn-sm" href="<?php echo base_url('/market/new_category') ?>">Create a Category</a><br><br>
		<a class="btn btn-default btn-sm" href="<?php echo base_url('/ad/new_subcategory') ?>">Create a Subcategory</a><br>
		<?php } ?>
	</div>
</div>