<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery.validate.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/screept.js"></script>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- to enable Javascript....-->
<noscript>
<meta http-equiv="refresh" content="0; url='err.html'" />  
</noscript>

<!-- to Validate input....-->
<script>
	$(document).ready(function(){		
		$("#frm1").validate({messages:{name:"Please Enter User Name",
										email1:"Please Enter Email",		/*for login*/
										pass:"Please Enter Password",		/*for login*/
										pwd:"Please Enter Password",		/*for login*/		  		                        
						              password: {
						                        required: "Please Enter a password",
						                        minlength: "Your password must be at least 5 characters long"
						                    },
									 cpassword:"Please Enter Confirm Password",
									 role:"Please Select Role",
									 photo:"Please Upload Profile Photo",
									 email:{required:"Please Enter Email ID",
											    email:"Please Enter Valid Email ID"
	},}})})
	</script>
	