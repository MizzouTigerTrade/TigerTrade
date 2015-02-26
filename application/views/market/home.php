<script>
$('#subcategory, #subcategory_label').hide();
$('#category').change(function(){
    var state_id = $('#category').val();
    if (state_id != ""){
        var post_url = "/index.php/control_form/get_cities/" + state_id;
        $.ajax({
            type: "POST",
             url: post_url,
             success: function(cities) //we're calling the response json array 'cities'
              {
                $('#subcategory').empty();
                $('#subcategory, #subcategory_label').show();
                   $.each(cities,function(id,city) 
                   {
                    var opt = $('<option />'); // here we're creating a new select option for each group
                      opt.val(id);
                      opt.text(city);
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
				<?php echo form_open('control_form/filter_list'); ?>
				    <label for="category">Category</label>
				    <select id="category" name="category">
				        <option value=""></option>
				        <?php
				        foreach($categories->result() as $category){
				            echo '<option value="' . $category->category_id . '">' . $category->name . '</option>';
				        }
				        ?>
				    </select>
				    <label for="subcategory">Subcategory</label>
				    <!--this will be filled based on the tree selection above-->
				    <select id="subcategory" name="subcategory" id="subcategory_label"> 
				        <option value=""></option>
				    </select>
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