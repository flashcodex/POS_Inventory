
<?php
	include('session.php');
	$id=$_GET['id'];
	$salesId=get_lastId_tblsale();
	$invetoryLogId=tblinventorylog();
	
	if(preg_match("/^[0-9,]+$/", $total)){
		$new=$total;
	}
	else{
		$new = str_replace(',', '', $total);
	}
	
	mysqli_query($conn,"insert into tblsale (saleId, customerId, salesTotal, salesDate) values ($salesId, $customerId, '$new', NOW())");
	//$sid=mysqli_insert_id($conn);
	
	$query=mysqli_query($conn,"select * from tblcart where customerId=$customerId ");
	while($row=mysqli_fetch_array($query)){

		$salesdetailId=get_lastId_tblsalesdetail();
		mysqli_query($conn,"insert into tblsalesdetail (saleDetailId, saleId, productId, saleQuantity) values ($salesdetailId, '$salesId', '".$row['productId']."', '".$row['quantity']."')");
		
		$pro=mysqli_query($conn,"select * from tblproduct inner join tblcart on tblproduct.productId = tblcart.productId inner join tblinventory on tblproduct.productId = tblinventory.productId where tblproduct.productId='".$row['productId']."'");
		$prorow=mysqli_fetch_array($pro);
		
		$newqty=$prorow['stock']-$row['quantity'];
		
		mysqli_query($conn,"update tblinventory set stock='$newqty' where productId='".$row['productId']."'");
		
		mysqli_query($conn,"insert into tblinventorylog (invetoryLogId, customerId, tblinventorylog.action, productId, quantity, invetoryLogDate) values ($invetoryLogId ,$customerId, 'Purchase', '".$row['productId']."', '".$row['quantity']."', NOW())");
	}
	
	mysqli_query($conn,"delete from tblcart where customerId=$customerId");
	header('location: history.php');

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