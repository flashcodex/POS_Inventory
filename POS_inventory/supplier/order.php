<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
<div style="height:50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Orders
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
                <thead>
                    <tr>
                    	<th style="width: 20px">Orderline Id</th>
                        <th style="width: 20px">Customer Id</th>    
                        <th>Product Name</th>
						<th>Price</th>
						<th style="width: 10px">Quantity</th>
						<th>Total Price</th>
						<th>Stock</th>
						<th>Status</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$pq=mysqli_query($conn,"SELECT * FROM tblorderline LEFT JOIN tblorder on tblorderline.orderId = tblorder.orderId INNER JOIN tblproduct on tblorderline.productId = tblproduct.productId INNER JOIN tblinventory on tblproduct.productId = tblinventory.productId WHERE supplierId =".$userId." And tblorderline.status = 'Ordered' order by tblorderline.orderLineId");
					while($pqrow=mysqli_fetch_array($pq)){
						$orderLineId =$pqrow['orderLineId'];
					?>
						<tr>
							<td><?php echo $pqrow['orderLineId']; ?></td>
							<td><?php echo $pqrow['customerId']; ?></td>
							<td><?php echo $pqrow['description']; ?></td>
							<td><?php echo $pqrow['price']; ?></td>
							<td><?php echo $pqrow['quantity']; ?></td>
							<td><?php echo $pqrow['totalPrice']; ?></td>
							<td><?php echo $pqrow['stock']; ?></td>
							<td><?php echo $pqrow['status']; ?></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#confirm_<?php echo $orderLineId; ?>"><i class="fa fa-edit"></i> Confirm</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#decline_<?php echo $orderLineId; ?>"><i class="fa fa-trash"></i> Decline</button>
								<?php include('order_button.php'); ?>
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