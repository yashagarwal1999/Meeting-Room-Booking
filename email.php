<?php
session_start();
// include('mysqli.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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
	    	$mail->SMTPDebug = 2;
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
        $mail->Subject = 'Booking Confirmed';
        $query28="Select S.start_time,S.end_time,R.rname,R.location,R.rphone
         from rooms R, slots S
         where R.room_id='".$_POST['room_id']."'  
         and S.slot_id='".$_POST['slot_id']."' limit 1";
         print_r($query28);
        $res28=$connection->query($query28);
        $contentEmail='';
        // if(!$res28)die('Cannot send email as room id not feteched');
        $contentEmail=$res28->fetch_object();
        print_r($contentEmail);
        $mail->Body    = nl2br('Thank you '.$_SESSION['username'].' for booking a room 
        on our platform. The details of the booked room are 
        
        Room Name:'.$contentEmail->rname.' 
       
        Room Location:'.$contentEmail->location.'  
        Contact Number: '.$contentEmail->rphone.' 
        Date:'.$_SESSION['Date'].'
        Time:'.$contentEmail->start_time.'-'.$contentEmail->end_time.'
        ');
        $mail->send();
        
    }catch (Exception $e) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	}

?>