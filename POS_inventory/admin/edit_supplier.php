<?php
	include('session.php');
	
	$id = $_GET['id'];
		$sacc1=mysqli_query($conn,"select * from tblsupplier where supplierId='$id'");
		$acc2=mysqli_fetch_array($sacc1);
		$accountUserName=$acc2['supplierUserName'];


	$name = $_POST['name'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$email = $_POST['email'];
	$status = $_POST['status'];	


	mysqli_query($conn,"update tblsupplier set 
		supplierName ='$name' , 
		supplierAddress ='$address' , 
		telephoneNumber ='$contact' ,
		emailAddress ='$email',
		 supplierUserName ='$username' ,
		 supplierPassword ='$password' ,
		 statusId = $status
		 where supplierId=$id");

	mysqli_query($conn,"UPDATE tblaccount set accountUserName='$username',accountStatus=$status, accountPassword='$password' where accountUserName='$accountUserName' ");
	?>
		<script>
			window.alert('Supplier updated successfully!');
			window.history.back();
		</script>
	<?php
echo "$accountUserName";
?>