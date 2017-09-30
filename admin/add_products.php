<div id="bodyright">
	<h3>Add New Product From Here</h3>
	<form method="post" enctype="multipart/form-data" >
		<table>
			<tr>
				<td>Enter product Name :</td>
				<td><input type="text" name="pro_name" /> </td>
			</tr>
			<tr>
				<td>Select Category Name :</td>
				<td><select name="cat_name"> <?php include("inc/function.php"); echo viewall_cat(); ?> </select></td>
			</tr>
			<tr>
				<td>Select SubCategory Name :</td>
				<td><select name="sub_cat_name"> <?php echo viewall_sub_cat(); ?> </select></td>
			</tr>
			<tr>
				<td>Select product image 1 :</td>
				<td><input type="file" name="avatar" /> </td>
			</tr>
			<tr>
				<td>Select product image 2 :</td>
				<td><input type="file" name="avatar2" /> </td>
			</tr>
			<tr>
				<td>Select product image 3 :</td>
				<td><input type="file" name="three" /> </td>
			</tr>
			<tr>
				<td>Select product image 4 :</td>
				<td><input type="file" name="avat" /> </td>
			</tr>
			<tr>
				<td>Enter Feature1 :</td>
				<td><input type="text" name="pro_feature1" /> </td>
			</tr>
			<tr>
				<td>Enter Feature2 :</td>
				<td><input type="text" name="pro_feature2" /> </td>
			</tr>
			<tr>
				<td>Enter Feature3 :</td>
				<td><input type="text" name="pro_feature3" /> </td>
			</tr>
			<tr>
				<td>Enter Feature4 :</td>
				<td><input type="text" name="pro_feature4" /> </td>
			</tr>
			<tr>
				<td>Enter Feature5 :</td>
				<td><input type="text" name="pro_feature5" /> </td>
			</tr>
			<tr>
				<td>Enter Price :</td>
				<td><input type="text" name="pro_price" /> </td>
			</tr>
			<tr>
				<td>Enter Model :</td>
				<td><input type="text" name="pro_model" /> </td>
			</tr>
			<tr>
				<td>Enter Warranty :</td>
				<td><input type="text" name="pro_warranty" /> </td>
			</tr>
			<tr>
				<td>Enter keywprd  :</td>
				<td><input type="text" name="pro_keyword" /> </td>
			</tr>
		</table>
		<center><button name="add_product">Add Product</button></center>
	</form>
</div>

<?php echo add_pro(); ?>