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
                    	var opt = $('<option />'); // here we're creating a new select option for each group
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
		<div class="col-xs-12">
			<h1>Edit Ad Form</h1>
		</div>
	</div>

	<hr>

	<?php if(isset($created)) {?>
	    <div class="alert alert-success">
	        <a href="#" class="close" data-dismiss="alert">&times;</a>
	        <strong>Success!</strong> Your ad has been created.
	    </div>
    <?php }?>
    <?php if(isset($error)) {?>
	    <div class="alert alert-danger">
	        <a href="#" class="close" data-dismiss="alert">&times;</a>
	        <strong>Error!</strong> Your ad was not created, something went wrong.
	    </div>
    <?php }?>

	<?php echo form_open("ad/update", array('class' => 'form-horizontal', 'id' => 'ad-form', 'enctype' => 'multipart/form-data'));?>		
		<?php echo form_hidden('ad_id', $ad->ad_id); ?>
		<div class="form-group">
			<label for="title" class="col-sm-2 control-label label-20">Title</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="title" id="title" value="<?= $ad->title?>" onkeyup="document.getElementById('preview_title').innerHTML = this.value">
			</div>
		</div>
		<div class="form-group">
			<label class="sr-only" for="price">Amount (in dollars)</label>
			<label for="price" class="col-sm-2 control-label label-20">Price</label>
			<div class="input-group col-sm-3 col-sm-offset-2" style="padding: 0 15px;">
				<div class="input-group-addon">$</div>
					<input type="text" class="form-control" name="price" id="price" value="<?= $ad->price?>">
				<div class="input-group-addon">.00</div>
			</div>
		</div>
		<div class="form-group" id="categoryForm">
			<label for="category" class="col-sm-2 control-label label-20">Category</label>
			<div class="col-sm-10">
			<select name="category" id="categorySelectForm"> 
				<option value="">Select One</option>
				<?php
					$sub = 0;
					foreach($categories->result() as $category)
					{
						if($category->category_id == $ad->category_id)
						{
							$sub = 1;
							echo '<option value="'.$category->category_id.'" selected>'.$category->name.'</option>';
						}
						else
						{
							echo '<option value="'.$category->category_id.'">'.$category->name.'</option>';
						}
					}
				?>	
			</select>
			</div>
		</div>
		<div class="form-group" id="subCategoryForm">
			<label for="sub-category" class="col-sm-2 control-label label-20">Sub-Category</label>
			<div class="col-sm-10">
			<select name="subCategory" id="subCategory"> 	
				<?php
					foreach($subcategories->result() as $subcategory)
					{
						if($subcategory->subcategory_id == $ad->subcategory_id)
						{
							$sub = 1;
							echo '<option value="'.$subcategory->subcategory_id.'" selected>'.$subcategory->name.'</option>';
						}
						else
						{
							foreach ($categories->result() as $category) {
								if($category->category_id == $subcategory->category_id && $ad->category_id == $category->category_id)
								{
									echo '<option value="'.$subcategory->category_id.'">'.$subcategory->name.'</option>';
								}
							}
						}
					}
				?>	
			</select>
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-sm-2 control-label label-20">Description</label>
			<div class="col-sm-10">
				<textarea type="text" class="form-control description-box" name="description" id="description" onkeyup="document.getElementById('preview_message').innerHTML = this.value" rows="5"><?php echo $ad->description; ?></textarea>
			</div>
		</div>


		<?php if(count($images) > 0) { 
			echo "images";
			  foreach ($images->result() as $img) { ?>
				
				<div class="form-group" >
					<div class="col-sm-10">
						<div id="filediv"><img class="img-thumbnail" src="<?php echo base_url('/assets/images/' . $img->image_path); ?>" alt="ad_image" width="100%" height="100%"></div>
					</div>
				</div>
				
		<?php } }

		else { ?>

		<div class="form-group" >
			<label for="description" class="col-sm-2 control-label label-20">Upload Image</label>
			<div class="col-sm-10">
				<div id="filediv"><input name="userfile[]" type="file" id="file"/></div>
			</div>
		</div>

		<div class="form-group" >
			<label for="description" class="col-sm-2 control-label label-20">Upload More Images</label>
			<div class="col-sm-10">
				<input type="button" id="add_more" class="upload" value="Add More Files"/>
			</div>
		</div>
		<?php } ?>
			
		<hr>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label>
						<input type="checkbox" required="true"> <a href="<?php echo base_url('/content/terms') ?>">I Agree to the Terms & Conditions</a>
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</div>
	<?php echo form_close();?>
	
</div>