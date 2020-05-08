<?xml version="1.0" encoding="UTF-8"?>
<html xsl:version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <head>
        <title>TnC</title>
	<style>
		.navbar {
  overflow: hidden;
  background-color: #333;
	width:100%;
	height:133px;
	top:0;
}

.navbar a {
  float: left;
  font-size: 20px;
  color: #f2f2f2;
  text-align: center;
/*  padding: 14px 16px;*/
  padding-left: 60px;
  padding-right: 60px;
  padding-top: 15px;
  padding-bottom: 15px;
  text-decoration: none;
	font-weight:bold;
}




.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 20px;  
  border: none;
  outline: none;
  color: #f2f2f2;
  padding: 14px 16px;
  background-color: #ff0000;
  font-family: inherit;
	font-weight:bold;
  margin: 0;
}

.navbar a:hover{	/*, .dropdown:hover .dropbtn {*/
 	background: #222;
  color: #fff;
}

.navbar .dropdown:hover .dropbtn {
 	background: #c10000;
  color: #fff;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.foot {
	overflow: hidden;
	background-color: #333;
	top: 990px;/*100%;*/
	height: 50px;
	width: 100%;
	position: absolute;
}

.foot a{
	float: left;
	color: #f2f2f2;
	font-size: 15px;
	padding-top: 17px;
	text-decoration: none;
}

.foot a:hover{
	text-decoration:underline;
	color: #fff;
}

	</style>
    </head>
    <body style="font-family:Arial;font-size:12pt;background-color:#EEEEEE">
<!--        <div class="navbar" style="overflow:hidden; background-color:#333;position:fixed;top:0;width:100%;height:50px">
            <a href="dashboard.php" style="float:left;display:block;color:#f2f2f2;font-size:20px; text-align:center; padding-left:60px; padding-right:60px; padding-top:15px; padding-bottom:15px; text-decoration:none; font-weight:bold">Home</a>
            <a href="in_progress1.html" style="float:left;display:block;color:#f2f2f2;font-size:20px; text-align:center; padding-left:60px; padding-right:60px; padding-top:15px; padding-bottom:15px; text-decoration:none; font-weight:bold">About Us</a>
            <a href="in_progress1.html" style="float:left;display:block;color:#f2f2f2;font-size:20px; text-align:center; padding-left:60px; padding-right:60px; padding-top:15px; padding-bottom:15px; text-decoration:none; font-weight:bold">Find</a>
            <a href="in_progress1.html" style="float:left;display:block;color:#f2f2f2;font-size:20px; text-align:center; padding-left:60px; padding-right:60px; padding-top:15px; padding-bottom:15px; text-decoration:none; font-weight:bold">Contact</a>
            <a href="login.php" style="float:left;display:block;color:#f2f2f2;font-size:20px; text-align:center; padding-left:60px; padding-right:60px; padding-top:15px; padding-bottom:15px; text-decoration:none; font-weight:bold; margin-left:25%;">Login</a>

        </div>-->

		<div class="navbar">
				<h1 style="color:#fff;text-align:center;">Meeting Room Booking System</h1>
				<a href="dashboard.php">Home</a>
				<a href="aboutus.xml">About Us</a>
				<a href="findpage.php">Find</a>
				<a href="register.html" style="float:right;">Register</a>
				<!--<div class="dropdown">
		  		<button class="dropbtn" style="width:200px;"><?php echo explode(" ",$_SESSION["username"])[0]?> 
		    		<i class="fa fa-caret-down"></i>
		  		</button>
		  		<div class="dropdown-content">
		    		<a href="reset_password.php">Change Password</a>
		    		<a href="logout.php">Logout</a>
		  		</div>
				</div>--> 
			</div>
<br/>
<p style="font-size:50px; text-align:center; text-decoration:underline;">Terms and Conditions</p>
<div style="border-style:solid; padding-top:10px;padding-left:20px; margin-bottom:20px;width:96%;">
        <xsl:for-each select="TnC/data">
          <div style="background-color:teal;color:white;padding:4px">
            <span style="font-weight:bold"><xsl:value-of select="heading"/> - </span>
          </div>
          <div style="margin-left:20px;margin-bottom:1em;font-size:12pt">
            <p>
            <xsl:value-of select="description"/>
            </p>
          </div>
        </xsl:for-each>
</div>
	<!--<div class="foot" style="background-color:#333; position:relative;width:100%;height:50px;left:0;bottom:0">
		<a href="in_progress1.html" style="margin-left:7%; float:left;color:#f2f2f2;font-size:15px;padding-top:17px;text-decoration:none">FAQs</a>
		<a href="TnC.xml" style="margin-left:20%; float:left;color:#f2f2f2;font-size:15px;padding-top:17px;text-decoration:none">Terms and Conditions</a>
		<a href="in_progress1.html"  style="margin-left:20%; float:left;color:#f2f2f2;font-size:15px;padding-top:17px;text-decoration:none">Feedback</a>
		<a href="in_progress1.html" style="margin-left:20%; float:left;color:#f2f2f2;font-size:15px;padding-top:17px;text-decoration:none">Sitemap</a>
	</div>-->
	<section class="foot">
				<a href="FAQ.php" style="margin-left:7%;">FAQs</a>
				<a href="TnC.xml" style="margin-left:20%;">Terms and Conditions</a>
				<a href="feedback.php"  style="margin-left:20%;">Feedback</a>
				<a href="sitemap.xml" style="margin-left:20%;">Sitemap</a>
	</section>

    </body>
</html>
