<!-- Logout -->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Logging out...</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<h5><center>Username: <strong><?php echo $user; ?></strong></center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <a href="logout.php" class="btn btn-danger"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
				
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<!-- My Account -->
    <div class="modal fade" id="account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title" id="myModalLabel">My Account </h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="update_account.php">
						<div style="height:10px;"></div>
						<div class="form-group input-group">
							<span class="input-group-addon" style="width:150px;">Username:</span>
							<input type="text" style="width:350px;" value="<?php echo $user; ?>" class="form-control" name="username">
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon" style="width:150px;">New Password:</span>
							<input type="password" style="width:350px;" value="<?php  ?>" class="form-control" name="password">
						</div><hr>
						<p>Type current password to update:</p>
						<div class="form-group input-group">
							<span class="input-group-addon" style="width:150px;">Password:</span>
							<input type="password" style="width:350px;" class="form-control" name="cpass" required>
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon" style="width:150px;">Re-type:</span>
							<input type="password" style="width:350px;" class="form-control" name="repass" required>
						</div> 						
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update</button>
					</form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->



<!-- Edit Profile -->
    <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit Profile</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        $a=mysqli_query($conn,"select * from tblwarehouse  where warehouseId='".$row['warehouseId']."'");
                        $b=mysqli_fetch_array($a);
                    ?>
                    <form role="form" method="POST" action="save_profile.php<?php echo '?id='.$row['warehouseId']; ?>" enctype="multipart/form-data">
                        <div class="container-fluid">
                        <div style="height:15px;"></div>
                        <div class="form-group input-group">
                          <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Company:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['warehouseName']); ?>" class="form-control" name="name">
                        </div>
                   
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Contact Info:</span>
                            <input type="text" style="width:400px;" value="<?php echo $b['telephoneNumber'] ?>" class="form-control" name="contact">
                        </div>
                        <div style="height:10px;"></div>

                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Province:</span>
                              <select style="width:400px;" class="form-control action" name="province" id="province">  value="<?php echo ucwords($b['province']); ?>">
                                <?php
                               $cat=mysqli_query($conn,"select * from tblprovince");
                                    while($catrow=mysqli_fetch_array($cat)){

                                        if($b['province'] == $catrow['description']){
                                             ?>
                                                 <option selected value="<?php echo $catrow['ProvinceId']; ?>"><?php echo $catrow['description']; ?></option>
                                             <?php
                                        }else{
                                            ?>
                                                <option value="<?php echo $catrow['ProvinceId']; ?>"><?php echo $catrow['description']; ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                          <div style="height:10px;"></div>
                              <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">City:</span>   
                             <select style="width:400px;" class="form-control action" name="city" id="city" >
                                <?php

                                    $cat=mysqli_query($conn,"select * from tblcity");
                                    while($catrow=mysqli_fetch_array($cat)){

                                        if($b['cityId'] == $catrow['cityId']){
                                             ?>
                                                 <option selected value="<?php echo $catrow['cityId']; ?>"><?php echo $catrow['description']; ?></option>
                                             <?php
                                        }else{
                                            ?>
                                                <option value="<?php echo $catrow['cityId']; ?>"><?php echo $catrow['description']; ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        </div>
                </div>                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->