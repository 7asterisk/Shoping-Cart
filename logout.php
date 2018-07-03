<?php
session_start();
session_destroy();
//echo "logout successfully";
?>
<html>
<head>
<title>Logout : Online Shopping</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

</head>
<body background="photo/visit.jpg" style="position: fixed; top:0px; left:0px; right:0px; bottom:0px; background-size: 100% 100%; background-repeat: no-repeat;">
<div class="container">
    <div class="header">
        <div class="titlebar"><h3>You Are Log Out Successful</h3></div>
        <div class="menubar"><font size="+1"><a href="#" onclick="fun1()"> Registration </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="fun2()"> Login </a></font></div>
    </div>
    <div class="mainbody">
        <br /><br /><br /><br /><br /><br />
        <center>
        <!-- <h1>Thanks For Stopping.</h1>
        <h6>Hope See You Soon...</h6> -->
        </center>
        <br /><br /><br /><br />
    </div>    
</div>
<?php require_once 'registration.php'; ?> <!--For Registration And Login-->
</body>
</html>