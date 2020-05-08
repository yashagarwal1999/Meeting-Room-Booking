<?php
// Initialize the session
/*session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["uid"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["uid"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["pass"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim((string)$_POST["pass"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT Name, Email, Password FROM accounts WHERE Email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt,  $username,$id, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(strcmp(md5($password),$hashed_password)==0){#password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: dashboard.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "<script>alert('The password you entered was not valid.')</script>";
				#header("location: temp.php");
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "<script>alert('No account found with that username.')</script>";
                }
            } else{
                echo '<script>alert("Oops! Something went wrong. Please try again later.")</script>';//"Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>






<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="login.css">
	<script type="text/javascript">
        var rand_num1;
        var rand_num2;
		function ValidateEmail(inputText)
		{
			var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			if(mailformat.test(inputText.value)==false)
			{
                document.form1.reset();
				alert('Invalid Email Address');
				randomNums();

				return false;
			}
			return true;
		}
        function addNums(){
            var answer = document.getElementById("answer").value;
            var sum = rand_num1+rand_num2;
            if(answer == ""){
                alert("Please add the numbers");
                randomNums();
		return true;
            }else if(answer != sum){
                alert("Your math is wrong");
                document.getElementById("answer").value="";
                randomNums();
		return false;
            }
        }

        function randomNums(){
            rand_num1 = Math.floor(Math.random() * 10) + 1;
            rand_num2 = Math.floor(Math.random() * 10) + 1;
            var x="Enter Captcha:    "+rand_num1+" + "+rand_num2+" = ";
            document.getElementById("digit1").value = x;
        }
	</script>
    </head>
    <body onload="randomNums()">
	<div class="mmm">
		<!--<img src="login_bg.png" alt="" class="bgg">
		<div style="background-color:#333;margin-top:0px;height:70px;padding-top:7px;text-align:center;">
			<h1 style="color:#fff;">Meeting Room Booking System</h1>
		</div>-->
	<img src="login_bg.png" alt="" class="bgg">
		<div class="navbar">
			<h1 style="color:#fff;text-align:center;">Meeting Room Booking System</h1>
		    <a href="in_progress1.html">Home</a>
		    <a href="in_progress1.html">About Us</a>
		    <a href="in_progress1.html">Find</a>
		    
		    <a href="in_progress1.html" style="float:right;">Register</a>

		</div>

		<div class="loginbox">
		    <img src="user.png" alt="" class="avatar">
		    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form1"  >
		        <p>Email</p>
		        <input type="text" id="uid" name="uid" placeholder="Enter Email" onblur="ValidateEmail(this);" required >
			<span class="help-block"><?php echo $username_err; ?></span>
		        <p>Password</p>
		        <input type="password" name="pass" placeholder="Enter Password"  required>
			<span class="help-block"><?php echo $password_err; ?></span>

	<!--                <p id="digit1" style="margin-left:20px;"></p>   -->
		       </br> <input type="text" name="" id="digit1" style="border:none; width:180px; margin-left:70px;" readonly>
		        <input type="text" id="answer"  style="border:1px solid;height:20px;width:50px;">

		        <input type="submit" name="" value="Login" onclick="return addNums()" ></br>
		        <a href="forgot_password.php">Lost your password?</a></br>
		        <a href="in_progress1.html">Don't have an account.</a>
		    </form>
		</div>

		<section class="foot">
			<a href="in_progress1.html" style="margin-left:7%;">FAQs</a>
			<a href="TnC.xml" style="margin-left:20%;">Terms & Conditions</a>
			<a href="in_progress1.html"  style="margin-left:20%;">Feedback</a>
			<a href="in_progress1.html" style="margin-left:20%;">Sitemap</a>
		</section>

        </div>

    </body>
</html>*/


// Initialize the session
session_start();
 

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}
 
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["uid"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["uid"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["pass"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim((string)$_POST["pass"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
    
        // Prepare a select statement
        $sql = "SELECT Name, Email, Password FROM accounts WHERE Email ='$username'";
        
        $result=$connection->query($sql);
        if($result->num_rows == 1)
        {
        //echo "hi";
        	$row=$result->fetch_assoc();
        //	echo "hi";
        	$username=$row["Name"];
        	$id=$row["Email"];
        	$hashed_password=$row["Password"];
        	
        	if(strcmp(md5($password),$hashed_password)==0)
        	{
        		session_start();
        		$_SESSION["loggedin"]=true;
                    	$_SESSION["id"]=$id;
                        $_SESSION["username"]=$username;
                        if(isset($_SESSION['Room_id'])){
                            echo '<script>
                            window.location.replace("book-room.php");
                            </script>';
                            header('search_result.php');
                           // die();
                            
                        }
                    else	{header("location:dashboard.php");}
        		
        	}
        	else{
	        	$password_err = "<script>alert('The password you entered was not valid.')</script>";
        	
        	}
        }
        else
        {
        	$username_err = "<script>alert('The Email you entered was not valid.')</script>";
        }
        
    }
        
        /*if($stmt = $connection->prepare($sql)){

            // Bind variables to the prepared statement as parameters
//            $stmt->bindParam("user",$username,PDO::PARAM_STR);//mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){//mysqli_stmt_execute($stmt)){
                // Store result
                //mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                //$temp=$stmt->fetch(PDO::FETCH_ASSOC);
                        //echo '<script>alert("hi")</script>';
                echo '<script>alert("'.mysqli_num_rows($stmt).'")</script>';        
                if(mysqli_num_rows($stmt)==1){//mysqli_stmt_num_rows($stmt) == 1){                    
                            echo '<script>alert("hi1")</script>';      
                    //$temp=$stmt->fetch_object();
                    $temp=$stmt->fetch(PDO::FETCH_ASSOC);
                    $username=$temp['Name'];
                    $id=$temp->$temp['Email'];
                    $hashed_password=$temp['Password'];
                    
                    if(strcmp(md5($password),$hashed_password)==0)
                    {
                    	session_start();
                    	$_SESSION["loggedin"]=true;
                    	$_SESSION["id"]=$id;
                    	$_SESSION["username"]=$username;
                    	header("location:dashboard.php");
                    }
                    else{
                    	$password_err = "<script>alert('The password you entered was not valid.')</script>";
                    }
                    
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "<script>alert('No account found with that username.')</script>";
                }
            } else{
                echo '<script>alert("Oops! Something went wrong. Please try again later.")</script>';//"Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }*/
    
    // Close connection
   // mysqli_close($link);
}
?>






<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="login.css">
	<script type="text/javascript">
        var rand_num1;
        var rand_num2;
		function ValidateEmail(inputText)
		{
			var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			if(mailformat.test(inputText.value)==false)
			{
                document.form1.reset();
				alert('Invalid Email Address');
				randomNums();

				return false;
			}
			return true;
		}
        function addNums(){
            var answer = document.getElementById("answer").value;
            var sum = rand_num1+rand_num2;
            if(answer == ""){
                alert("Please add the numbers");
                randomNums();
		return true;
            }else if(answer != sum){
                alert("Your math is wrong");
                document.getElementById("answer").value="";
                randomNums();
		return false;
            }
        }

        function randomNums(){
            rand_num1 = Math.floor(Math.random() * 10) + 1;
            rand_num2 = Math.floor(Math.random() * 10) + 1;
            var x="Enter Captcha:    "+rand_num1+" + "+rand_num2+" = ";
            document.getElementById("digit1").value = x;
        }
	</script>
    </head>
    <body onload="randomNums()">
	<div class="mmm">
		<!--<img src="login_bg.png" alt="" class="bgg">
		<div style="background-color:#333;margin-top:0px;height:70px;padding-top:7px;text-align:center;">
			<h1 style="color:#fff;">Meeting Room Booking System</h1>
		</div>-->
	<img src="login_bg.jpg" alt="" class="bgg">
		<div class="navbar">
			<h1 style="color:#fff;text-align:center;">Meeting Room Booking System</h1>
		    <a href="login.php">Home</a>
		    <a href="aboutus.xml">About Us</a>
		    <a href="findpage.php">Find</a>
		    
		    <a href="register.html" style="float:right;">Register</a>

		</div>

		<div class="loginbox">
		    <img src="user.png" alt="" class="avatar">
		    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form1"  >
		        <p>Email</p>
		        <input type="text" id="uid" name="uid" placeholder="Enter Email" onblur="ValidateEmail(this);" required >
			<span class="help-block"><?php echo $username_err; ?></span>
		        <p>Password</p>
		        <input type="password" name="pass" placeholder="Enter Password"  required>
			<span class="help-block"><?php echo $password_err; ?></span>

	<!--                <p id="digit1" style="margin-left:20px;"></p>   -->
		       </br> <input type="text" name="" id="digit1" style="border:none; width:180px; margin-left:70px;" readonly>
		        <input type="text" id="answer"  style="border:1px solid;height:20px;width:50px;">

		        <input type="submit" name="" value="Login" onclick="return addNums()" ></br>
		        <a href="forgot_password.php">Lost your password?</a></br>
		        <a href="register.html">Don't have an account.</a>
		    </form>
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






