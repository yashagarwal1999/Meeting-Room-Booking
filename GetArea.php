<?php

include('mysqli.php'); 
$query2="Select distinct(rarea) from rooms where rcity='".$_POST['City']."';";

$res2=$connection->query($query2);
// print_r(mysqli_num_rows($res2));
$names=array();
if($res2)
{
    while($t=$res2->fetch_object())
    {
        $names[]=$t->rarea;
    }
    // print_r($names);
    echo json_encode($names);
}

$connection->close();
?>