<?php
session_start();
if(isset($_SESSION['aut']))
{ 
	require_once 'db.php';
	if(isset($_POST['category']))
	{	
		$name=$_POST["name"];
		mysql_query("INSERT INTO category(name) VALUES('$name')")or die('not inserted'.mysql_error());	
		header("Location: http://localhost/manoj/Online_Shopping_Cart/category.php");	
	}
?>
	<html>
	<head>
		<title>Edit Information</title>
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/jquery.validate.js"></script>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/screept.js"></script>
		
		<noscript>
		<meta http-equiv="refresh" content="0; url='err.html'" />  <!-- to enable Javascript....-->
	</noscript>
	<script>
	$(document).ready(function(){		
		$("#frm1").validate({messages:{name:"Please Enter User Name"}})})
	</script>
	</head>
		<body onload="fun1()">
		
			<div id="div1"></div>
			<div id="div2" style="position:absolute; top:35%; left:35%;"><img src="css/cb.png" style="float:right; width:30px; cursor:pointer" onClick="funcloseDiv2(); location='category.php';">
			
			<form id="frm1" method="post" action="">
				<table style="color:#06F">
					<caption>Add Product Category</caption><br /><br />
				<tr><td>Product Category Name</td><td><input type="text" name="name" class="required" /></td></tr>
				<tr><td></td><td><input type="submit" name="category" value="Submit" /></td></tr>
				</table>
			</form>
			</div>
			
		</body>
	</html>

<?php
}	
else
{
	echo "<script>location='index.php'</script>";
}

// close connection
mysql_close($connect);
?>

