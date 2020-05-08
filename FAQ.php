<?php
// Initialize the session
session_start();



 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	$tag='<a href="login.php" style="float:right;">Login</a>';
	$tag2='Home';
}
else
{
	$tag='<div class="dropdown">
		  		<button class="dropbtn" style="width:200px;">'.explode(" ",$_SESSION["username"])[0].' 
		    		<i class="fa fa-caret-down"></i>
		  		</button>
		  		<div class="dropdown-content">
		    		<a href="reset_password.php">Change Password</a>
		    		<a href="logout.php">Logout</a>
		  		</div>
				</div>';
	$tag2='Dashboard';		
	$email=$_SESSION["id"];	
}



$data='';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
    <style type="text/css">
    	table, th, td {
  			border: 1px solid black;
  			text-align: center;
  			margin-left:22px;
  			margin-top:20px;
  				
			}
    </style>
    <script type="text/javascript">
    </script>
</head>
<body >
	<div>
		
			<div class="navbar">
				<h1 style="color:#fff;text-align:center;">Meeting Room Booking System</h1>
				<a href="dashboard.php"><?php echo $tag2?></a>
				<a href="aboutus.xml">About Us</a>
				<a href="findpage.php">Find</a>
	<!--			<div class="dropdown">
		  		<button class="dropbtn" style="width:200px;"><?php echo explode(" ",$_SESSION["username"])[0]?> 
		    		<i class="fa fa-caret-down"></i>
		  		</button>
		  		<div class="dropdown-content">
		    		<a href="reset_password.php">Change Password</a>
		    		<a href="logout.php">Logout</a>
		  		</div>
				</div>   -->
				
				<?php echo $tag?>
				 
			<!-- </div background-image:url('login_bg.jpg');> -->
	<!--</div>-->		
	
			<div class="data" style="top:25vh;position:absolute;height:120vh;width:67%;margin-left:16%;border:solid;background:rgba(0,0,0,0.3);">
				
				<h2 style="margin-top:5%; text-align:center;font-size:40px;">FAQs</h2>
				<br>
				<div style="margin:5%;">
					<p style="font-weight:bold;">Q1. How to change password?</p>
					<p>Ans-> To change password, hover on your username in your dashboard and click on 'Change Password'. Enter new password and click 'Submit'. Your password will be changed.</p>
					<br>
					<p style="font-weight:bold;">Q2. I forgot my password. How to recover it?</p>
					<p>Ans-> Click on 'Lost your password?' on login page. Enter your registered email and a password will be sent to your registered email. You can login using that password.</p>
					<br>
					<p style="font-weight:bold;">Q3. How to find meeting rooms?</p>
					<p>Ans-> Click on 'Find' button in navigation bar enter filters to find the required rooms. </p>
					<br>
					<p style="font-weight:bold;">Q4. Can I book a meeting room without registering?</p>
					<p>Ans-> No, you can't book a meeting room without registering on the website. First you have to register on the website to book a meeting room.</p>
					<br>
					<p style="font-weight:bold;">Q5. Can I search meeting rooms without registering/signing in?</p>
					<p>Ans-> Yes you can search meeting rooms on the website without registering or signing in. But you have to sign-in if you wish to book a meeting room.</p>
				</div>
				
 
			</div>    


			<section class="foot">
				<a href="FAQ.php" style="margin-left:7%;">FAQs</a>
				<a href="TnC.xml" style="margin-left:20%;">Terms & Conditions</a>
				<a href="feedback.php"  style="margin-left:20%;">Feedback</a>
				<a href="sitemap.xml" style="margin-left:20%;">Sitemap</a>
			</section>
	</div>
</body>
</html>



