<?php
session_start();
if(isset($_SESSION['aut']))
{ 
	require_once 'db.php';

	// get value of id that sent from address bar
	$id=$_REQUEST['ID'];

	// Retrieve data from database
	$sql="select p.id, p.proname, p.probrand, p.procolor, p.proprice, p.proimg, c.name from products p join category c on p.procat_id = c.cat_id where p.id='$id'";
	$result=mysql_query($sql);

	$rows=mysql_fetch_array($result);

	 if(isset($_POST["update"]))
	{
		
		$path = "/var/www/html/manoj/Online_Shopping_Cart/products/";
		$img = $_FILES["file"]["name"];
		echo "<script type='text/javascript'>alert('$img');</script>";
		move_uploaded_file($_FILES["file"]["tmp_name"],	$path . $img);	

		$cat_id=$_POST["category"];
		$name=$_POST["name"];
		$brand=$_POST["brand"];
		$color=$_POST["color"];
		$price=$_POST["price"];
		
		 // update data in mysql database
	    $sql="UPDATE products SET proname='$name', probrand='$brand', procolor='$color', proprice='$price', proimg='$img' WHERE id='$id'";
	    $result=mysql_query($sql);
	    header("Location: http://localhost/manoj/Online_Shopping_Cart/product.php");
	}

	if(isset($_POST["delete"]))
	{	
		$sql="DELETE from products WHERE id='$id'";

	    $result=mysql_query($sql);
	    header("Location: http://localhost/manoj/Online_Shopping_Cart/product.php");
	}
	?>
	<!DOCTYPE html>
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
			<div id="div2" style="position:absolute; top:35%; left:35%;"><img src="css/cb.png" style="float:right; width:30px; cursor:pointer" onClick="funcloseDiv2(); location='product.php';">
			<br>
			<form id="frm1" method="post" action="" enctype="multipart/form-data">
				<table style="color:#06F">
					<caption>Add Product Details</caption><br /><br />
				<tr><td>Select Product Category</td>
				<td><select name="category"><option value="<?php echo $rows['cat_id']; ?>" selected><?php echo $rows['name']; ?></option>
				<?php
				if($result = mysql_query("SELECT * FROM category"))
		    	{
			        if(mysql_num_rows($result) > 0)
			        {
			            while($row = mysql_fetch_array($result))
			            {?>
	        				<option value="<?php echo $row['cat_id']; ?>"><?php echo $row['name']; ?></option>
	        			<?php }}} ?>
						</select>
					</td>
				</tr>
				<tr><td>Product Name</td><td><input type="text" name="name"  class="required" value="<?php echo $rows['proname']; ?>"/></td></tr>
				<tr><td>Product Brand</td><td><input type="text" name="brand"  class="required" value="<?php echo $rows['probrand']; ?>"/></td></tr>
				<tr><td>Product Color</td><td><input type="text" name="color"  class="required" value="<?php echo $rows['procolor']; ?>"/></td></tr>
				<tr><td>Product Price</td><td><input type="text" name="price" class="required" value="<?php echo $rows['proprice']; ?>"/></td></tr>
				<tr>
					<td><img src="products/<?php echo $rows['proimg'] ; ?>" onerror="this.src='products/product.png';" alt="alt" height="100"> </td>
					<td>
						<input type="file" name="file" id="file"/>
					</td>
				</tr>
				<tr style="color:#06F; text-align:center">
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