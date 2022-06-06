<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
<div style="height:50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pay Roll
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
                    	<th>Supplier Id</th>
                        <th>Supplier Name</th>
                        <th>Amount</th>
                        <th>Details</th>
                </thead>
                <tbody>
				<?php
					$deliveryId = $_SESSION['id'];
					$date =date("Y/m/d");
					$outertotal = 0;
					$pq=mysqli_query($conn,"SELECT tblsupplier.supplierId,tblsupplier.supplierName, SUM(tblpayment.amount) AS 'amount' FROM tblorderline INNER JOIN tblpayment on tblorderline.orderLineId = tblpayment.orderLineId INNER JOIN tblwarehousepayee ON tblpayment.warehousePayeeId = tblwarehousepayee.warehousePayeeId INNER JOIN tblsupplier on tblsupplier.supplierId = tblpayment.supplierId 
						WHERE tblpayment.paymentStatus = 'Submited'
						GROUP by tblpayment.supplierId");

					while($pqrow=mysqli_fetch_array($pq)){
						
					?>
						<tr>
							<td><?php echo $pqrow['supplierId']; ?></td>
							<td><?php echo $pqrow['supplierName']; ?></td>
							<td align="right"><?php echo number_format( $pqrow['amount'],2); ?></td>	
							<?php 
								$subtotal = $pqrow['amount'];
								$outertotal+=$subtotal;
							?>
							<td>
								<a href="details.php?id=<?php echo $pqrow['supplierId']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> View Full Details</a>
							</td>			
						</tr>
						
					<?php
					}
				?>
				<tr>
					<td align="right" colspan="2"><strong>Total</strong></td>
					<td align="right"><strong><?php echo number_format($outertotal,2); ?></strong></td>
				</tr>
				
                </tbody>
            </table>
        </div>
       <!--<div class="row">
       	<form method="get" action="submitcash.php">
		<button type="submit" id="check" class="btn btn-primary pull-right" style="margin-right:30px;"> <i class="fa fa-check fa-fw"></i> Submit</button></form>
	</div>-->
    </div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<?php include('add_modal.php'); ?>
<script src="custom.js"></script>
</body>
</html>