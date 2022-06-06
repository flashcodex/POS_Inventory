<?php
	
	include('session.php');
	$id=$_GET['id'];
	
	$p=mysqli_query($conn,"select * from tblproduct where productid='$id'");
	$prow=mysqli_fetch_array($p);
	
	$name=$_POST['name'];
	$category=$_POST['Category'];
	$subcategory=$_POST['Subcategory'];
	$supplier=$_POST['supplier'];
	$price=$_POST['price'];
	
	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	
	if (empty($_FILES["image"]["name"])){
		$location=$prow['productImage'];
	}
	else{
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location=$prow['photo'];
			?>
				<script>
					window.alert('Photo not updated. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}
	
	mysqli_query($conn,"update tblproduct set description='$name', categoryId= $category, subCategoryId = $subcategory, supplierId=$supplier, price = $price , productImage='$location' where productid=$id");

	?>
		<script>
			window.alert('Product updated successfully!');
			window.history.back();
		</script>
	<?php

?>