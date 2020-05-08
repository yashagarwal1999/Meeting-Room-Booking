<?php
include('mysqli.php');
if(isset($_POST['Submit-Search']))
{
    session_start();
    
// echo $_POST['room_id'];
$query4="Select * from rooms where room_id='".$_POST['room_id']."'";
$res4=$connection->query($query4);
// print_r($query4);
if(!$res4)
{
    die('Error in fetching room details');
}
$details=array();
while($temp=$res4->fetch_object())
{
    $details[]=$temp;
}
// print_r($details);
$dir='./'.$details[0]->pic_location.'/*.*';
$pixel=array();
foreach(glob($dir) as $filename){
    // echo $filename;
    $pixel[]=$filename;

}

$query6="Select slot_id from bookings where booking_date='".$_SESSION['Date']."' and room_id='".$_POST['room_id']."'";
// print_r($query6);
$res6=$connection->query($query6);
$booked=array();
if($res6){
    while($temp=$res6->fetch_object())
    {
        $booked[]=$temp->slot_id;
    }
    // print_r($booked);
}
$query5="";
if(count($booked)>0){
    $booked_str=join(",",$booked);
$query5="Select * from slots where room_id='".$details[0]->room_id."' and slot_id not in ($booked_str)";
}
else{
    $query5="Select * from slots where room_id='".$details[0]->room_id."'";
}

// print_r($query5);
$res5=$connection->query($query5);
$slots=array();
while($temp=$res5->fetch_object())
{
    $slots[]=$temp;
}
// print_r($slots);

// print_r($pixel);
}
else{
    
    echo '<script>alert("Go back to search page. Error"); window.location.replace("findpage.php");</script>';
}

$connection->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style>
		.navbar1 {
  overflow: hidden;
  background-color: #333;
	width:100%;
	height:133px;
	top:0;
}

.navbar1 a {
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




.dropdown1 {
  float: right;
  overflow: hidden;
}

.dropdown1 .dropbtn1 {
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

.navbar1 a:hover{	/*, .dropdown:hover .dropbtn {*/
 	background: #222;
  color: #fff;
}

.navbar1 .dropdown1:hover .dropbtn1 {
 	background: #c10000;
  color: #fff;
}

.dropdown-content1 {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content1 a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content1 a:hover {
  background-color: #ddd;
}

.dropdown1:hover .dropdown-content1 {
  display: block;
}
	</style>
</head>
<body >
<!--<section class="custom-nav">
 
   <img class="logo" src="logo.jpg"/>
  <h1 class="heading"><b>MEETING ROOM</b></h1>

    </section>  
    

<div class="grid-container">

        <a class="nav_bar" href="login.php">Home</a>
 
        <a class="nav_bar" href="login.php">Login</a>
   
        <a class="nav_bar" href="findpage.php">Locate A Room</a>
    
        <a class="nav_bar" href="sitemap.xml">Sitemap</a>


</div>-->

<div class="navbar1">
				<h1 style="color:#fff;text-align:center;margin-top:1%;">Meeting Room Booking System</h1>
        
      
        <a href="dashboard.php"><?php
        if(isset($_SESSION['username']))
        { echo 'Dashboard';
        }
        else echo 'Login';
        ?></a>
				<a href="aboutus.xml">About Us</a>
        <a href="findpage.php">Find</a>
        
        <?php
        if(isset($_SESSION['username']))
        {
          echo '<div class="dropdown1">
		  		<button class="dropbtn1" style="width:200px;"><?php echo explode(" ",$_SESSION["username"])[0]?> 
		    		<i class="fa fa-caret-down1"></i>
		  		</button>
		  		<div class="dropdown-content1">
		    		<a href="reset_password.php">Change Password</a>
		    		<a href="logout.php">Logout</a>
		  		</div>
				</div> ';
        }
        else {
          echo '<a href="register.html">Register</a>';
        }

        ?>
				<!-- <div class="dropdown1">
		  		<button class="dropbtn1" style="width:200px;"><?php echo explode(" ",$_SESSION["username"])[0]?> 
		    		<i class="fa fa-caret-down1"></i>
		  		</button>
		  		<div class="dropdown-content1">
		    		<a href="reset_password.php">Change Password</a>
		    		<a href="logout.php">Logout</a>
		  		</div>
				</div>  -->
			</div>
<br>
<div class="container-fluid" style="">
<div class="row">
<!-- <div class="col-1"></div> -->
<div class="col-md-12">
<div id="demo" class="carousel slide" data-ride="carousel" >


  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <!-- <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li> -->
    <?php 
    $size=count($pixel);
    for($i=1;$i<$size;$i++)
    {
        echo '<li data-target="#demo" data-slide-to="'.$i.'"></li>';
    }
    echo ' </ul>';
    echo '<div class="carousel-inner">
    <div class="carousel-item active">
    <img src="'.$pixel[0].'"  style="width:100%;height:460px"></div>
    ';
    if($size>1)
    {
        for($i=1;$i<$size;$i++)
    {
        echo '
        <div class="carousel-item">
        <img src="'.$pixel[$i].'" alt="Los Angeles" style="width:100%;height:460px">
        </div>';
    }
    echo '</div>';
    echo '  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>';
    }
    echo '</div>'
    ?>
 
<!-- <div class="container-fluid" > -->
    <br><br>
    <?php

    echo '<div class="row">
    <div class="col-md-12">
    <h2>'.$details[0]->rname.'</h2>
    </div></div><br>';
    echo '<div class="row">
    <div class="col-md-12">
    <p style="font-size:1rem;">'.$details[0]->info.'</p>
    </div></div>';
    // $str=$details[0]->amenities;
    
    $amen=explode("#",$details[0]->amenities);
    // print_r($amen);
    echo '<div class="row">
    <div class="col-md-12">
    <h3 style="justify-content:center">Amenities</h3>
    </div></div>';
    echo '<div class="row"><ul class="AMENITIES-LIST">
    ';
    
    for($i=1;$i<count($amen);$i++)
    {
        // echo '<div style="disply:flex; align-items:center;">';
        // echo '<img hspace="20" src="green-tick-amenities.png" style="vertical-align:middle;border-radius:50%; width:60px;height:60px;">';
       
        // echo '<span class="amenities" style="font-size:1.5rem;">'.$amen[$i].'</span>
        // <br>';

        // echo '</div>';
        // echo '<div class="col-6">';
        // echo '<div class="col-12">';
        echo '<li>     '.$amen[$i].'</li>    ';
        // if($i%2==0)echo '</div>  <div class="row">';
        // <span style="font-size:1.5rem;">''</span>
        
     
        
    }
 
    echo '</ul></div> ';

    echo '<div class="row">
    <div class="col-md-12">
    <h3>Phone number: '.$details[0]->rphone.'</h3></div></div>';

    echo '<div class="row">
    <div class="col-md-12"><table class="table ">
    <thead class="thead-dark">    <tr>
    <th>Start Time</th>
    <th>End Time</th>
    <th>Price</th>
    <th> Enquire </th></tr>
    </thead>';
    foreach($slots as $s)
    {
        echo '<tr><form name="Enquire" action="book-room.php" method="post">
        <input type="hidden" name="slot_id" value="'.$s->slot_id.'"> 
        <input type="hidden" name="room_id" value="'.$s->room_id.'"> 
        <td>'.$s->start_time.'</td><td>'.$s->end_time.'</td><td>'.$s->price.'</td>
        <td><input id="btn-red" type="submit"   name="Enquire" value="Book"></td></form>
        </tr> 
        ';
    }
    echo '</table>
    </div>
    </div>';

    ?>

    <!-- </div> -->
    <!-- <div class="col-4" style="  position: -webkit-sticky;position:sticky; top:0;left:0">HEyyy -->
    </div></div>


    <section class="foot">
				<a href="FAQ.php" style="margin-left:7%;">FAQs</a>
				<a href="TnC.xml" style="margin-left:20%;">Terms & Conditions</a>
				<a href="feedback.php"  style="margin-left:20%;">Feedback</a>
				<a href="sitemap.xml" style="margin-left:20%;">Sitemap</a>
			</section>



    <!-- <img src="green-tick-amenities.png" style="border-radius:50%; width:40px;height:40px;"><br>
    <img src="green-tick-amenities.png" style="width:40px;height:40px; "> -->
<!-- </div> -->
 
