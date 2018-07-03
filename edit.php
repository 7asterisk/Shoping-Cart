<?php
session_start();
if(isset($_SESSION['aut']))
{ 
	require_once 'db.php';

	// get value of id that sent from address bar
	$id=$_REQUEST['ID'];

	// Retrieve data from database
	$sql="SELECT * FROM admin WHERE id='$id'";
	$result=mysql_query($sql);

	$rows=mysql_fetch_array($result);

	 if(isset($_POST["update"]))
	{
		
		$path = "/var/www/html/manoj/Online_Shopping_Cart/photo/";
		$img = $_FILES["file"]["name"];
		echo "<script type='text/javascript'>alert('$img');</script>";
		move_uploaded_file($_FILES["file"]["tmp_name"],	$path . $img);	

		$user=$_POST["role"];
		$pwd=$_POST["pwd"];
		$name=$_POST["name"];
		$email=$_POST["email"];
		
		 // update data in mysql database
	    $sql="UPDATE admin SET user='$user', name='$name', password='$pwd', email='$email', photo='$img' WHERE id='$id'";
	    $result=mysql_query($sql);
	    header("Location: http://localhost/manoj/Online_Shopping_Cart/user_mgt.php");
	}

	if(isset($_POST["delete"]))
	{	
		$sql="DELETE from admin WHERE id='$id'";

	    $result=mysql_query($sql);
	    header("Location: http://localhost/manoj/Online_Shopping_Cart/user_mgt.php");
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
		$("#frm1").validate({messages:{name:"Please Enter User Name",
										email1:"Please Enter Email",		/*for login*/
										pass:"Please Enter Password",		/*for login*/		                        
						              password: {
						                        required: "Please Enter a password",
						                        minlength: "Your password must be at least 5 characters long"
						                    },
									 cpassword:"Please Enter Confirm Password",
									 role:"Please Select Role",
									 email:{required:"Please Enter Email ID",
											    email:"Please Enter Valid Email ID"
	},}})})
	</script>
	</head>
		<body onload="fun1()">
		
			<div id="div1"></div>
			<div id="div2" style="position:absolute; top:35%; left:35%;"><img src="css/cb.png" style="float:right; width:30px; cursor:pointer" onClick="funcloseDiv2(); location='user_mgt.php';">
			<br>
			<form id="frm1" method="post" action="" enctype="multipart/form-data">
				<table style="color:#06F" width="100%">
					<caption>Update Information</caption>
					<tr>
						<td>Select User</td>
						<td>
							<select name="role" class="required">
								<option value="<?php echo $rows['user']; ?>" selected><?php echo $rows['user']; ?></option>
								<option value="Admin">Admin</option>
								<option value="Customer">Customer</option>
								<option value="Retailer">Retailer</option>
								<option value="Vendor">Vendor</option>
							</select>
						</td>
					</tr>			
					<tr>
						<td>User Name</td>
						<td>
							<input type="text" name="name" class="required"  value="<?php echo $rows['name']; ?>" />
						</td>
					</tr> 
					<tr>
						<td>Password</td>
						<td>
							<input type="password" name="pwd" class="required" minlength="5" maxlength="10" id="pwd"  value="<?php echo $rows['password']; ?>"/>
						</td>
					</tr> 
					<tr>
						<td style="width:200">Conform Password </td>
						<td>
							<input type="password" name="cpassword" class="required" equalTo="#pwd"  value="<?php echo $rows['password']; ?>"/>
						</td>
					</tr> 
					<tr>
						<td>Email </td>
						<td>
							<input type="text" name="email" class="required email"  value="<?php echo $rows['email']; ?>"/>
						</td>
					</tr>
					<tr>
						<td><img src="photo/<?php echo $rows['photo'] ; ?>" onerror="this.src='photo/alt.jpg';" alt="alt" height="100" width="100" style="background: transparent url('photo/alt.jpg') no-repeat; height: 100px; width: 100px;"> </td>
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