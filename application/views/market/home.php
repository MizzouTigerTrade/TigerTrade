<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-table.min.js') ?>"></script>
<script type="text/javascript">

function queryParams() {
    return {
        type: 'owner',
        sort: 'updated',
        direction: 'desc',
        per_page: 100,
        page: 1
    };
  }
  
  function imageFormatter(value) {
    if(value == null)
    {
      return '<img class="img-thumbnail" src="http://thetigertrade.com/assets/Images/defaultImage.jpg" alt="" width="100%" height="100%">';
    }
    else
    {
      var link = "<?php echo base_url(); ?>" + value;
      var defaultLink = "http://thetigertrade.com/assets/Images/defaultImage.jpg";
      return '<img class="img-thumbnail" src="'+link+'" onerror="this.src='+defaultLink+'" alt="" width="100%" height="100%">';
    }
   }

   function tagFormatter(value) {
    var string = "";
    var array = value.split(",");
    for (index = 0; index < array.length; ++index) {
      string = string + '<span class="label label-default">' + array[index] + '</span> ';
    }
    return string;
   }
</script>

<div class="container padding-top-20">
<div class="container-border">
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<h1>Market: <?php echo $market_name; ?></h1>
		</div>
	</div>
	
	<hr>
	
	<div style="padding: 0 15px;">
	<?php if ($message != "") { ?>
      <div id="infoMessage">
		<div class="alert alert-info" role="alert" style="margin-top: 10px;">
		  <span class="sr-only">Error:</span>
		  <?php echo $message;?>
		</div>
	  </div>
	<?php } ?>
	</div>
	
	<div class="row">
		<div class="col-xs-12" id="market_background">
			
			<div class="col-xs-12">
				
				<!-- SMALL+ Screen Menu -->
				<div class="row hidden-xs text-center">
					<div class="col-sm-3 col-md-offset-1">
						<select class="form-control input-sm" id="categorySelectForm" name="category"> 
							<option value="">Select Category</option>
							<?php
								foreach($categories->result() as $cat) { ?>
									<option value="<?php echo base_url('market/index/') . '/' . $cat->category_id;?>  " <?php if ($category_id == $cat->category_id) { ?>selected<?php } ?>><?php echo $cat->name; ?></option>	
							<?php } ?>	
						</select>
					</div>
					<div class="col-sm-3">
						<select class="form-control input-sm" id="subCategory" name="subCategory">
							<option value="">Select Subcategory</option>
							<?php
								foreach($subcategories->result() as $subcat) { ?>
								<?php if ($subcat->category_id == $category_id) { ?>
									<option value="<?php echo base_url('market/index/') . '/' . $category_id . '/' . $subcat->subcategory_id;?>"<?php if ($subcategory_id == $subcat->subcategory_id) { ?>selected<?php } ?>><?php echo $subcat->name; ?></option>	
								<?php } ?>
							<?php } ?>	
						</select>
					</div>
					<div class="col-sm-6 col-md-4 text-right">
						<div class="btn-group">
							<a class="btn btn-default btn-sm" href="<?php echo base_url('/ad/new_ad') ?>">New Ad</a>
							<?php if ($this->ion_auth->is_admin()) { ?>
							<a class="btn btn-default btn-sm" href="<?php echo base_url('/admin/new_category') ?>">New Category</a>
							<a class="btn btn-default btn-sm" href="<?php echo base_url('/admin/new_subcategory') ?>">New Subcategory</a>
							<?php } ?>
						</div>
					</div>
				</div>
				
				<!-- EXTRA SMALL Screen Menu -->
				<div class="row visible-xs">
					<div class="col-xs-12">
						<select class="form-control input-sm" id="categorySelectFormSmall" name="category"> 
							<option value="">Select Category</option>
							<?php
								foreach($categories->result() as $cat) { ?>
									<option value="<?php echo base_url('market/index/') . '/' . $cat->category_id;?>  " <?php if ($category_id == $cat->category_id) { ?>selected<?php } ?>><?php echo $cat->name; ?></option>	
							<?php } ?>	
						</select>
					</div>
					<div class="col-xs-12" style="margin: 5px 0 20px 0;">
						<select class="form-control input-sm" id="subCategorySmall" name="subCategory">
							<option value="">Select Subcategory</option>
							<?php
								foreach($subcategories->result() as $subcat) { ?>
								<?php if ($subcat->category_id == $category_id) { ?>
									<option value="<?php echo base_url('market/index/') . '/' . $category_id . '/' . $subcat->subcategory_id;?>"<?php if ($subcategory_id == $subcat->subcategory_id) { ?>selected<?php } ?>><?php echo $subcat->name; ?></option>	
								<?php } ?>
							<?php } ?>	
						</select>
					</div>
					<div class="col-xs-12">
						<a class="btn btn-default btn-sm wide-button" href="<?php echo base_url('/ad/new_ad') ?>">Place an Ad</a><br>
						<?php if ($this->ion_auth->is_admin()) { ?>
						<a class="btn btn-default btn-sm wide-button" href="<?php echo base_url('/admin/new_category') ?>">Create a Category</a><br>
						<a class="btn btn-default btn-sm wide-button" href="<?php echo base_url('/admin/new_subcategory') ?>">Create a Subcategory</a>
						<?php } ?>
					</div>
				</div>

				<!-- custom search bar -->
				<div id="custom-search-input" style="margin-top: 10px">
                    <div class="input-group col-sm-12 col-md-10 col-md-offset-1">
                        <input type="text" class="search-query input-sm form-control" id="filter" placeholder="Search" />
                        <span class="input-group-btn">
                            <button class="btn btn-warning" type="button" style="background-color: rgb(238, 179, 40);">
                                <span class=" glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
                
                
				<!-- Display Ads: rows of 1 -->
				<br>
				
				<table data-toggle="table"
			       data-url="<?php echo base_url('json/getJson2');?>"
			       data-query-params="queryParams"
			       data-pagination="true"
			       data-search="true"
			       data-height="700">
			    <thead>
			    <tr>
			        <th data-field="ad_id">Ad id</th>
			        <th data-field="image" data-formatter="imageFormatter">Image</th>
			        <th data-field="title">title</th>
			        <th data-field="tags" data-formatter="tagFormatter">tags</th>
			        <th data-field="description">Description</th>
			    </tr>
			    </thead>
			</table>
			</div>
		</div>
	</div>
</div>
</div>