<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>

<script src="<?php echo base_url('assets/js/bootstrap-tagsinput-angular.js') ?>"></script>

<script src="<?php echo base_url('assets/js/bootstrap-tagsinput.js') ?>"></script>

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

	$('#tags').tagsInput();
});



</script>

<div class="container padding-top-20">
<div class="container-border">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<h1>New Ad</h1>
		</div>
	</div>

	<hr>
	
	<div style="padding: 0 15px;">
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

	<?php echo form_open("ad/create", array('class' => 'form-horizontal', 'id' => 'ad-form', 'enctype' => 'multipart/form-data'));?>		
		<div class="form-group">
			<label for="title" class="col-sm-2 control-label label-20">Title</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="title" id="title" placeholder="..." onkeyup="document.getElementById('preview_title').innerHTML = this.value" required>
			</div>
		</div>
		<div class="form-group">
			<label class="sr-only" for="price">Amount (in dollars)</label>
			<label for="price" class="col-sm-2 control-label label-20">Price</label>
			<div class="input-group col-sm-3 col-sm-offset-2" style="padding: 0 15px;">
				<div class="input-group-addon">$</div>
					<input type="text" class="form-control" name="price" id="price" placeholder="Amount" required>
				<div class="input-group-addon">.00</div>
			</div>
		</div>
		<div class="form-group" id="categoryForm">
			<label for="category" class="col-sm-2 control-label label-20">Category</label>
			<div class="col-sm-10">
			<select name="category" class="form-control" id="categorySelectForm" required> 
				<option value="">Select One</option>
				<?php
					foreach($categories->result() as $category)
					{
						echo '<option value="'.$category->category_id.'">'.$category->name.'</option>';
					}
				?>	
			</select>
			</div>
		</div>
		<div class="form-group" id="subCategoryForm">
			<label for="sub-category" class="col-sm-2 control-label label-20">Sub-Category</label>
			<div class="col-sm-10">
			<select name="subCategory" class="form-control" id="subCategory" required> 
				<option value=""><option>	
			</select>
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-sm-2 control-label label-20">Description</label>
			<div class="col-sm-10">
				<textarea type="text" class="form-control description-box" name="description" id="description" onkeyup="document.getElementById('preview_message').innerHTML = this.value" rows="5" required></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="description" class="col-sm-2 control-label label-20">Tags</label>
			<div class="col-sm-10">
				<input type="text" class="form-control description-box" name="tags" data-role="tagsinput" id="tags"></input>
			</div>
		</div>

		<div class="form-group" >
			<label for="description" class="col-sm-2 control-label label-20">Upload Image</label>
			<div class="col-sm-10">
				<div id="filediv"><input name="userfile[]" class="btn"  type="file" id="file"/></div>
			</div>
		</div>

		<div class="form-group" >
			<label for="description" class="col-sm-2 control-label label-20">Upload More Images</label>
			<div class="col-sm-10">
				<input type="button" id="add_more" class="upload" value="Add More Files"/>
			</div>
		</div>
		
		
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
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	<?php echo form_close();?>
	
	</div>
</div>
	
</div>