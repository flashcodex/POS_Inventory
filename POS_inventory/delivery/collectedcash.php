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
                    	<th>Payment Id</th>
                        <th>OrderLine Id</th>
                        <th>Ammount</th>
                </thead>
                <tbody>
				<?php
					$deliveryId = $_SESSION['id'];
					$date =date("Y/m/d");
					$total = 0;
					$pq=mysqli_query($conn,"SELECT tblpayment.* FROM tblpayment where tblpayment.deliveryId = '$deliveryId' AND tblpayment.paymentStatus = 'On-Hand'");

					while($pqrow=mysqli_fetch_array($pq)){
						
					?>
						<tr>
							<td><?php echo $pqrow['paymentId']; ?></td>
							<td><?php echo $pqrow['orderLineId']; ?></td>
							<td align="right"><?php echo number_format( $pqrow['amount'],2); ?></td>	
							<?php 
								$subtotal = $pqrow['amount'];
								$total+=$subtotal;
							?>			
						</tr>
						
					<?php
					}
				?>
				<tr>
					<td align="right" colspan="2"><strong>Total</strong></td>
					<td align="right"><strong><?php echo number_format($total,2); ?></strong></td>
				</tr>
				
                </tbody>
            </table>
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