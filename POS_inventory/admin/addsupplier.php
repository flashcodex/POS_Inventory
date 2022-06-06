<?php
	include('session.php');

	$id=get_lastId_tblsupplier();
	$name=$_POST['suppName'];
	$address=$_POST['suppAddress'];
	$contact=$_POST['suppTelephone'];
	$username=$_POST['suppUserName'];
	$password=md5($_POST['suppPassword']);
	$email=$_POST['suppEmail'];
	$status=$_POST['status'];
	$accId = get_lastId_tblaccount();
	

	$sql= "INSERT into tblsupplier values ($id,'$name', '$address', '$contact','$email','$username','$password', $status)";
	 mysqli_query($conn,$sql);

	 mysqli_query($conn,"INSERT INTO tblaccount values ($accId, 0, '$username', '$password',3,1)");



	 function get_lastId_tblsupplier()
{
		global $conn;
	$newID = 0;
     $results = mysqli_query($conn, "SELECT supplierId FROM tblsupplier order by supplierId;");
         while ($result = mysqli_fetch_array($results)) {
         $newID = $result['supplierId'];
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


	?>
		<script>
			window.alert('Supplier added successfully!');
			window.history.back();
		</script>
	<?php


	
?>