<?php
	include('session.php');
	


	$name = $_POST['name'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	


	mysqli_query($conn,"update tblsupplier set 
		supplierName ='$name' , 
		supplierAddress ='$address' , 
		telephoneNumber ='$contact' ,
		emailAddress ='$email'
		 where supplierId=$userId");
	
	?>
		<script>
			window.alert('Supplier updated successfully!');
			window.history.back();
		</script>
