<div id="bodyleft">
	<h3>Content Management</h3>

	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="index.php?viewall_cat">ViewAll Categories</a></li>
		<li><a href="index.php?viewall_sub_cat">ViewAll Sub-Categories</a></li>
		<li><a href="index.php?add_products">Add New Products</a></li>
		<li><a href="index.php?viewall_products">viewall Products</a></li>
	</ul>
		
</div><!-- end of body left -->

<?php
	if (isset($_GET['viewall_cat'])) {
		include("cat.php");
	}
	if (isset($_GET['viewall_sub_cat'])) {
		include("sub_cat.php");
	}
	if (isset($_GET['viewall_products'])) {
		include("viewall_products.php");
	}
	if (isset($_GET['add_products'])) {
		include("add_products.php");
	}
?>