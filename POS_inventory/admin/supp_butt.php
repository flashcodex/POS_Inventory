<!-- Delete Supplier -->
    <div class="modal fade" id="del_<?php echo $sqrow['supplierId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete Supplier</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select * from tblsupplier where supplierId='".$sqrow['supplierId']."'");
						$b=mysqli_fetch_array($a);
					?>
                    <h5><center>Company Name: <strong><?php echo ucwords($b['supplierName']); ?></strong></center></h5>
					<form role="form" method="POST" action="deletesupplier.php<?php echo '?id='.$sqrow['supplierId']; ?>">
                </div>                 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
					</form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit Supplier -->
    <div class="modal fade" id="edit_<?php echo $sqrow['supplierId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit Supplier</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select * from tblsupplier  where supplierId='".$sqrow['supplierId']."'");
						$b=mysqli_fetch_array($a);
					?>
					<div style="height:10px;"></div>
                    <form role="form" method="POST" action="edit_supplier.php<?php echo '?id='.$sqrow['supplierId']; ?>">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Id:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['supplierId']); ?>" class="form-control" name="supplierId">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Company:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['supplierName']); ?>" class="form-control" name="name">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Address:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['supplierAddress']); ?>" class="form-control" name="address">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Contact Info:</span>
                            <input type="text" style="width:400px;" value="<?php echo $b['telephoneNumber'] ?>" class="form-control" name="contact">
                        </div>

						<div style="height:10px;"></div>
					   <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Email:</span>
                            <input type="text" style="width:400px;" value="<?php echo $b['emailAddress'] ?>" class="form-control" name="email">
                        </div>
						<div style="height:10px;"></div>

                       <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Username:</span>
                            <input type="text" style="width:400px;" value="<?php echo $b['supplierUserName'] ?>" class="form-control" name="username">
                        </div>
                        <div style="height:10px;"></div>
                       <div style="height:10px;"></div>
                       <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Password:</span>
                            <input type="password" style="width:400px;" class="form-control" name="password">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Status:</span>
                            <select style="width:400px; text-transform:capitalize;" class="form-control" name="status">
                                             <?php
                                    $cat=mysqli_query($conn,"select * from tblproductstatus");
                                    while($catrow=mysqli_fetch_array($cat)){

                                        if($b['statusId'] == $catrow['productStatusId']){
                                             ?>
                                                 <option selected value="<?php echo $catrow['productStatusId']; ?>"><?php echo $catrow['description']; ?></option>
                                             <?php
                                        }else{
                                            ?>
                                                <option value="<?php echo $catrow['productStatusId']; ?>"><?php echo $catrow['description']; ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update</button>
					</form>
                </div>
        </div>
    </div>
<!-- /.modal -->