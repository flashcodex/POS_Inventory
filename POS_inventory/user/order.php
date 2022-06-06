<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<?php include('cart_search_field.php'); ?>
	<div style="height: 50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Order History</h1>
        </div>
    </div>
                <!-- /.row -->
				<div class="row">
                <div class="col-lg-12">
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable">
						<thead>
							<tr>
								<th class="hidden"></th>
								<th>Order Date</th>
								<th>Order Id</th>
								<th>Total Amount</th>
								<th>State</th>
							</tr>
						</thead>
						<tbody>
							<?php

								$orderhistory=mysqli_query($conn,"select *,SUM(totalPrice) as TotalPrice from tblorder inner join tblorderline on tblorder.orderId = tblorderline.orderId where customerId= ".$_SESSION['custId']." AND orderStatus != 'Done' GROUP BY tblorder.orderId order by orderDate");
								while($hrow=mysqli_fetch_array($orderhistory)){
									?>
										<tr>
											<td class="hidden"></td>
											<td><?php echo date("M d, Y - h:i A", strtotime($hrow['orderDate']));?></td>
											<td><?php echo number_format($hrow['orderId']); ?></td>
											<td><?php echo number_format($hrow['TotalPrice'],2); ?></td>
											<td>
												<a href="#detail<?php echo $hrow['orderId']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> View Full Details</a>
												<?php include ('modal_order.php'); ?>
											</td>
											
										</tr>
									<?php
								}
							?>
						</tbody>
                    </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
	
	
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<script src="custom.js"></script>
<script>
$(document).ready(function(){
	$('#order').addClass('active');
	
	$('#historyTable').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": true,
	"pageLength": 7
	});
});
</script>
</body>
</html>