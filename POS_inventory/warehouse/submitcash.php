<?php
	
	include('session.php');
	$supplierPayeeId = get_lastId_tblsupplierpayee();
	$supplierId = $_SESSION['supplierId'];
	$date =date("Y/m/d");
	$total=0;
	$warehouseId =$_SESSION['warehouseId'];

	

	$pq=mysqli_query($conn,"SELECT tblpayment.* FROM tblpayment where tblpayment.supplierId = '$supplierId' AND tblpayment.paymentStatus = 'Submited'");

	while($pqrow=mysqli_fetch_array($pq)){			
		 $subtotal = $pqrow['amount'];
		 $total+=$subtotal;
	}

	mysqli_query($conn,"insert into tblsupplierpayee (supplierpayeeId, supplierId, amountRecieve, warehouseId, supplierDate, status) values ( $supplierPayeeId, $supplierId, $total, $warehouseId, NOW(),'On-Hand')");

	mysqli_query($conn,"update tblpayment set supplierpayeeId ='$supplierPayeeId' where tblpayment.supplierId = '$supplierId' AND tblpayment.paymentStatus = 'Submited'");

	mysqli_query($conn,"update tblpayment set paymentStatus ='Received' where tblpayment.supplierPayeeId = '$supplierPayeeId'");
	

	function get_lastId_tblsupplierpayee(){
		global $conn;
		$newID = 0;
	     $results = mysqli_query($conn, "SELECT supplierpayeeId FROM tblsupplierpayee order by supplierpayeeId;");
	         while ($result = mysqli_fetch_array($results)) {
	         $newID = $result['supplierpayeeId'];
	       }
	      $newID++;
	      return $newID;
		}

?>
  <script>
	window.alert('Cash Submited successfully!');
	window.history.back();
  </script>
