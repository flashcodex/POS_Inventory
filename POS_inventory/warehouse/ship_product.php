<?php
	
	include('session.php');
	$id=$_GET['id'];
	
	mysqli_query($conn,"update tblorderline
	 set status='Shipped' 
	where orderLineId=$id");

	$sq=mysqli_query($conn,"select   tblcustomer.customerId, tblorderline.*,tblorder.orderId, tblperson.*
		from tblproduct 
						inner join tblorderline on tblproduct.productId		=tblorderline.productId 
						inner join tblorder 	on tblorder.orderId 		=tblorderline.orderId 
						inner join tblcustomer  on tblcustomer.customerId	=tblorder.customerId
						inner join tblperson 	on tblperson.personId 		=tblcustomer.personId
	 where  tblorderline.orderLineId=$id");

	$srow=mysqli_fetch_array($sq);
	$orderId = $srow['orderId'];
	$custId = $srow['customerId'];
	$orderLineId = $srow['orderLineId'];
	$provinceId = $srow['provinceId'];
	$cityId = $srow['cityId'];
	$barangayId = $srow['brangayId'];
	$shipmentId = get_lastId_tblshipment();

	function get_lastId_tblshipment(){
		global $conn;
			$newID = 0;
			$results = mysqli_query($conn, "SELECT shipmentId FROM tblshipment ORDER BY shipmentId ASC");
			while ($result = mysqli_fetch_array($results)) {
				$newID = $result['shipmentId'];
			}
			$newID++;
			return $newID;
		}

	mysqli_query($conn,"INSERT INTO tblshipment values ($shipmentId, $custId, $orderId,$orderLineId,$provinceId,$cityId,$barangayId)");

	?>
		<script>
			window.alert('Product Shipped successfully!');
			window.history.back();
		</script>
