<!-- History -->
    <div class="modal fade" id="detail<?php echo $hrow['orderId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title" id="myModalLabel">Order Full Details</h4></center>
                </div>
                <div class="modal-body">
				<?php

					$order=mysqli_query($conn,"select * from tblorder INNER join tblorderline on tblorder.orderId = tblorderline.orderId where tblorderline.orderId='".$hrow['orderId']."'");
					$srow=mysqli_fetch_array($order);
				?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="pull-right">Date: <?php echo date("M d, Y - h:i A", strtotime($srow['orderDate'])); ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Product Name</th>
										<th>Price</th>
										<th>Purchase Qty</th>
										<th>SubTotal</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$total=0;
										$pd=mysqli_query($conn,"select * from tblorder INNER join tblorderline on tblorder.orderId = tblorderline.orderId INNER JOIN tblproduct on tblorderline.productId = tblproduct.productId where tblorderline.orderId='".$hrow['orderId']."'");
										while($pdrow=mysqli_fetch_array($pd)){
											?>
											<tr>
												<td><?php echo ucwords($pdrow['description']); ?></td>
												<td align="right"><?php echo number_format($pdrow['price'],2); ?></td>
												<td><?php echo $pdrow['quantity']; ?></td>
												<td align="right">
													<?php 
														$subtotal=$pdrow['price']*$pdrow['quantity'];
														echo number_format($subtotal,2);
														$total+=$subtotal;
													?>
												</td>
												<td><?php echo $pdrow['status']; ?></td>
											</tr>
											<?php
										}
									?>
									<tr>
										<td align="right" colspan="3"><strong>Total</strong></td>
										<td align="right"><strong><?php echo number_format($total,2); ?></strong></td>
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
