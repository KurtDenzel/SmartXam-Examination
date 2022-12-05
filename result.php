<?php  
	session_start();
	include "header.php";
	include "connection.php";

	$date=date("Y-m-d H:i:s");
	$_SESSION['end_time'] = date("Y-m-d H:i:s", 
		strtotime($date."+$_SESSION[exam_time] minutes "));


?>

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

<div class="jumbotron jumbotron pb-5 px-2 pt-5" style="margin-bottom: 60px;">
  <div class="container text-center text-white py-3 px-3 shadow-custom" style="border-radius: 8px; font-size: 20px; background-color: #5D698F; ">

  	<?php 

  		$correct = 0;
  		$wrong = 0;

  		if (isset($_SESSION['answer'])) 
  		{
  			for ($i=1; $i <=sizeof($_SESSION['answer']); $i++ ) 
  			{ 
  				$answer = "";
  				$res = mysqli_query($con, "SELECT * FROM tbl_questions 
  					WHERE category='$_SESSION[exam_category]' 
  					AND question_no=$i");

  				while($row=mysqli_fetch_array($res))
  				{
  					$answer = $row ['answer'];
  				}

  				if (isset($_SESSION['answer'][$i])) 
  				{
  					if ($answer==$_SESSION['answer'][$i]) 
  					{
  						$correct = $correct + 1;
  					}
  					else 
  					{
  						$wrong = $wrong + 1;
  					}
  				}
  				else 
  				{
  					$wrong = $wrong + 1;
  				}
  			}
  		}

  		$count = 0;

  		$res = mysqli_query($con, "SELECT * FROM tbl_questions 
  			WHERE category='$_SESSION[exam_category]'");
  		$count = mysqli_num_rows($res);

  		$wrong = $count - $correct;

  		echo "<center>";

  		echo "Total Questions = ".$count;
  		echo "<br>";

  		echo "Correct Answer = ".$correct;
  		echo "<br>";

  		echo "Wrong Answer = ".$wrong;
  		echo "<br>";

  		echo "</center>";


  	?>
    
  </div>
</div>



<?php  

	if (isset($_SESSION['exam_start'])) 
	{
		$date=date("Y-m-d");

		mysqli_query($con, "INSERT INTO exam_results
			(id,username,exam_type,total_question,correct_answer,wrong_answer,exam_time)
			VALUES (NULL, 
				'$_SESSION[Username]',
				'$_SESSION[exam_category]',
				'$count',
				'$correct',
				'$wrong',
				'$date')");
	}

	if (isset($_SESSION['exam_start'])) 
	{
		unset($_SESSION['exam_start']);
		?>
		<script type='text/javascript'>
	        window.location.href=window.location.href;	 
	    </script>
		<?php
	}

?>


<?php  

	include "footer.php";

?>