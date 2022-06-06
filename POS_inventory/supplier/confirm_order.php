
<?php
	include('session.php');
	$id=$_GET['id'];
	$invetoryLogId=tblinventorylog();
	$salesdetailId=get_lastId_tblsalesdetail();
	

	mysqli_query($conn,"update tblorderline set status = 'Ready to Ship' where orderLineId = '$id'");
	
	$query=mysqli_query($conn,"SELECT * FROM tblorderline LEFT JOIN tblorder on tblorderline.orderId = tblorder.orderId INNER JOIN tblproduct on tblorderline.productId = tblproduct.productId INNER JOIN tblinventory on tblproduct.productId = tblinventory.productId INNER JOIN tblsale on  tblorder.orderId = tblsale.orderId WHERE tblorderline.orderLineId =$id ");

	while($row=mysqli_fetch_array($query)){

		mysqli_query($conn,"insert into tblsalesdetail (saleDetailId, saleId, productId, saleQuantity) values ($salesdetailId, '".$row['saleId']."', '".$row['productId']."', '".$row['quantity']."')");

		$newqty=$row['stock']-$row['quantity'];
		
		mysqli_query($conn,"update tblinventory set stock='$newqty' where productId='".$row['productId']."'");
		
		mysqli_query($conn,"insert into tblinventorylog (invetoryLogId, customerId, tblinventorylog.action, productId, quantity, invetoryLogDate) values ($invetoryLogId ,'".$row['customerId']."', 'Purchase', '".$row['productId']."', '".$row['quantity']."', NOW())");
	}

	header('location: order.php');

	function get_lastId_tblsalesdetail()	
	{
	global $conn;
	$newID = 0;
     $results = mysqli_query($conn, "SELECT saleDetailId FROM tblsalesdetail order by saleDetailId;");
         while ($result = mysqli_fetch_array($results)) {
         $newID = $result['saleDetailId'];
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
?>