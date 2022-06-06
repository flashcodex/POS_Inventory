<?php
	include('session.php');
	$pid=$_GET['id'];
	
	$a=mysqli_query($conn,"select * from  tblproduct  here productId='$pid'");
	$b=mysqli_fetch_array($a);

	mysqli_query($conn,"UPDATE tblproduct set statusId=2 where productId='$pid'");
	
	header('location:index.php');

?>