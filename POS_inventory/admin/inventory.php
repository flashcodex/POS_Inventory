<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<div id="wrapper">
<?php include('navbar.php'); ?>
<div style="height:50px;"></div>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Inventory Report</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="invTable">
                <thead>
                    <tr>
						<th class="hidden"></th>
                        <th>Date</th>
						<th>Name</th>
                        <th>Action</th>
						<th>Product Name</th>
						<th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$iq=mysqli_query($conn,"select * from tblinventorylog left join tblproduct on tblproduct.productId=tblinventorylog.productId order by 	invetoryLogDate desc");
					while($iqrow=mysqli_fetch_array($iq)){
					?>
						<tr>
							<td class="hidden"></td>
							<td><?php echo date('M d, Y h:i A',strtotime($iqrow['invetoryLogDate'])); ?></td>
					
							<td align="right"><?php echo $iqrow['customerId']; ?></td>
							<td align="right"><?php echo $iqrow['action']; ?></td>
							<td align="right"><?php echo $iqrow['description']; ?></td>
							<td align="right"><?php echo $iqrow['quantity']; ?></td>
						</tr>
					<?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<?php include('add_modal.php'); ?>
<script src="custom.js"></script>
</body>
</html>