<?php
	include('session.php');
	
	$productId=get_lastId_tblproduct();
	$category=$_POST['Category'];
	$subcategory=$_POST['Subcategory'];
	$name=$_POST['name'];
	$price=$_POST['price'];
	$supplier= 	$userId;
	$status = 1;
	
	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	
	if (empty($_FILES["image"]["name"])){
		$location="";
	}
	else{
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location="";
			?>
				<script>
					window.alert('Photo not added. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}



		global $conn;
		$sql = "SELECT supplierId FROM tblsupplier WHERE supplierName = '$supplier'";
		$pq=mysqli_query($conn,$sql);
		while ($row =mysqli_fetch_array($pq)) {
			$supplier=$row['supplierId'];
		}
	
		$sql = "INSERT INTO `tblproduct` (`productId`, `categoryId`, `subCategoryId`, `description`, `price`, `productImage`, `supplierId`, `statusId`) VALUES ($productId,$category,$subcategory,'$name',$price,'$location',$supplier,$status);";
	  mysqli_query($conn, $sql);

	  mysqli_query($conn,"INSERT INTO tblinventory(productId,stock) values ($productId, 0)");

	?>
		<script>
			window.alert('Product added successfully!');
			window.history.back();
		</script>
	<?php

	function get_lastId_tblproduct()
	{
		global $conn;
		$newID = 0;
	     $results = mysqli_query($conn, "SELECT productId FROM tblproduct order by productId;");
	         while ($result = mysqli_fetch_array($results)) {
	         $newID = $result['productId'];
	       }
	      $newID++;
	      return $newID;
	}

?>