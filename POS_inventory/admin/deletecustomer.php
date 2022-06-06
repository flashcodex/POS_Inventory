<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	$use=mysqli_query($conn,"SELECT tblaccount.accountId,tblperson.personId from tblcustomer 
	inner join tblperson on tblcustomer.personId=tblperson.personId 
	inner join tblaccount on tblaccount.personId=tblperson.personId 
	where tblcustomer.customerId=$id");
	$urow=mysqli_fetch_array($use);
	$personId=$urow['personId'];
	$accountId=$urow['accountId'];

	mysqli_query($conn,"UPDATE tblaccount set accountStatus=2 where accountId='$accountId'");

	header('location:customer.php');

?>