<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-3 col-sm-2 text-center">
			<div class="back-button"><button class="btn btn-default" onclick="goBack()">Back</button></div>
		</div>
		<div class="col-xs-9 col-sm-10">
			<h1>Create Group</h1>
		</div>
	</div>
	
      <hr>
      <?php if ($message != "") { ?>
      <div id="infoMessage">
		<div class="alert alert-info" role="alert" style="margin-top: 10px;">
		  <span class="sr-only">Error:</span>
		  <?php echo $message;?>
		</div>
	  </div>
	  <?php }; ?>
      

      <?php echo form_open("auth/login", array('class' => 'form-horizontal', 'id' => 'ad-form'));?>
            <div class="form-group">
                  <label for="group_name" class="col-sm-3 control-label label-20">Group Name</label>
                  <div class="col-sm-6">
                        <?php
	                         $data = array(
					          'name'        => 'group_name',
					          'id'          => 'group_name',
					          'class'       => 'form-control'
					        );
	                        echo form_input($data);
	                    ?>
                  </div>
            </div>
            <div class="form-group">
                  <label for="description" class="col-sm-3 control-label label-20">Description</label>
                  <div class="col-sm-6">
                        <?php
	                         $data = array(
					          'name'        => 'description',
					          'id'          => 'description',
					          'class'       => 'form-control',
					          'rows'		=> '3',
					          'style'		=> 'style="resize: none;"'
					        );
	                        echo form_textarea($data);
	                    ?>
                  </div>
            </div>
			<div class="form-group">
                  <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">Create Group</button>
                  </div>
            </div>
      <?php echo form_close();?>
</div>