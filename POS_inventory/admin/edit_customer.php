<?php
	include('session.php');
	
	$customerId=$_GET['id'];
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
	$member =$_POST['member'];

	
	$use=mysqli_query($conn,"select tblaccount.accountId,tblperson.personId
from tblcustomer 
inner join tblperson on tblperson.personId=tblcustomer.personId 
inner join tblaccount on tblperson.personId=tblaccount.personId where tblcustomer.customerId=$customerId");
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


	if($password != "d41d8cd98f00b204e9800998ecf8427e"){
		mysqli_query($conn,"update tblaccount set 
		accountPassword='$password'
		where personId=$personId");
	}

	mysqli_query($conn,"update tblaccount set 
		accountUserName='$userName', 
		accountStatus=$status 
		where personId=$personId");


	mysqli_query($conn,"update tblcustomer set memberId= $member where customerId=$customerId");
	
	?>
		<script>
			window.alert('Customer updated successfully!');
			window.history.back();
		</script>
	<?php
	

?>