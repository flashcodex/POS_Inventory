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
	$userId=$srow['personId'];
	$_SESSION['name']=$user;
	
	$sq1=mysqli_query($conn,"select * from `tblwarehouse` where 	warehouseUserName='$user'");
	$row=mysqli_fetch_array($sq1);
	$warehouseName=$row['warehouseName'];
	$_SESSION['warehouseId'] = $row['warehouseId'];
	$province = $row['ProvinceId'];