<?php
session_start();

include 'includes/dbhelper.php';

if(empty($_SESSION)){
	header('Location:index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>MY PROFILE</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

<!--Bootstrap CDNs-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		$('#update').hide();
		$('.editBtn').click(function(){
			var counter=$(this).data('id');
			var para=$('#atext' + counter).text();
			var add_id=$('#aid' + counter).data('id');
			//alert(add_id);
			$('#x').val(para);
			$('#y').val(add_id);
			$('#insert').hide();
			$('#update').show();
			$('#myModal').modal('show');
		})
	})
</script>
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
		
		<div class="row mt-50">
			<div class="col-7 ">
				<div class="row ">
					<div class="col-12">
					
					<h2 ><center> MY ORDERS </center> </h2>	<br>

					</div>
					
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<?php
								$user_id=$_SESSION['user_id'];
								$query3="SELECT * FROM `orders` o JOIN `restaurants` r ON r.`r_id`=o.`r_id` WHERE o.`user_id` LIKE '$user_id'";

								$result3=mysqli_query($connection, $query3);

								$result5=mysqli_query($connection,$query3);
									$row5=mysqli_fetch_array($result5);
										if($row5['user_id']!=$user_id)
										{
											echo '<div class="row offset-4">

													<p style="font-size:20px"><b>NO ORDERS YET</b></p><br>
												</div>

												<div class="row offset-2" style="margin-top:30px ">
													<span><b><a href="http://localhost/zomato/home.php" class="btn btn-sm bg-nav3" style="padding:2px;border-radius:5px" ><b>CLICK HERE</b></a> &nbspTO BROWSE ALL RESTAURANTS</b></span>


												 </div>';
										}

								while($row3=mysqli_fetch_array($result3)){
									echo '<div class="row">
									<div class="col-2">
										<img src="'.$row3['r_bg'].'" style="width: 100px;height: 110px">
									</div>
									<div class="col-10">
										<h3>'.$row3['r_name'].'</h3>
										<h5>Rs '.$row3['price_value'].'</h5>
									</div>
								</div><hr>';
								}

								?>
								
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="col-5">
				<div class="row">
					
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="card-title">
									<h4>
										MY ADDRESSES
										<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-success pull-right">Add</a><br>
									</h4>

								</div>
								<div class="row mt-20">
									<?php
									$user_id=$_SESSION['user_id'];
									$query="SELECT * FROM `address` WHERE `user_id` LIKE '$user_id'";



									$result=mysqli_query($connection,$query);

									$result5=mysqli_query($connection,$query);
									$row5=mysqli_fetch_array($result5);
										if($row5['user_id']!=$user_id)
										{
											echo '<div class="row offset-2">

													<p style="font-size:20px"><b>NO ADDRESS ADDED YET</b></p>

												 </div>';
										}

									$counter=1;
									while($row=mysqli_fetch_array($result)){
										echo '<div class="col-12">
										<p id="atext'.$counter.'">'.$row['address_text'].'</p>
										<span id="aid'.$counter.'" data-id="'.$row['address_id'].'"></span>
										<p>
											<a href="address_handler.php?address_id='.$row['address_id'].'" class="btn btn-danger btn-sm">Delete</a>
											<button data-id="'.$counter.'" class="btn btn-primary btn-sm editBtn">Edit</button>
										</p><hr>
									</div>';
									$counter++;
									}
									?>
									
									
								</div>
							</div>
						</div>

					</div>
					<div class="col-12">
						
							<div class="card mt-20">
							
							<div class="card-title  ">
								<h4><center> MY REVIEWS <center></h4>

							</div>

							<div class="card-body">

								<?php

									$user_id=$_SESSION['user_id'];

									//$query3="SELECT * FROM `orders` o JOIN `restaurants` r ON r.`r_id`=o.`r_id` WHERE o.`user_id` LIKE '$user_id'";

									$query4="SELECT * FROM `review` rev JOIN `restaurants` r ON r.`r_id`=rev.`r_id` WHERE rev.`user_id` LIKE '$user_id'";
									//$user_id=$_SESSION['user_id'];
									//$query4="SELECT * FROM `review` WHERE 	`user_id` LIKE '$user_id'";

									$result4=mysqli_query($connection,$query4);
									$result5=mysqli_query($connection,$query4);
									/*if(($row5=mysqli_fetch_array($result4))==0)
										{
											echo '<div class="row">
													<p>hi</p>
													</div>';
										}*/
										$row5=mysqli_fetch_array($result5);
										if($row5['user_id']!=$user_id)
										{
											echo '<div class="row offset-2">

													<p style="font-size:20px"><b>NO REVIEWS GIVEN YET</b></p>

												 </div>';
										}


									
									while($row4=mysqli_fetch_array($result4))
									{
										
										

										echo '<div class="row">
									<div class="col-2">
										<img src="'.$row4['r_bg'].'" style="width: 60px;height: 70px">

									</div>

									<div class="col-10">
										<p> '.$row4['rev_text'].' </p>

									</div>


								</div><hr>';
									}

									


								?>
								
									
									

							</div>












							</div>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Add new address</h4>
        </div>
        <div class="modal-body">
          <form class="form" action="address_handler.php" onsubmit="return validate()" method="POST">
          	<div id="reg_error"></div>
          	<input id="y" type="hidden" name="address_id" value="">
          	<label>Address</label><br>
          	<textarea id="x" class="form-control" name="address_text"></textarea><br><br>
          	<input id="insert" type="submit" value="Add Address" class="btn bg-nav btn-block btn-lg text-light"  name="insert_address">
          	<input id="update" type="submit" value="Update Address" class="btn btn-warning btn-block btn-lg text-light"  name="update_address">
          </form>
        </div>
       
      </div>
    </div>
  </div>


</body>
</html>