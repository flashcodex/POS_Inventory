<?php
	session_start();
	
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header('location:../index.php');
    exit();
	}
	
	include('../conn.php');

	$sq=mysqli_query($conn,"select * from `tblaccount` where accountId='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sq);
	
	$user=$srow['accountUserName'];
	$personId=$srow['personId'];

	$_SESSION['name']=$user;
	
	$sq3=mysqli_query($conn,"select warehouseId from `tbldelivery` where personId=$personId");
	$srow1=mysqli_fetch_array($sq3);
	$warehouseId=$srow1['warehouseId'];

	$sq4=mysqli_query($conn,"select * from `tblwarehouse` where warehouseId=$warehouseId");
	$srow2=mysqli_fetch_array($sq4);
	$province=$srow2['ProvinceId'];
