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
				
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
                <thead>
                    <tr>
                    	<th style="width: 30px">Order Id</th>
                        <th style="width: 30px">Product Id</th>
                        <th style="width: 90px">Product Name</th>
						<th>Price</th>
						<th>Photo</th>
						<th>Status</th>
						<th style="width: 30px">Customer Id</th>
						<th>Customer</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$pq=mysqli_query($conn,"select  tblproduct.* ,tblcustomer.customerId, tblorderline.*,CONCAT(tblperson.firstName,' ' ,tblperson.middleName, ' ' ,tblperson.lastName) as 'name',tblorder.orderId from tblproduct 
						inner join tblorderline on tblproduct.productId	=tblorderline.productId 
						inner join tblorder 	on tblorder.orderId 	=tblorderline.orderId 
						inner join tblcustomer  on tblcustomer.customerId=tblorder.customerId
						inner join tblperson 	on tblperson.personId =tblcustomer.personId where 
						tblorderline.status!='Ready to Ship'");

					while($pqrow=mysqli_fetch_array($pq)){
						$pid =$pqrow['productId'];
						$orid =$pqrow['orderLineId'];
					?>
						<tr>
							<td><?php echo $pqrow['orderLineId']; ?></td>
							<td><?php echo $pqrow['productId']; ?></td>
							<td><?php echo $pqrow['description']; ?></td>
							
							<td><?php echo $pqrow['price']; ?></td>
						
							<td><img src="../<?php if(empty($pqrow['productImage'])){echo "upload/noimage.jpg";}else{echo $pqrow['productImage'];} ?>" height="30px" width="30px;">
							</td>
							<td><?php echo $pqrow['status']; ?></td>
							<td><?php echo $pqrow['customerId']; ?></td>
							<td><?php echo $pqrow['name']; ?></td>
					
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