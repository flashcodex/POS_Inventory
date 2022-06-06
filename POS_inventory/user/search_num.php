<?php
	include('session.php');
	if(isset($_POST['num'])){
		$search = $_POST['name'];
		$query=mysqli_query($conn,"select * from `tblproduct` where description like '%$search%'");
		echo mysqli_num_rows($query);
	}
?>