<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>

<script type="text/javascript">
	$(document).ready(function (){
	$('#categorySelectForm').change(function(){
    
    var value = $(this).val();
    alert(value);
    /*if (state_id != ""){
        var post_url = "/index.php/control_form/get_cities/" + state_id;
        $.ajax({
            type: "POST",
             url: post_url,
             success: function(cities) //we're calling the response json array 'cities'
              {
                $('#f_city').empty();
                $('#f_city, #f_city_label').show();
                   $.each(cities,function(id,city) 
                   {
                    var opt = $('<option />'); // here we're creating a new select option for each group
                      opt.val(id);
                      opt.text(city);
                      $('#f_city').append(opt); 
                });
               } //end success
         }); //end AJAX
    } else {
        $('#f_city').empty();
        $('#f_city, #f_city_label').hide();
    }//end if
    */
}); //end change 
});

</script>

<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>New Ad Form</h1>
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

	<?php echo form_open("ad/create", array('class' => 'form-horizontal', 'id' => 'ad-form', 'enctype' => 'multipart/form-data'));?>		
		<div class="form-group">
			<label for="title" class="col-sm-2 control-label label-20">Title</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="title" id="title" placeholder="..." onkeyup="document.getElementById('preview_title').innerHTML = this.value">
			</div>
		</div>
		<div class="form-group">
			<label class="sr-only" for="price">Amount (in dollars)</label>
			<label for="price" class="col-sm-2 control-label label-20">Price</label>
			<div class="input-group col-sm-3 col-sm-offset-2" style="padding: 0 15px;">
				<div class="input-group-addon">$</div>
					<input type="text" class="form-control" name="price" id="price" placeholder="Amount">
				<div class="input-group-addon">.00</div>
			</div>
		</div>
		<div class="form-group" id="categoryForm">
			<label for="category" class="col-sm-2 control-label label-20">Category</label>
			<div class="col-sm-10">
			<select name="category" id="categorySelectForm"> 
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
		<div class="form-group hidden" id="subcategoryForm">
			<label for="sub-category" class="col-sm-2 control-label label-20">Sub-Category</label>
			<div class="col-sm-10">
			<select name="subCategory" id="subCategorySelectForm"> 
				<?php
					foreach($categories->result() as $category)
					{
						echo '<option value="'.$category->category_id.'">'.$category->name.'</option>';
					}
				?>	
			</select>
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-sm-2 control-label label-20">Description</label>
			<div class="col-sm-10">
				<textarea type="text" class="form-control description-box" name="description" id="description" onkeyup="document.getElementById('preview_message').innerHTML = this.value" rows="5"></textarea>
			</div>
		</div>

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
	<hr>
	
	<div class="row">
		<label class="col-sm-2 control-label label-20">Preview</label>
		<div class="col-sm-10">
			<h2 id="preview_title">Title</h2>
			<h3 style="display: inline;">$</h3><h3 id="preview_price" style="display: inline;">Price</h3>
			<p style="padding-top: 10px;" id="preview_message">Message</p>
			<img id="pic1" src="#" alt="your image" />
		</div>
	</div>
	
</div>