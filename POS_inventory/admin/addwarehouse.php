<?php
	include('session.php');

	$id=get_lastId_tblwarehouse();
	$name=$_POST['warehouseName'];
	$province=$_POST['province'];
	$city=$_POST['city'];
	$telephoneNumber=$_POST['telephoneNumber'];
	$warehousePassword=md5($_POST['warehousePassword']);
	$warehouseUserName=$_POST['warehouseUserName'];
	$status=$_POST['status'];
	$accId = get_lastId_tblaccount();
	

	$sql= "INSERT into tblwarehouse values ($id,'$name', '$province', '$city','$telephoneNumber','$warehouseUserName','$warehousePassword', $status)";
	 mysqli_query($conn,$sql);

	 mysqli_query($conn,"INSERT INTO tblaccount values ($accId, 0, '$warehouseUserName', '$warehousePassword',5,$status)");



	 function get_lastId_tblwarehouse()
{
		global $conn;
	$newID = 0;
     $results = mysqli_query($conn, "SELECT warehouseId FROM tblwarehouse order by warehouseId;");
         while ($result = mysqli_fetch_array($results)) {
         $newID = $result['warehouseId'];
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
			window.alert('Warehouse added successfully!');
			window.history.back();
		</script>
	<?php


	
?>