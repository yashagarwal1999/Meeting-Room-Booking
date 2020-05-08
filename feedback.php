<?php
session_start();
include('mysqli.php');  
$query1="Select distinct rcity,rarea from rooms";
// $query1="Select distinct(Name) from accounts";
$res1=$connection->query($query1);
$city=array();
// print_r($res1);
if($res1)
{
    while($temp=$res1->fetch_object())
    {
$city[$temp->rcity][0]=$temp->rcity;
$city[$temp->rcity][1][]=$temp->rarea;
    }
}
else{
    die('Error in fetching cities');
}
// $query1="Select distinct(rarea from rooms where rcity in "
// print_r($city);

$connection->close();

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style2.css">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->     <!--Change here-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
       
        $.getArea=function(){

            var citychange=$('#City').val();
            //alert('YAsh'+citychange);
            $('#Area').empty();

            //AJAX Call
          $.post("GetArea.php",{City:citychange},function(res){
            // console.log(res);
           // alert('hey');
            var areas=JSON.parse(res);
            var temp='';
            for(var i=0;i<areas.length;i++)
            {
                temp+='<option value="'+areas[i]+'">'+areas[i]+'</option>';
            }   
            $('#Area').append(temp);
          
            

          });
           
       

        
        
        }


    });
</script>   
</head>
<body class="body">
<div class="navbar">
				<h1 style="text-align:center;color:#fff;">Meeting Room Booking System</h1>         <!--Change here(style chenged and <br tag deleted>)-->

                <?php
                 if(isset($_SESSION['username']))
                 {echo '<a href="dashboard.php">Dashboard</a> ';}
                else {echo '<a href="login.php">Login</a> ';}
                ?>
                <!-- <a href="dashboard.php">Dashboard</a> -->
				<a href="aboutus.xml">About Us</a>
                <a href="findpage.php">Loacte A Room</a>
                <?php 
                 if(isset($_SESSION['username']))
                 {
                     echo '<div class="dropdown">
                     <button class="dropbtn" style="width:200px;">'.explode(" ",$_SESSION["username"])[0].
                       '<i class="fa fa-caret-down"></i>
                     </button>
                     <div class="dropdown-content">
                       <a href="reset_password.php">Change Password</a>
                       <a href="logout.php">Logout</a>
                     </div>
                   </div>';
                 }
                 else{
                     echo '<a href="register.html" style="float:right;">Register</a>';
                 }
                
                ?>

</div>



<!-- <section class="custom-nav">
 
   <img class="logo" src="logo.jpg"/>
  <h1 class="heading"><b>MEETING ROOM BOOKING</b></h1>
  <div class="grid-container">

<a class="nav_bar" href="login.php">Home</a>
<a class="nav_bar" href="aboutus.xml">About Us</a>
<a class="nav_bar" href="findpage.php">Locate A Room</a>
<a class="nav_bar" href="sitemap.xml">Sitemap</a>


</div>
    </section>   -->

<div class="container" style="height:87vh;width:60vw;margin-left:20%;margin-top:2vh;">       <!--Change here-> style changed-->
<!-- Removed unecessary containers -->
<form name="Feedback" action="feedbackinput.php" onsubmit="return validate_text_field() || ValidateEmail()" method="POST">
      
      <label for="name">Name</label>
      <input type="text" id="name" name="name" placeholder="Your name.." >
  
      <label for="email_id">Email Id</label>
      <input type="text" id="email_id" name="email_id" placeholder="Enter email id.." >
  
      <label for="user_feedback">Your Feedback</label>
      <textarea id="user_feedback" name="user_feedback" placeholder="Write your feedback here.." style="height:200px"></textarea>
  
      <input type="submit" value="Submit" id="button">
    </form>
    <script>
        function validate_text_field()
        {
        var x = document.forms["Feedback"]["name"].value;
        if (x==null || x=="")
        {
          alert("Name field cannot be empty");
          return false;
        }
        
        
        var y = document.forms["Feedback"]["user_feedback"].value;
        if (y==null || y=="")
        {
          alert("The feedback field cannot be empty");
          return false;
        }
        }

        function ValidateEmail()
        {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if(document.forms["Feedback"]["email_id"].value.match(mailformat))
            {
                document.Feedback.email_id.focus();
                return true;
            }
            else
            {
                alert("You have entered an invalid email address!");
                document.Feedback.email_id.focus();
              return false;
            }
        }

       
        </script>
</div>

<div  style="margin-top:20px;background-color:#333; position:relative;width:100%;height:50px;left:0;bottom:0">
		<a href="FAQ.php" style="margin-left:7%; float:left;color:#f2f2f2;font-size:15px;padding-top:17px;text-decoration:none">FAQs</a>
		<a href="TnC.xml" style="margin-left:20%; float:left;color:#f2f2f2;font-size:15px;padding-top:17px;text-decoration:none">Terms and Conditions</a>
		<a href="feedback.php"  style="margin-left:20%; float:left;color:#f2f2f2;font-size:15px;padding-top:17px;text-decoration:none">Feedback</a>
		<a href="sitemap.xml" style="margin-left:20%; float:left;color:#f2f2f2;font-size:15px;padding-top:17px;text-decoration:none">Sitemap</a>
	</div>

</body>
</html>
