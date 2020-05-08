<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
<html>
    <head>
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
              }

              html {
                box-sizing: border-box;
              }

              *, *:before, *:after {
                box-sizing: inherit;
              }
              .custom-nav{
   
                background-color: #333; 
            }
            
              .heading{
                position: absolute;
                align-items: center;
                color:white;
                <!-- transform: translate(630px,-150px); -->
                transform: translate(90vh,-20vh);
                background: #333;
            }
              .logo
              {
                  height:150px;
                  border-radius: 50%;
              }
              
              .grid-container{
              display:grid;
              margin:0;
              width:100%;
              /* grid-gap:20px; */
              height:60px;
              font-size:20px;
              color:white;
              grid-template-columns:1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
              background-color: #333;
          
          }
          .nav_bar{
              align-self:center;
              padding: 5px;;
              color:white;
              text-decoration:none;
          }
          .nav_bar:hover{
              color:grey;
          }
          
              .column {
                background-color: white;
                width: 100%;
                margin-bottom: 16px;
                padding: 0 50px;
                display: flex;
                flex-direction:row;
              }

              .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                margin: 8px;
                flex: 1;
              }

              .about-section {
                padding: 50px;
                text-align: center;
                background-color: #ff0000;
                color: white;
              }


              

              .container {
                padding: 0 16px;
              }

              .container::after, .row::after {
                content: "";
                clear: both;
                display: table;
              }

              .title {
                color: grey;
              }

              .button {
                border: none;
                outline: 0;
                display: inline-block;
                padding: 8px;
                color: white;
                background-color: #000;
                text-align: center;
                cursor: pointer;
                width: 100%;
              }

              .button:hover {
                background-color: #555;
              }
              
              .active{
                  background-color: #66BB6A;
              }
              #navlink2{
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  padding: 20px;
                  color: white;
                  box-sizing: border-box;
              }

              #image{
                height: 70vh;
              }
              #footer{
                width: 100%;
                height: 10vh;
                background-color: black;
                color: white;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            #footer-info{
                margin: 30px;
                padding: 20px;
            }
            
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

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
    
    
    
    });
    </script>     -->
    </head>
    <body>
<!--      <section class="custom-nav">
       
        <img class="logo" src="logo.jpg"/>
        <h1 class="heading"><b>MEETING ROOM BOOKING SYSTEM</b></h1>
        <div class="grid-container">
     
     <a class="nav_bar" href="login.html">Home</a>
     <a class="nav_bar" href="login.html">Login</a>
     <a class="nav_bar" href="findpage.php">Locate A Room</a>
     <a class="nav_bar" href="sitemap.xml">Sitemap</a>
     
     
     </div> 
     
     
     
         </section>  -->
         <div class="navbar">
				<h1 style="color:#fff;text-align:center;">Meeting Room Booking System</h1>
				<a href="dashboard.php">Home</a>
				<a href="aboutus.xml">About Us</a>
				<a href="findpage.php">Find</a>
				<a href="register.html" style="float:right;">Register</a>
			
			</div>  
    
        <div class="about-section">
            <h1>About Us</h1>
            <p>Meeting Room Booking System</p>
            <p>Our services help professionals find spaces for holding conferences, meetings, conduct trainings and variety of other purposes. We aggregate all these services and bring them to your doorstep.</p>
        </div>
        <h2 style="text-align:center">Our Team</h2>
            <div class="column">
                <xsl:for-each select="members/member">
                <div class="card">
                <xsl:variable name="Image"  > <xsl:value-of select="file"/> </xsl:variable>
                    <img id="image" src="{$Image}" style="width:100% "/>
                    <div class="container">
                      <h2><xsl:value-of select="name"/></h2>
                      <p class="title"><xsl:value-of select="position"/>  </p>
                      <p><xsl:value-of select="desc"/></p>
                      <p><xsl:value-of select="email"/></p>
                      <p>
                      
            <xsl:variable name="contact"  > <xsl:value-of select="str"/> </xsl:variable>
                      <a target="_blank" href="{$contact}">
                      <button class="button">Contact</button></a>
                      
                      </p>
                    </div>
                  </div>
                </xsl:for-each>
            </div>

            <section style="background-color:#333; position:relative;width:100%;height:50px;left:0;bottom:0">
			<a href="FAQ.php" style="margin-left:7%; float:left;color:#f2f2f2;font-size:15px;padding-top:17px;text-decoration:none">FAQs</a>
		<a href="TnC.xml" style="margin-left:20%; float:left;color:#f2f2f2;font-size:15px;padding-top:17px;text-decoration:none">Terms and Conditions</a>
		<a href="feedback.php"  style="margin-left:20%; float:left;color:#f2f2f2;font-size:15px;padding-top:17px;text-decoration:none">Feedback</a>
		<a href="sitemap.xml" style="margin-left:20%; float:left;color:#f2f2f2;font-size:15px;padding-top:17px;text-decoration:none">Sitemap</a>
			</section>
            
    </body>

</html>
</xsl:template>
</xsl:stylesheet>
