<?php
	include('session.php');
	
	$id=$_GET['id'];
	$use=mysqli_query($conn,"SELECT * from tblsupplier where supplierId=$id");
	$urow=mysqli_fetch_array($use);
	$supplierUserName=$urow['supplierUserName'];

	
	
	mysqli_query($conn,"UPDATE tblaccount set accountStatus='2' where accountUserName='$supplierUserName'");
	mysqli_query($conn,"UPDATE tblsupplier set statusId='2' where supplierId='$id'");
	
	header('location:supplier.php');

?>