<script>
$('#subcategory, #subcategory_label').hide();
$('#category').change(function(){
    var category_id = $('#category').val();
    if (category_id != ""){
        var post_url = "/market/get_subcategories/" + category_id;
        $.ajax({
            type: "POST",
             url: post_url,
             success: function(subcategories) //we're calling the response json array 'cities'
              {
                $('#subcategory').empty();
                $('#subcategory, #subcategory_label').show();
                   $.each(subcategories,function(subcategory_id,subcategory) 
                   {
                    var opt = $('<option />'); // here we're creating a new select option for each group
                      opt.val(subcategory_id);
                      opt.text(subcategory);
                      $('#subcategory').append(opt); 
                });
               } //end success
         }); //end AJAX
    } else {
        $('#subcategory').empty();
        $('#subcategory, #subcategory_label').hide();
    }//end if
}); //end change 
</script>

<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>Market: All</h1>
		</div>
	</div>
	
	<hr>



	<!-- Experimental Market Menu -->
	<!--
	<div id="market-menu">
		<div class="row">
			<div class="col-xs-4 col-sm-3 col-md-2">
				<a href="<?php echo base_url('/market') ?>"><b>all</b></a>
			</div>
		</div>
		<?php foreach ($categories->result() as $category) { ?>
			<div class="row">
				<div class="col-xs-4 col-sm-3 col-md-2">
			    	<a href="<?php echo base_url('/market/category/' . $category->category_id); ?>"><b><?php echo $category->name; ?></b></a>
				</div>
			    
			    
		    	<?php foreach ($subcategories->result() as $subcategory) {
			    	
			    	
			    	
		    		if ($subcategory->category_id == $category->category_id) { ?>
		    		
		    		
		    			<div class="col-xs-4 col-sm-3 col-md-2">
					    	<a href="<?php echo base_url('/market/subcategory/' . $subcategory->subcategory_id); ?>"><?php echo $subcategory->name; ?></a>
		    			</div>
					    
					    
					<?php } ?>
					
					
					
		    	<?php } ?>
	    	


			</div><br>
		<?php } ?>
	</div>
	
	<hr>
	-->
	
	<div class="row">
		
		
		<div class="col-xs-3 col-sm-2">
			<!-- Market Menu -->
			<div id="market-menu">
				<a href="<?php echo base_url('/market') ?>"><b>all</b></a><br><br>
				<?php foreach ($categories->result() as $category) { ?>
				    <a href="<?php echo base_url('/market/category/' . $category->category_id); ?>"><b><?php echo $category->name; ?></b></a><br>
			    	<?php foreach ($subcategories->result() as $subcategory) {
			    		if ($subcategory->category_id == $category->category_id) { ?>
						    <a href="<?php echo base_url('/market/subcategory/' . $subcategory->subcategory_id); ?>"><?php echo $subcategory->name; ?></a><br>
						<?php } ?>
			    	<?php } ?>
			    	<br>
				<?php } ?>
			</div>
			
			<!-- Search/Filter Form -->
			<div id="search-form">
			<?php echo form_open('market/add_all'); ?>
				<div class="form-group">
					<label for="category" class="control-label">Categories</label>
					<select name="category" class="form-control" id="category" >
					<?php 
						foreach($categories->result() as $category):
							echo "<option value='" . $category->id . "'>" . $category->name . "</option>";
							echo $category->id;
						endforeach; 
					?>
					</select>
				</div>
				<div class="form-group">
					<label for="subcategory" class="control-label">Subcategories</label>
					<select name="subcategory" class="form-control" id="subcategory" id="subcategory_label" >
						<option value=""></option>
					</select>
				</div>
			<?php echo form_close(); ?> 
			</div>
		</div>
		
		<div class="col-xs-9 col-sm-10">
			
			<div class="row">
				<div class="row text-center">
					<div class="btn-group hidden-xs">
						<a class="btn btn-default" href="<?php echo base_url('/ad/new_ad') ?>">Place an Ad</a>
						<?php if ($this->ion_auth->is_admin()) { ?>
						<a class="btn btn-default" href="<?php echo base_url('/market/new_category') ?>">Create a Category</a>
						<a class="btn btn-default" href="<?php echo base_url('/ad/new_subcategory') ?>">Create a Subcategory</a>
						<?php } ?>
					</div>
					<div class="visible-xs">
						<a class="btn btn-default" href="<?php echo base_url('/ad/new_ad') ?>">Place an Ad</a><br><br>
						<?php if ($this->ion_auth->is_admin()) { ?>
						<a class="btn btn-default" href="<?php echo base_url('/market/new_category') ?>">Create a Category</a><br><br>
						<a class="btn btn-default" href="<?php echo base_url('/ad/new_subcategory') ?>">Create a Subcategory</a><br>
						<?php } ?>
					</div>
				</div>
				
				<?php $count = 0; ?>
				<?php foreach ($ads->result() as $row) { ?>
					<?php if ($count == 0 || $count % 3 == 0) { ?><div class="row"><?php } ?>
					<div class="col-sm-6 col-md-4" style="padding-bottom: 10px;">
						<a class="market-link" href="<?php echo base_url('/ad/details/' . $row->ad_id) ?>">
						<h3><?php echo $row->title; ?></h3>
							<p style="color: black;">Price: $<?php echo $row->price; ?></p>
							<img src="http://placehold.it/300x200" class="img-thumbnail" alt="Responsive image" style="width: 100%;">
						</a><br><br>
						<p>Description: <?php echo $row->description; ?></p>
						<p>Ad ID: <?php echo $row->ad_id; ?></p>
					</div>
					<?php if ($count == 2 || $count % 3 == 2) { ?></div><?php } $count++; ?>
				<?php } ?>
				<?php if ($count % 3 != 0) { ?></div><?php } $count++; ?>
			</div>
			
		</div>
	</div>
</div>