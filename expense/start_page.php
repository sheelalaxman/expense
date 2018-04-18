<?php 
          header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
			include("./functions.php");
		    
?>



<html>
	<head>
		<title> Welcome </title>
		<link rel="stylesheet" href="start_page.css" />
		<script type="text/javascript">
         
            function preventBack()
            {
            	window.history.forward();
            }
           
            setTimeout("preventBack()",0);

            window.onunload = function() { null;}


			function open_link(id)
			{

				if(id === "img1")
				{
				  document.location = "http://localhost/expense/addCategory.php";	
				}
				else if(id === "img2")
				{
					document.location = "http://localhost/expense/addExpense.php";
				}
				else if(id === "img3")
				{
					document.location = "http://localhost/expense/viewexpense.php";
				}
				else if(id === "img4")
				{
					document.location = "http://localhost/expense/generateReport.php";
				}
				else if(id === "img5")
				{
					document.location = "http://localhost/expense/profile.php";
				}
				else if(id === "img6")
				{
					document.location = "http://localhost/expense/logout.php";
				}
			}  
		</script>
	</head>
	<body>
		
		<table class="header" width="100%">
			<tr>
				<td width="100%" align="center"> <h2> Expense Manager </h2> </td>
			</tr>
		</table>
		<p> Welcome , <?php echo $_SESSION["firstname"]." ".$_SESSION["lastname"] ; ?> </p>
		<table cellspacing="40" class="menu">
			<tr>
				<td class="menuitem">
					<img src="em/add_exp.png" onclick="open_link('img1')" />
					<strong><p> Add category </p></strong>
					<p> add your category to the database. </p>
				</td>
				<td class="menuitem">
					<img src="em/add_exp.png" onclick="open_link('img2')" />
					<strong><p> Add Expenses </p></strong>
					<p> add your expenses to the database. </p>
				</td>
				<td class="menuitem">
					<img src="em/exp_rep.jpg" onclick="open_link('img3')"  />
					<strong><p> View Expenses </p></strong>
					View the expenses you have added to the database.
				</td>
			</tr>
			<tr>
				<td class='menuitem'>
					<img src="em/expense_rep.png" onclick="open_link('img4')"  />
					<strong><p> Expense Report </p></strong>
					<p> View your personal expense report. </p>
				</td>
				<td class='menuitem'>
					<img src="em/profile.png" onclick="open_link('img5')"  />
					<strong><p> Manage Profile </p></strong>
					<p> Manage your profile. </p>
				</td>
				<td class='menuitem'>
					<img src="em/profile.png" onclick="open_link('img6')"  />
					<strong><p> LOgout </p></strong>
					<p> Manage your credentials </p>
				</td>
			</tr>
		</table>
	</body>
</html>