<?php
session_start();
require_once 'db.php';
//$nm1= $_GET['name'];
//echo $nm1;
if(isset($_SESSION['aut']))
{ 
	$userName = $_SESSION['userName'];
	$userId = $_SESSION['userId'];
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
	<title>Admin Dashboard</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/screept.js"></script>
	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	</head>
	<body>
	<div class="container-fluid">
	    <div class="header">
	        <div class="titlebar">
	        	<h1 style="display:inline;">Admin Dashboard</h1>
	        	<a href="logout.php" style="float: right; font-size:20; text-decoration:none; margin-right:10; color:#330000;">Log Out</a>
	        </div>
	        <div class="menubar">
	        	<font size="+1">
	        		<a href="customer.php">Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        		<a href="productList.php">Products</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        		<a href="">My Orders</a>
	        		<!-- <a href="customerProfile.php">My Account</a> -->	        		
	        	</font>
	        	<span style="float:right; font-size:20px;" >Hi <a href="customer.php"><?php echo $userName ; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="customerProfile.php"><img src="photo/setting.png" width="20px" height="20px" title="Account Setting"></a>&nbsp;&nbsp;&nbsp;</span>
	        </div>
	    </div>
	    <div class="mainbody">
	    <div class="verDiv"></div>
	    <div class="horiDiv"></div>
	       
		</div>
		<br />
		<br />
		<br />
		<br />
		<div class="footer"><br />All Rights are Reserved</div>	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="js/bootstrap.min.js"></script>
	</body>
	</html>
	
<?php
	}	
else
{
	echo "<script>location='index.php'</script>";
}

?>