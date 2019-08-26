<?php

include 'includes/dbhelper.php';

session_start();
if(empty($_SESSION))
{
	header('Location:index.php?error=1');
}

	if(isset($_GET['r_id']))
	{
		$r_id=$_GET['r_id'];

		$query="SELECT * FROM `restaurants` WHERE `r_id` LIKE '$r_id'";

		$result=mysqli_query($connection,$query);
		$result_array=mysqli_fetch_assoc($result);
		$r_name=$result_array['r_name'];
		$r_address=$result_array['r_address'];
		$r_bg=$result_array['r_bg'];

	}

	else
	{
		header('Location: index.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>MENU PAGE</title>
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

		$('#review').click(function(){
			$('#myModal').modal('show');
			var r_id='<?php echo $r_id; ?>';
			
			$('#r_id').val(r_id);
			//$('#rev').attrb('href',"http://localhost/zomato/review_handler.php?r_id="+r_id);
		})

	})
</script>


<script type="text/javascript">
	
	$(document).ready(function(){
		var counter=0;
			var total=0;
		$('.orderBtn').click(function(){

			var menu_id=$(this).data('id');
			var menu_name=$('#mname'+menu_id).text();
			var menu_price=$('#mprice'+menu_id).text();
			total=parseInt(menu_price) + total;
			var r_id='<?php echo $r_id; ?>';
			var user_id='<?php  echo $_SESSION['user_id'];  ?>';

			if(counter==0){
				$('#checkout').html('<div class="card"><div class="card-body" ><h3><center>Order Details</center><br></h3><div id="new_item"><p><b><span>' + menu_name + '</span><span class="pull-right">Rs ' + menu_price + '</span></b><hr></p></div><div id="cart_total"><p><span>Total</span><span class="pull-right"><b>Rs ' + total + '</b></span></p></div><a id="porder" href="#" class="btn btn-success btn-block btn-lg">Place Order</a></div></div>');

				$('#porder').attr('href',"http://localhost/zomato/place_order.php?user_id="+user_id+"&r_id="+r_id+"&total="+total);
			}else{
				$('#new_item').append('<p><b><span>' + menu_name + '</span><span class="pull-right">Rs ' + menu_price + '</span></b><hr></p>');
				$('#cart_total').html('<p><span>Total</span><span class="pull-right"><b>Rs ' + total + '</b></span></p>');

				$('#porder').attr('href',"http://localhost/zomato/place_order.php?user_id="+user_id+"&r_id="+r_id+"&total="+total);
			}
			counter++;
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
			<div class="col-8">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-3">
										<img src="<?php echo $r_bg ?>" style="width: 100% ; height: 150px">
									</div>
									<div class="col-9">
										<h2> <?php echo $r_name ?> </h2>
										<p> <?php echo $r_address ?> </p>
										<button class="btn btn-danger pull-right" id="review">ADD REVIEW</button>

									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="col-12 mt-50">
						<div class="card">
							<div class="card-body">
								<?php

									$query1="SELECT * FROM `menu` WHERE `r_id` LIKE '$r_id'";

									$result=mysqli_query($connection,$query1);
									while($row=mysqli_fetch_array($result))
									{

										echo '<div class="row">';

										if($row['menu_type']==0)
										{

											echo	'<div class="col-1">
												<div style="width: 20px; height: 20px ; background-color: green ; border-radius: 20px ;margin: 10px"></div>
											</div>';

										}

										else
										{

											echo	'<div class="col-1">
												<div style="width: 20px; height: 20px ; background-color: red ; border-radius: 20px ;margin: 10px"></div>
											</div>';
										}


										

										echo	'<div class="col-8">
												<p> <b><span id="mname'.$row['menu_id'].'"> '.$row['menu_name'].' </span></b><br>

													Rs  <span id="mprice'.$row['menu_id'].'">'.$row['menu_price'] .'</span>
												</p>

											</div>

											<div class="col-3">
												<button data-id="'.$row['menu_id'].'" class="btn btn-sm btn-success orderBtn" style="margin: 10px">ADD ITEM</button>
											</div>

										</div><hr>';
									}

								?>

								
							</div>
						</div>


					</div>
				</div>
			</div>
			<div class="col-4" id="checkout">
				


			</div>
		</div>

	</div>

	<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title"><center>Add Review</center></h4>
        </div>
        <div class="modal-body">
        	
          <form class="form" action="review_handler.php" onsubmit="return validate()" method="POST">
          	<div id="reg_error"></div>
          	<input id="r_id" type="hidden" name="r_id" value="">
          	<label>REVIEW</label><br>
          	<textarea id="x" class="form-control" name="rev_text"></textarea><br><br>
          	<input  type="submit" value="SUBMIT REVIEW" class="btn btn-block btn-lg text-light btn-success"  name="id_r">
          	
          	
          </form>

        </div>
       
      </div>
    </div>
  </div>

</body>
</html>