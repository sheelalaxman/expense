<?php


     echo "<!DOCTYPE html>
<html>
<head>
	<title></title>

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

</body>
</html>";

    include 'functions.php';

    $connection->close();
    
    session_unset();
    session_destroy();
    header('Location:./index.php'); 
    

?>

