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
            <h1 class="page-header">Sales Report</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="salesTable">
                <thead>
                    <tr>
						<th class="hidden"></th>
                        <th>Sales Date</th>
						<th>Customer</th>
                        <th>Total Purchase</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$sq=mysqli_query($conn,"select *, CONCAT(tblperson.firstName,' ' ,tblperson.middleName, ' ' ,tblperson.lastName) as 'name' 
						from tblsale 
						left join tblcustomer on tblcustomer.customerId=tblsale.customerId 
						inner join tblperson on tblperson.personId=tblcustomer.personId
						order by  	salesDate  desc");
					while($sqrow=mysqli_fetch_array($sq)){
					?>
						<tr>
							<td class="hidden"></td>
							<td><?php echo date('M d, Y h:i A',strtotime($sqrow['salesDate'])); ?></td>
							<td><?php echo $sqrow['name']; ?></td>
							<td align="right"><?php echo number_format($sqrow['salesTotal'],2); ?></td>
							<td>
								<a href="#detail<?php echo $sqrow['saleId']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> View Full Details</a>
								<?php include ('full_details.php'); ?>
							</td>
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