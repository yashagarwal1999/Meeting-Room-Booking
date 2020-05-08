<?php

$connection=new mysqli("localhost","root123","Z012KrsyFFpdWPai","WTL");
if ($connection -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

?>
