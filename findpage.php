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
<link rel="stylesheet" type="text/css" href="style-find.css">
<link rel="stylesheet" type="text/css" href="dashboard.css">                    <!--change here (dashboard.css include kr de.)-->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->   <!--change here (comment kr de. )-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
       
        $.check=function(){
            var d=$('#Date').val();
           var curr=new Date();
        //    alert(curr.toDateString());
           var selected=new Date(d);
        //    alert(selected.toDateString());
           var diff=selected.getTime()-curr.getTime();
           diff=diff/(1000*60*60*24);
        //    alert(diff);
           if(diff<-1){
                alert('Cannot select an older date than today');
                return false;
            }
        
            
            return true;
        }

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
<!-- <section class="custom-nav">
 
   <img class="logo" src="logo.jpg"/>
  <h1 class="heading"><b>MEETING ROOM</b></h1>

    </section>  
    <br><br>

<div class="grid-container">

        <a class="nav_bar" href="login.php">Home</a>
 
        <a class="nav_bar" href="login.php">Login</a>
   
        <a class="nav_bar" href="findpage.php">Locate A Room</a>
    
        <a class="nav_bar" href="sitemap.xml">Sitemap</a>


</div> -->
<div>
<div class="navbar">
				<h1 style="text-align:center;color:#fff;">Meeting Room Booking System</h1>   <!--change here (<h1> ka style change kiya and uske bad <br> tag hata diya)-->
                

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
                     echo '<a href="register.html" style="float:right;">Register</a>';         //change here
                 }
                
                ?>

</div>
                
				<!-- <div class="dropdown">

                


		  		<button class="dropbtn" style="width:200px;"> 
		    		<i class="fa fa-caret-down"></i>
		  		</button>
		  		<div class="dropdown-content">
		    		<a href="reset_password.php">Change Password</a>
		    		<a href="logout.php">Logout</a>
		  		</div>
				</div>  -->
			


<br>
<br>
</div>
<div class="container">
    <div class="row">
<!-- <div class="col-3"></div> -->
<div class="col-12 mx-auto my-auto  ">

<form method="post" action="search.php" onsubmit="return $.check()">
    <select class="selectcity" id="City" onchange="$.getArea()" name="City">

    <?php
    $flag=true;
    $storecity='x';
     foreach($city as $c)
     {
         if($flag)
         {
             $storecity=$c[0];
             $flag=false;
         }
         echo '<option value="'.$c[0].'">'.$c[0].'</option>';
        // print_r()
     }


    ?>
</select>

<select class="selectarea" id="Area" name="Area">
<?php
// print_r($storecity)
foreach($city[$storecity][1] as $c)
{
    echo '<option value="'.$c.'">'.$c.'</option>';
}

?>

    </select>

    <select class="selectprice" id="Price" name="Price">
<option value="0"> &lt;2500</option>
<option value="1">&lt;4000</option>
<option value="2">&lt;6000</option>
<option value="3">&lt;8000</option>
<option value="4">&lt;10000</option>
<option value="5"> &gt;10000</option>
</select>
<input id="Date" class="date" type="date" name="Date" required style="height:50px;">
<input class="search" type="submit" name="Search" value="Search"> 
</form>
</div>
<!-- <div class="col-3"></div> -->
</div>

</div>
<section class="foot" style="top:120vh;">
				<a href="FAQ.php" style="margin-left:7%;">FAQs</a>
				<a href="TnC.xml" style="margin-left:20%;">Terms & Conditions</a>
				<a href="feedback.php"  style="margin-left:20%;">Feedback</a>
				<a href="sitemap.xml" style="margin-left:20%;">Sitemap</a>
			</section>
</body>
</html>
