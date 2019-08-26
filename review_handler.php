<?php

include 'includes/dbhelper.php';
session_start();
$rev_text=$_POST['rev_text'];
$user_id=$_SESSION['user_id'];
$r_id=$_POST['r_id'];

$query="INSERT INTO `review`(`rev_id` , `user_id`,`r_id` , `rev_text`) VALUES (NULL , '$user_id' , '$r_id' , '$rev_text')";

if(mysqli_query($connection,$query))
{

	header('Location:review_confirmation.php?r_id='.$r_id);
}
else
{
	echo 'ERROR';
}



?>