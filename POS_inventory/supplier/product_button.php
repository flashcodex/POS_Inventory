<!--stock -->
    <div class="modal fade" id="addstock_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Add Product Stock</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        $a=mysqli_query($conn,"SELECT * FROM tblproduct INNER JOIN tblinventory on tblproduct.productId = tblinventory.productId WHERE tblproduct.productId =$pid");
                        $b=mysqli_fetch_array($a);
                    ?>
                    <div style="height:10px;"></div>
                    <form role="form" method="POST" action="add_stock.php<?php echo '?id='.$pid; ?>" enctype="multipart/form-data">
                        <div class="form-group input-group">
                           <h5><center>Product Name: <strong><?php echo $b['description']; ?></strong></center></h5>
                        </div>
                        <div style="height:10px;"></div>
                         <div class="form-group input-group">
                           <h5><center>Current Stock: <strong><?php echo $b['stock']; ?></strong></center></h5>
                        </div>
                        <div style="height:10px;"></div>
        
                            <div class="form-group input-group">
                                 <div style="height:10px;"></div>
                                <span class="input-group-addon" style="width:120px;">Add Stock:</span>
                                <input type="text" style="width:150px;" value="<?php echo 1 ?>" class="form-control" name="stock">        
                              
                            </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Delete Product -->
    <div class="modal fade" id="delproduct_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete Product</h4></center>
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
                    <center><h4 class="modal-title" id="myModalLabel">Edit Product</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        $a=mysqli_query($conn,"SELECT DISTINCT tblproduct.productId , tblproduct.supplierId, tblproduct.categoryId,tblproduct.subCategoryId, tblproduct.description AS 'Name', tblcategory.description AS 'Category',  tblsubcategory.description AS 'Sub-Category', tblproduct.price, tblsupplier.supplierName AS 'Supplier' , tblproductstatus.description AS 'Status', tblproduct.productImage FROM tblproduct 
                            INNER JOIN tblproductstatus on tblproductstatus.productStatusId = tblproduct.statusId
                            INNER JOIN tblsupplier on tblsupplier.supplierId = tblproduct.supplierId 
                            INNER JOIN tblcategory on tblcategory.categoryId = tblproduct.categoryId  
                            INNER JOIN tblsubcategory on tblproduct.subCategoryId = tblsubcategory.subCategoryId WHERE tblproduct.productId = $pid");
                        $b=mysqli_fetch_array($a);
                    ?>
                    <div style="height:10px;"></div>
                    <form role="form" method="POST" action="edit_product.php<?php echo '?id='.$pid; ?>" enctype="multipart/form-data">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Product Name:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['Name']); ?>" class="form-control" name="name">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Category:</span>
                            <select style="width:400px;" class="form-control" name="category">
                                <option value="<?php echo $b['categoryId']?>"><?php echo $b['Category']; ?></option>
                                <?php
                                    $c=mysqli_query($conn,"select * from tblCategory where categoryId != '".$b['categoryId']."'");
                                    while($crow=mysqli_fetch_array($c)){
                                        ?>
                                            <option value="<?php echo $crow['categoryId']; ?>"><?php echo $crow['description']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Sub-Category:</span>
                            <select style="width:400px;" class="form-control" name="subcategory">
                                <option value="<?php echo $b['subCategoryId']?>"><?php echo $b['Sub-Category']; ?></option>
                                <?php
                                    $c=mysqli_query($conn,"select * from tblSubCategory where subCategoryId != '".$b['subCategoryId']."'");
                                    while($crow=mysqli_fetch_array($c)){
                                        ?>
                                            <option value="<?php echo $crow['subCategoryId']; ?>"><?php echo $crow['description']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div style="height:10px;"></div>
        
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Price:</span>
                            <input type="text" style="width:400px;" value="<?php echo $b['price'] ?>" class="form-control" name="price">
                        </div>
                        <div style="height:10px;"></div>

                                   
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Photo:</span>
                            <input type="file" style="width:400px;" class="form-control" name="image">
                        </div>
                        <div style="height:10px;"></div>
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




