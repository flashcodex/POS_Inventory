<?php
	
	include('session.php');
	$deliveryId = $_SESSION['id'];
	$date =date("Y/m/d");
	$warehousePayeeId = get_lastId_tblwarehousepayee() ;
	$warehouseId =get_warehouseId() ;
	$total=0;

	

	$pq=mysqli_query($conn,"SELECT tblpayment.* FROM tblpayment where tblpayment.deliveryId = '$deliveryId' AND tblpayment.paymentStatus = 'On-Hand'");

	while($pqrow=mysqli_fetch_array($pq)){			
		 $subtotal = $pqrow['amount'];
		 $total+=$subtotal;
	}

	mysqli_query($conn,"insert into tblwarehousepayee (warehousePayeeId, warehouseId, amountRecieve, deliveryId, date, status) values ( $warehousePayeeId, $warehouseId, $total, $deliveryId, NOW(),'On-Hand')");

	mysqli_query($conn,"update tblpayment set warehousePayeeId ='$warehousePayeeId' where tblpayment.deliveryId = '$deliveryId' AND tblpayment.paymentStatus = 'On-Hand'");

	mysqli_query($conn,"update tblpayment set paymentStatus ='Submited' where tblpayment.warehousePayeeId = '$warehousePayeeId'");



	

	function get_lastId_tblwarehousepayee(){
		global $conn;
		$newID = 0;
	     $results = mysqli_query($conn, "SELECT warehousePayeeId FROM tblwarehousepayee order by warehousePayeeId;");
	         while ($result = mysqli_fetch_array($results)) {
	         $newID = $result['warehousePayeeId'];
	       }
	      $newID++;
	      return $newID;
		}

		function  get_warehouseId(){
		global $conn;
		global $deliveryId;
		 $id =0;
	     $results = mysqli_query($conn, "SELECT warehouseId FROM `tbldelivery` WHERE personId = '$deliveryId'");
	         while ($result = mysqli_fetch_array($results)) {
	         $id = $result['warehouseId'];
	       }
	      return $id;
	}	



?>
  <script>
	window.alert('Cash Submited successfully!');
	window.history.back();
  </script>
