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
<!-- Add Product -->
     <div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Add New Product</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="addproduct.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                        <div style="height:15px;"></div>
                        
                        <?php $newID = 0;
                            $results = mysqli_query($conn, "SELECT productId FROM tblproduct order by productId;");
                            while ($result = mysqli_fetch_array($results)) {
                                $newID = $result['productId'];
                            }
                            $newID++; ?>
                       <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Product Id:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="productId" value="<?php echo"$newID"; ?>" disabled="">
                        </div>     

                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Name:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Category:</span>
                            <select style="width:400px;" class="form-control  action" id="Category" name="Category">
                                <option value="" >Select Category</option>
                                    <?php echo "$categorystr"; ?>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Sub Category:</span>
                            <select style="width:390px;" class="form-control " id="subCategory" name="Subcategory">
                             <option value="">Select SubCategory</option>
                            </select>
                        </div>

     
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Price:</span>
                            <input type="text" style="width:400px;" class="form-control" name="price" required>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Photo:</span>
                            <input type="file" style="width:400px;" class="form-control" name="image">
                        </div>            
                        </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Add Employee -->
    <div class="modal fade" id="addemployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Add New Employee</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="addemployee.php" ">
                        <div class="container-fluid">
                        <div style="height:15px;"></div>
                        <?php $newID = 0;
                            $results = mysqli_query($conn, "SELECT employeeId FROM tblemployee order by employeeId;");
                            while ($result = mysqli_fetch_array($results)) {
                                $newID = $result['employeeId'];
                            }
                            $newID++; ?>

                       <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Employee Id:</span>
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
                            <input type="text" style="width:400px;" class="form-control" name="userType" value="Employee" disabled="">

                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Username:</span>
                            <input type="text" style="width:400px;" class="form-control" name="userName" required>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Password:</span>
                            <input type="password" style="width:400px;" class="form-control" name="password" required>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Warehouse: </span>
                                <select style="width:400px; text-transform:capitalize;" class="form-control" name="warehouseId">
                             <?php
                                    $sup=mysqli_query($conn,"select * from tblwarehouse");
                                    while($suprow=mysqli_fetch_array($sup)){
                                        ?>
                                            <option  value="<?php echo $suprow['warehouseId']; ?>"><?php echo $suprow['warehouseName']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Photo:</span>
                            <input type="file" style="width:400px;" class="form-control" name="image">
                        </div>                               
                        </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" id="btnreset"class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <script type="text/javascript">
                        let addemployee = document.getElementById('addemployee');
                        let empinputs = addemployee.getElementsByTagName('input');
                        let empselect = addemployee.getElementsByTagName('select');
                       
                  document.getElementById("btnreset").addEventListener("click", function() {
                    for (var i = empinputs.length - 1; i >= 0; i--) {
                        empinputs[i].value="";
                    }
                      for (var i = empselect.length - 1; i >= 0; i--) {
                        empselect[i].selectedIndex ="0";
                    }
                       <?php $newID = 0;
                            $results = mysqli_query($conn, "SELECT employeeId FROM tblemployee order by employeeId;");
                            while ($result = mysqli_fetch_array($results)) {
                                $newID = $result['employeeId'];
                            }
                            $newID++; ?>
                    empinputs[0].value=<?php echo "$newID" ?>;
                    empinputs[7].value="Employee";
                     
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
        
   if(action == "province")
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
    url:"../admin/fetch_area.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
        console.log(action +" "+ query);

     $('#'+result).html(data);
    }
   })
  }

 });
});
</script>