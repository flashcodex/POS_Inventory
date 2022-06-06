<!-- Delete Product -->
    <div class="modal fade" id="delproduct_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Decline Shipment</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select * from tblproduct where productId='$pid'");
						$b=mysqli_fetch_array($a);
					?>
                    <h5><center>Product Name: <strong><?php echo $b['description']; ?></strong></center></h5>
					<form role="form" method="POST" action="deleteproduct.php<?php echo '?id='.$pid; ?>">
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

<!-- Edit Product -->
    <div class="modal fade" id="editprod_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Ship Product</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        $a=mysqli_query($conn,"select  tblproduct.*, tblproduct.price as prodprice ,tblcustomer.customerId, tblorderline.*,CONCAT(tblperson.firstName,' ' ,tblperson.middleName, ' ' ,tblperson.lastName) as 'name',tblorder.orderId from tblproduct 
                        inner join tblorderline on tblproduct.productId =tblorderline.productId 
                        inner join tblorder     on tblorder.orderId     =tblorderline.orderId 
                        inner join tblcustomer  on tblcustomer.customerId=tblorder.customerId
                        inner join tblperson    on tblperson.personId =tblcustomer.personId where tblproduct.productId= $pid");
                        $b=mysqli_fetch_array($a);
                    ?>
                    <div style="height:10px;"></div>
                    <form role="form" method="POST" action="edit_product.php<?php echo '?id='.$pid; ?>" enctype="multipart/form-data">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Order Id:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['orderId']); ?>" class="form-control" name="name" >
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Product Name:</span>
                            <input  style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['description']); ?>" class="form-control" name="name" >
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Customer :</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['name']); ?>" class="form-control" name="name">
                        </div>
                        <div style="height:10px;"></div>
        
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Price:</span>
                            <input type="text" style="width:400px;" value="<?php echo $b['prodprice'] ?>" class="form-control" name="price">
                        </div>
                        <div style="height:10px;"></div>

                       <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Status:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['status']); ?>" class="form-control" name="name">
                        </div>

                                   
    
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Ship</button>
                    </form>
                </div>
        </div>
    </div>
<!-- /.modal -->




