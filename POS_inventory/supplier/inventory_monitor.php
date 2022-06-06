<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
<div style="height:50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product Inventory Stock</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
                <thead>
                    <tr>
						<th class="hidden"></th>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$sq=mysqli_query($conn,"select * from tblproduct INNER JOIN tblinventory on tblproduct.productId = tblinventory.productId where tblproduct.supplierId=$userId");;
					while($sqrow=mysqli_fetch_array($sq)){
						
					?>
						<tr>
							<td class="hidden"></td>
							<td><?php echo $sqrow['productId']; ?></td>
							<td><?php echo $sqrow['description']; ?></td>
							<td><?php echo $sqrow['stock']; ?></td>
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