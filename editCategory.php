<?php
session_start();
if(isset($_SESSION['aut']))
{ 
	require_once 'db.php';
	// get value of id that sent from address bar
	$id=$_REQUEST['ID'];
	// Retrieve data from database
	$sql="SELECT * FROM category WHERE cat_id='$id'";
	$result=mysql_query($sql);

	$rows=mysql_fetch_array($result);

	 if(isset($_POST["update"]))
	{
		$name=$_POST["name"];
		// update data in mysql database
	    $sql="UPDATE category SET name='$name' WHERE cat_id='$id'";
	    $result=mysql_query($sql);
	    header("Location: http://localhost/manoj/Online_Shopping_Cart/category.php");
	}

	if(isset($_POST["delete"]))
	{	
		$sql="DELETE from category WHERE cat_id='$id'";

	    $result=mysql_query($sql);
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
					<tr>
						<td>Category Name</td>
						<td>							
							<input type="text" name="name" class="required"  value="<?php echo $rows['name']; ?>" />
						</td>
					</tr> 
					
					<tr>
						<td><input type="submit" name="update" value="Update"></td>
						<td>
							<input type="submit" name="delete" value="Delete">
						</td>
					</tr>				
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