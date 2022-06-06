<?php

$provincestr = '';
$query = "SELECT * FROM tblprovince ORDER BY description ASC";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($result))
{
 $provincestr .= '<option value="'.$row["ProvinceId"].'">'.$row["description"].'</option>';
}

$categorystr = '';
   $cat=mysqli_query($conn,"select * from tblcategory");
                while($catrow=mysqli_fetch_array($cat)){               
    $categorystr.= '<option value="'.$catrow["categoryId"].'">'.$catrow["description"].'</option>';
                                    
            }
?>


<!-- Add Customer -->
      <div class="modal fade" id="addcustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Add New Customer</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="addcustomer.php" ">
                        <div class="container-fluid">
                        <div style="height:15px;"></div>
                        <?php $newID = 0;
                            $results = mysqli_query($conn, "SELECT customerId FROM tblcustomer order by customerId;");
                            while ($result = mysqli_fetch_array($results)) {
                                $newID = $result['customerId'];
                            }
                            $newID++; ?>
                       <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Customer Id:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="empId" value="<?php echo"$newID"; ?>" disabled="">
                        </div>     
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">FirstName:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="firstName" required>
                        </div>
                         <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">MiddleName:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="middleName" required>
                        </div>
                         <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">LastName:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="lastName" required>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Sex:</span>
                            <?php $sq=mysqli_query($conn,"select * from `tblsex`") ?>
                            <select style="width:400px; text-transform:capitalize;" class="form-control" name="sex">
                                <?php
                                    $sup=mysqli_query($conn,"select * from tblsex");
                                    while($suprow=mysqli_fetch_array($sup)){
                                        ?>
                                            <option value="<?php echo $suprow['sexId']; ?>"><?php echo $suprow['description']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                          <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Civil Status:</span>
                                <select style="width:400px; text-transform:capitalize;" class="form-control" name="civilStatus">
                             <?php
                                    $sup=mysqli_query($conn,"select * from tblcivilstatus");
                                    while($suprow=mysqli_fetch_array($sup)){
                                        ?>
                                            <option value="<?php echo $suprow['civilStatusId']; ?>"><?php echo $suprow['description']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                         <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Birth Day:</span>
                            <input type="date" class="form-control"  style="width:400px; line-height: 15px; "  name="birthDay">
                        </div>
                              <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Province:</span>
                           <select style="width:400px; text-transform:capitalize;" name="province" id="province" class="form-control action">
                                <option value="" >Select Province</option>
                                    <?php echo "$provincestr"; ?>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">City:</span>
                                 <select style="width:400px; text-transform:capitalize;" name="city" id="city" class="form-control action">
                                 <option value="">Select City</option>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Barangay:</span>
                               <select style="width:400px; text-transform:capitalize;" name="barangay" id="barangay" class="form-control">
                                    <option value="">Select Barangay</option>
                            </select>
                        </div>


                       
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Home No.:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="homeNo">
                        </div>
                
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Zip Code:</span>
                            <?php $sq=mysqli_query($conn,"select * from `tblZipcode`") ?>
                            <select style="width:400px; text-transform:capitalize;" class="form-control" name="zipCode">
                                    <?php   while ($row =mysqli_fetch_array($sq)):;?>
                                        <option><?php echo "$row[0]"; ?></option>
                                    <?php endwhile;?>
                            </select>
                        </div>
                      
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Contact Info:</span>
                            <input type="text" style="width:400px;" class="form-control" name="contact">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Telephone #:</span>
                            <input type="text" style="width:400px;" class="form-control" name="telnum">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">User Type:</span>
                            <input type="text" style="width:400px;" class="form-control" name="userType" value="Customer" disabled="">

                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Membership:</span>
                            <?php $sq=mysqli_query($conn,"select * from `tblmember`") ?>
                            <select style="width:400px; text-transform:capitalize;" class="form-control" name="member">
                           <?php
                                    $sup=mysqli_query($conn,"select * from tblmember");
                                    while($suprow=mysqli_fetch_array($sup)){
                                        ?>
                                            <option value="<?php echo $suprow['memberId']; ?>"><?php echo $suprow['description']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Username:</span>
                            <input type="text" style="width:400px;" class="form-control" name="userName" required>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Password:</span>
                            <input type="password" style="width:400px;" class="form-control" name="password" required>
                        </div>                          
                        </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" id="btnreset"class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <script type="text/javascript">
                        let addcustomer = document.getElementById('addcustomer');
                        let inputs = addcustomer.getElementsByTagName('input');
                        let select = addcustomer.getElementsByTagName('select');
                       
                  document.getElementById("btnreset").addEventListener("click", function() {
                    for (var i = inputs.length - 1; i >= 0; i--) {
                        inputs[i].value="";
                    }
                      for (var i = select.length - 1; i >= 0; i--) {
                        select[i].selectedIndex ="0";
                    }
                       <?php $newID = 0;
                            $results = mysqli_query($conn, "SELECT employeeId FROM tblemployee order by employeeId;");
                            while ($result = mysqli_fetch_array($results)) {
                                $newID = $result['employeeId'];
                            }
                            $newID++; ?>
                    inputs[0].value=<?php echo "$newID" ?>;
                    inputs[7].value="Employee";
                     
                    });


                    </script>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->


<script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
        
   if(action == "province" )
   {
    result = 'city';
   }
   else if(action == "city")
   {
    result = 'barangay';
   }
   else {
    result ='subCategory';
   }
   $.ajax({
    url:"admin/fetch_area.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
        console.log(action);

     $('select[name='+result+']').html(data);
    }
   })
  }

 });
});
</script>