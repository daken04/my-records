<?php
    //Start Session
    

    //Create Constants to Store non repeating values
    define('SITEURL','http://localhost/my-records/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'my-records');

    //Execute Query and save data
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());  // database connection
    $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error()); //Selecting Database


?>