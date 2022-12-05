<?php  

	session_start();

	include "header.php";
	include "connection.php";

?>


<!DOCTYPE html>
<html>
<head>
	<title>Exam Results</title>

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


<div class="container pb-5 pt-3 d-flex justify-content-center">
  <div class="col-lg-12">

    <div class="card text-white shadow-custom" style="border-radius: 8px; background-color: #5D698F;">
      <div class="card-header">
      	<strong>
      		Session Exam Results:
      	</strong>
      </div>
          
          <div class="card-body card-block">               
          	<div class="row">

          		<div class="col-sm">
          			<?php 

          				$count = 0;

          				$res = mysqli_query($con,"SELECT * FROM exam_results 
          					WHERE username='$_SESSION[Username]'
          					ORDER BY id desc");
          				$count=mysqli_num_rows($res);

          				if ($count==0) 
          				{
          					?>

							  		<div class='container p-5 text-center'>
								  		<strong>
								  			No Exam Results Found
								  		</strong>
							  		</div>	

							  		<?php
          				} 


          				
          				else 
          				{
          					echo "
					          <table class='table table-striped table-light table-success table-hover table-bordered text-center table-sm table-responsive'>

					              <tr>
					                <th class='align-middle' scope='col'>Username</th>
					                <th class='align-middle' scope='col'>Exam Type</th>
					                <th class='align-middle' scope='col'>Total Question(s)</th>
					                <th class='align-middle' scope='col'>Correct Answer</th>
					                <th class='align-middle' scope='col'>Wrong Answer</th>
					                <th class='align-middle' scope='col'>Equivalent</th>  
					                <th class='align-middle' scope='col'>Exam Time</th>					                
					              </tr>
					              
          					";	

          					$res2 = mysqli_query($con,"SELECT * FROM exam_results 
          					WHERE username='$_SESSION[Username]'
          					ORDER BY id asc");

          					while ($row=mysqli_fetch_assoc($res2)) 
          					{
          						$Username = $row ['username'];
                  		$ExamType = $row ['exam_type'];
                  		$TotalQuestion = $row ['total_question'];
                  		$CorrectAnswer = $row ['correct_answer'];
                  		$WrongAnswer = $row ['wrong_answer'];
                  		$ExamTime = $row ['exam_time'];

	                    if ($CorrectAnswer > $WrongAnswer) 
	                    {                      
	                      $Equivalent = "<span style='color: green'>Passed</span>";
	                    }
	                    elseif ($CorrectAnswer == $WrongAnswer) 
	                    {
	                      $Equivalent = "<span style='color: green'>Passed</span>";
	                    }
	                    else
	                    {
	                      $Equivalent = "<span style='color: red'>Failed</span>";
	                    }                  		

              				echo '

                      <tr>
                        <td class="align-middle">' .$Username. '</td>
                        <td class="align-middle">' .$ExamType. '</td>
                        <td class="align-middle">' .$TotalQuestion. '</td>
                        <td class="align-middle" style="color:green; font-weight: bolder">' .$CorrectAnswer. '</td>
                        <td class="align-middle" style="color:red; font-weight: bolder">'. $WrongAnswer. '</td>
                        <td class="align-middle" style="font-weight: bolder">'. $Equivalent. '</td>
                        <td class="align-middle">' .$ExamTime. '</td>
                      </tr>
              					
              					
              				';
          					}
          				}

          			?>		
          			</table>
          		</div>

          	</div>
          </div>  
    </div>    
  </div>

</div>  


<?php 
	
	include "footer.php";

?>