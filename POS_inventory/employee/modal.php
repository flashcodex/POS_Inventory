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
    <?php
        $cq=mysqli_query($conn,"select tblemployee.*,tblperson.*,tblaccount.accountUserName,tblaccount.accountPassword ,tblbarangay.barangayId, tblbarangay.description as brgy, tblprovince.description as province,tbluserstatus.description as status from tblperson inner join tblaccount on tblaccount.personId=tblperson.personId INNER join tblemployee on tblemployee.personId=tblperson.personId inner join tblprovince on tblprovince.provinceId=tblperson.provinceId INNER join tblbarangay on tblbarangay.barangayId=tblperson.brangayId inner join tbluserstatus on tbluserstatus.statusId=tblaccount.accountStatus where tblperson.personId=$personId");
        $b=mysqli_fetch_array($cq);
    ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit Profile</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="save_profile.php<?php echo '?id='.$_SESSION['id']; ?>" enctype="multipart/form-data">
                        <div class="container-fluid">
                        <div style="height:15px;"></div>

  <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">First Name:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['firstName']); ?>" class="form-control" name="firstName">
                        </div>
                            <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Middle Name:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['middleName']); ?>" class="form-control" name="middleName">
                        </div>
                            <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Last Name:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['lastName']); ?>" class="form-control" name="lastName">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Sex:</span>
                            <?php $sq=mysqli_query($conn,"select * from `tblsex`") ?>
                            <select style="width:400px; text-transform:capitalize;" class="form-control" name="sex">
                                    <?php   while ($catrow =mysqli_fetch_array($sq)){
                                       if($b['sexId'] == $catrow['sexId']){
                                             ?>
                                                 <option selected value="<?php echo $catrow['sexId']; ?>"><?php echo $catrow['description']; ?></option>
                                             <?php
                                        }else{
                                            ?>
                                                <option value="<?php echo $catrow['sexId']; ?>"><?php echo $catrow['description']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                            </select>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Civil Status:</span>
                                <select style="width:400px; text-transform:capitalize;" class="form-control" name="civilStatus">
                                    <?php $sq=mysqli_query($conn,"select * from `tblcivilstatus`") ?>
                                    <?php   while ($catrow =mysqli_fetch_array($sq)){
                                        if($b['civilStatusId'] == $catrow['civilStatusId']){
                                             ?>
                                                 <option selected value="<?php echo $catrow['civilStatusId']; ?>"><?php echo $catrow['description']; ?></option>
                                             <?php
                                        }else{
                                            ?>
                                                <option value="<?php echo $catrow['civilStatusId']; ?>"><?php echo $catrow['description']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                  
                            </select>
                        </div>
                        <div style="height:10px;"></div>
                          <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Birth Day:</span>
                            <input type="date" class="form-control"  style="width:400px; line-height: 15px; "  value="<?php echo strftime('%Y-%m-%d', strtotime($b['birthDay'])); ?>"  name="birthDay">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Province:</span>
                              <select style="width:400px;" class="form-control action" name="province" id="province" value="<?php echo ucwords($b['province']); ?>">
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
                             <select style="width:400px;" class="form-control action" name="city" id="city">
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
                           <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Barangay:</span>   
                             <select style="width:400px;" class="form-control" name="barangay" id="barangay">
                                <?php

                                    $cat=mysqli_query($conn,"select * from tblbarangay");
                                    while($catrow=mysqli_fetch_array($cat)){

                                        if($b['brgy'] == $catrow['description']){
                                             ?>
                                                 <option selected value="<?php echo $catrow['barangayId']; ?>"><?php echo $catrow['description']; ?></option>
                                             <?php
                                        }else{
                                            ?>
                                                <option value="<?php echo $catrow['barangayId']; ?>"><?php echo $catrow['description']; ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Home No.:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="homeNo" value="<?php echo $b['address'] ?>">
                        </div>
                         
                         <div style="height:10px;"></div>
                          <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Zip Code:</span>
                            <?php $sq=mysqli_query($conn,"select * from `tblZipcode`") ?>
                            <select style="width:400px; text-transform:capitalize;" class="form-control" name="zipCode">
                                         <?php
                                    $cat=mysqli_query($conn,"select * from tblZipcode");
                                    while($catrow=mysqli_fetch_array($cat)){

                                        if($b['zipCode'] == $catrow['zipCode']){
                                             ?>
                                                 <option selected value="<?php echo $catrow['zipCode']; ?>"><?php echo $catrow['zipCode']; ?></option>
                                             <?php
                                        }else{
                                            ?>
                                                <option value="<?php echo $catrow['zipCode']; ?>"><?php echo $catrow['zipCode']; ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Contact Info:</span>
                            <input type="text" style="width:400px;" value="<?php echo $b['cellPhoneNumber'] ?>" class="form-control" name="cellPhoneNumber">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Telephone No:</span>
                            <input type="text" style="width:390px;" value="<?php echo $b['telephoneNumber'] ?>" class="form-control" name="telephoneNumber">
                        </div>
                        <div style="height:10px;"></div>

    
                          
                        <div style="height:10px;"></div>
                       



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