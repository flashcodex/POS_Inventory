<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
<div style="height:50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product Sales Report</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
                <thead>
                    <tr>
						<th class="hidden"></th>
                        <th>Purchase Date</th>
                        <th>Customer</th>
						<th>Product Name</th>
						<th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                
				<?php
					$sq=mysqli_query($conn,"select DISTINCT tblsale.salesDate,CONCAT(tblperson.firstName,' ' ,tblperson.middleName, ' ' ,tblperson.lastName) as 'name', tblproduct.description, tblsalesdetail.saleQuantity 
from tblproduct 

left join tblinventorylog on tblproduct.productId= tblinventorylog.productId 
left join tblsalesdetail on tblproduct.productId = tblsalesdetail.productId
left join tblsale on tblsale.saleId=tblsalesdetail.saleId 
left join tblcustomer on tblcustomer.customerId=tblsale.customerId
inner join tblperson on tblperson.personId=tblcustomer.personId
where tblproduct.supplierId= '$userId' order by tblsale.salesDate desc");;
					while($sqrow=mysqli_fetch_array($sq)){
						
					?>
						<tr>
							<td class="hidden"></td>
							<td><?php echo date('M d, Y h:i A',strtotime($sqrow['salesDate'])); ?></td>
							<td><?php echo $sqrow['name']; ?></td>
							<td><?php echo $sqrow['description']; ?></td>
					
							<td><?php echo $sqrow['saleQuantity']; ?></td>
						</tr>
					<?php
					}
				?>
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