<?php

    
    
    include("./functions.php");

    
    

   if(isset($_POST["submit"]))
   {
     $email1=$_POST['email'];
     $pwd1=$_POST['password'];

    

     if( $email1 === ""  && $pwd1 === ""  )
     {
        echo "<script>alert('enter fields');</script>"; 

     }
     else 
     {

     
    
       if(isset($connection))
       {


           $found=$db->getEmailAndPwd($email1,$pwd1);
        
           if($found)
           {
              
             header('Location:./start_page.php'); 
             
           }
           else 
           {
              
           }
          
       }
   } 
 }
   




?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome to expense manager</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <script type="text/javascript">
                    
                      function go(){
                           // body...

                           document.location="./signup.php";
                       } 


         
            function preventBack()
            {
                window.history.forward();
            }
           
            setTimeout("preventBack()",0);

            window.onunload = function() { null;}

                </script>

</head>
<body>
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-6 col-offset-3" align="center">

                <img src="em/logo.png" style="max-width: 300px ;width:100%"><br><br>

                <form method="post" action="./index.php">
                    <input placeholder="Email..." name="email" class="form-control"><br>
                    <input type="password" placeholder="Password..." name="password" class="form-control"><br>
                    <input type="submit" value="Log In" name="submit" class="btn btn-primary">
                    <input type="button" onclick="go();" value="sign up" class="btn btn-danger">
                </form>

                
            </div>
        </div>
    </div>
</body>