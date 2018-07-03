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
	<body background="photo/back.png">
	<div class="container-fluid">
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
	    <div class="mainbody row">
	        <br /><br /><br /><br /><br /><br />
	        <center>
	        	<div class="col-md-2"></div>
	        	<?php
					/****************************** Table for Admin ******************************/
					    if($result = mysql_query("select * from admin where id = '$userId';"))
					    {

					        if(mysql_num_rows($result) > 0)
					        {	
					        	while($row = mysql_fetch_array($result))
					            {?>
						        	<div class='glass2  col-md-8' style="height:600px"><div  style="background:url(photo/cov.jpg) no-repeat bottom; height:210px; z-index:0; border-radius:6px; margin-top:10px;">		
						        	<!-- <h4 style="color:#4d4d4d; ">Profile Information Of <?php //echo $row['name']; ?></h4> -->	<br><br><br><br><br><br>
						            <table class='tab2' border='0px' align='center' style='color: #4d4d4d; z-index: 1;'>
						            <tr>
						            	<td style="text-align:left;"><img src="photo/<?php echo $row['photo']; ?>" onerror="this.src='photo/alt.jpg';" alt="alt" width="150" style="background: transparent url('photo/alt.jpg') no-repeat; width: 150px;"></td>
						            	<td style="text-align:left;">Wel-Come <b><?php echo $row['name']; ?></b></td>
						            </tr>   
					            	<tr>
					            		<td></td> 
					            		<td></td>
					            	</tr>
					            	<tr>
					            		<td>User ID : <?php echo $row['id']; ?></td> 
					            		<td></td>
					            	</tr>
					                <tr>
					            		<td>Name : <?php echo $row['name']; ?></td> 
					            		<td></td>
					            	</tr>
					                <tr>
					            		<td>Email : <?php echo $row['email']; ?></td> 
					            		<td></td>
					            	</tr>
					                <tr>
					            		<td>Login Password : <?php echo $row['password']; ?></td> 
					            		<td></td>
					            	</tr>
					                <tr>
					            		<td>Role : <?php echo $row['user']; ?></td> 
					            		<td></td>
					            	</tr>
					                
					            	</table>
					            </div></div><br/><br/>
					            <?php }
					        } 		     
						} 
					mysql_close($connect);
				?>
				<div class="col-md-2"></div>
	        </center>	       
	    </div>    
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