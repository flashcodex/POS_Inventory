<?php

if(isset($_POST["action"]))
{

		 $connect =mysqli_connect("localhost","root","","pos_inventory_management");
		 $output = '';
	 if($_POST["action"] == "Category")
	 {
	 	  echo"<script> console.log(1); </script>";

		  $query = "SELECT * FROM tblsubcategory WHERE  categoryId = ".$_POST["query"]." ";
		  $result = mysqli_query($connect, $query);
		  $output .= '<option value="">Select Sub Category</option>';
		  while($row = mysqli_fetch_array($result))
	  {
	  	 $output .= '<option value="'.$row["subCategoryId"].'">'.$row["description"].'</option>';
	  }

	 }
	 echo $output;
}
?>