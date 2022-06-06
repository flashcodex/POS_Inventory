
 $(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
        
   if(action == "province" || action == "provincecust")
   {
    result = 'city';
   }
   else if(action == "city")
   {
    result = 'barangay';
   }
    else if(action == "Category1"){
    result ='Subcategory1';
   }
   else {
    result ='Subcategory';
   }
   $.ajax({
    url:"fetch_area.php",
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

