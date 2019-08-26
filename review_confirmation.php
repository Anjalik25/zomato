<?php

include 'includes/dbhelper.php';

session_start();
if(empty($_SESSION))
{
	header('Location:index.php?error=1');
}

if(isset($_GET['r_id']))
{

}
else
{
	header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>REVIEW CONFIRMATION</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!--Bootstrap CDNs-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/d3292beb48.js"></script>

</head>
<body class="bg-grey">

	<nav class="navbar navbar-dark bg-nav">
		<a class="navbar-brand" href="#"><b>Zomato</b></a>
		<span><a href="http://localhost/zomato/profile.php" class="btn btn-sm bg-white " style="margin-left: 90px ">PROFILE</a></span>
		 <span><a href="http://localhost/zomato/home.php" class="btn btn-sm bg-white" style="margin-left: -155px">RESTAURANTS</a> </span>
		 <span><a href="https://www.zomato.com/about" class="btn btn-sm bg-white" style="margin-left: -210px">ABOUT US</a> </span>
		<p class="text-light">
			
			<?php echo $_SESSION['name']; ?>
			<a href="logout.php" class="btn bg-white btn-sm">Logout</a>	
		</p>
	</nav>
	
	<div class="col-8 offset-2 mt-50">
		<div class="card">
			<div class="card-body text-center border-on">
				<div class="row offset-5">
					<i class="fas fa-10x fa-check-circle" style="color: green"></i>
					
				</div>
				<div class="row text-center mt-20 offset-3 text-muted ">
					<h3>REVIEW SUBMITTED SUCCESSFULLY</h3>
				</div>
				<div class="row mt-20 offset-3 text-muted">
					<h3> THANKS FOR YOUR FEEDBACK......!!!!</h3>
				</div>
				<div class="row mt-20 offset-4">
					<a href="http://localhost/zomato/profile.php" class="btn btn-sm bg-nav5" style="color: yellow">CLICK HERE</a><h5>&nbsp <= &nbspTO GO TO PROFILE</h5>
				</div>
				
			</div>
		</div>
	</div>


		



</body>
</html>