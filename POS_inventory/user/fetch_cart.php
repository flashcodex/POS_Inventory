<?php
	include('session.php');
	if(isset($_POST['fcart'])){
		$query=mysqli_query($conn,"select * from tblcart left join tblproduct on tblproduct.productId=tblcart.productId where customerId='".$_SESSION['custId']."'");
		if (mysqli_num_rows($query)<1){
			echo "Your Cart is Empty <br><br>";
		}
		else{
		while($row=mysqli_fetch_array($query)){
			?>
			<div class="row">
				<div class="col-lg-1">
					<button type="button" class="btn btn-danger btn-sm remove_product" value="<?php echo $row['productId']; ?>"><i class="fa fa-times fa-fw"></i></button> 
				</div>
				<div class="col-lg-1">
					<button type="button" class="btn btn-warning btn-sm minus_qty" value="<?php echo $row['productId']; ?>"><i class="fa fa-minus fa-fw"></i></button> 
				</div>
				<div class="col-lg-1" style="text-align:center; position:relative; top:4px; left:10px;">
					<span class="pull-right"><strong><?php echo $row['quantity']; ?></strong></span>
				</div>
				<div class="col-lg-1">
					<button type="button"class="btn btn-primary btn-sm add_qty" value="<?php echo $row['productId']; ?>"><i class="fa fa-plus fa-fw"></i></button> 
				</div>
				<div class="col-lg-1">
					<img src="../<?php if (empty($row['productImage'])){echo "upload/noimage.jpg";}else{echo $row['productImage'];} ?>" style="width: 30px; height:30px; position:relative; left:5px;" class="thumbnail">
				</div>
				<div class="col-lg-7">
					<span style="font-size:11px; position:relative; left:10px; top:3px;"><?php echo $row['description']; ?></span>
				</div>
			</div>
			<?php
		}
		}
	}

?>