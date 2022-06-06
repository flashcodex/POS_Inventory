<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
<div style="height:50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Receive Cash
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
                    	<th>Payee Id</th>
                    	<th>Date</th>
                        <th>Amount</th>  
                        <th>Details</th>
                </thead>
                <tbody>
				<?php
					
					$date =date("Y/m/d");
					$outertotal = 0;
					$pq=mysqli_query($conn,"SELECT * FROM `tblsupplierpayee` WHERE supplierId = $userId");

					while($pqrow=mysqli_fetch_array($pq)){
						
					?>
						<tr>
							<td><?php echo $pqrow['supplierpayeeId']; ?></td>
							<td><?php echo $pqrow['supplierDate']; ?></td>
							<td align="right"><?php echo number_format($pqrow['amountRecieve'],2); ?></td>
							
							<?php 
								$subtotal = $pqrow['amountRecieve'];
								$outertotal+=$subtotal;
							?>
							<td style="width: 30px">
								<a href="#detail<?php echo $pqrow['supplierpayeeId']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> View Full Details</a>
								<?php include ('modal_history.php'); ?>
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
    </div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<?php include('add_modal.php'); ?>
<script src="custom.js"></script>
</body>
</html>