<?php
	session_start();
	
	include('conn.php');
	
		date_default_timezone_set('Asia/Manila');
				$date= date("Y")."_".date("m")."_".date("d");
				$name = "Admin " . $date .".txt";
				$time= date("h").":".date("i").":".date("sa");
				$myFile= fopen("../Log/$name","a");
				$action ="Log Out";
				$string = "<tr> <td> {$_SESSION['name']}</td> <td>$date</td> <td>$time</td><td>$action</td></tr>\n";
				fwrite($myFile, $string);
				fclose($myFile);
	
	session_destroy();
	header('location:../index.php');

?>