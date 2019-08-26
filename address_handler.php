<?php

include 'includes/dbhelper.php';
session_start();

function insert_address($connection)
{

	$address_text=$_POST['address_text'];

$user_id=$_SESSION['user_id'];

$query="INSERT INTO `address` (`address_id` , `user_id` , `address_text`) VALUES (NULL , '$user_id' ,'$address_text')";

if(mysqli_query($connection,$query))
{
	header('Location:profile.php');
}
else
{
	echo 'ERROR';
}

}

function delete_address($connection)
{
	$address_id=$_GET['address_id'];

	$query="DELETE FROM `address` WHERE `address`.`address_id` = '$address_id'";

	if(mysqli_query($connection,$query))
	{

		header('Location:profile.php');
	}

	else
	{
		echo 'error';
	}
}

	function update_address($connection)
{

	$address_text=$_POST['address_text'];

$user_id=$_SESSION['user_id'];
$address_id=$_POST['address_id'];

$query="UPDATE `address` SET `address_text` = '$address_text' WHERE `user_id` LIKE '$user_id' AND `address_id` LIKE '$address_id'";

if(mysqli_query($connection,$query))
{
	header('Location:profile.php');
}
else
{
	echo 'ERROR';
}

}

   




	if(isset($_POST['insert_address']))
	{
		insert_address($connection);
	}


	if(isset($_GET['address_id']))
	{
		delete_address($connection);
	}

	if(isset($_POST['update_address']))
	{
		update_address($connection);
	}














?>

