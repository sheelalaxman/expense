<?php
 
  include("./functions.php");

  $output="<table border='1' style='margin:auto'> <tr>
              <th>userid</th>
              <th>categoryname</th>
              <th>Amount</th>
              <th>reason</th>
            </tr> ";

  if(isset($_GET["brand_id"]))
  {
  	$val=$_GET["brand_id"];
  	  $uid=$_SESSION['userid'];

  	if($_GET["brand_id"])
  	{

      $sql = "SELECT * FROM `expense` WHERE categoryname='$val' and userid=$uid";

  	}
  	else
  	{
  		$sql="select * from expense where userid=$uid";
  	}

     $result=$connection->query($sql);

    

      while($row=$result->fetch_assoc())
     {
       $output .="<tr>";
       $output .="<td>".$row["userid"]."</td>";
       $output .="<td>".$row["categoryname"]."</td>";
       $output .="<td>".$row["amount"]."</td>";
       $output .="<td>".$row["reason"]."</td>";
       $output .="</tr>";      

     }

     echo  $output."</table>";


  }













?>