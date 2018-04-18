<?php
  
  include('./functions.php');
  
  $bardata="";

  if(isset($connection))
  {
  	if($bardata == "")
  	{
  	  $bardata = $db->getBarData();

  

    }

  
  }



?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
   
    <?php include("./header.php"); ?>

    <div id="chart" style="margin-top:12%"> </div>


    <script>
			Morris.Bar({

			 element : 'chart',
			 data:[<?php echo $bardata; ?>],

			 xkey:'data',
			 ykeys:['rate'],
			 labels:[ 'rate'],
			 barratio:0.1,
			 barGap:2,
			 resize:true,
			  barSizeRatio:0.2,
			 xlabelangle:90,
			 hideHover:'auto',
			 stacked:true
			});
</script>


</body>
</html>