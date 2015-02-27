<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>

<script type="text/javascript">
$(document).ready(function (){
	$('#categorySelectForm').change(function(){
	    var category_id = $(this).val();
	    if (category_id != ""){
	        var post_url = "<?php echo base_url('ajax') ?>/get_subcategories/" + category_id;
	        $.ajax({
	            type: "POST",
	            url: post_url,
	            success: function(subCategories) //we're calling the response json array 'cities'
	            {
	                $('#subCategory').empty();
	                subCategories = $.parseJSON(subCategories);
                   	$.each(subCategories,function(id,name) 
                   	{	
                    	var opt = $('<option  disabled/>'); // here we're creating a new select option for each group
                      	opt.val(id);
                      	opt.text(name);
                      	$('#subCategory').append(opt); 	
	                });
	            } //end success
	         }); //end AJAX
	    } 
	    else
	    {
	    	$('#subCategory').empty();
	    }
	}); //end change 
});

</script>

<div class="container padding-top-20">

	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>New Subcategory</h1>
		</div>
	</div>
	
	<hr>
	
	<?php echo form_open("market/new_subcategory", array('class' => 'form-horizontal', 'id' => 'ad-form'));?>	
		
		<div class="form-group">
			<label for="categorySelectForm" class="col-sm-3 control-label label-20">Categories</label>
			<div class="col-sm-7">
				<select class="form-control" id="categorySelectForm" >
				<?php 
					foreach($categories->result() as $category):
					echo "<option>" . $category->name . "</option>";
					endforeach; 
				?>
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<label for="subCategories" class="col-sm-3 control-label label-20">Subcategories</label>
			<div class="col-sm-7">
				<select size="10" class="form-control" id="subCategory" >
				<?php /*
					foreach($categories->result() as $category):
					echo "<option disabled>" . $category->name . "</option>";
					endforeach;*/ 
				?>
				</select>
			</div>
		</div>
		
		<hr>
		
		<div class="form-group">
			<label for="subcategory_name" class="col-sm-3 control-label label-20">Subcategory Name</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="subcategory_name" id="subcategory_name" placeholder="" disabled>
			</div>
		</div>
		
		<div class="form-group">
			<label for="subcategory_description" class="col-sm-3 control-label label-20">Description</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="subcategory_description" id="subcategory_description" placeholder="" disabled>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-7">
				<button type="submit" class="btn btn-default">Add</button>
			</div>
		</div>

	<?php echo form_close();?>

</div>