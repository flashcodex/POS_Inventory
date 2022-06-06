<?php
	include('session.php');
	if(isset($_POST['rem'])){
		$id=$_POST['id'];
		$customerId = $_SESSION['custId'];
		
		mysqli_query($conn,"delete from `tblcart` where productId='$id' AND customerId = '$customerId'");
	}
?>