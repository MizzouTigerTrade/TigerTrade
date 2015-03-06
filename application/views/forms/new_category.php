
<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>New Category</h1>
		</div>
	</div>
	
	<hr>
	
	<?php if(isset($created)) {?>
	    <div class="alert alert-success">
	        <a href="#" class="close" data-dismiss="alert">&times;</a>
	        <strong>Success!</strong> New Category Added
	    </div>
    <?php }?>
    <?php if(isset($error)) {?>
	    <div class="alert alert-danger">
	        <a href="#" class="close" data-dismiss="alert">&times;</a>
	        <strong>Error!</strong> Category was not added. <?php echo $error; ?>
	    </div>
    <?php }?>

	<?php echo form_open("market/new_category", array('class' => 'form-horizontal', 'id' => 'ad-form', 'enctype' => 'multipart/form-data'));?>	
		
		<div class="form-group">
			<label for="list" class="col-sm-3 control-label label-20">Categories</label>
			<div class="col-sm-6">
				<select size="<?php echo sizeof($categories->result()); ?>" class="form-control" id="list" >
				<?php 
					foreach($categories->result() as $category):
					echo "<option disabled>" . $category->name . "</option>";
					endforeach; 
				?>
				</select>
			</div>
		</div>
		
		<hr>
		
		<div class="form-group">
			<label for="category_name" class="col-sm-3 control-label label-20">Category Name</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" name="category_name" id="category_name" required>
			</div>
		</div>
		
		<div class="form-group">
			<label for="category_description" class="col-sm-3 control-label label-20">Description</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" name="category_description" id="category_description" placeholder="">
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-default">Add</button>
			</div>
		</div>
	<?php echo form_close();?>
	
	
</div>