<?php
	include('session.php');
	if(isset($_POST['add'])){
		$id=$_POST['id'];
		$customerId = $_SESSION['custId'];


		$stockquerys = mysqli_query($conn, "select stock from tblinventory where productId='$id';");
         while ($stockquery = mysqli_fetch_array($stockquerys)) {
         $stock = $stockquery['stock'];
         }
		
		$query=mysqli_query($conn,"select * from tblcart where productId='$id' AND customerId = '$customerId' ");
		$row=mysqli_fetch_array($query);
		
		$newqty=$row['quantity']+1;

		if($newqty<=$stock){
			mysqli_query($conn,"update tblcart set quantity='$newqty' where productId='$id' AND customerId = '$customerId' ");
		}	
	
	}

?>