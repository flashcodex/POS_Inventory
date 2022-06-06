<?php
	include('session.php');
	
	$id=$_GET['id'];
	global $conn;

	$use=mysqli_query($conn,"SELECT * from tblwarehouse where warehouseId=$id");
	$urow=mysqli_fetch_array($use);
	$warehouseUserName=$urow['warehouseUserName'];


	


	mysqli_query($conn,"UPDATE tblaccount set accountStatus='2' where accountUserName='$warehouseUserName'");
	mysqli_query($conn,"UPDATE tblwarehouse set statusId='2' where warehouseId='$id'");
	header('location:warehouse.php');

?>