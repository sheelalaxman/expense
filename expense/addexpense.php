<?php  include("./functions.php");


 if(isset($_GET["submit"]))
  {
     $uid=$_GET["userid"];
     $categoryname=$_GET["categorylist"];
     $amount=$_GET["amount"];
     $reason=$_GET["reason"];

     if(isset($uid) && isset($categoryname) && isset($amount) && isset($reason))
     {

     if($uid !=''  && $categoryname !='' && $amount !='' && $reason !='')
     {

     if(isset($connection))
     {
       
       $db->insertExpense($uid,$categoryname,$amount,$reason); 
        header('Location:./addexpense.php'); 
     }
    }
    else 
    {
       echo "<script>alert('fields are manadatory');</script>";
    }
   }
    
 }
 


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		


		 .category{

     	border:1px solid black;
        position:absolute;
        top:25%;
        left:25px;
     	height:400px;
     	width:400px;
     	background-color: yellow;
     }

     .show{
     	display:block;
     	margin-top:2%;
     }
 

       textarea{
       	resize: none;

       	margin-left:15px; 
       }

        input[type="submit"]
        {
        	margin-left: 35%;
        }
	</style>
</head>
<body style="background-color: skyblue;">
   
   
     <?php include("./header.php"); ?>

    <div class="category">
       
        <h3 style="text-align: center">Add Expense </h3>
         <form action="./addexpense.php" method="get">
          <table border="0">
	         <tr>
	         <td><label for="userid">USER ID</label></td>
	     <td><input type="text" name="userid" value="<?php echo $_SESSION["userid"]; ?>" readonly /></td>
         </tr>

       
      
         <tr>
	         <td><label for="categoryname">select category Name</label></td>
	         
	         <td><select  name="categorylist" >
                   <?php        
                       
                       if($connection) 
                       {
                         $rows=$db->getCategoryNames();

                         while ($row =$rows->fetch_assoc()) {
                           # code...
                     ?>
                <option value="<?php echo $row["categoryname"]; ?>"> <?php echo $row["categoryname"]; ?> </option><?php  }} ?>
                   

	         </select></td>
	        </tr>
        
         <tr>
             <td>    <label for="amount">Amount</label></td>
            <td>    <input type="text" name="amount" /></td>
          </tr>

           <tr>
	           <td><label for="amount">Reason</label></td>
             <td> <input type="text" name="reason" /></td>
          </tr>

           <tr>
           <td>      
              <input type="submit" name="submit" value="insert expense" />     
           </td>
           </tr>
          </table>
         </form>
    </div> 	


</body>
</html>