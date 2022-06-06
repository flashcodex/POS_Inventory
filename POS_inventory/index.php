<?php include('header.php'); ?>
<?php include('conn.php'); ?>
<?php
	session_start();

	$date= date("Y")."_".date("m")."_".date("d");
	$users = array("Admin ","Employee","Customer","Supplier","Warehouse","Delivery");
	for ($i=0; $i < count($users) ; $i++) { 
			$name = $users[$i] . $date .".txt";
			$myFile= fopen("Log/$name","a");
			fclose($myFile);
	}
	

	if (isset($_SESSION['id'])){
		$query=mysqli_query($conn,"SELECT * from tblaccount where accountId=".$_SESSION['id']."");
		   
		$row=mysqli_fetch_array($query);
		
		if ($row['userTypeId']==1){
	
			header('location:admin/');
		}
		else if ($row['userTypeId']==2){
			
			header('location:employee/');
		}
		
		else if($row['userTypeId']==4){
			header('location:user/');
		}
		else if($row['userTypeId']==3){
			
			header('location:supplier/');
		}
	}
?>
<body>
<div class="container">
	<div id="login_form" class="well">
		<h2><center><span class="glyphicon glyphicon-lock"></span> Please Login</center></h2>
		<hr>
		<form method="POST" action="login.php">
		Username: <input type="text" name="username" class="form-control" required>
		<div style="height: 10px;"></div>		
		Password: <input type="password" name="password" class="form-control" required> 
		<div style="height: 10px;"></div>
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button>
		</form>
		<div style="height: 10px;"></div>
			<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addcustomer"><i class="fa fa-plus-circle"></i> Sign Up</button>
		<div style="color: red; font-size: 15px;">
			<center>
			<?php
				
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
			</center>
		</div>
	
			<div style="height: 15px;"></div>
			
	</div>
</div>
<?php include('script.php'); ?>
<?php include('add_modal.php'); ?>
</body>
</html>