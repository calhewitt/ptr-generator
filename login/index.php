<?php
session_start();
if (isset($_GET['action'])) {
	if ($_GET['action'] == "logout") {
		unset($_SESSION['username']);
		header("Location: ./index.php");
	}
}
?>
<!DOCTYPE html>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
<title>PTR Generator - Login</title>
<style>
 :-webkit-autofill {
    background: #fff !important;
}
* {
font-family: Open Sans;
}
#header {
width: 100%;
height: 90px;
background-color: #dddddd;
position: absolute;
top: 0;
left: 0;
text-align: center;
font-size: 60px;
font-family: Open Sans;
font-weight: 300;
padding-top: 30px;
color: #333333;
border-top: 3px solid #333333;
}

#login-form {
	width: 420px;
	position: absolute;
	top: 170px;
	left: 50%;
	margin-left: -200px;
}
#login-form input, #login-submit {
	width: 400px;
	height: 60px;
	outline: none;
	border: none;
	border-bottom: 1px solid #cccccc;
	font-size: 40px;
	padding: 5px;
	font-family: Open Sans;
    font-weight: 300;
	color: #333333;
    border-bottom: 2px solid #333333;
}
#login-submit {
	width: 390px;
}
#login-submit {
	text-align: center;
	//background-color: #0AC92B;
	padding-top: 5px;
	height: 45px;
    border: none;
}
#error {
	position: absolute;
	top: 130px;
	left: 50%;
	width: 400px;
	text-align: center;
	font-family: roboto;
	margin-left: -200px;
	font-weight: 300;
}
</style>
<div id = "header">
<img src="../lucid.jpg" width="60" style="border-radius: 3px; position: relative; top: 6px;">
<span style="margin-top: -3px;">
PTR GENERATOR
</span></div>

<div style = "margin-top: 180px;">
	<div id = "error" style="margin-top: 10px;">
        <?php
            
           if (isset($_GET['error'])) {
	           echo "Incorrect Credentials";
            }
        ?>
	</div>

	<form autocomplete="off" action = "handle.php" method = "POST" id = "login-form" >
		<input type = "text" name = "username" placeholder = "Username" spellcheck = "false">
		<input type = "password" name = "password" placeholder = "Password">
		<div id = "login-submit" style="cursor: default">Go</div>
        <script>
        $("#login-submit").click(function() {
           $("#login-form").submit(); 
        });
        </script>
		<input type = "submit" style = "width: 0; height: 0; margin: 0; padding: 0;">
	</form>
</div>	