<?php
	session_start();
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
	}
	
	require_once "config.php";
	
	$new_password = $confirm_password = "";
	$new_password_err = $confirm_password_err = "";
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	
		if(empty(trim($_POST["new_password"])))
		{
        $new_password_err = "Please enter the new password.";     
//    } elseif(strlen(trim($_POST["new_password"])) < 6){
//        $new_password_err = "Password must have atleast 6 characters.";
    }
    else
    {
        $new_password = trim($_POST["new_password"]);
    }
  	
  	if(empty(trim($_POST["confirm_password"])))
  	{
        $confirm_password_err = "Please confirm the password.";
    }
    else
    {
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password))
        {
            $confirm_password_err = "Password did not match.";
        }
    }
    
    
    $id=$_SESSION["id"];
    if(empty($new_password_err) && empty($confirm_password_err))
    {
    	$x=md5($new_password);
      $sql = "UPDATE accounts SET Password = '$x' WHERE Email = '$id'";
		
			if($result=$connection->query($sql))
			{
				echo '<script>alert("Password Updated!")</script>';
			}
			else
			{
				echo '<script>alert("Oops! Something went wrong. Please try again later.")</script>';
			}
			
		
      
      //echo "hello";
      /*if($stmt = mysqli_prepare($link, $sql)){
      	//echo "hi";
      	//mysqli_stmt_bind_param($stmt, "si", $param_id);
      	//$param_id = $_SESSION["id"];
      	
      	if(mysqli_stmt_execute($stmt)){
      		echo '<script>alert("Password Updated!")</script>';
      	}
      	else{
        	echo '<script>alert("Oops! Something went wrong. Please try again later.")</script>';//"Oops! Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
      
      }*/
      
    }
  	
	}
	
	
	
	
	
?>

<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="welcome.php">Cancel</a>
            </div>
        </form>
    </div>    
</body>
</html>

-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
		<link rel="stylesheet" type="text/css" href="reset-password.css">

</head>
<body style="  background-image: url('download.jpg');">
	<div>
		<!--	<div style="background-color:#333;margin-top:0px;height:70px;padding-top:10px;">
				<h1 style="color:#fff;font-size:32px;">Meeting Room Booking System</h1>
			</div>  -->
			<div class="navbar">
				<h1 style="color:#fff;text-align:center;">Meeting Room Booking System</h1>
				<a href="dashboard.php">Dashboard</a>
				<a href="aboutus.xml">About Us</a>
				<a href="findpage.php">Find</a>
				<div class="dropdown">
		  		<button class="dropbtn" style="width:200px;"><?php echo explode(" ",$_SESSION["username"])[0]?> 
		    		<i class="fa fa-caret-down"></i>
		  		</button>
		  		<div class="dropdown-content">
		    		<a href="reset_password.php">Change Password</a>
		    		<a href="logout.php">Logout</a>
		  		</div>
				</div> 
			</div>
	<!--</div>-->		
	
<!--			<div class="data">
				
				<h2 >Reset Password</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <p>New Password</p>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <p>Confirm Password</p>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="Submit">
                <a class="btn btn-link" href="dashboard.php">Cancel</a>
            </div>
        </form>
				
			</div>  -->


		<div class="loginbox" style="margin-top:10vh;">
				<h2>Reset Password</h2>
		    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form1"  >
		        <p>New Password</p>
		        <input type="password" name="new_password" placeholder="Enter new password" required >
						<span class="help-block"><?php echo $new_password_err; ?></span>
		        <p>Confirm Password</p>
		        <input type="password" name="confirm_password" placeholder="Enter password again" required>
						<span class="help-block"><?php echo $confirm_password_err; ?></span>

		        <input type="submit" name="" value="Submit"></br>
		        <a href="dashboard.php">Cancel</a></br>
		    </form>
		</div>  


			<section class="foot" style="top:120vh;left:0;positon:relative;height:50px;width:100%">
				<a href="FAQ.php" style="margin-left:7%;">FAQs</a>
				<a href="TnC.xml" style="margin-left:20%;">Terms & Conditions</a>
				<a href="feedback.php"  style="margin-left:20%;">Feedback</a>
				<a href="sitemap.xml" style="margin-left:20%;">Sitemap</a>
			</section>
	</div>
</body>


