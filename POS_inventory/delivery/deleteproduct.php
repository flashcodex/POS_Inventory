<?php
	
	include('session.php');
	$id=$_GET['id'];
	
	mysqli_query($conn,"update tblorderline
	 set status='Returned' 
	where orderLineId=$id");

	?>
		<script>
			window.alert('Product Returned successfully!');
			window.history.back();
		</script>
	<?php

?>
	?>