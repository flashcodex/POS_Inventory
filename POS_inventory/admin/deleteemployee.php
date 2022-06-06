<?php
	include('session.php');
	
	$id=$_GET['id'];
	global $conn;

	$use=mysqli_query($conn,"SELECT tblaccount.accountId,tblperson.personId from tblemployee 
	inner join tblperson on tblemployee.personId=tblperson.personId 
	inner join tblaccount on tblaccount.personId=tblperson.personId 
	where tblemployee.employeeId=$id");
	$urow=mysqli_fetch_array($use);
	$personId=$urow['personId'];
	$accountId=$urow['accountId'];	
	mysqli_query($conn,"UPDATE tblaccount set accountStatus='2' where personId='$personId'");
	header('location:employee.php');

?>