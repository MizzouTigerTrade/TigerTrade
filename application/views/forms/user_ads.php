<div class="container padding-top-20">
<div class="container-border">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<h1>Ad Management</h1>
		</div>
	</div>
	
	<hr>
	
	<div style="padding: 0 15px;">
	<table class="table table-hover">
		<thead>
			<th>Ad Name</th>
			<th>Price</th>
			<th>Category</th>
			<th>Sub-Category</th>
			<th></th>
		</thead>
		<tbody>
	<?php
	foreach($ads as $ad)
	{
		echo '<tr>';
			echo '<td>'.$ad['title'].'</td>';
			echo '<td>'.$ad['price'].'</td>';
			echo '<td>'.$ad['category'].'</td>';
			echo '<td>'.$ad['subCategory'].'</td>';
			echo '<td><a href="'.base_url('ad/edit/'.$ad['ad_id']).'">Edit</a> | <a href="'.base_url('ad/delete/'.$ad['ad_id']).'">Delete</a></td>';
		echo '</tr>';
	}
	?>
		</tbody>
	
	
	</table>
	</div>
</div>
</div>