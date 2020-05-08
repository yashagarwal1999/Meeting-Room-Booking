<?php

$connection=new mysqli("localhost","root123","Z012KrsyFFpdWPai","WTL");
if ($connection -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

/*

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'harshit');
define('DB_PASSWORD', 'Harshit@123');
define('DB_NAME', 'wtl');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}*/
?>
