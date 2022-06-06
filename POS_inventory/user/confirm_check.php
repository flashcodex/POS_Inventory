
<?php
	include('session.php');
	$total=$_GET['total'];
	$orderId=get_lastId_tblorder();
	$customerId = $_SESSION['custId'];
	$invetoryLogId=tblinventorylog();
	$date = date('Y/m/d');
	$time= date('h:i:sa');
	$salesId=get_lastId_tblsale();
	
	if(preg_match("/^[0-9,]+$/", $total)){
		$new=$total;
	}
	else{
		$new = str_replace(',', '', $total);
	}

	mysqli_query($conn,"insert into tblsale (saleId, orderId, customerId, salesTotal, salesDate, saleStatus) values ($salesId, '$orderId', $customerId, '$new', NOW(), 'On-Process')");

	mysqli_query($conn,"insert into tblorder (orderId, customerId, orderDate, orderStatus) values ($orderId, $customerId, NOW(), 'On-Process')");
	
	$query=mysqli_query($conn," select * from tblcart left join tblproduct on tblproduct.productId=tblcart.productId where customerId= '$customerId' ");
	while($row=mysqli_fetch_array($query)){

		$orderlineId=get_lastId_tblorderline();
		$subtotal=$row['quantity']*$row['price'];
		$productId=$row['productId'];
		$quantity=$row['quantity'];

		mysqli_query($conn,"insert into tblorderline (orderLineId, orderId, productId, quantity , totalPrice, status) values ('$orderlineId', '$orderId', '$productId', '$quantity', '$subtotal','Ordered')");
	}
	
	mysqli_query($conn,"delete from tblcart where customerId=$customerId");
	header('location: order.php');

	function get_lastId_tblorderline()
	{
	global $conn;
	$newID = 0;
     $results = mysqli_query($conn, "SELECT orderLineId FROM tblorderline order by orderLineId;");
         while ($result = mysqli_fetch_array($results)) {
         $newID = $result['orderLineId'];
       }
      $newID++;
      return $newID;
	}

	function get_lastId_tblorder()
	{
	global $conn;
	$newID = 0;
     $results = mysqli_query($conn, "SELECT orderId FROM tblorder order by orderId;");
         while ($result = mysqli_fetch_array($results)) {
         $newID = $result['orderId'];
       }
      $newID++;
      return $newID;
	}

	function tblinventorylog()
	{
	global $conn;
	$newID = 0;
     $results = mysqli_query($conn, "SELECT invetoryLogId FROM tblinventorylog order by invetoryLogId;");
         while ($result = mysqli_fetch_array($results)) {
         $newID = $result['invetoryLogId'];
       }
      $newID++;
      return $newID;
	}

	function get_lastId_tblsale()
	{
	global $conn;
	$newID = 0;
     $results = mysqli_query($conn, "SELECT saleId FROM tblsale order by saleId;");
         while ($result = mysqli_fetch_array($results)) {
         $newID = $result['saleId'];
       }
      $newID++;
      return $newID;
	}

?>