<?php
	include('conn.php');
	session_start();
	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username=check_input($_POST['username']);
		
		if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
			$_SESSION['msg'] = "Username should not contain space and special characters!"; 
			header('location: index.php');
		}
		else{
			
		$fusername=$username;
		
		$password = check_input($_POST["password"]);
		$fpassword=md5(check_input($_POST["password"]));
		
		$query=mysqli_query($conn,"SELECT *,tblaccount.userTypeId as userTypeId from tblaccount  
			left join tblperson on tblperson.personId =tblaccount.personId
			left join tblcustomer on tblperson.personId=tblcustomer.personId where accountUserName='$fusername' and accountPassword='$fpassword'and accountStatus=1");

		$resultCounter = 0;
		$results = $query;
	
		
		if(mysqli_num_rows($query)==0){
			$_SESSION['msg'] = "Login Failed, Invalid Input!";
			header('location: index.php');
		}
		else{
			// -----------------------admin-------------------
			date_default_timezone_set('Asia/Manila');
			$row=mysqli_fetch_array($query);
			if ($row['userTypeId']==1){
				$_SESSION['id']=$row['accountId'];

				?>
				<script>
					window.alert('Login Success, Welcome Admin!');
					window.location.href='admin/';
				</script>
				<?php
				$date= date("Y")."_".date("m")."_".date("d");
				$name = "Admin " . $date .".txt";
				$time= date("h").":".date("i").":".date("sa");
				echo "<script>alert($name)</script>";
				$myFile= fopen("Log/$name","a");
				$action ="Log In";
				$string = "<tr> <td>$fusername </td> <td>$date</td> <td>$time</td><td>$action</td></tr>\n";
				fwrite($myFile, $string);
				fclose($myFile);

			}
			// -----------------------Employee-------------------
			elseif ($row['userTypeId']==2){
				$_SESSION['id']=$row['accountId'];
				?>
				<script>
					window.alert('Login Success, Welcome Employee!');
					window.location.href='employee/';
				</script>
				<?php
				$date= date("Y")."_".date("m")."_".date("d");
				$name = "Employee" . $date .".txt";
				$time= date("h").":".date("i").":".date("sa");

				echo "<script>alert($name)</script>";
				$myFile= fopen("Log/$name","a");
				$action ="Log In";
				$string = "<tr> <td> $fusername </td> <td>$date</td> <td>$time</td><td>$action</td></tr>\n";
				fwrite($myFile, $string);
				fclose($myFile);
			}
			// -----------------------Supplier-------------------
			elseif ($row['userTypeId']==3){
				$_SESSION['id']=$row['accountId'];
				?>
				<script>
					window.alert('Login Success, Welcome Supplier!');
					window.location.href='supplier/';
				</script>
				<?php
				$date= date("Y")."_".date("m")."_".date("d");
				$name = "Supplier" . $date .".txt";
				$time= date("h").":".date("i").":".date("sa");
				echo "<script>alert($name)</script>";
				$myFile= fopen("Log/$name","a");
				$action ="Log In";
				$string = "<tr> <td> $fusername </td> <td>$date</td> <td>$time</td><td>$action</td></tr>\n";
				fwrite($myFile, $string);
				fclose($myFile);
			}
			// -----------------------Customer-------------------
			elseif ($row['userTypeId']==4){
				$_SESSION['id']=$row['accountId'];
				$_SESSION['custId']=$row['customerId'];
				?>
				<script>
					window.alert('Login Success, Welcome Customer!');
					window.location.href='user/';
				</script>
				<?php
				$date= date("Y")."_".date("m")."_".date("d");
				$time= date("h").":".date("i").":".date("sa");
				$name = "Customer" . $date .".txt";
				echo "<script>alert($name)</script>";
				$myFile= fopen("Log/$name","a");
				$action ="Log In";
				$string = "<tr> <td> $fusername </td> <td>$date</td> <td>$time</td><td>$action</td></tr>\n";
				fwrite($myFile, $string);
				fclose($myFile);
			}	
			// -----------------------Warehouse-------------------
			elseif ($row['userTypeId']==5){
				$_SESSION['id']=$row['accountId'];
				?>
				<script>
					window.alert('Login Success, Welcome Warehouse!');
					window.location.href='warehouse/';
				</script>
				<?php
				$date= date("Y")."_".date("m")."_".date("d");
				$name = "Warehouse" . $date .".txt";
				$time= date("h").":".date("i").":".date("sa");
				echo "<script>alert($name)</script>";
				$myFile= fopen("Log/$name","a");
				$action ="Log In";
				$string = "<tr> <td> $fusername </td> <td>$date</td> <td>$time</td><td>$action</td></tr>\n";
				fwrite($myFile, $string);
				fclose($myFile);
			}
			// -----------------------Delivery-------------------
				elseif ($row['userTypeId']==6){
				$_SESSION['id']=$row['accountId'];
				?>
				<script>
					window.alert('Login Success, Welcome Delivery!');
					window.location.href='delivery/';
				</script>
				<?php
				$date= date("Y")."_".date("m")."_".date("d");
				$name = "Delivery" . $date .".txt";
				$time= date("h").":".date("i").":".date("sa");
				echo "<script>alert($name)</script>";
				$myFile= fopen("Log/$name","a");
				$action ="Log In";
				$string = "<tr> <td> $fusername </td> <td>$date</td> <td>$time</td><td>$action</td></tr>\n";
				fwrite($myFile, $string);
				fclose($myFile);
			}
		}
		
		}
	}

?>