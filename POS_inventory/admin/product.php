<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<div id="wrapper">
<?php include('navbar.php'); ?>
<div style="height:50px;"></div>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addproduct"><i class="fa fa-plus-circle"></i> Add Product</button>
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
						<th>Product Category</th>
						<th>Product Sub-Category</th>
                        <th>Price</th>
						<th>Supplier</th>
						<th>Photo</th>
						<th>Status</th>
						<th style="width: 50px">Action</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$sql = "SELECT DISTINCT tblproduct.productId , tblproduct.description AS 'Name', tblcategory.description AS 'Category',  tblsubcategory.description AS 'Sub-Category', tblproduct.price, tblsupplier.supplierName AS 'Supplier' , tblproductstatus.description AS 'Status', tblproduct.productImage FROM tblproduct 
						INNER JOIN tblproductstatus on tblproductstatus.productStatusId = tblproduct.statusId 
						INNER JOIN tblsupplier on tblsupplier.supplierId = tblproduct.supplierId 
						INNER JOIN tblcategory on tblcategory.categoryId = tblproduct.categoryId  
						INNER JOIN tblsubcategory on tblproduct.subCategoryId = tblsubcategory.subCategoryId WHERE tblproductstatus.productStatusId=1";

					$pq=mysqli_query($conn,$sql);

					while($pqrow=mysqli_fetch_array($pq)){
						$pid=$pqrow['productId'];
					?>
						<tr>
							<td><?php echo $pqrow['productId']; ?></td>
							<td><?php echo $pqrow['Name']; ?></td>
							<td><?php echo $pqrow['Category']; ?></td>
							<td><?php echo $pqrow['Sub-Category']; ?></td>
							<td><?php echo $pqrow['price']; ?></td>
							<td><?php echo $pqrow['Supplier']; ?></td>
							<td><img src="../<?php if(empty($pqrow['productImage'])){echo "upload/noimage.jpg";}else{echo $pqrow['productImage'];} ?>" height="30px" width="30px;"></td>
							<td><?php echo $pqrow['Status']; ?></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editprod_<?php echo $pid; ?>"><i class="fa fa-edit"></i> </button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delproduct_<?php echo $pid; ?>"><i class="fa fa-trash"></i> </button>
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
</div>
</div>
<?php include('script.php'); ?>


<?php include('modal.php'); ?>
<?php include('add_modal.php'); ?>
<script src="custom.js"></script>
</body>
</html>