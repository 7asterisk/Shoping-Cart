<html lang="en">
<head>
<title>Registration Form with Jquery validations</title>
</head>

<body>
<script src="jquery-1.3.1.js"></script>
<script src="jquery.validate.js"></script>

<noscript>
	<meta http-equiv="refresh" content="0; url='err.html'" />  <!-- to enable Javascript....-->
</noscript>

<style>
.abc{
	color:red;	
}
#frm1{

}
.div1{

}
</style>

<script>
$(document).ready(function(){
	$("#frm1").validate({errorclass:"abc",
					       messages:{Uname:"Enter User Name",
								     t2:"Enter Pwd",
								     t4:{required:"Email must",
										    email:"Not Valid email"
										}
									}
						})
})
</script>

<div class="div1" align="center">
	
	<form id="frm1" action="">
		<table>
			<tr><td>User Name</td><td>:<input name="Uname" class="required" /></td></tr> 
			<tr><td>Pasword </td><td>:<input type="password" name="t2" class="required" minlength="5" maxlength="10" id="pwd" /></td></tr> 
			<tr><td>Conform Password </td><td>:<input type="password" name="t3" class="required" equalTo="#pwd" /></td></tr> 
			<tr><td>Email </td><td>:<input name="t4" class="emailrequired" /></td></tr> 
			<tr><td>Age </td><td>:<input name="t6" class="required number" min="10" max="60" /></td></tr> 
			<tr><td>URL </td><td>:<input name="t7" class="required url" /></td></tr> 
			<tr><td>Date </td><td>:<input name="t8" class="date" /></td></tr> 
			<tr><td>Profile Picture </td><td>:<input type="file" name="f1" class="required" /></td></tr> 
			<tr><td><input type="submit" name="usb" value="Submit" /></td></tr> 
		</table>
	</form>
	
</div>
</body>
</html>
