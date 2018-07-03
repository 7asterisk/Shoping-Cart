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
		    <div class="header row">
		    	<div class="col-md-12">
			    	<div class="row">
				        <div class="titlebar col-md-12">
				        	<h1 style="display:inline;">Admin Dashboard</h1>
				        	<a href="logout.php" style="float:right; font-size:20; text-decoration:none; margin-right:10; color:#330000;">Log Out</a>
				        </div>
				    </div>
				    <div class="row">
				        <div class="menubar col-md-12">
				        	<font size="+1">
				        		<a href="customer.php">Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				        		<a href="productList.php">Products</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				        		<a href="">My Orders</a>
				        		<!-- <a href="customerProfile.php">My Account</a> -->	        		
				        	</font>
				        	<span style="float:right; font-size:18px;" >Hi <a href="customer.php"><?php echo $userName ; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="customerProfile.php"><img src="photo/setting.png" width="20px" height="20px" title="Account Setting"></a>&nbsp;&nbsp;&nbsp;</span>
				        </div>
			        </div>
		        </div>
		    </div>
		    <div class="mainbody row">
		        <br /><br /><br /><br /><br /><br />
		        <center>
		        	<?php
					/****************************** Table for User ******************************/
						if($result = mysql_query("select * from admin where id = '$userId';"))
						{
					        if(mysql_num_rows($result) > 0)
						    {	
						        while($row = mysql_fetch_array($result))
						        {?>
							       	<div class="col-md-2"></div>
							        <div class='glass2 col-md-8' style="height:600px">
							        	<div  style="background:url(photo/cov.jpg) no-repeat bottom; height:210px; z-index: 0; border-radius:6px; margin-top:10px;">		
							        		<!-- <h4 style="color:#4d4d4d; ">Profile Information Of <?php //echo $row['name']; ?></h4> -->	
							        		<br><br><br><br><br><br>
								            <table class='tab2' border='0px' align='center' style='color:#4d4d4d; z-index:1; font-size:30;'>
									            <tr>
									            	<td style="text-align:left;">
									            		<img src="photo/<?php echo $row['photo']; ?>" onerror="this.src='photo/alt.jpg';" alt="alt" width="150" style="background: transparent url('photo/alt.jpg') no-repeat; width: 150px; box-shadow:0px 0px 8px #000;">
									            	</td>
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
						            	</div>
						            </div>
						            <?php 
						        }
						    } 		     
						} 
						mysql_close($connect);
					?>
					<div class="col-md-2"></div>
		        </center>       
		    </div>    
		</div>
		<br /><br /><br /><br />
  	
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