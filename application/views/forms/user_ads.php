<div class="container padding-top-20">
	<div class="row">
		<div class="col-xs-12">
			<h1>Woohoo! You have an offer for:</h1>
			<h3><?php echo $ad->title; ?></h3>
		</div>
	</div>
	
	<hr>
	
	<table class="table table-hover">
		<theaad>
			<th>Ad Name</th>
			<th>Price</th>
			<th>Category</th>
			<th>Sub-Category</th>
			<th></th>
		</theaad>
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