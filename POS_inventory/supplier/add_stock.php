<?php
	
	include('session.php');
	$id=$_GET['id'];
	$invetoryLogId = tblinventorylog();
	
	$p=mysqli_query($conn,"select * from tblinventory where productId='$id'");
	$prow=mysqli_fetch_array($p);
	
	$stock= $prow['stock'] + $_POST['stock'];

	
	mysqli_query($conn,"update tblinventory set stock='$stock' where productId=$id");

	mysqli_query($conn,"insert into tblinventorylog (invetoryLogId, customerId, tblinventorylog.action, productId, quantity, invetoryLogDate) values ($invetoryLogId ,0, 'Add Stock', $id, ".$_POST['stock'].", NOW())");

	?>
		<script>
			window.alert('Product stock successfully added!');
			window.history.back();
		</script>
	<?php
	

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