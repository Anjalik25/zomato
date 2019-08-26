<?php
//connwect to mysql databse

session_start();

$connection=mysqli_connect("127.0.0.1","root","","zomato");

//REceiving user data
$email=$_POST['uemail'];
$pass=$_POST['upassword'];


$query="SELECT * FROM `users` WHERE `email` LIKE '$email' AND `passsword` LIKE '$pass'";

$result=mysqli_query($connection,$query);

$result_array=mysqli_fetch_assoc($result);
$rows=mysqli_num_rows($result);

if($rows==1)
{

	$_SESSION['user_id']=$result_array['user_id'];
	$_SESSION['name']=$result_array['name'];
	//print_r($_SESSION);

	header('Location:profile.php');


}

else{

	header('Location:index.php?error=1');
}



?>