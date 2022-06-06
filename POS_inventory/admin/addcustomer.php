<?php
	include('session.php');

	$firstName=$_POST['firstName'];
	$middleName=$_POST['middleName'];
	$lastName=$_POST['lastName'];
	$sex=$_POST['sex'];
	$civilStatus=$_POST['civilStatus'];
	$homeNo=$_POST['homeNo'];
	$bday=$_POST['birthDay'];
	$province=$_POST['province'];
	$city=$_POST['city'];
	$barangay=$_POST['barangay'];
	$zipCode=$_POST['zipCode'];
	$contact=$_POST['contact'];
	$telnum=$_POST['telnum'];
	$userName=$_POST['userName'];
	$password=md5($_POST['password']);
	$status=1;
	$member =$_POST['member'];
	$accId = get_lastId_tblaccount();
	$personId =get_lastId_tblperson();
	$empId = get_lastId_tblcustomer();
	$personAddedBy=$userId;
	$dateToday = date("Y-m-d h:i:sa");
	$date =date("Y-m-d h:i:s A");
//-------------FUNCTIONS----------------
function get_lastId_tblperson(){
	global $conn;
		$newID = 0;
		$results = mysqli_query($conn, "SELECT personId FROM tblperson ORDER BY personId ASC");
		while ($result = mysqli_fetch_array($results)) {
			$newID = $result['personId'];
		}
		$newID++;
		return $newID;
	}
		

function get_lastId_tblaccount()
{
	global $conn;
	$newID = 0;
     $results = mysqli_query($conn, "SELECT accountId FROM tblaccount order by accountId;");
         while ($result = mysqli_fetch_array($results)) {
         $newID = $result['accountId'];
       }
      $newID++;
      return $newID;
}
function get_lastId_tblcustomer()
{
		global $conn;
	$newID = 0;
     $results = mysqli_query($conn, "SELECT customerId FROM tblcustomer order by customerId;");
         while ($result = mysqli_fetch_array($results)) {
         $newID = $result['customerId'];
       }
      $newID++;
      return $newID;
}
//---------------------- ADD DATA TO DATABASE ---------------------------------------------
	$sql_u = "SELECT * FROM tblaccount WHERE accountUserName='$userName'";
	$res_u = mysqli_query($conn, $sql_u);
	if (mysqli_num_rows($res_u) > 0) {
	?>
		<script>
			window.alert('Username taken!');
			window.history.back();
		</script>
	<?php
	}else{
		$sql = "INSERT INTO tblperson VALUES ('$personId','$firstName','$middleName','$lastName',$sex,$civilStatus,'$bday','$homeNo',$barangay,$city,$province,$zipCode,'$contact','$telnum',4,'$dateToday',$personAddedBy,'')";
	  mysqli_query($conn, $sql);

	  mysqli_query($conn,"INSERT INTO tblaccount values ($accId, $personId, '$userName', '$password',4,1)");
	  mysqli_query($conn,"INSERT INTO tblcustomer values ($empId, $personId,1, $member)");
	


	
	?>
		<script>
			window.alert('Customer added successfully!');
			window.history.back();
		</script>
	<?php

}	
	
?>
