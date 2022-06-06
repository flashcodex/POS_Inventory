<?php

	include('session.php');
	
	$cpass=md5($_POST['cpass']);
	$repass=md5($_POST['repass']);
	
	if($cpass!=$repass){
		?>
		<script>
			window.alert('Required passwords did not match. Account not updated!');
			window.history.back();
		</script>
		<?php
	}
	elseif($cpass!=$trow['accountPassword']){
		?>
		<script>
			window.alert('Current password did not match. Account not updated!');
			window.history.back();
		</script>
		<?php
	}
	else{
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		if($password==$trow['accountPassword']){
			$fipassword=$password;
		}
		else{
			$fipassword=md5($password);
		}
		mysqli_query($conn,"update `tblaccount` set accountUserName='$username', accountPassword='$fipassword' where accountId='".$_SESSION['id']."'");
		?>

		<script>
			window.alert('Account updated successfully!');
			window.history.back();
		</script>
		<?php
	}
		
?>