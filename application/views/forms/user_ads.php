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