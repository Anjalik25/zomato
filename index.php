<?php 

session_start();
if(!empty($_SESSION))
{
	header('Location:profile.php');
}

if(empty($_GET))
{
	$error=0;
}
else
{
	if($_GET['error']==1)
	{
		$error=1;
	}

	else if($_GET['error']==2)
	{
		$error=2;
	}

	else if($_GET['error']==3){

		$error=3;
	}

	else if($_GET['error']==4){

		$error=4;
	}

	else if($_GET['error']==5){

		$error=5;
	}

	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN HERE</title>
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
		var msg='<?php echo $error; ?>';
		if(msg==1)
		{
			$('#login_error').html("<p> <b> INCORRECT EMAIL/PASSWORD </b> </p>");
		}

		else if(msg==2)
		{
			$('#reg_error').html("<p> <b>EMAIL ALREADY PRESENT </b> </p>");
			$('#myModal').modal('show');

		}

		else if(msg==3)
		{
			$('#reg_error').html("<p> <b>REGISTRATION FAILED PLEASE TRY AGAIN </b> </p>");
			$('#myModal').modal('show');
		}

		else if(msg==4)
		{
			$('#reg_error').html("<p> <b>INVALID FORMAT TYPE PICTURE </b> </p>");
			$('#myModal').modal('show');
		}

			else if(msg==5)
		{
			$('#reg_error').html("<p> <b>FILE SIZE EXCEEDED </b> </p>");
			$('#myModal').modal('show');
		}




	})
</script>

<script type="text/javascript">
	
	$(document).ready(function(){

		$('#button').click(function(){

			var flag=0;

			var o1pass,o1email;

				o1email=$('#oemail').val();
			o1pass=$('#opass').val();

			if(o1email=="")
			{
				$('#oemail').css("border" , "2px solid red");
				flag++;
				
			}
			if(o1pass=="")
			{
				$('#opass').css("border" , "2px solid red");
				
			}

			if(flag==0)
			{
				return true;
				flag++;
			}
			else{

				return false;
			}

		})

	})
</script>
<script type="text/javascript">
	
		function validate(){

			var flag=0;

			var nameInput,passwordInput,emailInput,cpasswordInput;
			nameInput=$('#name').val();
			emailInput=$('#email').val();
			passwordInput=$('#password').val();
			cpasswordInput=$('#cpassword').val();

		
			if(nameInput=="")
			{
				$('#name').css("border" , "2px solid red");
				flag++;
			}

			if(emailInput == "")
			{
				$('#email').css("border" , "2px solid red");
				flag++;

			}

			if(passwordInput == "")
			{
				$('#password').css("border","2px solid red");
				flag++;

			}

			if(cpasswordInput == "")
			{
					$('#cpassword').css("border" , "2px solid red");
					flag++;

			}

			if(passwordInput.length<4){

				$('#password').css("border","2px solid red");
				flag++;

			}
			if(passwordInput!=cpasswordInput)
			{
				$('#password').css("border","2px solid red");
				$('#cpassword').css("border" , "2px solid red");
				flag++;

			}
			if(flag==0)
			{
				return true;
			}
			else{

				return false;
			}
		}
	

</script>
<body class="bg-nav">

	<nav class="navbar navbar-dark bg-nav">
<a class="navbar-brand" href="#"><b>Zomato</b></a>
</nav>

<div class="container">
	<div class="row mt-100">
		<div class="col-8">
			<h1 class="text-light text-center display-3"> WELCOME TO THE BIGGEST FOOD DELIVERY APP IN THE WORLD </h1>
		</div>
		<div class="col-4">
			
			<div class="card">

				<div class="card-body">
					
					<form class="form" action="login_validation.php" method="POST" >
						<div id="login_error"></div>
						<label>EMAIL:</label><br>
						<input id="oemail" type="email" name="uemail" placeholder="john@gmail.com" class="form-control"> <br>
						<label>PASSWORD</label> <br>
						<input id="opass" type="password" name="upassword" placeholder="PASSWORD HERE" class="form-control"><br> <br>
					
						<input id="button" type="submit" name="" value="SIGN IN" class="btn bg-nav btn-block btn-lg text-light">
						

					</form>
					<br> <h4 class="lead text-center">  NEW MEMBER ? <a href=" # " data-toggle="modal" data-target="#myModal">SIGN UP </a> </h4>
				</div>
				
			</div>

		</div>
		
	</div>
	
</div>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">REGISTRATION FORM</h4>
        </div>
        <div class="modal-body">
          <form class="form" action="reg_validation.php" onsubmit="return validate()" method="POST" enctype="multipart/form-data">
          	<div id="reg_error"></div>
          	<label>NAME</label> <br>
          	<input id="name" type="text" name="user_name" class="form-control"> <br>
          	<label> EMAIL</label> <br>
          	<input id="email" type="email" name="user_email" class="form-control"> <br>
          	<label> PASSWORD</label> <br>
          	<input id="password" type="password" name="user_password" class="form-control"> <br>
          	<label>CONFIRM PASSWORD</label> <br>
			<input id="cpassword" type="password" name="" placeholder="PASSWORD HERE" class="form-control"><br> <br>
          	<label> PROFILE PIC</label> <br>
          	<input type="file" name="user_dp" class="form-control"> <br> <br>
          	<input type="submit" name="" value="SIGN UP" class="btn bg-nav btn-block btn-lg text-light">
          </form>
        </div>
       
      </div>
    </div>
  </div>


</body>
</html>
