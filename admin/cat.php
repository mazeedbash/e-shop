<div id="bodyright">
	<h3>View All categories</h3>
	<form method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<th>Sr No.</th>
				<th>Category name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
				<?php include("inc/function.php"); echo viewall_category(); ?>
		</table>
	</form>
	<h3 id="add_cat">Add New Category From Here</h3>
	<form method="post">
		<table>
			<tr>
				<td>Enter Category Name :</td>
				<td><input type="text" name="cat_name" /> </td>
			</tr>
		</table>
		<center><button name="add_cat">Add Category</button></center>
	</form>
</div>

<?php  echo add_cat(); ?>