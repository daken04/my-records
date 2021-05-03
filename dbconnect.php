<?php
//start session function


define('SITEURL','http://localhost/my-records/');

//connect mysql database
$host = "localhost";
$user = "root";
$pass = "";
$db = "my-records";
$con = mysqli_connect($host, $user, $pass, $db) or die("Error " . mysqli_error($con));
$db_select = mysqli_select_db($con,$db) or die(mysqli_error());
?>