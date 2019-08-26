<?php

include 'includes/dbhelper.php';

session_start();
if(empty($_SESSION))
{
	header('Location:index.php?error=1');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>ZOMATO HOME</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!--Bootstrap CDNs-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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

	<div class="container">
		<div class="row mt-100">
			<div class="col-7 offset-1">
				<h2><b> <center> ALL RESTAURANTS </center></b></h2>
				

			</div>

			<div class="col-7 offset-1 mt-20">

					<?php

								$query="SELECT * FROM `restaurants`";
								$result=mysqli_query($connection,$query);
								while($row=mysqli_fetch_array($result))
								{

									echo'<div class="card">
					
											<div class="card-body">
												<div class="row">

													<div class="col-3">
														<img src="'.$row['r_bg'].'" style="width: 100%; height:130px">

													</div>

													<div class="col-7">
														
														<h3>'.$row['r_name']. '</h3>
														<p style="text-muted"> '.$row['r_address'].'</p>
														<p><span>'.$row['r_menu'].'</span> <span class="pull-right  "> Avg Cost For  <b>RS '.$row['r_cost'].'</b> <br></span></p>
													</div>

													<div class="col-2">';

									if($row['r_rating']<3)
									{
										echo '<h3 class="text-light text-center" style="background-color: red; padding: 2px; border-radius: 5px">'.$row['r_rating'].'</h3>';



									
									}

									else if($row['r_rating']<4)
									{
										echo '<h3 class="text-light text-center" style="background-color: #FFD620; padding: 2px; border-radius: 5px">'.$row['r_rating'].'</h3>';



									}

									else if($row['r_rating']<5)
									{
										echo '<h3 class="text-light text-center" style="background-color: green; padding: 2px; border-radius: 5px">'.$row['r_rating'].'</h3>';



									}

				
									



							echo 	'<a href="menu.php?r_id='.$row['r_id'].'" class="btn bg-nav2 btn-sm btn-block text-light mt-50"> VIEW</a>
										</div>

									</div>
									

								</div>
							</div>';
												




								}

					?>

				
				

			</div>

		</div>
	</div>

</body>
</html>