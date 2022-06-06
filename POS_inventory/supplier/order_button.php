<!--confirm order-->
    <div class="modal fade" id="confirm_<?php echo $orderLineId; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Confirm Order</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        $a=mysqli_query($conn,"SELECT * FROM tblorderline INNER JOIN tblorder on tblorderline.orderId = tblorder.orderId INNER JOIN tblproduct on tblorderline.productId = tblproduct.productId INNER JOIN tblinventory on tblproduct.productId = tblinventory.productId WHERE tblorderline.orderLineId =$orderLineId");
                        $b=mysqli_fetch_array($a);
                    ?>
                    <div style="height:10px;"></div>
                    <form role="form" method="POST" action="confirm_order.php<?php echo '?id='.$orderLineId; ?>" enctype="multipart/form-data">
                        <div class="form-group input-group">
                           <h5><center>Customer Id: <strong><?php echo $b['customerId']; ?></strong></center></h5>
                        </div>
                        <div style="height:10px;"></div>
                         <div class="form-group input-group">
                           <h5><center>Product Name: <strong><?php echo $b['description']; ?></strong></center></h5>
                        </div>
                        <div style="height:10px;"></div>
                         <div class="form-group input-group">
                           <h5><center>Price: <strong><?php echo $b['price']; ?></strong></center></h5>
                        </div>
                        <div style="height:10px;"></div>
                         <div class="form-group input-group">
                           <h5><center>Quantity: <strong><?php echo $b['quantity']; ?></strong></center></h5>
                        </div>
                        <div style="height:10px;"></div>
                         <div class="form-group input-group">
                           <h5><center>Stock: <strong><?php echo $b['stock']; ?></strong></center></h5>
                        </div>
                        <div style="height:10px;"></div>
                         <div class="form-group input-group">
                           <h5><center>Status: <strong><?php echo $b['status']; ?></strong></center></h5>
                        </div>
                        <div style="height:10px;"></div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- decline order -->
    <div class="modal fade" id="decline_<?php echo $orderLineId; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Decline Order</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        $a=mysqli_query($conn,"SELECT * FROM tblorderline INNER JOIN tblorder on tblorderline.orderLineId = tblorder.orderId INNER JOIN tblproduct on tblorderline.productId = tblproduct.productId INNER JOIN tblinventory on tblproduct.productId = tblinventory.productId WHERE tblorderline.orderLineId =$orderLineId");
                        $b=mysqli_fetch_array($a);
                    ?>
                    <div style="height:10px;"></div>
                    <form role="form" method="POST" action="decline_order.php<?php echo '?id='.$orderLineId; ?>" enctype="multipart/form-data">
                        <div class="form-group input-group">
                           <h5><center>Customer Id: <strong><?php echo $b['customerId']; ?></strong></center></h5>
                        </div>
                        <div style="height:10px;"></div>
                         <div class="form-group input-group">
                           <h5><center>Product Name: <strong><?php echo $b['description']; ?></strong></center></h5>
                        </div>
                        <div style="height:10px;"></div>
                         <div class="form-group input-group">
                           <h5><center>Price: <strong><?php echo $b['price']; ?></strong></center></h5>
                        </div>
                        <div style="height:10px;"></div>
                         <div class="form-group input-group">
                           <h5><center>Quantity: <strong><?php echo $b['quantity']; ?></strong></center></h5>
                        </div>
                        <div style="height:10px;"></div>
                         <div class="form-group input-group">
                           <h5><center>Stock: <strong><?php echo $b['stock']; ?></strong></center></h5>
                        </div>
                        <div style="height:10px;"></div>
                         <div class="form-group input-group">
                           <h5><center>Status: <strong><?php echo $b['status']; ?></strong></center></h5>
                        </div>
                        <div style="height:10px;"></div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->