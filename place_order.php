<?php

include "includes/dbhelper.php";

$user_id=$_GET['user_id'];
$r_id=$_GET['r_id'];
$total=$_GET['total'];

$query="INSERT INTO `orders` (`order_id`,`user_id`,`r_id`,`price_value`) VALUES (NULL, '$user_id','$r_id','$total')";

if(mysqli_query($connection,$query)){
	header('Location:order_confirmation.php?r_id='.$r_id);
}else{
	echo "Some error";
}

?>