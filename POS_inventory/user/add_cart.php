<?php
	include('session.php');
	if(isset($_POST['cart'])){

		$cartId= get_lastId_tblcart();
		$id=$_POST['id'];
		$qty=$_POST['qty'];
		$customerId = $_SESSION['custId'];


		$stockquerys = mysqli_query($conn, "select stock from tblinventory where productId='$id';");
         while ($stockquery = mysqli_fetch_array($stockquerys)) {
         $stock = $stockquery['stock'];
         }


		$query=mysqli_query($conn,"select * from tblcart where productId='$id' and customerId='$customerId'");

		if (mysqli_num_rows($query)>0){
			echo "Product already on your cart!";
		}
		else{
			if($qty>$stock){
				echo "Your order is above the Product Stock";
			}
			else{
				echo "Added To cart";
				$sql = "INSERT INTO `tblcart` (`cartId`, `customerId`, `productId`, `quantity`) VALUES ($cartId,$customerId,$id,'$qty');";

				mysqli_query($conn,$sql);
			}
		}
	}

	function get_lastId_tblcart()
	{
	global $conn;
	$newID = 0;
     $results = mysqli_query($conn, "SELECT cartId FROM tblcart order by cartId;");
         while ($result = mysqli_fetch_array($results)) {
         $newID = $result['cartId'];
       }
      $newID++;
      return $newID;
	}

?>