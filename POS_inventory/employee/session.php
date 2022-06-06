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
	