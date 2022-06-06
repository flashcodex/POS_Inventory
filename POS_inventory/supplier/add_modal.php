<?php

$categorystr = '';
   $cat=mysqli_query($conn,"select * from tblcategory");
                while($catrow=mysqli_fetch_array($cat)){               
    $categorystr.= '<option value="'.$catrow["categoryId"].'">'.$catrow["description"].'</option>';
                                    
            }
?>

<!-- Add Product -->
     <div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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