<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php');
$id =$_GET["id"];
$_SESSION['supplierId'] = $id; ?>

<div class="container">
<div style="height:50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pay Roll Details
				<span class="pull-right">
				
				</span>
			</h1>
        </div>
    </div>
    <div class="row">

        		<?php
					$payment=mysqli_query($conn,"select * from tblpayment inner join tblsupplier on tblpayment.supplierId = tblsupplier.supplierId where tblpayment.supplierId = $id");
					$srow=mysqli_fetch_array($payment);
				?>

        <div class="col-lg-12">
							<h3><p class="pull-left">Supplier Name: <?php echo $srow['supplierName'];?></p></h3>
							<p class="pull-right">Date: <?php echo date("F d, Y", strtotime($srow['paymentdate'])); ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Payment ID</th>
										<th>OrderLine ID</th>
										<th>SubTotal</th>
										<th>Details</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$total=0;
										$pd=mysqli_query($conn,"SELECT * FROM `tblpayment` WHERE supplierId = $id AND paymentStatus = 'Submited' ");
										while($detailsrow=mysqli_fetch_array($pd)){
											?>
											<tr>
												<td><?php echo ucwords($detailsrow['paymentId']); ?></td>
												<td><?php echo $detailsrow['orderLineId']; ?></td>
												<td align="right">
													<?php 
														$subtotal=$detailsrow['amount'];
														echo number_format($subtotal,2);
														$total+=$subtotal;
													?>
												</td>

												<td style="width: 90px">
													
	
												<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#details<?php echo $detailsrow['orderLineId']; ?>"><i class="fa fa-eye"></i> </button>
												<?php include('orderdetails.php'); ?>
													
												</td>
											</tr>
										<?php
										}
									?>
									<tr>
										<td align="right" colspan="2"><strong>Total</strong></td>
										<td align="right"><strong><?php echo number_format($total,2); ?> </strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>      
       <div class="row">
       	<form method="get" action="submitcash.php">
		<button type="submit" id="check" class="btn btn-primary pull-right" style="margin-right:30px;"> <i class="fa fa-check fa-fw"></i> Submit</button></form>

	</div>
    </div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<?php include('add_modal.php'); ?>

<script src="custom.js"></script>
</body>
</html>