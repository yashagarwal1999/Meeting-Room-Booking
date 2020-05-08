<?php

include('mysqli.php');  

if(isset($_POST['Search']))
{
    session_start();
    $_SESSION['Date']=$_POST['Date'];
    $price_field=$_POST['Price'];
    
    $max_price=0;
    switch($price_field){
        case '0':  $max_price=2500;break;
        case '1':  $max_price=4000;break;
        case '2':  $max_price=6000;break;
        case '3':  $max_price=8000;break;
        case '4':  $max_price=10000;break;
        case '5':  $max_price=100000;break;
    }
    $query9="Select room_id,count(slot_id) as total from slots group by(room_id)";
    // print_r($query9);
    $res9=$connection->query($query9);
    $record=array();
    if(!$res9)die('Failed to fetch slots');
    while($temp=$res9->fetch_object())
    {
        $record[$temp->room_id][0]=$temp->room_id;
        $record[$temp->room_id][1]=$temp->total;

    }
    // print_r($record);

    $query9="Select room_id,count(slot_id) as used 
    from bookings where booking_date='".$_POST['Date']."' group by(room_id)";
    // print_r($query9);
    $res9=$connection->query($query9);

    // if(!$res9)die('Failed to fetch booked slots');
    if($res9){
    while($temp=$res9->fetch_object())
    {
        $record[$temp->room_id][2]=$temp->used;
       

    }
}
    // print_r($record);
    $unavailable_rooms=array();
    foreach($record as $t)
    {
        if(count($t)==3)
        {
            if($t[1]==$t[2])$unavailable_rooms[]=$t[0];
        }
    }

    // print_r($unavailable_rooms);
    $occupied_str=join(",",$unavailable_rooms);
   
    if(count($unavailable_rooms)==0)
    {
        $query3="Select min(s.price) as min,max(s.price) as max, R.rphone,R.room_id,R.rname,R.rarea,R.pic_location
     from rooms R, slots s  where
     R.rcity='".$_POST['City']."' and R.rarea='".$_POST['Area']."' and R.availability='Y' 
     and s.room_id=R.room_id group by(s.room_id) having   max <'".$max_price."'";
    //  print_r($query3);
    }
    else{
        $query3="Select min(s.price) as min,max(s.price) as max, R.rphone,R.room_id,R.rname,R.rarea,R.pic_location
        from rooms R, slots s where r.room_id not in ($occupied_str)   and
        R.rcity='".$_POST['City']."' and R.rarea='".$_POST['Area']."' and R.availability='Y' 
        and s.room_id=R.room_id group by(s.room_id) having   max <'".$max_price."'";
        
    }
    $res3=$connection->query($query3);
    if(!$res3)
    {
        die('Error1 in fetching results');
    }
    else{
        $results=array();
        while($temp=$res3->fetch_object())
        {
            $pixel;
            $dir='./'.$temp->pic_location.'/*.*';
            foreach(glob($dir) as $filename){
                // echo $filename;
                $pixel=$filename;
                // $results[$m++].append(array("first_pic"=>$pixel));
            break;
            }
            
            $temp=(object)array_merge((array)$temp,array("First_pic" =>$pixel));
            $results[]=$temp;
        }
        // print_r($results);
    }
//     $query6="Select * from bookings where booking_date='".$_POST['Date']."'";
// print_r($query6);
   
}
else
{

    echo '<script>alert("Error Try again");window.location.replace("findpage.php")</script>';
    
}

$connection->close();

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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

<script>
$(document).ready(function(){
     var x='<?php echo json_encode($results) ?>';
    actual_results=JSON.parse(x);
    console.log(actual_results);

   

    $('#Asc-Price').click(function(){
        // alert('clicked');
        
        
        actual_results.sort(function(a,b){ return a.min-b.min;  });
     
        var content='<div class="row padding-row-search">';
        var counter=0;
        for(var x of actual_results){console.log(x);
            content+=`
    <div class="col-md-4" id="`+x.room_id+`" >
    <div class="card " style="height:400px" >
      <img class="card-img-top" style="height:200px" src="`+x.First_pic+`" alt="Card image">
      <div class="card-body">
        <h4 class="card-title">`+x.rname+`</h4>
        <p class="card-text">`+x.rarea+`<br>`+x.rphone+`<br>Price: INR `+x.min+'-'+x.max+`</p>
        
        <form action="search_result.php" method="post" target="_blank">
        <input type="hidden" name="room_id" value="`+x.room_id+`">
        <input type="submit" class="btn btn-primary" name="Submit-Search" value="Enquire" >
        </form>
      </div>
    </div>
    </div>
    `;
    counter++;
    if(counter%3==0)
    {
        content+='</div><br><br><div class="row padding-row-search">'
    }
  
}
console.log(content);
$('#search-results').empty();
$('#search-results').append(content);
        
        

        


    });
    $('#Desc-Price').click(function(){
       
        // alert('clicked');
        actual_results.sort(function(a,b){ return b.min-a.min;  });
        // console.log(actual_results);

        var content='<div class="row padding-row-search">';
        var counter=0;
        for(var x of actual_results){console.log(x);
            content+=`
    <div class="col-md-4" id="`+x.room_id+`" >
    <div class="card " style="height:400px" >
      <img class="card-img-top" style="height:200px" src="`+x.First_pic+`" alt="Card image">
      <div class="card-body">
        <h4 class="card-title">`+x.rname+`</h4>
        <p class="card-text">`+x.rarea+`<br>`+x.rphone+`<br>Price: INR `+x.min+'-'+x.max+`</p>
        
        <form action="search_result.php" method="post" target="_blank">
        <input type="hidden" name="room_id" value="`+x.room_id+`">
        <input type="submit" class="btn btn-primary" name="Submit-Search" value="Enquire" >
        </form>
      </div>
    </div>
    </div>
    `;
    counter++;
    if(counter%3==0)
    {
        content+='</div><br><br><div class="row padding-row-search">'
    }
  
}
console.log(content);
$('#search-results').empty();
$('#search-results').append(content);

    });
    $.reset_price=function(){
       
//         // alert('reset');
        actual_results.sort(function(a,b){ return a.room_id-b.room_id;  });
        console.log(actual_results);
        var content='<div class="row padding-row-search">';
        var counter=0;
        for(var x of actual_results){console.log(x);
        // if(x.max)
            content+=`
    <div class="col-md-4" id="`+x.room_id+`" >
    <div class="card " style="height:400px" >
      <img class="card-img-top" style="height:200px" src="`+x.First_pic+`" alt="Card image">
      <div class="card-body">
        <h4 class="card-title">`+x.rname+`</h4>
        <p class="card-text">`+x.rarea+`<br>`+x.rphone+`<br>Price: INR `+x.min+'-'+x.max+`</p>
        
        <form action="search_result.php" method="post" target="_blank">
        <input type="hidden" name="room_id" value="`+x.room_id+`">
        <input type="submit" class="btn btn-primary" name="Submit-Search" value="Enquire" >
        </form>
      </div>
    </div>
    </div>
    `;
    counter++;
    if(counter%3==0)
    {
        content+='</div><br><br><div class="row padding-row-search">'
    }
  
}
console.log(content);
$('#search-results').empty();
$('#search-results').append(content);


    }
});


</script>


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
				<h1 style="text-align:center;color:#fff;margin-top:1%;">Meeting Room Booking System</h1>   
                

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
                     echo '<div class="dropdown1">
                     <button class="dropbtn1" style="width:200px;">'.explode(" ",$_SESSION["username"])[0].
                       '<i class="fa1 fa-caret-down1"></i>
                     </button>
                     <div class="dropdown-content1">
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




<br>
<div class="container-fluid" >
    <div class="row">
<div class="col-md-2" >
    <!-- <div class="container-fluid"> -->
<div class="row">
    <div class="col-md-12">Sort  By Price:</div>        
</div>

<div class="row">
    <div class="col-md-12">
        <form action="/" name="Sort-Price">
       <input type="radio" name="Sort" value="Ascending:" id="Asc-Price"> Ascending<br>
       <input type="radio"  name="Sort" value="Descending:" id="Desc-Price"> Descending<br>
       <input type="reset" name="Reset" value="Reset" onclick="$.reset_price()"><br>
</form>
    
    </div>        
</div>



<!-- </div> -->
</div>
<div class="col-md-10" id="search-results" >
<?php 

$i=0;
echo '<div class="row padding-row-search">';
// $m=0;
// print_r($results);
foreach($results as $r)
{
    //  $dir='./'.$r->pic_location.'/*.*';
    // $pixel;
    // foreach(glob($dir) as $filename){
    //     // echo $filename;
    //     $pixel=$filename;
    //     // $results[$m++].append(array("first_pic"=>$pixel));
    // break;
    // }
    // <a href="search_result.php" target="_blank" class="btn btn-primary">See Profile</a>
    
    echo '
    <div class="col-md-4" id="'.$r->room_id.'" >
    <div class="card " style="height:400px" >
      <img class="card-img-top" style="height:200px" src="'.$r->First_pic.'" alt="Card image">
      <div class="card-body">
        <h4 class="card-title">'.$r->rname.'</h4>
        <p class="card-text">'.$r->rarea.'<br>'.$r->rphone.'<br>Price: INR '.$r->min.'-'.$r->max.'</p>
        
        <form action="search_result.php" method="post" target="_blank">
        <input type="hidden" name="room_id" value="'.$r->room_id.'">
        <input type="submit" class="btn btn-primary" name="Submit-Search" value="Enquire" >
        </form>
      </div>
    </div>
    </div>
    ';
    $i++;
    if($i%3==0)
    {
        echo '</div><br><br>
        <div class="row padding-row-search">';
    }

}
echo '</div>';

// print_r($results);
?>


</div>
</div>
</div>

<section class="foot" style="left:0;bottom:0;position:relative; width:100%;height:50px;">
				<a href="FAQ.php" style="margin-left:7%;">FAQs</a>
				<a href="TnC.xml" style="margin-left:20%;">Terms & Conditions</a>
				<a href="feedback.php"  style="margin-left:20%;">Feedback</a>
				<a href="sitemap.xml" style="margin-left:20%;">Sitemap</a>
			</section>

</body>
</html>
