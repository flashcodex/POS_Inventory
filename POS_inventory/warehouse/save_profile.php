<?php
	include('session.php');
	
	$id = $_GET['id'];

	$name = $_POST['name'];
	$province = $_POST['province'];
	$city = $_POST['city'];
	$contact = $_POST['contact'];

	


	mysqli_query($conn,"update tblwarehouse set 
		warehouseName ='$name',
		ProvinceId ='$province' , 
		cityId ='$city' ,
		telephoneNumber ='$contact'
		 where warehouseId=$id");
	
	?>
		<script>
			window.alert('Warehouse updated successfully!');
			window.history.back();
		</script>
