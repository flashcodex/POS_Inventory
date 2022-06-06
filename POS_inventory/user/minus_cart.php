<?php
	include('session.php');
	if(isset($_POST['min'])){
		$id=$_POST['id'];
		$customerId = $_SESSION['custId'];
		
		$query=mysqli_query($conn,"select * from tblcart where productId='$id' AND customerId = '$customerId' ");
		$row=mysqli_fetch_array($query);
		
		$newqty=$row['quantity']-1;
		
		if ($newqty==0){
			mysqli_query($conn,"delete from tblcart where productId='$id' AND customerId ='$customerId'");
		}
		else{
			mysqli_query($conn,"update tblcart set quantity='$newqty' where productId='$id' AND customerId = '$customerId' ");
		}
		
	}

?>