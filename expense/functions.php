<?php 
session_start();


class db
{

	public  $db_name ='';
	public $dbconn ='';
  public $user_id='';

    function __construct($database = null) 
    {
      
      $this->db_name=$database;       

    }

    function connect(){

      $this->dbconn = new mysqli('localhost','root','', $this->db_name);

      if($this->dbconn->connect_error){

      	 echo "connection failed:".$this->dbconn->connect_error;
      }
      else{



      	return $this->dbconn ;
      }


    }


    public function check_db_conn()
    {
        // make db connection incase you didn't
        if( $this->dbconn == null ){
            $this->connect();
        }
    }


    public function getEmailAndPwd($email1='',$pwd1='')
    {
      # code...
     

     $sql = "SELECT * FROM `users` WHERE email='$email1' AND password='$pwd1'";


      if(isset($this->dbconn))
      {
      
          $result=$this->dbconn->query($sql);
      
          
          $count = $result->num_rows;

        

          if($count == 1)
          {
             $firstname='';
             $lastname='';
             $userid=''; 

            while($row =$result->fetch_assoc())
            {
               $firstname=$row['firstname'];
                $lastname=$row['lastname'];
                 $userid=$row['userid'];
            }  

            $_SESSION['firstname']=$firstname;
            $_SESSION['lastname']=$lastname;
            $_SESSION['userid']=$userid;
             return 1;
          }
          else
          {
            echo "<script>alert('invalid login details');</script>";
          }
         
     } 
      
      /* while($row = $result->fetch_assoc()) {
         

         echo $row['email']." ".$row['password'];
        
          
          if($email1==$row['email'])
          {
            return 1;
          }   

     
        }

        return 0;*/
      }
       


    function getno()
    {
    	return rand(100,500);
    }


    


    function insertuserdata($firstname,$lastname,$email,$password)
    {

      $sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`) VALUES ('$firstname ', '$lastname', 
      '$email', '$password')";
 

         $result ='';

          $result = $this->dbconn->query($sql);

         if($result == true)
         {
             header('Location:./index.php');
         }
         else
        {
           echo "<script>cant insert</script>";
                   
        }
       


    }

  


  function  insertCategory($uid='',$categoryname='',$description=' ')
  {

         $sql = "INSERT INTO `category` (`userid`, `categoryname`, `description`) VALUES ('$uid','$categoryname','$description');";


          $result = mysqli_query($this->dbconn,$sql);

        if($result == true)
        {

           echo "<script>alert('inserted');</script>";  

        }
        else
        {
             echo "<script>alert('cant insert');</script>"; 

        }


  }


  function  insertExpense($uid='',$categoryname='',$amount=' ',$reason=' ')
  {
         $cn=trim($categoryname);
         $sql = "INSERT INTO `expense` (`userid`, `categoryname`, `amount`,`reason`) VALUES ('$uid','$cn','$amount','$reason');";


          $result = $this->dbconn->query($sql);

        if($result == true)
        {

           echo "<script>alert('inserted');</script>";  

           

        }
        else
        {
             echo "<script>alert('cant insert');</script>"; 

        }


  }

  function getCategoryNames()
  {
      $uid=$_SESSION['userid'];
    $sql = "SELECT * FROM `category` where userid=$uid";

      $result=$this->dbconn->query($sql);

      if($result->num_rows > 0)
      {
        return $result; 
      }
      else
      {
             
      }
     


  }

   function fill_expenses()
   {
      $uid=$_SESSION['userid'];
     $output='';
    $sql = "SELECT * FROM `expense` where userid=$uid";

     $result=$this->dbconn->query($sql);

     while($row=$result->fetch_assoc())
     {
       $output .="<tr>";
       $output .="<td>".$row["userid"]."</td>";
       $output .="<td>".$row["categoryname"]."</td>";
       $output .="<td>".$row["amount"]."</td>";
       $output .="<td>".$row["reason"]."</td>";
       $output .="</tr>";      

     }

     return $output;



   }

   function email_exists($email1)
   {

     
    $sql="select * from users where email='$email1'";

     $count=$this->dbconn->query($sql)->num_rows;

     return ($count == 1) ? true : false; 



   }

   function getBarData()
   {
       $uid=$_SESSION['userid'];

     $sql="select categoryname,sum(amount) from expense where userid='$uid' group by categoryname";

     $result = $this->dbconn->query($sql);
      
      $data='';
    

     if($result->num_rows > 0)
     {
        while($row = $result->fetch_assoc())
        {
          
          $data .="{data:'".$row["categoryname"]."',rate:".$row["sum(amount)"]."},";     
     
        }
       
     }
       $data=substr($data, 0 ,-1);
      
       return $data;  
   }


}

 $db=new db('expensemanager');

  $connection=$db->connect();
 


  ?>
