<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
<div style="height:50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_product"><i class="fa fa-plus-circle"></i> Add Product</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Product Name</th>
						<th>Price</th>
						<th>Photo</th>
						<th>Status</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$pq=mysqli_query($conn,"select tblproduct.*, tblproductstatus.description as statusdescription from tblproduct inner join tblproductstatus on tblproductstatus.productStatusId=tblproduct.statusId where supplierId=".$userId."");
					while($pqrow=mysqli_fetch_array($pq)){
						$pid =$pqrow['productId'];
					?>
						<tr>
							<td><?php echo $pqrow['productId']; ?></td>
							<td><?php echo $pqrow['description']; ?></td>
							
							<td><?php echo $pqrow['price']; ?></td>
						
							<td><img src="../<?php if(empty($pqrow['productImage'])){echo "upload/noimage.jpg";}else{echo $pqrow['productImage'];} ?>" height="30px" width="30px;">
							</td>
							<td><?php echo $pqrow['statusdescription']; ?></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editprod_<?php echo $pid; ?>"><i class="fa fa-edit"></i> Edit</button>
								<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addstock_<?php echo $pid; ?>"><i class="fa fa-plus-circle"></i> Add Stock</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delproduct_<?php echo $pid; ?>"><i class="fa fa-trash"></i> Delete</button>
								<?php include('product_button.php'); ?>
							</td>
						</tr>
					<?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<?php include('add_modal.php'); ?>
<script src="custom.js"></script>
</body>
</html>