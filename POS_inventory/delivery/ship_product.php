<?php
	
	include('session.php');
	$id=$_GET['id'];
	$paymentId =   get_lastId_tblpayment();
	$supplierId = get_supplierId();
	$deliveryId = $_SESSION['id'];
	$amount = get_totalPrice();
	$orderId = get_orderId();
	

	
	mysqli_query($conn,"update tblorderline set status='Accepted' where orderLineId=$id");

	mysqli_query($conn,"insert into tblpayment (paymentId, orderLineId, supplierId, deliveryId, amount, paymentdate, warehousePayeeId, paymentStatus) values ( $paymentId, $id, $supplierId, $deliveryId, $amount , NOW() , 0, 'On-Hand')");

	$isDone = get_result();
	if($isDone == "Y"){
		mysqli_query($conn,"update tblorder set orderStatus='Done' where orderId=$orderId");
		$saleId = get_saleId();
		mysqli_query($conn,"update tblsale set saleStatus='Done' where saleId=$saleId");
	}

	function get_result(){
		global $conn;
		global $orderId;
		global $isDone;
	     $results = mysqli_query($conn, "SELECT CASE
         				 WHEN NOT EXISTS(SELECT *
                         FROM   tblorderline
                         WHERE (orderId= '$orderId' AND status <> 'Accepted')) THEN 'Y'
         				 ELSE 'N'
      					 END AS isDone ");
	         while ($result = mysqli_fetch_array($results)) {
	         $isDone = $result['isDone'];
	       }
	      return $isDone;
		}

	
	function get_lastId_tblpayment(){
		global $conn;
		$newID = 0;
	     $results = mysqli_query($conn, "SELECT paymentId FROM tblpayment order by paymentId;");
	         while ($result = mysqli_fetch_array($results)) {
	         $newID = $result['paymentId'];
	       }
	      $newID++;
	      return $newID;
		}


	function  get_supplierId(){
		global $conn;
		global $id;
		 $supplierId =0;
	     $results = mysqli_query($conn, "SELECT supplierId FROM tblorderline inner join tblproduct on tblorderline.productId = tblproduct.productId WHERE tblorderline.orderLineId ='$id'");
	         while ($result = mysqli_fetch_array($results)) {
	         $supplierId = $result['supplierId'];
	       }
	      return $supplierId;
	}

	function  get_saleId(){
		global $conn;
		global $id;
		 $saleId =0;
	     $results = mysqli_query($conn, "SELECT tblsale.saleId FROM tblsale inner join tblorder on tblorder.orderId = tblsale.orderId INNER JOIN tblorderline on tblorder.orderId = tblorderline.orderId WHERE tblorderline.orderLineId = '$id'");
	         while ($result = mysqli_fetch_array($results)) {
	         $saleId = $result['saleId'];
	       }
	      return $saleId;
	}

		function  get_orderId(){
		global $conn;
		global $id;
		 $orderId =0;
	     $results = mysqli_query($conn, "SELECT tblorder.orderId FROM tblorder inner join tblorderline on tblorder.orderId = tblorderline.orderId WHERE tblorderline.orderLineId ='$id'");
	         while ($result = mysqli_fetch_array($results)) {
	         $orderId = $result['orderId'];
	       }
	      return $orderId;
	}

	function  get_totalPrice(){
		global $conn;
		global $id;
		$totalPrice=0;
	     $results = mysqli_query($conn, "SELECT tblorderline.totalPrice from tblorderline WHERE tblorderline.orderLineId = '$id'");
	         while ($result = mysqli_fetch_array($results)) {
	         $totalPrice = $result['totalPrice'];
	       }
	      return $totalPrice;
	}


	?>
		<script>
			window.alert('Product Accepted successfully!');
			window.history.back();
		</script>
