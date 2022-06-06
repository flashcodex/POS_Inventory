<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
<div style="height:50px;"></div>
	<div class="row">
        <div class="col-lg-12">
              <h1 class="page-header">Employees
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addemployee"><i class="fa fa-plus-circle"></i> Add Employee</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
                <thead>
                      <tr>
                    <th style="width: 2px;"> Id</th>
                        <th>Name</th>
                        <th style="width: 50px">Username</th>
                     	<th style="width: 40px">Sex</th>
						<th>Address</th>
                        <th  style="width: 90px">Contact #</th>
                      
                        <th  style="width: 90px">Status</th>
						<th style="width: 60px;">Action</th>
                    </tr>
                </thead>
                <tbody>
				
				<?php
					$sql ="SELECT tblemployee.employeeId, tblwarehouse.warehouseName, CONCAT(tblperson.firstName,' ' ,tblperson.middleName, ' ' ,tblperson.lastName) as 'name', tblaccount.accountUserName, CONCAT(tblbarangay.description,', ',tblcity.description,', ',tblprovince.description) AS 'Address',  tblperson.cellPhoneNumber, tbluserstatus.description as 'status',tblsex.description as sex 
					 FROM `tblemployee` 
					 inner join tblperson on tblperson.personId=tblemployee.personId 
					 INNER join tblaccount on tblperson.personId=tblaccount.personId  
					 INNER join tblprovince  on tblprovince.ProvinceId =tblperson.provinceId 
					 INNER join tblcity on tblcity.cityId =tblperson.cityId 
					 INNER join tblbarangay  on tblbarangay.barangayId=tblperson.brangayId  
                     INNER join tbluserstatus on tbluserstatus.statusId=tblaccount.accountStatus
                     inner join tblsex on tblsex.sexId=tblperson.sexId 
                     inner join tblwarehouse on tblwarehouse.warehouseId=tblemployee.warehouseId
					 where tblperson.userTypeId=2 and tblwarehouse.warehouseName='$warehouseName'";

					$cq=mysqli_query($conn,$sql);
					while($cqrow=mysqli_fetch_array($cq)){
					?>
						<tr>
							<td><?php echo $cqrow['employeeId']; ?></td>
							<td><?php echo $cqrow['name']; ?></td>
							<td><?php echo $cqrow['accountUserName']; ?></td>
							<td><?php echo $cqrow['sex']; ?></td>
							<td><?php echo $cqrow['Address']; ?></td>
							<td><?php echo $cqrow['cellPhoneNumber']; ?></td>
							
							<td><?php echo $cqrow['status']; ?></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $cqrow['employeeId']; ?>"><i class="fa fa-edit"></i> </button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $cqrow['employeeId']; ?>"><i class="fa fa-trash"></i> </button>
								<?php include('employee_button.php'); ?>
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
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<?php include('add_modal.php'); ?>
<script src="custom.js"></script>
</body>
</html>