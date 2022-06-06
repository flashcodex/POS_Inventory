<?php

$conn = mysqli_connect("localhost","root","","pos_inventory_management");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>