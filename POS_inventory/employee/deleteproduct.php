<?php
	
	include('session.php');
	$id=$_GET['id'];
	
	mysqli_query($conn,"update tblorderline
	 set status='Declined' 
	where orderLineId=$id");

	?>
		<script>
			window.alert('Product Declined successfully!');
			window.history.back();
		</script>
	<?php

?>
	?>