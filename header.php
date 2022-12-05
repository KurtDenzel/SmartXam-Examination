<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="https://cdn2.iconfinder.com/data/icons/literary-genres-5/500/vab604_13_history_book_isometric_cartoon_retro_vintage_coffee-512.png">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


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
			padding: 0rem 1rem 0rem 1rem;
		}
		
	</style>	
</head>

<body style="background-color: #495579;">



<nav class="navbar navbar-expand-lg px-3" style="background-color: #263159">

    <a class="navbar-brand" href="#" style="background-color: #263159">
      <img src="https://cdn2.iconfinder.com/data/icons/literary-genres-5/500/vab604_13_history_book_isometric_cartoon_retro_vintage_coffee-512.png" style="width: 40px;">
      
      <b style="color: white">SmartXam</b>
    </a>

	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span><img src="https://icon-library.com/images/menu-icon/menu-icon-6.jpg" style="width: 3vh;filter: invert(1);"></span>
   </button>

  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ms-auto">

      <li class="nav-item text-center">
        <a class="nav-link text-white" href="select-exam.php">
        	Available Exam(s)
      	</a>
      </li>

      <li class="nav-item text-center">
        <a class="nav-link text-white" href="exam_results.php">Exam Result(s)</a>
      </li>

		  <li class="nav-item dropdown text-center">
		    <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-bs-toggle="dropdown">

		    		<span>
							<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" class="bi bi-person-square" viewBox="0 0 16 16" style="filter: invert(1);">
							  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
							  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
							</svg>	    			
		    		</span>

		        <?php echo $_SESSION['Username']; ?>
		    </a>
		    	<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		        	<li><a class="dropdown-item" href="logout.php">Logout</a></li>
		      	</ul>
		  </li>    

  </div>
</nav>

<div class="jumbotron jumbotron pb-3 px-2 pt-5">
  <div class="container text-center text-white py-3 px-3 shadow-custom" style="border-radius: 8px; font-size: 20px; background-color: #263159;">
    <strong>Countdown Timer: </strong>
    <p class="lead">
    	<div id="countdowntimer" style="display: block;">
    		
    	</div>
    </p>
  </div>
</div>


<div class="jumbotron jumbotron pb-3 px-2">
  <div class="container text-white text-center py-3 px-3 shadow-custom" style="border-radius: 8px; font-size: 20px; background-color: #263159;">
    <strong>
    	Instructions:
    </strong> 
    <span>
    	Choose the correct answer for each of the following questions.
    </span>
  </div>
</div>


<script type="text/javascript">
    setInterval(function(){
        timer();
    },1000);
    function timer()
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                if(xmlhttp.responseText=="00:00:01")
                {
                    window.location="result.php";
                }

                document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;

            }
        };
        xmlhttp.open("GET","forajax/load_timer.php",true);
        xmlhttp.send(null);
    }

</script>



</body>
</html>