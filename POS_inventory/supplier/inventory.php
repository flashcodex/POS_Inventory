<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
<div style="height:50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product Inventory Report</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
                <thead>
                    <tr>
						<th class="hidden"></th>
                        <th>Inventory Date</th>
                        <th>User</th>
                        <th>Action</th>
						<th>Product Name</th>
						<th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$sq=mysqli_query($conn,"select tblinventory.* , tblproduct.* , tblinventorylog.*, tblperson.lastName , tblperson.firstName , tblperson.middleName , tblsupplier.supplierName from tblinventory left join tblproduct on tblproduct.productId=tblinventory.productId  left join tblinventorylog on tblinventory.productId = tblinventorylog.productId INNER JOIN tblcustomer on tblinventorylog.customerId = tblcustomer.customerId INNER JOIN tblperson on tblperson.personId = tblcustomer.personId inner JOIN tblsupplier on tblsupplier.supplierId = tblproduct.supplierId where tblproduct.supplierId=$userId order by invetoryLogDate desc");;
					while($sqrow=mysqli_fetch_array($sq)){
						
					?>
						<tr>
							<td class="hidden"></td>
							<td><?php echo date('M d, Y h:i A',strtotime($sqrow['invetoryLogDate'])); ?></td>
							<td>
								<?php 
								if($sqrow['action']== "Purchase"){
									echo $sqrow['lastName'].",".$sqrow['firstName']." ".$sqrow['middleName'];
								}
								elseif($sqrow['action']=="Add Stock"){
									echo $sqrow['supplierName'];
								}
								else{
									echo $sqrow['Admin'];
								}
								?>
							</td>
							<td><?php echo $sqrow['action']; ?></td>
							<td><?php echo $sqrow['description']; ?></td>
							<td><?php echo $sqrow['quantity']; ?></td>
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