    <!-- Delete Customer -->
    <div class="modal fade" id="del_<?php echo $cqrow['customerId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete / Deactivate Customer</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"Select tblcustomer.*, tblperson.personId, CONCAT(tblperson.firstName,' ',tblperson.middleName,' ',tblperson.lastName,' ') AS 'Fullname' from tblcustomer inner join tblperson on tblperson.personId=tblcustomer.personId where customerId ='".$cqrow['customerId']."'");
						$b=mysqli_fetch_array($a);
					?>
                    <h5><center>Customer Name: <strong><?php echo ucwords($b['Fullname']); ?></strong></center></h5>
					<form role="form" method="POST" action="deletecustomer.php<?php echo '?id='.$cqrow['customerId']; ?>">
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

<!-- Edit Customer -->
    <div class="modal fade" id="edit_<?php echo $cqrow['customerId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit Customer</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select tblcustomer.*,tblperson.*,tblaccount.accountUserName,tblaccount.accountPassword ,tblbarangay.barangayId, tblbarangay.description as brgy, tblprovince.description as province,tbluserstatus.description as status from tblperson inner join tblaccount on tblaccount.personId=tblperson.personId INNER join tblcustomer on tblcustomer.personId=tblperson.personId inner join tblprovince on tblprovince.provinceId=tblperson.provinceId INNER join tblbarangay on tblbarangay.barangayId=tblperson.brangayId inner join tbluserstatus on tbluserstatus.statusId=tblaccount.accountStatus  where tblcustomer.customerId='".$cqrow['customerId']."'"); 
						$b=mysqli_fetch_array($a);
					?>
					<div style="height:10px;"></div>
                    <form role="form" method="POST" action="edit_customer.php<?php echo '?id='.$cqrow['customerId']; ?>">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Cutomer Id:</span>
                            <input disabled type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['customerId']); ?>" class="form-control" name="customerId">
                        </div>
                            <div style="height:10px;"></div>
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
                             <select style="width:400px;" class="form-control action" name="city" id="city" >
                                <?php

                                    $cat=mysqli_query($conn,"select * from tblcity  where provinceId='".$b['provinceId']."' ");
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
                             <select style="width:400px;" class="form-control" name="barangay" ">
                                <?php

                                    $cat=mysqli_query($conn,"select * from tblbarangay where cityId='".$b['cityId']."'");
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
                            <input type="text" style="width:400px;" value="<?php echo $b['telephoneNumber'] ?>" class="form-control" name="telephoneNumber">
                        </div>
						<div style="height:10px;"></div>

                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Membership:</span>
                            <?php $sq=mysqli_query($conn,"select * from `tblmember`") ?>
                            <select style="width:400px; text-transform:capitalize;" class="form-control" name="member">
                                             <?php
                                    $cat=mysqli_query($conn,"select * from tblmember");
                                    while($catrow=mysqli_fetch_array($cat)){

                                        if($b['memberId'] == $catrow['memberId']){
                                             ?>
                                                 <option selected value="<?php echo $catrow['memberId']; ?>"><?php echo $catrow['description']; ?></option>
                                             <?php
                                        }else{
                                            ?>
                                                <option value="<?php echo $catrow['memberId']; ?>"><?php echo $catrow['description']; ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                            <div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Username:</span>
                            <input type="text" style="width:400px;" value="<?php echo $b['accountUserName'] ?>" class="form-control" name="username">
                        </div>
						<div style="height:10px;"></div>					
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Password:</span>
                            <input type="password" style="width:400px;"  class="form-control" name="password">
                        </div>
                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Status:</span>   
                             <select style="width:400px;" class="form-control" name="status" ">
                                <?php

                                    $cat=mysqli_query($conn,"select * from tbluserstatus");
                                    while($catrow=mysqli_fetch_array($cat)){

                                        if($b['status'] == $catrow['description']){
                                             ?>
                                                 <option selected value="<?php echo $catrow['statusId']; ?>"><?php echo $catrow['description']; ?></option>
                                             <?php
                                        }else{
                                            ?>
                                                <option value="<?php echo $catrow['statusId']; ?>"><?php echo $catrow['description']; ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
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