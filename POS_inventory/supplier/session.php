<?php
	session_start();
	
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header('location:../index.php');
    exit();
	}
	
	include('../conn.php');

	$sq=mysqli_query($conn,"select * from `tblaccount` where accountId='".$_SESSION['id']."'");
	$trow=mysqli_fetch_array($sq);
	
	$user=$trow['accountUserName'];

	$sq=mysqli_query($conn,"select * from `tblsupplier` where supplierUserName='$user'");
	$srow=mysqli_fetch_array($sq);
	$userId = $srow['supplierId'];
	$_SESSION['name']=$srow['supplierUserName'];

