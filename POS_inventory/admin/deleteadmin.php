<?php
	include('session.php');
	
	$id=$_GET['id'];
	global $conn;

	$use=mysqli_query($conn,"SELECT tblaccount.accountId,tblperson.personId from tbladmin 
	inner join tblperson on tbladmin.personId=tblperson.personId 
	inner join tblaccount on tblaccount.personId=tblperson.personId 
	where tbladmin.adminId=$id");
	$urow=mysqli_fetch_array($use);
	$personId=$urow['personId'];
	$accountId=$urow['accountId'];	
	mysqli_query($conn,"UPDATE tblaccount set accountStatus='2' where personId='$personId'");
	header('location:admin.php');

?>