<!-- History -->
    <div class="modal fade" id="orderLinedetail<?php echo $detailsrow['orderLineId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title" id="myModalLabel">Order Line Full Details</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$payment=mysqli_query($conn,"select * from tblorderline inner join tblorder on tblorderline.orderId = tblorder.orderId where orderLineId='".$detailsrow['orderLineId']."'");
					$srow=mysqli_fetch_array($payment);
				?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="pull-right">Date: <?php echo date("F d, Y", strtotime($srow['orderDate'])); ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Product Name</th>
										<th>Quantity</th>
										<th>Price</th>
										<th>Total Price </th>
									</tr>
								</thead>
								<tbody>
									<?php
									
										$pd=mysqli_query($conn,"SELECT * , tblproduct.description FROM tblorderline INNER JOIN tblproduct on tblproduct.productId = tblorderline.productId WHERE tblorderline.orderLineId = '".$detailsrow['orderLineId']."'");
										$a=mysqli_fetch_array($pd)
									?>
											<tr>
												<td><?php echo $a['description'];?> </td>
												<td><?php echo $a['quantity'];?> </td>
												<td><?php echo $a['price'];?> </td>
												<td><?php echo $a['totalPrice'];?> </td>
											</tr>	
								</tbody>
							</table>
						</div>
					</div>      
				</div>
				</div>
                
            </div>
        </div>
    </div>
