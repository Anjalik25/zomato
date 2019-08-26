<?php

session_start();

$connection=mysqli_connect("127.0.0.1","root","","zomato");

$name=$_POST['user_name'];
$email=$_POST['user_email'];
$password=$_POST['user_password'];
$filename=$_FILES['user_dp']['name'];

//print_r($_FILES);



$extension=explode('.',$filename)[1];

$query1="SELECT * FROM `users` WHERE `email` LIKE '$email'";

$result=mysqli_query($connection,$query1);

$result_array=mysqli_fetch_assoc($result);





if(count($result_array)>0)
{
	header('Location:index.php?error=2');
}

else {

	if ($extension=='jpg' || $extension=='png' || $extension=='jpeg' || $extension=='JPG' || $extension=='PNG' || $extension=='JPEG') 
	{

		if($_FILES['user_dp']['size']<10000000)
		{
			
					move_uploaded_file($_FILES['user_dp']['tmp_name'], 'uploads/'.$_FILES['user_dp']['name']);
				
					$query="INSERT INTO `users` (`user_id`,`name`,`email`,`passsword`,`dp`) VALUES (NULL , '$name' , '$email' ,'$password' , '$filename')";



		if(mysqli_query($connection,$query))
		{

			$query2="SELECT * FROM `users` WHERE `email` LIKE '$email'";
			$result2=mysqli_query($connection,$query2);

			$result2_array=mysqli_fetch_assoc($result2);
			$_SESSION['user_id']=$result2_array['user_id'];
			$_SESSION['name']=$result2_array['name'];
			header('Location:profile.php');
		}
		else
		{

				header('Location:index.php?error=3');
		}

		}

		else
		{

			header('Location:index.php?error=5');
		}


	}

	else
	{
		header('Location:index.php?error=4');
	}

}

	

?>