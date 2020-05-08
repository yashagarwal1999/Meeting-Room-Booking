<?php
$connection=new mysqli("localhost","root123","Z012KrsyFFpdWPai","WTL");
if ($connection -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit(); }
if(isset($_POST['Register'])){
$email=$_POST['Email'];
$name=$_POST['Name'];
$phone=$_POST['Phone'];
$password=$_POST['Password'];
$query="Select * from accounts where Email='".$email."' ";
$res=$connection->query($query);
if(mysqli_num_rows($res)==0)
{
	$password=md5($password);
	   $query="Insert into accounts values ('".$name."','".$password."','".$email."','".$phone."');";
	$res1=$connection->query($query);
	if($res1){
echo '<script>alert("User Added Successfully.. Redirecting to login page");window.location.replace("login.php");
</script>.';}
}  else{
	echo '<script>alert("'.$email.' User Already Exists. Please Login.. Redirecting to login page");
		window.location.replace("login.php");</script>.';}
}  else
{   echo 'Error while Registering Please Try again';
	header("register.html");
}
?>


