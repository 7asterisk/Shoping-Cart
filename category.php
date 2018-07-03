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
	        	<h2>Welcome to Category Management</h2>
	        	<a href="cat.php"> Add Category</a><br /><br /><br /><br />
				<?php
					/****************************** Table for Admin ******************************/
					    if($result = mysql_query("select * from category"))
					    {

					        if(mysql_num_rows($result) > 0)
					        {	echo "<div class='glass'>";								
					        	echo "<h3>Category Information</h3>";
					            echo "<table class='tab1' border='1px' align='center' style='color: #4d4d4d; width:50%; text-align:center;'>";
					            echo "<tr><th>Name</th><th>Edit</th></tr>";
					            while($row = mysql_fetch_array($result))
					            {
					            	$nm = $row['name'];
					                echo "<tr><td>" . $row['name'] . "</td><td>"."<a href=editCategory.php?ID=". $row['cat_id'] .">Edit</a></td></tr>";
					            }
					            echo "</table></div><br /><br /><br /><br />";
					        } 		     
						}					
						mysql_close($connect);
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