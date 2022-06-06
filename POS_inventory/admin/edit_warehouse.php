<?php
	include('session.php');
	
	$id = $_GET['id'];

		$sacc1=mysqli_query($conn,"select * from tblwarehouse where warehouseId='$id'");
		$acc2=mysqli_fetch_array($sacc1);
		$accountUserName=$acc2['warehouseUserName'];




	$name = $_POST['name'];

	$city = $_POST['city'];
	$province = $_POST['province'];
	$telephoneNumber = $_POST['telephoneNumber'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$status = $_POST['status'];	


	mysqli_query($conn,"update tblwarehouse set 
		warehouseName ='$name' , 
		ProvinceId ='$province' , 
		cityId ='$city' ,
		telephoneNumber ='$telephoneNumber',
		warehouseUserName ='$username',
		statusId = $status
		where warehouseId=$id");

		$sacc=mysqli_query($conn,"select * from tblaccount where accountUserName='$accountUserName'");
		$acc=mysqli_fetch_array($sacc);
		$accntId=$acc['accountId'];

		mysqli_query($conn,"update tblaccount set  	accountUserName='$username' ,accountStatus =$status where 
			accountId=$accntId");


	if($password != "d41d8cd98f00b204e9800998ecf8427e"){
		mysqli_query($conn,"update tblaccount set 
		accountPassword='$password'
		where accountId=$accntId");
	}

		?>
		<script>
			window.alert('Warehouse updated successfully!');
			window.history.back();

		</script>
	<?php

echo "$accntId";
	?>