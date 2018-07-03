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
	        <br /><br /><br /><br /><br /><br /><br />
	        <center>
	        	<h2>Welcome to Profile Management</h2>
				<?php
					/****************************** Table for Admin ******************************/
					    if($result = mysql_query("select * from admin where id = '$userId';"))
					    {

					        if(mysql_num_rows($result) > 0)
					        {	
					        	while($row = mysql_fetch_array($result))
					            {?>
						        	<div class='glass2'>		
						        	<h4 style="color:#4d4d4d; ">Profile Information Of <?php echo $row['name']; ?></h4>	
						            <table class='tab2' border='0px' align='center' style='color: #4d4d4d;'>
						            <tr>
						            	<td style="text-align:center;"><img src="photo/<?php echo $row['photo']; ?>" onerror="this.src='photo/alt.jpg';" alt="alt" width="100" style="background: transparent url('photo/alt.jpg') no-repeat; width: 100px;"></td>
						            	<td><?php echo $row['name']; ?></td>
						            </tr>   
					            	<tr>
					            		<td>User ID : <?php echo $row['id']; ?></td> 
					            		<td>Login Password : <?php echo $row['password']; ?></td>
					            	</tr>
					            	<tr>
					            		<td>Email : <?php echo $row['email']; ?></td> 
					            		<td>Role : <?php echo $row['user']; ?></td>
					            	</tr>
					           		<tr>
					            		<td></td> 
					            		<td><a href="edit2.php?ID=<?Php echo $row['id']; ?>">Edit</a></td>
					            	</tr>
					            	</table>
					            </div><br/><br/>
					            <?php }
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