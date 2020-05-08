<?php
//For connectivity
include('mysqli.php'); ;

//Use of global variable POST touse data submitted by form

$user_name = mysqli_real_escape_string($connection,$_POST['name']) ;
$user_email = mysqli_real_escape_string($connection, $_POST['email_id']);
$user_feedback = mysqli_real_escape_string($connection,$_POST['user_feedback']) ;


//updates data to database
$que = "insert into feedback (user_name,user_email,user_feedback)
values ('$user_name', '$user_email','$user_feedback');";

//querying the code by sending it to database and updating table
//conn included from includes file


$connection->query($que);

//Transfers control back to the first line of index.php
header("Location: feedback.php");
 
?>