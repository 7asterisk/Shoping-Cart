<?php
session_start();
if(isset($_SESSION['aut']))
{ 
	require_once 'db.php';

	if(isset($_POST['submit']))
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
		mysql_query("INSERT INTO products(proname, probrand, procolor, proprice, procat_id, proimg) VALUES('$name','$brand','$color','$price','$cat_id','$img')")or die('not inserted'.mysql_error());	
		header("Location: http://localhost/manoj/Online_Shopping_Cart/product.php");	
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
				$("#frm1").validate({messages:{name:"Please Enter User Name",
												brand:"Please Enter Brand",
												color:"Please select color",
												price:"Please Enter Price",
												category:"Please select category",
												file:"Please Upload Product image"}})})
		</script>
	</head>
		<body onload="fun1()">
			<div id="div1"></div>
			<div id="div2" style="position:absolute; top:20%; left:30%;">
				<img src="css/cb.png" style="float:right; width:30px; cursor:pointer" onClick="funcloseDiv2(); location='product.php';">
			
				<form id="frm1" method="post" action="">
				<table style="color:#06F">
					<caption>Add Product Details</caption><br /><br />
				<tr><td>Select Product Category</td>
				<td><select name="category" class="required"><option value="" selected>select..</option>
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
				<tr><td>Product Name</td><td><input type="text" name="name"  class="required" /></td></tr>
				<tr><td>Product Brand</td><td><input type="text" name="brand"  class="required" /></td></tr>
				<tr><td>Product Color</td><td><input type="text" name="color"  class="required"/></td></tr>
				<tr><td>Product Price</td><td><input type="text" name="price" class="required" /></td></tr>
				<tr>
					<td><img src="products/product.png" onerror="this.src='products/product.png';" height="100"> </td>
					<td>
						<input type="file" name="file" id="file" class="required"/>
					</td>
				</tr>
				<tr><td></td><td><input type="submit" name="submit" value="Submit" /></td></tr>
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

