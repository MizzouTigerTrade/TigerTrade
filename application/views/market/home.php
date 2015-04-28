<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript">

$(document).ready(function(){
    $("#filter").keyup(function(){
 		$("#emptySearch").hide();
        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(), count = 0;
        // Loop through the comment list
        $(".ad_display").each(function(){
            // If the list item does not contain the text phrase fade it out
            if ($(this).find('.search').text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
 
            // Show the list item if the phrase matches and increase the count by 1
            } else {
            	count++;
                $(this).show();
            }
        });

        if(count == 0)
        {
        	$("#emptySearch").html("There are no ads that match your search results");
        	$("#emptySearch").show();
        }
        // Update the count
        var numberItems = count;
        $("#filter-count").text("Number of Comments = "+count);
    });

	$(function(){
      // bind change event to select
      $('#categorySelectForm').bind('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });

    $(function(){
      // bind change event to select
      $('#subCategory').bind('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
	
	$(function(){
      // bind change event to select
      $('#categorySelectFormSmall').bind('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });

    $(function(){
      // bind change event to select
      $('#subCategorySmall').bind('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
});
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
				
				<div class="row" style="padding-bottom: 15px;" id="emptySearch"></div>
				<?php if(count($ads->result()) == 0)
					{ ?>
						<div class="row">No ads available.</div>
				<?php } ?>
				<?php foreach ($ads->result() as $row) { ?>
				<a href="<?php echo base_url('/ad/details/' . $row->ad_id) ?>">
					
					<div class="row ad_display" style="padding-bottom: 15px;" id="<?= $row->ad_id ?>">
						<div class="" style="margin-top: 20px; margin-bottom: 20px;">
							
							<div class="col-xs-3 col-md-2 col-md-offset-1">
							<?php 	
									$flag = 0;
									foreach($images->result() as $img) { 
										if($img->ad_id == $row->ad_id && $flag == 0)
										{
											$image_link = base_url('/'.$img->image_path);
											$flag++;
										}
									}
									
									if($flag == 0) { ?> 
									<img class="img-thumbnail" src="http://thetigertrade.com/assets/Images/defaultImage.jpg" alt="" width="100%" height="100%">
								<?php } else { ?>
									<img class="img-thumbnail" src="<?php echo $image_link; ?>" onerror="this.src='http://thetigertrade.com/assets/Images/defaultImage.jpg'" width="100%" height="100%">
							<?php } ?>
							</div>
							
							<div class="col-xs-9 col-md-8 search">
								<h4 class="media-heading"><?php echo $row->title; ?>: $<?php echo $row->price; ?></h4>
								<div class="row">
									<div class="col-xs-12">
								<?php
								foreach($tags->result() as $tag) { 
									if($tag->ad_id == $row->ad_id)
									{
										echo '<span class="label label-default">' . $tag->description . '</span> ';
									}
								}
								?>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12" style="margin-top: 5px;">
										<?php echo $row->description; ?>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
				</a>
				<? } ?>
			</div>
		</div>
	</div>
</div>
</div>