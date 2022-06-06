<script type="text/javascript">console.log("TRUE")</script>
<?php

if(isset($_POST["action"]))
{

		 $connect =mysqli_connect("localhost","root","","pos_inventory_management");
		 $output = '';
	 if($_POST["action"] == "province" || $_POST["action"] == "provincecust" )
	 {
	 
	 	  echo"<script> console.log(1); </script>";

		  $query = "SELECT DISTINCT * FROM tblcity WHERE  provinceId = ".$_POST["query"]." ";
		  $result = mysqli_query($connect, $query);
		 $output .= '<option value="">Select City</option>';
		  while($row = mysqli_fetch_array($result))
	  {
	  	 $output .= '<option value="'.$row["cityId"].'">'.$row["description"].'</option>';
	  }

	 }
	 if($_POST["action"] == "city" )
	 { 
	 
		  $query = "SELECT DISTINCT * FROM tblbarangay WHERE cityId = ".$_POST["query"]."";
		  $result = mysqli_query($connect, $query);
		  $output .= '<option value="">Select Barangay</option>';
		  while($row = mysqli_fetch_array($result))
		  {
		  		echo"<script> console.log(2); </script>";
		   $output .= '<option value="'.$row["barangayId"].'">'.$row["description"].'</option>';
		  }
	 }
	 if($_POST["action"] == "Category1")
	 {
	 	
		  $query = "SELECT * FROM tblsubcategory WHERE categoryId = ".$_POST["query"]."";
		  $result = mysqli_query($connect, $query);
		  $output .= '<option value="">Select SubCategory</option>';
		  while($row = mysqli_fetch_array($result))
		  {

		   $output .= '<option value="'.$row["subCategoryId"].'">'.$row["description"].'</option>';
		  }
	 }
	
	 if($_POST["action"] == "Category")
	 {
	 	echo"<script> console.log(3); </script>";
		  $query = "SELECT * FROM tblsubcategory WHERE categoryId = ".$_POST["query"]."";
		  $result = mysqli_query($connect, $query);
		  $output .= '<option value="">Select SubCategory</option>';
		  while($row = mysqli_fetch_array($result))
		  {
		   $output .= '<option value="'.$row["subCategoryId"].'">'.$row["description"].'</option>';
		  }
	 }
	 echo $output;
}
?>