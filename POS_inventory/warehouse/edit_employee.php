<?php
	include('session.php');
	
	$employeeId=$_GET['id'];
	$firstName=$_POST['firstName'];
	$middleName=$_POST['middleName'];
	$lastName=$_POST['lastName'];
	$sex=$_POST['sex'];
	$civilStatus=$_POST['civilStatus'];
	$bday=$_POST['birthDay'];
	$homeNo=$_POST['homeNo'];
	$province=$_POST['province'];
	$city=$_POST['city'];
	$barangay=$_POST['barangay'];
	$zipCode=$_POST['zipCode'];
	$contact=$_POST['cellPhoneNumber'];
	$telnum=$_POST['telephoneNumber'];
	$userName=$_POST['username'];
	$password=md5($_POST['password']);
	$status=$_POST["status"];
	$warehouseId=$_POST["warehouseId"];


	
	$use=mysqli_query($conn,"select tblaccount.accountId,tblperson.personId from tblemployee 
inner join tblperson on tblperson.personId=tblemployee.personId 
inner join tblaccount on tblperson.personId=tblaccount.personId where tblemployee.employeeId=$employeeId");
	$urow=mysqli_fetch_array($use);
	$personId=$urow['personId'];
	$accountId=$urow['accountId'];

	mysqli_query($conn,"update tblperson set 
		firstName ='$firstName', 
		middleName ='$middleName',
		lastName ='$lastName',
		sexId =$sex,
		civilStatusId =$civilStatus,
		birthDay ='$bday',
		address ='$homeNo',
		brangayId = $barangay,
		cityId =$city,
		provinceId = $province,
		zipCode = $zipCode,
		cellPhoneNumber ='$contact',
		telephoneNumber ='$telnum'
		where personId=$personId");

	mysqli_query($conn,"update tblemployee set 
		warehouseId='$warehouseId' 
		where personId=$personId");

	if($password != "d41d8cd98f00b204e9800998ecf8427e"){
		mysqli_query($conn,"update tblaccount set 
		accountPassword='$password'
		where personId=$personId");
	}

	mysqli_query($conn,"update tblaccount set 
		accountUserName='$userName', 
		accountStatus=$status 
		where personId=$personId");
	
	?>
		<script>
			window.alert('Employee updated successfully!');
			window.history.back();
		</script>
	<?php
	
  	echo "
  	update tblperson set 
		firstName ='$firstName', 
		middleName ='$middleName',
		lastName ='$lastName',
		sexId =$sex,
		civilStatusId =$civilStatus,
		birthDay ='$bday',
		address ='$homeNo',
		barangayId = $barangay,
		cityId =$city,
		provinceId = $province,
		zipCode = $zipCode,
		cellPhoneNumber ='$contact',
		telephoneNumber ='$telnum'
		where personId=$personId";
		
?>