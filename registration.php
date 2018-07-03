<?php
require_once 'db.php';
if(isset($_POST["sub"]))
{
	$path = "/var/www/html/manoj/Online_Shopping_Cart/photo/";
	$img = $_FILES["file"]["name"];
	move_uploaded_file($_FILES["file"]["tmp_name"],	$path . $img);
	
	$role=$_POST["role"];
	$name=$_POST["name"];
	$pwd=$_POST["pwd"];
	$email=$_POST["email"];
	//$photo = $_POST["file"];
	$sql = mysql_query("INSERT INTO admin(name,password,email,user,photo) VALUES('$name','$pwd','$email','$role','$img')")or die('not inserted'.mysql_error());
	
}
if(isset($_POST["Login"]))
{
	$email1=$_POST['email1'];
	$pass=$_POST['pass'];
	
	$result=mysql_query("select * from admin where email='$email1' and password='$pass'")or die("fetch data".mysql_error());

	$c=mysql_num_rows($result);

	$row = mysql_fetch_array($result);

	$checkRole = $row['user'];
	if($c>=1)
	{
		session_start();
		$_SESSION['aut']=1;                   // set any value for login user

		$_SESSION['userName'] = $row['name'];
		$_SESSION['userId'] = $row['id'];
		
		//$u = $_SESSION['userName'];
		//echo "<script type='text/javascript'>alert('$u');</script>"; 
	

		if ($checkRole=='Admin') {
			header("Location: admin.php");
		}
		if ($checkRole=='Customer') {
			header("Location: customer.php");
		}
		if ($checkRole=='Retailer') {
			header("Location: retailer.php");
		}
		if ($checkRole=='Vendor') {
			header("Location: vendor.php");
		}
		
	}
	else
	{
		echo "<script>alert('Login Unsuccessful')</script>";
		echo "<script>location='index.php'</script>";
		//include("index.php");
	}
}
?>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/screept.js"></script>
<noscript>
	<meta http-equiv="refresh" content="0; url='err.html'" />  <!-- to enable Javascript....-->
</noscript>
<script>
$(document).ready(function(){		
	$("#frm1").validate({messages:{name:"Please Enter User Name",
									email1:"Please Enter Email",		/*for login*/
									pwd:"Please Enter Password",		/*for login*/		                        
					              password: {
					                        required: "Please Enter a password",
					                        minlength: "Your password must be at least 5 characters long"
					                    },
								 cpassword:"Please Enter Confirm Password",
								 role:"Please Select Role",
								 email:{required:"Please Enter Email ID",
										    email:"Please Enter Valid Email ID"},
								photo:"Please Upload Profile Photo"

}})})
</script>

<div id="div1"></div> <!--For Black Background Only-->
<div id="div2"><img src="css/cb.png" style="float:right; width:30; cursor:pointer" onClick="funcloseDiv2()">
	<div align="center"><br>
		<form id="frm1" method="post" action="" enctype="multipart/form-data">
				<table style="color:#06F">
					<caption>Registration</caption>
					<tr><td>Select Role</td><td><select name="role" class="required"><option value="" selected>Select Role</option>
															<option value="Admin">Admin</option>
															<option value="Customer">Customer</option>
															<option value="Retailer">Retailer</option>
															<option value="Vendor">Vendor</option></select></td></tr>			
					<tr><td>User Name</td><td><input type="text" name="name" class="required" /></td></tr> 
					<tr><td>Password </td><td><input type="password" name="pwd" class="required" minlength="5" maxlength="10" id="pwd" /></td></tr> 
					<tr><td style="width:200">Conform Password </td><td><input type="password" name="cpassword" class="required" equalTo="#pwd" /></td></tr> 
					<tr><td>Email </td><td><input type="text" name="email" class="required email" /></td></tr> 
					<tr><td>Profile Photo</td><td><input type="file" name="file" id="file" class="required" /></td></tr> 
					<tr><td></td><td><input type="submit" name="sub" value="Submit" /></td></tr>
				</table>
		</form>
	</div>
</div>

<div id="div3" style="position:absolute; top:30%; left:40%; z-index:999;"><img src="css/cb.png" style="float:right; width:30; cursor:pointer" onClick="funcloseDiv3()">
	<div align="center">
		<form action="" method="post"><br>
			<table style="color:#06F">
		  		<caption>Login</caption>		  
				  <tr><td>Email ID</td><td><input type="text" name="email1" class="required"/></td></tr>
				  <tr><td>Password</td><td><input type="password" name="pass" class="required"/></td></tr>
				  <tr><td><input type="submit" name="Login" value="Submit"  /></td><td><input type="reset" value="Reset" /></td></tr>		  
		  	</table>	
		</form>	
	</div>
</div>