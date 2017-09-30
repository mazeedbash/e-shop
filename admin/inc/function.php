<?php
	function add_cat(){
		include("inc/db.php");
		if (isset($_POST['add_cat'])) {
			$cat_name = $_POST['cat_name'];
			$add_name = $con->prepare("insert into main_cat(cat_name) values ('$cat_name')");

			if ($add_name->execute()) {
				echo "<script> alert ('Categorry added successfully !!!'); </script>";
			}else{
				echo "<script> alert ('Categorry  not added !!!'); </script>";
			}
		}
	}

	function add_sub_cat() {
		include("inc/db.php");
		if (isset($_POST['add_sub_cat'])) {
			$cat_id = $_POST['main_cat'];
			$sub_cat_name = $_POST['sub_cat_name'];

			$add_sub_cat = $con->prepare("insert into sub_cat(sub_cat_name, cat_id) values ('$sub_cat_name', '$cat_id')");

			if ($add_sub_cat->execute()) {
				echo "<script> alert ('Sub Categorry added successfully !!!'); </script>";
			}else{
				echo "<script> alert ('Sub Categorry  not added !!!'); </script>";
			}
		}
	}

	function add_pro() {
		include("inc/db.php");
		if (isset($_POST['add_product'])) {
		$pro_name= $_POST['pro_name'];
		$cat_id = $_POST['cat_name'];
		$sub_cat_id = $_POST['sub_cat_name'];

		$img1 = $_FILES['avatar']['name'];
		$img1_tmp = $_FILES['avatar']['tmp_name'];

		$img2 = $_FILES['avatar2']['name'];
		$img2_tmp = $_FILES['avatar2']['tmp_name'];

		$img3 = $_FILES['three']['name'];
		$img3_tmp = $_FILES['three']['tmp_name'];

		$img4 = $_FILES['avat']['name'];
		$img4_tmp = $_FILES['avat']['tmp_name'];

		move_uploaded_file($img1_tmp, "../imgs/pro_img/$img1");
		move_uploaded_file($img2_tmp, "../imgs/pro_img/$img2");
		move_uploaded_file($img3_tmp, "../imgs/pro_img/$img3");
		move_uploaded_file($img4_tmp, "../imgs/pro_img/$img4");

		$pro_feature1 = $_POST['pro_feature1'];
		$pro_feature2 = $_POST['pro_feature2'];
		$pro_feature3 = $_POST['pro_feature3'];
		$pro_feature4 = $_POST['pro_feature4'];
		$pro_feature5 = $_POST['pro_feature5'];

		$pro_price = $_POST['pro_price'];
		$pro_model= $_POST['pro_model'];
		$pro_warranty = $_POST['pro_warranty'];
		$pro_keyword = $_POST['pro_keyword'];

		$add_pro = $con->prepare("insert into products
			(pro_name, cat_id, sub_cat_id, pro_img1, pro_img2, pro_img3, pro_img4, pro_feature1, pro_feature2, pro_feature3, pro_feature4, pro_feature5, pro_price, pro_model, pro_warranty, pro_keyword, pro_added_date) 
			values 
			('$pro_name', '$cat_id', '$sub_cat_id', '$img1', '$img2', '$img3', '$img4', '$pro_feature1', '$pro_feature2', '$pro_feature3', '$pro_feature4', '$pro_feature5', '$pro_price', '$pro_model', '$pro_warranty', '$pro_keyword', now() )");
		if ($add_pro->execute()) {
			echo "<script> alert ('Categorry added successfully !!!'); </script>";
			}else{
				echo "<script> alert ('Categorry  not added !!!'); </script>";
			}
		}
	}

	function viewall_cat() {
		include("inc/db.php");
		$fetch_cat = $con->prepare("SELECT * from main_cat");
		$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$fetch_cat->execute();
		while ($row = $fetch_cat->fetch()) :
			echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
		
		endwhile;
	}

	function viewall_sub_category() {
		include("inc/db.php");
		$fetch_cat = $con->prepare("SELECT * from sub_cat");
		$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$fetch_cat->execute();
		$i = 1;
		while ($row = $fetch_cat->fetch()) :
			echo "<tr>
			<td>".$i++."</td>
			<td>".$row['sub_cat_name']."</td>
			<td><a href='index.php?edit_sub_cat=".$row['sub_cat_id']."'>Edit</a></td>
			<td><a href='delete_cat.php?delete_sub_cat=".$row['sub_cat_id']."'>Delete</a></td>
			</tr>";
		
		endwhile;
	}

	function viewall_products(){
		include("inc/db.php");
		$fetch_pro = $con->prepare("SELECT * FROM products");
		$fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
		$fetch_pro->execute();
		$i=1;

		while ($row = $fetch_pro->fetch()):
			echo "<tr>
					<td>".$i++."</td>
					<td><a href ='index.php?edit_pro=".$row['pro_id']."'>Edit</a></td>
					<td><a href ='delete_cat.php?delete_pro=".$row['pro_id']."'>Delete</a></td>
					<td style='min-width:200px'>".$row['pro_name']."</td>
					<td style='min-width:200px'>
						<img src='../imgs/pro_img/".$row['pro_img1']."' />
						<img src='../imgs/pro_img/".$row['pro_img2']."' />
						<img src='../imgs/pro_img/".$row['pro_img3']."' />
						<img src='../imgs/pro_img/".$row['pro_img4']."' />
					</td>
					<td>".$row['pro_feature1']."</td>
					<td>".$row['pro_feature2']."</td>
					<td>".$row['pro_feature3']."</td>
					<td>".$row['pro_feature4']."</td>
					<td>".$row['pro_feature5']."</td>
					<td>".$row['pro_price']."</td>
					<td>".$row['pro_model']."</td>
					<td>".$row['pro_warranty']."</td>
					<td>".$row['pro_keyword']."</td>
					<td style='min-width:200px'>".$row['pro_added_date']."</td>
				</tr>";
		endwhile;
	}

	function viewall_category() {
		include("inc/db.php");
		$fetch_cat = $con->prepare("SELECT * from main_cat");
		$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$fetch_cat->execute();
		$i = 1;
		while ($row = $fetch_cat->fetch()) :
			echo "<tr>
			<td>".$i++."</td>
			<td>".$row['cat_name']."</td>
			<td><a href='index.php?edit_cat=".$row['cat_id']."'>Edit</a></td>
			<td><a href='delete_cat.php?delete_cat=".$row['cat_id']."'>Delete</a></td>
			</tr>";
		
		endwhile;
	}

	function viewall_sub_cat() {
		include("inc/db.php");
		$fetch_sub_cat = $con->prepare("SELECT * from sub_cat");
		$fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$fetch_sub_cat->execute();
		while ($row = $fetch_sub_cat->fetch()) :
			echo "<option value='".$row['cat_id']."'>".$row['sub_cat_name']."</option>";
		
		endwhile;
	}

	function edit_cat() {
		include("inc/db.php");
		if (isset($_GET['edit_cat'])) {
			$cat_id = $_GET['edit_cat'];

			$fetch_cat_name = $con->prepare("SELECT * FROM main_cat WHERE cat_id = $cat_id");
			$fetch_cat_name->setFetchMode(PDO::FETCH_ASSOC);
			$fetch_cat_name->execute();
			$row = $fetch_cat_name->fetch();

			echo "<form method='post'>
				<table>
					<tr>
						<td>Update Category Name :</td>
						<td><input type='text' name='up_cat_name' value='".$row['cat_name']."' /> </td>
					</tr>
				</table>
				<center><button name='update_cat'>Update Category</button></center>
			</form>";

			if (isset($_POST['update_cat'])) {
				$up_cat_name = $_POST['up_cat_name'];
				$update_cat = $con->prepare("UPDATE main_cat SET cat_name = '$up_cat_name' WHERE cat_id = $cat_id");
				if ($update_cat->execute()) {
					echo "<script>alert('category updated successfully');</script>";
					echo "<script> window.open('index.php?viewall_cat','_self'); </script>";
				}
			}
		}
	}

	function edit_sub_cat(){
		include("inc/db.php");
		if (isset($_GET['edit_sub_cat'])) {
			$sub_cat_id = $_GET['edit_sub_cat'];

			$fetch_sub_cat=$con->prepare("SELECT * FROM sub_cat WHERE sub_cat_id = $sub_cat_id");
			$fetch_sub_cat->setFetchMode(PDO::FETCH_ASSOC);
			$fetch_sub_cat->execute();
			$row=$fetch_sub_cat->fetch();
			$cat_id = $row['cat_id'];

			$fetch_cat=$con->prepare("SELECT * FROM main_cat WHERE cat_id = $cat_id");
			$fetch_cat->setFetchMode(PDO::FETCH_ASSOC);
			$fetch_cat->execute();
			$row_cat=$fetch_cat->fetch();
			// echo $row['sub_cat_name'];
			echo "<form method = 'post'>
				<table>
					<tr>
						<td>Select main Category Name : <td>
						<td>
							<select name='main_cat'>
								<option value='".$row_cat['cat_id']."'>".$row_cat['cat_name']."</option>";
								echo viewall_cat();
							echo "</select>
						</td>
					</tr>
					<tr>
						<td>Update Sub_Category Name : <td>
						<td><input type='text' value='".$row['sub_cat_name']."' name = 'up_sub_cat' /></td>
					</tr>
					<center><button name='update_sub_cat'>Update Category</button></center>
				</table>
			</form>";

			if (isset($_POST['update_sub_cat'])) {
				$cat_name = $_POST['main_cat'];
				$sub_cat_name = $_POST['up_sub_cat'];

				$update_cat=$con->prepare("UPDATE sub_cat SET sub_cat_name = '$sub_cat_name', cat_id = '$cat_name'  WHERE sub_cat_id = '$sub_cat_id'");
				if ($update_cat->execute()) {
					echo "<script>alert('Sub_Category Updated successfully')</script>";
					echo "<script>window.open('index.php?viewall_sub_cat','_self'); </script>";
				}
			}
		}
	}

	function edit_pro(){
		include("inc/db.php");

		if (isset($_GET['edit_pro'])) {
			$pro_id=$_GET['edit_pro'];

			$fetch_pro=$con->prepare("SELECT * FROM products WHERE pro_id = '$pro_id'");
			$fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
			$fetch_pro->execute();

			$row=$fetch_pro->fetch();
			$cat_id = $row['cat_id'];
			$sub_cat_id=$row['sub_cat_id'];

			$fetch_cat=$con->prepare("SELECT * FROM main_cat WHERE cat_id = '$cat_id'");
			$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$fetch_cat->execute();
			$row_cat=$fetch_cat->fetch();
			$cat_name=$row_cat['cat_name'];

			$fetch_sub_cat=$con->prepare("SELECT * FROM sub_cat WHERE sub_cat_id = '$sub_cat_id'");
			$fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$fetch_sub_cat->execute();
			$row_sub_cat=$fetch_sub_cat->fetch();
			$sub_cat_name=$row_sub_cat['sub_cat_name'];


			echo "<form method='post' enctype='multipart/form-data' >
				<table>
					<tr>
						<td>Update product Name :</td>
						<td><input type='text' name='pro_name' value='".$row['pro_name']."' /> </td>
					</tr>
					<tr>
						<td>Update Category Name :</td>
						<td>
							<select name='cat_name'>
								<option value='".$row['cat_id']."'>".$cat_name."</option>
								"; echo viewall_cat(); echo "
							</select>
						</td>
					</tr>
					<tr>
						<td>Update SubCategory Name :</td>
						<td>
							<select name='sub_cat_name'>
								<option value='".$row['cat_id']."'>".$sub_cat_name."</option>
								"; echo viewall_sub_cat(); echo "
							</select>
						</td>
					</tr>
					<tr>
						<td>Update product image 1 :</td>
						<td>
							<input type='file' name='avatar' /> 
							<img src= '../imgs/pro_img/".$row['pro_img1']."' style='width: 60px; height:60px' />
						</td>
					</tr>
					<tr>
						<td>Update product image 2 :</td>
						<td>
							<input type='file' name='avatar2' /> 
							<img src= '../imgs/pro_img/".$row['pro_img2']."' style='width: 60px; height:60px' />
						</td>
					</tr>
					<tr>
						<td>Update product image 3 :</td>
						<td>
							<input type='file' name='three' /> 
							<img src= '../imgs/pro_img/".$row['pro_img3']."' style='width: 60px; height:60px' />
						</td>
					</tr>
					<tr>
						<td>Update product image 4 :</td>
						<td>
							<input type='file' name='avat' /> 
							<img src= '../imgs/pro_img/".$row['pro_img4']."' style='width: 60px; height:60px' />
						</td>
					</tr>
					<tr>
						<td>Update Feature1 :</td>
						<td><input type='text' name='pro_feature1' value= '".$row['pro_feature1']."' /> </td>
					</tr>
					<tr>
						<td>Update Feature2 :</td>
						<td><input type='text' name='pro_feature2' value= '".$row['pro_feature2']."' /> </td>
					</tr>
					<tr>
						<td>Update Feature3 :</td>
						<td><input type='text' name='pro_feature3' value= '".$row['pro_feature3']."' /> </td>
					</tr>
					<tr>
						<td>Update Feature4 :</td>
						<td><input type='text' name='pro_feature4' value= '".$row['pro_feature4']."' /> </td>
					</tr>
					<tr>
						<td>Update Feature5 :</td>
						<td><input type='text' name='pro_feature5' value= '".$row['pro_feature5']."' /> </td>
					</tr>
					<tr>
						<td>Update Price :</td>
						<td><input type='text' name='pro_price' value= '".$row['pro_price']."' /> </td>
					</tr>
					<tr>
						<td>Update Model :</td>
						<td><input type='text' name='pro_model' value= '".$row['pro_model']."' /> </td>
					</tr>
					<tr>
						<td>Update Warranty :</td>
						<td><input type='text' name='pro_warranty' value= '".$row['pro_warranty']."' /> </td>
					</tr>
					<tr>
						<td>Update keywprd  :</td>
						<td><input type='text' name='pro_keyword' value= '".$row['pro_keyword']."' /> </td>
					</tr>
				</table>
				<center><button name='up_product'>Edit Product</button></center>
			</form>";

			if (isset($_POST['up_product'])) {
				$pro_name= $_POST['pro_name'];
				$cat_id = $_POST['cat_name'];
				$sub_cat_id = $_POST['sub_cat_name'];

				$img1 = $_FILES['avatar']['name'];
				$img1_tmp = $_FILES['avatar']['tmp_name'];

				$img2 = $_FILES['avatar2']['name'];
				$img2_tmp = $_FILES['avatar2']['tmp_name'];

				$img3 = $_FILES['three']['name'];
				$img3_tmp = $_FILES['three']['tmp_name'];

				$img4 = $_FILES['avat']['name'];
				$img4_tmp = $_FILES['avat']['tmp_name'];

				move_uploaded_file($img1_tmp, "../imgs/pro_img/$img1");
				move_uploaded_file($img2_tmp, "../imgs/pro_img/$img2");
				move_uploaded_file($img3_tmp, "../imgs/pro_img/$img3");
				move_uploaded_file($img4_tmp, "../imgs/pro_img/$img4");

				$pro_feature1 = $_POST['pro_feature1'];
				$pro_feature2 = $_POST['pro_feature2'];
				$pro_feature3 = $_POST['pro_feature3'];
				$pro_feature4 = $_POST['pro_feature4'];
				$pro_feature5 = $_POST['pro_feature5'];

				$pro_price = $_POST['pro_price'];
				$pro_model= $_POST['pro_model'];
				$pro_warranty = $_POST['pro_warranty'];
				$pro_keyword = $_POST['pro_keyword'];

				$update_product=$con->prepare("UPDATE products SET pro_name = '$pro_name', cat_id='$cat_id', sub_cat_id='$sub_cat_id', pro_img1='$img1', pro_img2='$img2', pro_img3='$img3', pro_img4='$img4', pro_feature1='$pro_feature1', pro_feature2='$pro_feature2', pro_feature3='$pro_feature3', pro_feature4='$pro_feature4', pro_feature5='$pro_feature5', pro_price='$pro_price', pro_model='$pro_model', pro_warranty='$pro_warranty', pro_keyword='$pro_keyword' WHERE pro_id= '$pro_id'");
				if ($update_product->execute()) {
					echo "<script>alert('Product Updated successfully !!!'); </script>";
					echo "<script>window.open('index.php?viewall_products','_self'); </script>";
				}else{
					echo "<script>alert('abc'); </script>";
				}
			}
		}
	}

	function delete_cat(){
		include("inc/db.php");

		$delete_cat_id=$_GET['delete_cat'];

		$delete_cat=$con->prepare("DELETE FROM main_cat WHERE cat_id='$delete_cat_id'");
		if ($delete_cat->execute()) {
			echo "<script>alert('category deleted successfully !!!'); </script>";
			echo "<script>window.open('index.php?viewall_cat','_self'); </script>";
		}

	}

	function delete_sub_cat(){
		include("inc/db.php"); 
	if (isset($_GET['delete_cat'])) {
		echo delete_cat();
	}
		$delete_sub_cat_id=$_GET['delete_sub_cat'];

		$delete_sub_cat=$con->prepare("DELETE FROM sub_cat WHERE sub_cat_id='$delete_sub_cat_id'");
		if ($delete_sub_cat->execute()) {
			echo "<script>alert('Sub category deleted successfully !!!'); </script>";
			echo "<script>window.open('index.php?viewall_cat','_self'); </script>";
		}
	}

	function delete_product(){
		include("inc/db.php");

		$delete_product_id = $_GET['delete_pro'];

		$delete_pro =$con->prepare("DELETE FROM products WHERE pro_id = '$delete_product_id");	

		if ($delete_pro ->execute()) {
			echo "<script>alert('Product deleted successfully !!!'); </script>";
			echo "<script>window.open('index.php?viewall_products','_self'); </script>";
		}else{
			echo "nothing happended";
		}

	}