<?php

  include("./functions.php");

  if(isset($_POST["submit"]))
  {
     $uid=$_POST["userid"];
     $categoryname=$_POST["categoryname"];
     $description=$_POST["description"];

     if($uid !=' '  && $categoryname !='' && $description !=' ')
     {

     if(isset($connection))
     {
       
       $db->insertCategory($uid,$categoryname,$description); 
     }
    }
    else 
    {
       echo "<script>alert('fields are manadatory');</script>";
    }
 }
  else
  {

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

       
       }

        input[type="submit"]
        {
        	margin-left: 35%;
        }

        .slideshow {
        	position:absolute;
        	top:25%;
        	left:600px;
        	height:400px;
     	    min-width:700px;
        	border: 1px solid red;
        	background-color: yellow;
        }
        img {

        	height: 400px;
        	max-width:700px;
        }
       
	</style>


	
</head>
<body style="background-color: skyblue;">
   
    <?php include("./header.php"); ?>


    <div class="category">
       
        <h3 style="text-align: center">Add category name </h3>

        <form action="addcategory.php" method="post">
        
          <table border="0">
           <tr>
	         
	          <td><label for="userid">USER ID</label></td>
	          <td><input type="text" name="userid" value="<?php echo $_SESSION["userid"]; ?>" readonly /></td>
          
          </tr>

        <tr>	     
	         <td><label for="categoryname">category Name</label></td>
	         
	         <td><input type="text" name="categoryname" /></td>
	      </tr>
        
         <tr>
	         <td><label for="description">description</label></td>
	        
	        <td> <textarea name="description" cols="35" rows="5"></textarea></td>
          </tr>

          <tr>
            <td>
                <input type="submit" name="submit" value="insert category" />
           </td>     
          </tr>   
        </table>

        </form>
    </div> 	


    <div class="slideshow">
        
        <img src="./em/1.png" id="myimage" alt="EXPENSER MANAGER" />


    </div>



    <script type="text/javascript">

		myimage=document.getElementById("myimage");
		var i=0;
		a=["./em/2.png","./em/3.png","./em/1.png"];
		
        function slideshow()
        {
        	
        	
           	myimage.setAttribute("src",a[i]);
           i++;
           if(i >= a.length)
           {
           	 i=0;
           }
          }
          setInterval(slideshow,500);



        


	</script>
</body>
</html>