
<div class="container padding-top-20">

	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>Edit Group</h1>
		</div>
	</div>

	<hr>

	<div id="infoMessage"><?php echo $message;?></div>

	<h3 class="col-sm-offset-3">Please enter the group information below</h3><br>

	<?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'ad-form'));?>
		
		<div class="form-group">
                  <label for="group_name" class="col-sm-4 control-label label-20">Group Name</label>
                  <div class="col-sm-4">
                        <?php
							$group_name['class'] = 'form-control';
	                        echo form_input($group_name);
	                    ?>
                  </div>
        </div>
		
		<div class="form-group">
                  <label for="group_description" class="col-sm-4 control-label label-20">Description</label>
                  <div class="col-sm-4">
                        <?php
							$group_description['class'] = 'form-control';
	                        echo form_input($group_description);
	                    ?>
                  </div>
        </div>
		
		<div class="form-group">
                  <div class="col-sm-offset-4 col-sm-4">
                        <button type="submit" class="btn btn-default">Save</button>
                  </div>
        </div>

	<?php echo form_close();?>
</div>