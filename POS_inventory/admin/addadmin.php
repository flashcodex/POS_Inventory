<?php
	include('session.php');
		date_default_timezone_set('Asia/Manila');
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
	$image=$_POST['image'];
	$date =date("Y-m-d h:i:s A");
	$accId = get_lastId_tblaccount();
	$personId =get_lastId_tblperson();
	$empId = get_lastId_tblemployee();
	$dateToday = date("Y-m-d h:i:sa");
	$personAddedBy=$userId;
	///------------------------------ FUNCTIONS -----------------------------------
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
	function get_lastId_tblemployee()
	{
			global $conn;
		$newID = 0;
	     $results = mysqli_query($conn, "SELECT adminId FROM tbladmin order by adminId;");
	         while ($result = mysqli_fetch_array($results)) {
	         $newID = $result['adminId'];
	       }
	      $newID++;
	      return $newID;
	}

	///------------------------------ ADD DATA TO DATABASE -----------------------------------
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
	if (empty($_FILES["image"]["name"])){
		$location="";
	}
	else{
		$fileInfo = PATHINFO($_FILES["image"]["name"]);
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location="";
			?>
				<script>
					window.alert('Photo not added. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}


	$sql = "INSERT INTO tblperson 
		VALUES ('$personId','$firstName','$middleName','$lastName',$sex,$civilStatus,'$bday','$homeNo',$barangay,$city,$province,$zipCode,'$contact','$telnum',1,'$dateToday',$personAddedBy,'$image')";
	  mysqli_query($conn, $sql);
	  mysqli_query($conn,"INSERT INTO tblaccount values ($accId, $personId, '$userName', '$password',1,1)");
	  mysqli_query($conn,"INSERT INTO tbladmin values ($empId, $personId,1)");
	

	
	?>
		<script>
			window.alert('Admin added successfully!');
			window.history.back();
		</script>
	<?php

}	
	
?>