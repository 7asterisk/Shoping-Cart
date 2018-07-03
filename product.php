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
	        	<h2>Welcome to Product Management</h2>
	        	<a href="addProduct.php"> Add Product</a><br /><br /><br /><br />
				<?php
					/****************************** Table for Admin ******************************/
					    //if($result = mysql_query("select p.proname, p.probrand, p.procolor, p.proprice, c.name from products p join category c on p.procat_id = c.cat_id where c.name = 'Health';"))
					    if($result = mysql_query("select p.id, p.proname, p.probrand, p.procolor, p.proprice, p.proimg, c.name, c.cat_id from products p join category c on p.procat_id = c.cat_id;"))
					    {  

					        if(mysql_num_rows($result) > 0)
					        {	
					        	while($row = mysql_fetch_array($result))
					            {?>
						        	<div class='glass2'>								
						        	<h4 style="color:#4d4d4d; ">Product Information Of <b><i><?php echo $row['probrand']."'s ".$row['proname']; ?></i></b></h4>	
						            <table class='tab1' border='1px' align='center' style='color: #4d4d4d; width:80%; text-align:center;'>
						            
					            	<tr>
					            		<td style="text-align:center;">
					            			<img src="products/<?php echo $row['proimg']; ?>" onerror="this.src='products/product.png';" alt="alt" height="150">
					            		</td>
						            	<td>Product Name : <?php echo $row['proname']; ?></td>
					            	<tr>
					            		<td>Product Brand : <?php echo $row['probrand']; ?></td>
					            		<td>Product Color : <?php echo $row['procolor']; ?></td>
					            	<tr>
					            		<td>Product Price : <?php echo $row['proprice']; ?></td>
					            		<td>Product Category : <?php echo $row['name']; ?></td>
					            	<tr>
					            		<td>Product ID : <?php echo $row['id']; ?></td>
					            		<td><a href="editproduct.php?ID=<?php echo $row['id']; ?>">Edit Product Info</a></td>
					            	</tr>
					            
					            </table></div><br /><br /><br /><br />
					        <?php }} 		     
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