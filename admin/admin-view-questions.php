<?php  

  include ("../connection.php");

  session_start();
  if (!isset($_SESSION['Username'])) {
    
    echo 
      "<script type='text/javascript'>
        alert('Session Error!...')

        window.location.href='../login.php';
        ;
      </script>";   

  }    

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Question Category</title>

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

  include "admin-header.php";

?>



<div class="container pt-5 pb-5 d-flex justify-content-center">

  <div class="col-md">
    <div class="card text-white shadow-custom" style="border-radius: 8px; background-color: #5D698F;">

      <div class="card-header">
        <strong class="card-title">Existing Exam(s):</strong>
      </div>

        <div class="card-body card-block">

          <table class="table table-striped table-light table-success table-hover table-bordered text-center table-sm table-responsive">

              <tr>
                <th class="align-middle" scope="col">ID</th>
                <th class="align-middle" scope="col">Category</th>                
                <th class="align-middle" scope="col">Exam Time</th>
                <th class="align-middle" scope="col">Select</th>                
              </tr>

              <?php

                $sql = "SELECT * FROM exam_category limit 20";
                $result = mysqli_query($con,$sql);

                if ($result){
                  while ($row=mysqli_fetch_assoc($result)) {
                  $ExamID=$row ['id'];
                  $ExamName=$row ['category'];
                  $ExamTime=$row ['exam_time_in_minutes'];

                  

                    echo '
                    <tr>
                      <td class="align-middle" scope = "row"> ' .$ExamID. ' </td>
                      <td class="align-middle"> ' .$ExamName. '</td>                      
                      <td class="align-middle"> ' .$ExamTime. ' </td>
                      <td class="py-3">         
                        <button class="text-center btn btn-primary btn-sm w-25">

                        <a href="admin-add-questions.php?updateid='.$ExamID.'"
                        style="text-decoration: none; color: white;">

                          <img src="https://static.thenounproject.com/png/2964868-200.png" style="filter: invert(1); width: 20px">

                        </a>
                        </button>                      
                      </td>
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



<!-- Footer -->
<?php  

    include "../footer.php";

?>

</body>
</html>
