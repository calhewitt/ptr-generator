<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

$db = new SQLite3('../db/ptr.db');
//print "connected to db";

if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
if ($_REQUEST['username'] != "" && $_REQUEST['password'] != "") {
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
}
else header("Location: index.php?error");
}
else header("Location: index.php?error");

// Find correct password in database
$results = $db->query("SELECT password FROM users WHERE username = '". $username ."';"); 
                 
$truepassword = $results->fetchArray()[0];

if ($truepassword == md5($password)) {
	session_start();
	$_SESSION['username'] = $username;
	header("Location: ./../");
}
else header("Location: index.php?error");
?>
