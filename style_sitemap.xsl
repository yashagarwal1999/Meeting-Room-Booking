<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
   <xsl:template match = "/">   
   	
<html>
<head>
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
.navbar a:hover{	/*, .dropdown:hover .dropbtn {*/
 	background: #222;
  color: #fff;
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
<body>
	

<!--	<img style="height:100px;
    border-radius: 50%;">
    <xsl:attribute name="src">
					<xsl:value-of select="sitemap/image/source"/>
					</xsl:attribute>
				</img>-->
<!--<div style="width:300px border-bottom:2px solid grey">
	<h1 style="position: absolute;
    color: black;
    transform: translate(570px,-100px);" align="center">Meeting Room Sitemap</h1><br/><br/>

<div style="
	display:grid;
    margin:0;
    width:100%;
    height:60px;
    font-size:20px;
    color:white;
    grid-template-columns:1fr 1fr 1fr 1fr;
    background-color: #333;
">
<a style="align-self:center;
    padding: 10px;;
    color:white;
    text-decoration:none;"
      >
<xsl:attribute name="href">
					<xsl:value-of select="sitemap/navbar/navigation/@link"/>
					</xsl:attribute>
      <xsl:value-of select="sitemap/navbar/navigation"/></a>

      <a style="align-self:center;
    padding: 10px;;
    color:white;
    text-decoration:none;"
      >
<xsl:attribute name="href">
					<xsl:value-of select="sitemap/navbar/navigation1/@link"/>
					</xsl:attribute>
      <xsl:value-of select="sitemap/navbar/navigation1"/></a>

      <a style="align-self:center;
    padding: 10px;;
    color:white;
    text-decoration:none;"
      >
<xsl:attribute name="href">
					<xsl:value-of select="sitemap/navbar/navigation2/@link"/>
					</xsl:attribute>
      <xsl:value-of select="sitemap/navbar/navigation2"/></a>

      <a style="align-self:center;
    padding: 10px;;
    color:white;
    text-decoration:none;"
      >
<xsl:attribute name="href">
					<xsl:value-of select="sitemap/navbar/navigation3/@link"/>
					</xsl:attribute>
      <xsl:value-of select="sitemap/navbar/navigation3"/></a>
    

</div>
-->

<div class="navbar">
				<h1 style="color:#fff;text-align:center;">Meeting Room Booking System</h1>
				<!--<a href="dashboard.php">Home</a>
				<a href="#">About Us</a>
				<a href="#">Find</a>
				<a href="#" style="float:right;">Register</a>-->
				
				<!--<div class="dropdown">
		  		<button class="dropbtn" style="width:200px;"><?php echo explode(" ",$_SESSION["username"])[0]?> 
		    		<i class="fa fa-caret-down"></i>
		  		</button>
		  		<div class="dropdown-content">
		    		<a href="reset_password.php">Change Password</a>
		    		<a href="logout.php">Logout</a>
		  		</div>
				</div>--> 
				<a style="margin-left:0vw;"
      >
<xsl:attribute name="href">
					<xsl:value-of select="sitemap/navbar/navigation/@link"/>
					</xsl:attribute>
      <xsl:value-of select="sitemap/navbar/navigation"/></a>



  


      <a
      >

<xsl:attribute name="href">

					<xsl:value-of select="sitemap/navbar/navigation3/@link"/>

					</xsl:attribute>

      <xsl:value-of select="sitemap/navbar/navigation3"/></a>
				
				
				
				    <a
      >
<xsl:attribute name="href">
					<xsl:value-of select="sitemap/navbar/navigation2/@link"/>
					</xsl:attribute>
      <xsl:value-of select="sitemap/navbar/navigation2"/></a>

				
				

      <a style="float:right;"
      >
<xsl:attribute name="href">
					<xsl:value-of select="sitemap/navbar/navigation1/@link"/>
					</xsl:attribute>
      <xsl:value-of select="sitemap/navbar/navigation1"/></a>
				
				
			</div>
<div style="border:solid;width:80%;margin-left:10vw;margin-top:20vh;">
<br/><br/>

	
	<table align="center" style="border-none; padding-bottom:69px;">
		<tr>
			<th style="width:300px; font-size:25px;">Help And FAQ</th>
			<th style="width:300px; font-size:25px;">Login</th>
			<th style="width:300px; font-size:25px;">Find a Meeting Room</th>
		</tr>
		<br/><br/>

		<!-- <xsl:template match="row">
		<xsl:apply-templates select="col1"/>
	<xsl:apply-templates select="col2"/>
		

		</xsl:template>

		

			<xsl:template match="col2">
		<p style="font-family:Times New Roman"><xsl:value-of select="."/>
		</xsl:template> -->
<!-- <xsl:template match="row">
<xsl:template match="col1">
		<p style="font-family:Open Sans"><xsl:value-of select="."/>
		</xsl:template>
		</xsl:template> -->
<!-- <xsl:template match="sitemap"> -->
		<xsl:for-each select="sitemap/row">
		<xsl:sort select="col1"/>
				<tr>
					
					<td style="padding:10px;font-size:20px;" align="center">
					
				<!-- <xsl:variable name="link">
<xsl:value-of select="link1"/>
</xsl:variable> -->
					<!-- <xsl:value-of select="col1"/> -->
					<!-- <a href="{@link}.html"><xsl:apply-templates select="col1"/></a> -->
					<a>
					<xsl:attribute name="href">
					<xsl:value-of select="col1/@link"/>
					</xsl:attribute>
					<xsl:apply-templates select="col1"/></a>
				
					
					</td>

					<!-- <xsl:variable name="link">
					<xsl:value-of select="link2"/>
					</xsl:variable> -->
					<td style="padding:10px;font-size:20px;" align="center">
						
						<a>
						<xsl:attribute name="href">
					<xsl:value-of select="col2/@link"/>
					</xsl:attribute>
							<xsl:apply-templates select="col2"/></a>
					
				</td>
					<td  style="padding:10px;font-size:20px;" align="center">
						<a>
						<xsl:attribute name="href">
					<xsl:value-of select="col3/@link"/>
					</xsl:attribute>
						<xsl:value-of select="col3"/></a>
					
					</td>
					<br/>
					
				</tr>
			</xsl:for-each>
			<!-- </xsl:template> -->
	</table>

</div>


<section class="foot">
				<a href="FAQ.php" style="margin-left:7%;">FAQs</a>
				<a href="TnC.xml" style="margin-left:20%;">Terms and Conditions</a>
				<a href="feedback.php"  style="margin-left:20%;">Feedback</a>
				<a href="sitemap.xml" style="margin-left:20%;">Sitemap</a>
	</section>

<!--<section style="background-color:#333; position:relative;width:100%;height:50px;left:0;bottom:0;top:100%">
			<a href="in_progress1.html" style="margin-left:7%; float:left;color:#f2f2f2;font-size:15px;padding-top:17px;text-decoration:none">FAQs</a>
		<a href="TnC.xml" style="margin-left:20%; float:left;color:#f2f2f2;font-size:15px;padding-top:17px;text-decoration:none">Terms and Conditions</a>
		<a href="in_progress1.html"  style="margin-left:20%; float:left;color:#f2f2f2;font-size:15px;padding-top:17px;text-decoration:none">Feedback</a>
		<a href="in_progress1.html" style="margin-left:20%; float:left;color:#f2f2f2;font-size:15px;padding-top:17px;text-decoration:none">Sitemap</a>
			</section> -->
</body>
</html>
</xsl:template>
	<xsl:template match="col1">
		<p style="font-family:Open Sans"><xsl:value-of select="."/></p>
		</xsl:template>

		<xsl:template match="col2">
		<p style="font-style:italic"><xsl:value-of select="."/></p>
		</xsl:template>
</xsl:stylesheet>


