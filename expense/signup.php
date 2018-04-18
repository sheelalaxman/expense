
     <?php
             $errors =array();
            include('./functions.php');

             if(empty($_POST) === false)
             {
                
                 $requiredfields=array('email','password','password2','firstname','lastname');

                 foreach ($_POST as $key => $value) {

                  if(empty($value) && in_array($key, $requiredfields))
                  {
                     $errors[]="all fields are manadatory";
                
                     break 1;
                   # code...
                  }
                 }

                if(empty($errors) == true)
                {
                               
                   if(isset($connection))
                   {

                     if( $db->email_exists($_POST['email']) == true)
                     {
                       $errors[]="sorry email is already register  ".$_POST['email'];
                      
                     }
                     if(strlen($_POST['password']) < 8)
                     {
                       $errors[]="password must be atleast 8 characters";
                     }

                     if($_POST['password'] != $_POST['password2'])
                     {
                       $errors[]="password not matched";
                     }
                     if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
                     {
                      $errors[]="a valid email address is required";
                     }
                     if(preg_match("/\\s/", $_POST['firstname']) == true)
                     {
                       $errors[]="cannot contain any spaces for firstname";
                     }
                      if(preg_match("/\\s/", $_POST['lastname']) == true)
                      {
                        $errors[]="cannot contain any spaces for lastname";
                      }

                       
                   }
                 }  

                 if(empty($errors) === true)      
                       {
                           $firstname=$_POST['firstname'];
                           $lastname=$_POST['lastname'];
                           $email=$_POST['email'];
                           $password=$_POST['password'];

                           $db->insertuserdata($firstname,$lastname,$email,$password);
                        }    
                        else
                        {
                           echo '<ul><li>'.implode('</li><li>',$errors).'</li></ul>';
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

</head>
<body>
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-6 col-offset-3" align="center">

                 <img src="em/logo.png" style="max-width: 300px ;width:100%"><br><br>

                <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POSt">
                   
                    <input type="email" placeholder="Email..." name="email" class="form-control"><br>
                  
                   <input type="password" placeholder="Password..." name="password" class="form-control" ><br>
               
                    <input type="password" placeholder="confirm Password..." name="password2" class="form-control" ><br>
                   
                   <input type="text" placeholder="enter firstname..." name="firstname" class="form-control"><br>
                      
                   <input type="text" placeholder="enter lastname" name="lastname" class="form-control"><br>
                   
                    <input type="submit"  name="submit"  value="sign up" class="btn btn-danger">
                </form>

               

            </div>
        </div>
    </div>
</body>