<!-- History -->
    <div class="modal fade" id="detail<?php echo $pqrow['supplierId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title" id="myModalLabel">Pay Roll Full Details</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$payment=mysqli_query($conn,"select * from tblpayment where supplierId='".$pqrow['supplierId']."'");
					$srow=mysqli_fetch_array($payment);
				?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
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
										$pd=mysqli_query($conn,"SELECT * FROM `tblpayment` WHERE supplierId = '".$pqrow['supplierId']."' AND paymentStatus = 'Submited' ");
										while($pdrow=mysqli_fetch_array($pd)){
											?>
											<tr>
												<td><?php echo ucwords($pdrow['paymentId']); ?></td>
												<td><?php echo $pdrow['orderLineId']; ?></td>
												<td align="right">
													<?php 
														$subtotal=$pdrow['amount'];
														echo number_format($subtotal,2);
														$total+=$subtotal;
													?>
												</td>
												<td style="width: 90px">
													<a href="#orderLinedetail<?php echo $pdrow['orderLineId'];?>" data-toggle="modal" class="btn btn-primary btn-sm"> <span class="glyphicon glyphicon-fullscreen"></span> View Details</a>
													<?php include ('orderlineDetails_modal.php');?>
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
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
