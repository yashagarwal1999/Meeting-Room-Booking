<?php
	//use PHPMailer\PHPMailer\PHPMailer;
	//use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'C:\xampp\htdocs\wtl\Composer\vendor\autoload.php';//'vendor/autoload.php';
	require 'C:\xampp\htdocs\wtl\Composer\vendor\phpmailer\phpmailer\src\phpmailer.php';
	require 'C:\xampp\htdocs\wtl\Composer\vendor\phpmailer\phpmailer\src\smtp.php';

	require_once "config.php";
	function password_generate($chars) 
	{
		$data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
		return substr(str_shuffle($data), 0, $chars);
	}

if(!empty($_POST["email"]))
{
	$mail = new PHPMailer(true); 
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);

	try {
		$email=$_POST["email"];

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

		$s=password_generate(10);
		$hashed=md5($s);		

		$mail->isHTML(true); 
		$mail->Subject = 'Change Password';
		$mail->Body    = 'New Password: '.$s;
		
		
		
		$sql = "UPDATE accounts SET Password = '$hashed' WHERE Email = '$email'";

		
		/*if($stmt = mysqli_prepare($connection, $sql)){
			echo "<script>alert('hi')</script>";
			// Bind variables to the prepared statement as parameters
			mysqli_stmt_bind_param($stmt, "s", $param_password);//, $param_email);
		    
			// Set parameters
			$param_password = $hashed;//password_hash($s, PASSWORD_DEFAULT);
			//echo "__________________________".$param_password."___________";
//			$param_id = $_email;
		    
		    	// Attempt to execute the prepared statement
		    	if(mysqli_stmt_execute($stmt))
		    	{
				//echo "         here->      ";
				echo mysqli_stmt_execute($stmt);
				// Password updated successfully. Destroy the session, and redirect to login page
				//session_destroy();
				$mail->send();
//				echo "---------------".$hashed."----------------";
				
				header("location: login.php");
				
			//	exit();
		    	}
			else{
				echo "Oops! Something went wrong. Please try again later.";
			}

			    // Close statement
			mysqli_stmt_close($stmt);
		}*/
		
		if($result=$connection->query($sql))
		{
			$mail->send();
			echo '<script>alert("New Password sent.")</script>';
			header("location: login.php");
		}
		else
		{
			echo '<script>alert("Oops! Something went wrong. Please try again later.")</script>';
		}






	    	//$mail->send();
	    	//echo 'Message has been sent';
	} catch (Exception $e) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	}
}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="forgot-password.css">
	</head>
	<body>
		<div class="navbar">
        	    <a href="dashboard.php">Home</a>
        	    <a href="aboutus.xml">About Us</a>
        	    <a href="findpage.php">Find</a>
        	    <!-- <a href="">Contact</a> -->
        	    <a href="register.html" style="margin-left:35%;">Register</a>
		    <!-- <a href="login.php" style="margin-left:00%;">Login</a> -->
        	</div>



		<div class="loginbox">
		    <h2>Forgot Password?</h2></br></br>
		    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form1"  >
			<p>Please enter your email address and we'll send you new password. </p>
			<input type="text" name="email" id="email" placeholder="Enter your registered email"style="margin-top:20px;">
			<input type="submit" value="Reset Password" style="margin-top:20px;">
		    </form>
		</div>

		<section class="foot">
			<a href="FAQ.php" style="margin-left:7%;">FAQs</a>
			<a href="TnC.php" style="margin-left:20%;">Terms & Conditions</a>
			<a href="feedback.php"  style="margin-left:20%;">Feedback</a>
			<a href="sitemap.xml" style="margin-left:20%;">Sitemap</a>
		</section>






	
<!--		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form1"> 
			<p>Enter your email</p>
			<input type="text" name="email" id="email">
			<input type="submit" value="Reset Password">
		</form> -->

	</body>
</html>


