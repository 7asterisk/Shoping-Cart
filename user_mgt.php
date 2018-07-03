<?php
session_start();
require_once 'db.php';
//$nm1= $_GET['name'];
//echo $nm1;
if(isset($_SESSION['aut']))
{ 
	$userName = $_SESSION['userName'];
	?>
	<html>
	<head>
	<title>Admin Dashboard</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/screept.js"></script>
	
	</head>
	<body>
	<div class="container">
	    <div class="header">
	        <div class="titlebar"><h1 style="display:inline;">Admin Dashboard</h1><a href="logout.php" style="float: right; font-size:20; text-decoration:none; margin-right:10; color:#330000;">Log Out</a></div>
	        <div class="menubar">
	        	<font size="+1">
	        		<a href="category.php">Category Management</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        		<a href="product.php">Product Management</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        		<a href="user_mgt.php">User Management</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        		<a href="profile.php">My Account</a>
	        		
	        	</font>
	        	<span style="float:right;" >Hi <a href="admin.php"><?php echo $userName ; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	        </div>
	    </div>
	    <div class="mainbody">
	        <br /><br /><br /><br /><br /><br />
	        <center>
	        	<h2>Welcome to User Management</h2>
				<?php
					/****************************** Table for Admin ******************************/
					    if($result = mysql_query("select * from admin where user = 'admin';"))
					    {

					        if(mysql_num_rows($result) > 0)
					        {	echo "<div class='glass'>";								
					        	echo "<h3>Admin Information</h3>";
					            echo "<table class='tab1' border='1px' align='center' style='color: #4d4d4d;'>";
					            echo "<tr><th>Name</th><th>Password</th><th>Email</th><th>User</th><th>Edit</th></tr>";
					            while($row = mysql_fetch_array($result))
					            {
					            	$nm = $row['name'];
					                echo "<tr><td><a href='admin.php?name=$nm' onclick='fun1()'>" . $row['name'] . "</a></td><td>" . $row['password'] . "</td><td>" . $row['email'] . "</td><td>" . $row['user'] . "</td><td>"."<a href=edit.php?ID=". $row['id'] .">Edit</a></td></tr>";
					            }
					            echo "</table></div><br /><br /><br /><br />";
					        } 		     
						} 
					/****************************** Table for Customer ******************************/
						if($result = mysql_query("select * from admin where user = 'customer';"))
					    {
					        if(mysql_num_rows($result) > 0)
					        {	echo "<div class='glass'>";								
					        	echo "<h3>Customers Information</h3>";
					            echo "<table class='tab1' border='1px' align='center' style='color: #4d4d4d;'>";
					            echo "<tr><th>Name</th><th>Password</th><th>Email</th><th>Role</th><th>Edit</th></tr>";
					            while($row = mysql_fetch_array($result))
					            {
					            	$nm = $row['name'];
					                echo "<tr><td><a href='admin.php?name=$nm' onclick='fun1()'>" . $row['name'] . "</a></td><td>" . $row['password'] . "</td><td>" . $row['email'] . "</td><td>" . $row['user'] . "</td><td>"."<a href=edit.php?ID=". $row['id'] .">Edit</a></td></tr>";
					            }
					            echo "</table></div><br /><br /><br /><br />";
					        } 		     
						}
					/****************************** Table for Retailer ******************************/
						if($result = mysql_query("select * from admin where user = 'retailer';"))
					    {
					        if(mysql_num_rows($result) > 0)
					        {	echo "<div class='glass'>";								
					        	echo "<h3>Retailers Information</h3>";
					            echo "<table class='tab1' border='1px' align='center' style='color: #4d4d4d;'>";
					            echo "<tr><th>Name</th><th>Password</th><th>Email</th><th>Role</th><th>Edit</th></tr>";
					            while($row = mysql_fetch_array($result))
					            {
					            	$nm = $row['name'];
					                echo "<tr><td><a href='admin.php?name=$nm' onclick='fun1()'>" . $row['name'] . "</a></td><td>" . $row['password'] . "</td><td>" . $row['email'] . "</td><td>" . $row['user'] . "</td><td>"."<a href=edit.php?ID=". $row['id'] .">Edit</a></td></tr>";
					            }
					            echo "</table></div><br /><br /><br /><br />";
					        } 		     
						}
					/****************************** Table for Vendor ******************************/
						if($result = mysql_query("select * from admin where user = 'vendor';"))
					    {
					        if(mysql_num_rows($result) > 0)
					        {	echo "<div class='glass'>";							
					        	echo "<h3>Vendors Information</h3>";
					            echo "<table class='tab1' border='1px' align='center' style='color: #4d4d4d;'>";
					            echo "<tr><th>Name</th><th>Password</th><th>Email</th><th>Role</th><th>Edit</th></tr>";
					            while($row = mysql_fetch_array($result))
					            {
					            	$nm = $row['name'];
					                echo "<tr><td><a href='#' onclick='fun1()'>" . $row['name'] . "</a></td><td>" . $row['password'] . "</td><td>" . $row['email'] . "</td><td>" . $row['user'] . "</td><td>"."<a href=edit.php?ID=". $row['id'] .">Edit</a></td></tr>";
					            }
					            echo "</table></div><br /><br /><br /><br />";
					        }		     
						}mysql_close($connect);
				?>
	        </center>
	        
		
	       
	    </div>    
	</div>
	</body>
	</html>
<?php
	}	
else
{
	echo "<script>location='index.php'</script>";
}

?>