<?php
include('mysqli.php');
session_start();

if(!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)){
    $_SESSION['Room_id']=$_POST['room_id'];
    $_SESSION['Slot_id']=$_POST['slot_id'];
    echo '<script>alert("You are not logged in Redirecting to login")
    window.location.replace("login.php");</script>';
    

}
else{
    if(isset($_SESSION['Room_id']))
    {
        $_POST['room_id']=$_SESSION['Room_id'];
        $_POST['slot_id']=$_SESSION['Slot_id'];
        unset($_SESSION['Room_id']);
        unset($_SESSION['Slot_id']);
    }

    $query1="Insert into bookings(slot_id,user_id,booking_date,room_id) values 
    ('".$_POST['slot_id']."', '".$_SESSION['id']."', '".$_SESSION['Date']."',
    '".$_POST['room_id']."') ";
    print_r($query1);
    $res1=$connection->query($query1);
    if($res1)
    {
        include('email.php');
        echo '<script>alert("Room Booked Successfully"); 
        window.location.replace("dashboard.php");</script>';
    }
    else{
        echo '<script>alert("Failed to  Book the Room Please Try again"); 
        window.location.replace("findpage.php");</script>';
    }
}


?>