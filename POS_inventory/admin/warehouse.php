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
            <h1 class="page-header">Warehouse
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addwarehouse"><i class="fa fa-plus-circle"></i> Add Warehouse</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="supTable">
                <thead>
                    <tr>
                    <th style="width: 2px;"> Id</th>
                        <th>Name</th>
                        <th>Address</th>
                     	<th style="width: 90px;">Contact #</th>
				
						<th>Username</th>
                        <th style="width: 55px;">Status</th>
						<th style="width: 55px;">Action</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$sq=mysqli_query($conn,"SELECT *, CONCAT(tblcity.description,', ' ,tblprovince.description, ' ') as warehouseAddress , tbluserstatus.description as status
						from tblwarehouse 
						inner join tblproductstatus on tblproductstatus.productStatusId=tblwarehouse.statusId 
						inner join tblcity on tblcity.cityId=tblwarehouse.cityId
						inner join tblprovince on tblprovince.provinceId=tblwarehouse.provinceId
						inner join tbluserstatus on tbluserstatus.statusId = tblwarehouse.statusId
						");
					while($sqrow=mysqli_fetch_array($sq)){
					?>
						<tr>
							<td><?php echo $sqrow['warehouseId']; ?></td>
							<td><?php echo $sqrow['warehouseName']; ?></td>
							<td><?php echo $sqrow['warehouseAddress']; ?></td>
							<td><?php echo $sqrow['telephoneNumber']; ?></td>
					
							<td><?php echo $sqrow['warehouseUserName']; ?></td>
							<td><?php echo $sqrow['status']; ?></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $sqrow['warehouseId']; ?>"><i class="fa fa-edit"></i> </button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $sqrow['warehouseId']; ?>"><i class="fa fa-trash"></i> </button>
								<?php include('ware_butt.php'); ?>
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