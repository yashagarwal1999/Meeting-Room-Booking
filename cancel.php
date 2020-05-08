<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_SESSION["loggedin"]))
{
include('mysqli.php');
$query20="Select * from bookings where book_id='".$_POST["book_id"]."'";
$res20=$connection->query($query20);
$arr=$res20->fetch_object();

$query19="Delete from bookings where book_id='".$_POST["book_id"]."'";
$res19=$connection->query($query19);
if($res19)
// if(TRUE)
{ echo 'Cancellation successful.Reloading...';

    require 'C:\xampp\htdocs\wtl\Composer\vendor\autoload.php';//'vendor/autoload.php';
    require 'C:\xampp\htdocs\wtl\Composer\vendor\phpmailer\phpmailer\src\phpmailer.php';
    require 'C:\xampp\htdocs\wtl\Composer\vendor\phpmailer\phpmailer\src\smtp.php';
    $mail = new PHPMailer(true); 
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
    
        try {
            $email=$_SESSION["id"];
    
            //Server settings
                $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'meetingroomwtl@gmail.com';//username@gmail.com';
            $mail->Password = 'meetingroom123';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
            $mail->setFrom('agarvalyash12@gmail.com', 'Admin');
                $mail->addAddress($email, 'Recipient1');
            //    $mail->addAddress('recipient2@example.com');
                $mail->addReplyTo('noreply@example.com', 'noreply');
            //Content
    
            // $s=password_generate(10);
            // $hashed=md5($s);		
    
            $mail->isHTML(true); 
            $mail->Subject = 'Cancellation Sucessful';
            $query28="Select S.price,R.rname,S.start_time,S.end_time
            from rooms R,slots S where
             R.room_id='".$arr->room_id."' and S.slot_id='".$arr->slot_id."' limit 1";
            //  print_r($query28);
            $res28=$connection->query($query28);
            $contentEmail='';
            
            // if(!$res28)die('Cannot send email as room id not feteched');
            $contentEmail=$res28->fetch_object();
            $fee=($contentEmail->price)*0.1;
            // print_r($contentEmail);
            $mail->Body    = nl2br('Your Booking for the room '.
            $contentEmail->rname.' is cancelled succesfully.
            Room Details:

            
            Room Name:'.$contentEmail->rname.' 
            Date:'.$arr->booking_date.'
            Price:'.$contentEmail->price.'
            Time:'.$contentEmail->start_time.'-'.$contentEmail->end_time.'

            A 10% of the room price is applied as cancelation fee.

            Cancellation Details:
            
            Room Price: '.$contentEmail->price.'
            Cancellation Fee: '.$fee.'
            Amount Refunded: '.($contentEmail->price -$fee).'
            
            You will not be able to cancel 30 minutes prior to the scheduled time of booking.
            Thank you for using meeting booking room.
            ');
            // print_r($mail->body);
            $mail->send();
            
        }catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }




}
else echo 'Cancellation failed. Try again.';

}
else{
    echo "<script>alert('Not logged in');window.location.replace('login.php');</script>";
}

?>