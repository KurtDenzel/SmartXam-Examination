<?php

	include 'connection.php';

	session_start();
	if (!isset($_SESSION['Username'])) {
		
	  echo 
	    "<script type='text/javascript'>
	      alert('Session Error!...')

	      window.location.href='login.php';
	      ;
	    </script>";  	

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Available Exam(s)</title>

    <style type="text/css">

      .shadow-custom {
        box-shadow: 0 2px 17px 0 rgba(0, 0, 0, .25), 0 3px 10px 5px rgba(0, 0, 0, 0.05) !important;
        border-radius: 15px;
      }

      .alert{
        position: relative;
        padding: 1rem 1rem 1rem 1rem;
      } 
      
    </style>   	

<?php  

	include "header.php";

?>


<div class="container pt-3 pb-5 d-flex justify-content-center">

  <div class="col-sm" >

    <div class="card shadow-custom" style="border-radius: 8 px; background-color: #5D698F;">
      <div class="card-header d-flex justify-content-start text-white">
      	<strong>Available Exams:</strong>
      </div>
          
          <div class="card-body card-block">	

		    <?php 
		  		$res = mysqli_query($con,"select * from exam_category");
		  		while ($row = mysqli_fetch_array($res)) 
		  		{
		  	?>

	    <input type="button" class="btn btn-light w-100 text-dark"
	    value="<?php echo $row["category"]; ?>"
	    style="margin-top: 10px; height: 100px; border-radius: 8px; font-weight: bold;"
	    onclick="set_exam_type_session(this.value);">	    
					    
		<?php
  		}
  	?>


          </div>
      
    </div> 

  </div>
  
</div>  


<script type="text/javascript">
    function set_exam_type_session(exam_category)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "dashboard.php";
            }
        };
        xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_category="+ exam_category,true);
        xmlhttp.send(null);
    }
</script>


<!-- Footer -->
<?php  

	include "footer.php";

?>


</body>
</html>