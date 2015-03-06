<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>

<script type="text/javascript">
$(document).ready(function (){
	$('#categorySelectForm').change(function(){
	    var category_id = $(this).val();
	    if (category_id != ""){
	        var post_url = "<?php echo base_url('ajax') ?>/get_subcategories/" + category_id;
			var count = 0;
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
						count++;
	                });
					
					if( count==0){
						var opt = $('<option  disabled/>'); // here we're creating a new select option for each group
                      	opt.text("No Subcategories");
                      	$('#subCategory').append(opt); 
						$('#subCategory').attr('size', 2);
					}
					else{
						$('#subCategory').attr('size', count);
					}
					
					$('#subcategory_name').removeAttr('disabled');
					$('#subcategory_description').removeAttr('disabled');
					
	            } //end success
	         }); //end AJAX
	    } 
	    else
	    {
	    	$('#subCategory').empty();
			$('#subcategory_name').attr('disabled', true);
			$('#subcategory_description').attr('disabled', true);
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
	
	<?php if(isset($created)) {?>
	    <div class="alert alert-success">
	        <a href="#" class="close" data-dismiss="alert">&times;</a>
	        <strong>Success!</strong> New Subcategory Added
	    </div>
    <?php }?>
    <?php if(isset($error)) {?>
	    <div class="alert alert-danger">
	        <a href="#" class="close" data-dismiss="alert">&times;</a>
	        <strong>Error!</strong> Subcategory was not added. <?php echo $error; ?>
	    </div>
    <?php }?>
	
	<?php echo form_open("market/new_subcategory", array('class' => 'form-horizontal', 'id' => 'ad-form'));?>	
		
		<div class="form-group">
			<label for="categorySelectForm" class="col-sm-3 control-label label-20">Categories</label>
			<div class="col-sm-6">
				<select class="form-control" id="categorySelectForm" name="category_id">
				<option value="">Select a Category</option>
				<?php 
					foreach($categories->result() as $category):
					echo '<option value="'.$category->category_id.'">' . $category->name . "</option>";
					endforeach; 
				?>
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<label for="subCategories" class="col-sm-3 control-label label-20">Subcategories</label>
			<div class="col-sm-6">
				<select size="5" class="form-control" id="subCategory" >
				</select>
			</div>
		</div>
		
		<hr>
		
		<div class="form-group">
			<label for="subcategory_name" class="col-sm-3 control-label label-20">Subcategory Name</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" name="subcategory_name" id="subcategory_name" placeholder="" disabled>
			</div>
		</div>
		
		<div class="form-group">
			<label for="subcategory_description" class="col-sm-3 control-label label-20">Description</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" name="subcategory_description" id="subcategory_description" placeholder="" disabled>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-default">Add</button>
			</div>
		</div>

	<?php echo form_close();?>

</div>