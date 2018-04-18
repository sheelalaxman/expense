<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		
       .container {
          
          height: 50px;
          width: 100%;
          background-color:skyblue;
          border:1px solid black;
          color:black;
          position: absolute;
          top:0px;
          left:0px;
          text-align: center;
          font-size: 2em;
           font-family: "Times New Roman", Times, serif;
          
       }
 
       
       .menubar
       {
         overflow: hidden;
         background-color: #333;
         position:absolute;
         top:7.5%;
         left:0px;
         min-width: 100%;

        }

        .menubar a{

				   float: left;
				  color: #f2f2f2;
				  text-align: center;
				  font-family: "Times New Roman", Times, serif;
				  padding: 14px 55px;
				  text-decoration: none;
				  font-size: 17px;
        }
        .menubar a:hover{
        	background-color: red;
        }
	</style>

      <script type='text/javascript'>
                    


         
            function preventBack()
            {
                window.history.forward();
            }
           
            setTimeout('preventBack()',0);

            window.onunload = function() { null;}

       </script>

</head>
<body>
    
    <div class="container">     
        
     <span>EXPENSE MANAGER</span>
      
 
    </div>
      
    <div class="menubar" >
         
         <a href="./addcategory.php">add category</a>
          <a href="./addexpense.php">add expense</a>
           <a href="./viewexpense.php">view expense</a>
            <a href="./generatereport.php">expenseReport</a>
             <a href="./profile.php">profile</a>
             <a href="./logout.php">logout</a>             
  
    </div>     


</body>
</html>