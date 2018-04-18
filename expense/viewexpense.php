<?php  


 include("./functions.php");

  
  




?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		
         .middle 
         {
         	position: absolute;
         	top:25%;
         	left: 40%;
         }

       .table
       {
          height:300px;
          width: 600px;
          border:1px solid red;
          background-color: yellow;
          position:absolute;
          top:300px;
          left:30%;
        



       }

	</style>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>
<body style="background-color: skyblue;">
   
    <?php include("./header.php"); ?>


    <div class="middle">

      <form action="./viewexpense.php" method="post" >

          <label for="categoryname">select category Name</label> 
          <select name="categorylist" style="width:15em;" id="brand">
            <option value="">select category... </option>
          	
            <?php        
                       
                       if($connection) 
                       {
                         $rows=$db->getCategoryNames();

                         while ($row =$rows->fetch_assoc()) {
                           # code...
                     ?>
                <option value="<?php echo $row["categoryname"]; ?>"> <?php echo $row["categoryname"]; ?> </option><?php  }} ?>
                   
     

          </select>

         
       </form>

    </div>

    <div class="table" id="show_table">
      
           <table border="1" style="margin: auto">

            <tr>
              <th>userid</th>
              <th>categoryname</th>
              <th>Amount</th>
              <th>reason</th>
            </tr>

            <?php echo $db->fill_expenses(); ?>

           </table>
         
        



    </div>

    <script type="text/javascript">
      
     $(document).ready(function(){  
      $('#brand').change(function(){  
           var brand_id = $(this).val();  
           $.ajax({  
                url:"load_data.php",  
                method:"GET",  
                data:{brand_id:brand_id},  
                success:function(data){  
                     $('#show_table').html(data);  
                }  
           });  
      });  
 });  



    </script>


</body>
</html>