<?php  

	include ("connection.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Registration </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/x-icon" href="https://mail.google.com/mail/u/0/h/tninwdjy68pa/?view=att&th=18202609e794c917&attid=0.1&disp=emb&realattid=ii_l5ml7k4z0&zw&atsh=1">


	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


	<!-- JsQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.js" integrity="sha512-p+GPBTyASypE++3Y4cKuBpCA8coQBL6xEDG01kmv4pPkgjKFaJlRglGpCM2OsuI14s4oE7LInjcL5eAUVZmKAQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/scrollup/2.4.1/jquery.scrollUp.min.js" integrity="sha512-gAHP1RIzRzolApS3+PI5UkCtoeBpdxBAtxEPsyqvsPN950Q7oD+UT2hafrcFoF04oshCGLqcSgR5dhUthCcjdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>		

	<style type="text/css">

		.shadow-custom {
		  	-webkit-box-shadow: 2px 4px 13px 0px rgba(0,0,0,0.5);
			-moz-box-shadow: 2px 4px 13px 0px rgba(0,0,0,0.5);
			box-shadow: 2px 4px 13px 0px rgba(0,0,0,0.5);
		}

		.alert{
			position: relative;
			padding: 1rem 1rem 1rem 1rem;
		}
		
	</style>	
</head>

<body class="pt-5" style="background-color: #495579;">

<div class="container d-flex justify-content-center" >
 	<div class="row d-flex justify-content-center">


	<form action="student-registration.php" method="post">		
		<div class="container py-2 px-4 text-white shadow-custom" style="border-radius: 15px; background-color: #5D698F;">

	 		<div class="mt-3 text-center">
	 			<a href="index.php">
				<img src="https://cdn2.iconfinder.com/data/icons/literary-genres-5/500/vab604_13_history_book_isometric_cartoon_retro_vintage_coffee-512.png" style="width: 75px;"></a>
				<h3>Sign Up</h3>				
			</div>


			<div class="row">

				<!-- First Name -->
				<div class="col-sm mt-1">
					<label class="form-label"><b>Student Name:</b></label><br>
					<input type="text" class="form-control form-control-sm" 
					name="Name" placeholder="Enter First Name" required>
				</div>			

				<!-- Email -->
				<div class="col-sm mt-1">
					<label class="form-label"><b>Email:</b></label><br>
					<input type="email" class="form-control form-control-sm" 
					name="Email" placeholder="Enter Email" required>
				</div>			
			
			</div>


			<div class="row pb-2">

				<!-- Age -->
				<div class="col-sm mt-1">
					<label class="form-label"><b>Age:</b></label><br>
					<input type="number" class="form-control form-control-sm" 
					name="Age" placeholder="Enter Age" required minlength="2" maxlength="3">
				</div>			

				<!-- Email -->
				<div class="col-sm mt-1">
					<label class="form-label"><b>Address:</b></label><br>
					<input type="text" class="form-control form-control-sm" 
					name="Address" placeholder="Enter Address" required>
				</div>			
			
			</div>			


			<div class="row pb-2">

				<!-- Username -->
				<div class="col-sm mt-1">
					<label class="form-label"><b>Username:</b></label><br>
					<input type="text" class="form-control form-control-sm" 
					name="Username" placeholder="Enter Username" required>
				</div>			

				<!-- Contact: -->
				<div class="col-sm mt-1">
					<label class="form-label"><b>Contact:</b></label><br>
					<input type="number" class="form-control form-control-sm" 
					name="Contact" placeholder="Enter Contact info" required maxlength="12">
				</div>			
			
			</div>



			<div class="row pb-3">

				<!-- Password -->
				<div class="col-sm mt-1">
					<label class="form-label"><b>Password:</b></label><br>
					<input type="password" class="form-control form-control-sm" 
					name="Password" placeholder="Enter Password Here" minlength="8" maxlength="13" required id="Show">
				</div>			

				<!-- Confirm Password -->
				<div class="col-sm mt-1">
					<label class="form-label"><b>Confirm Password:</b></label><br>
					<input type="password" class="form-control form-control-sm" 
					name="ConfirmPassword" placeholder="Confirm Password Here" minlength="8" maxlength="13" required id="ConfirmShow">
				</div>			

				<div class="mt-3 d-flex justify-content-start">

					<div class="form-check">
						<label class="form-check-label">Show Password</label>
					  	<input class="form-check-input" type="checkbox" onclick="ShowPassword()">
					</div>	

					<!-- Show Password Script -->
					<script type="text/javascript">
						function ShowPassword() 
						{
							var show = document.getElementById('Show');
							var confirmshow = document.getElementById('ConfirmShow');

							// Password
							if (show.type=='password') 
							{
								show.type='text';
							}
							else 
							{
								show.type='password';	
							}

							// Confirm Password
							if (confirmshow.type=='password') 
							{
								confirmshow.type='text';
							}
							else 
							{
								confirmshow.type='password';	
							}							
						}
					</script>

				</div>				
			
			</div>
										


			<!-- Submit Registration -->
			<div class="d-flex justify-content-start">
				<button type="submit" class="btn btn-sm w-100 btn-light text-dark" name="register" value="register">
					<b>Register</b>
				</button>
			</div>	

			<!-- Submit Registration -->
			<div class="mt-3 d-flex justify-content-center">
				<p>Have an account already?
				<a href="login.php" class="text-sucesss" 
				style="text-decoration: none;color: #95a1c9;"><u>Login Here</u></a></p>
			</div>				

			<div class='mt-3 alert alert-success alert-sm' id="success" role='alert' style="display: none;">
				<strong>Success!</strong> Account Registration is successful...
			</div>	


			<div class="mt-1 alert alert-danger h-auto text-center" id="failure" role="alert" style="display: none; height: 5px;">
  				<strong>Warning!</strong> Password does not match...			
			</div>										


		</div>
	</form>

 	</div>
 </div>


<?php  

	if (isset($_POST['register'])) {

      	$Name = $_POST["Name"];      	
		$Email = $_POST["Email"];

		$Age = $_POST["Age"];
		$Address = $_POST["Address"];		

		$Username = $_POST["Username"];
		$Contact = $_POST["Contact"];

		$Password = $_POST ["Password"];
		$ConfirmPassword = $_POST ["ConfirmPassword"];


        if ($Password == $ConfirmPassword) {
			$query = "INSERT INTO tbl_student 
					(name, email, age, address, username, contact, password) 
			VALUES ('$Name', '$Email','$Age','$Address','$Username',
					'$Contact', '$Password')";

			$result = mysqli_query($con,$query);

			if ($result) {
		    	echo "<script type='text/javascript'>
		    			document.getElementById('success').style.display='block' </script>";
			}
			else {
				die(mysqli_error($con));
			}
	    }

	    else {
          echo "<script type='text/javascript'>
              document.getElementById('failure').style.display='block' </script>";	    	
	    }
	}
?>

</body>
</html>	