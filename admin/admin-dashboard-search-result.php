<?php  

  session_start();
  include "../connection.php";

  if (!isset($_SESSION['Username'])) {
    
    echo 
      "<script type='text/javascript'>
        alert('Session Error!...')

        window.location.href='../login.php';
        ;
      </script>";   

  }  

?>


<?php 

  include '../connection.php';

  if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
      $query = "SELECT * FROM `exam_results` 
      WHERE CONCAT(`username`, `exam_type`, `total_question`, `correct_answer`, 'wrong_answer', 'exam_time') 
      LIKE '%".$valueToSearch."%'";
      $search_result = filterTable($query);
  }
  else {
    $query = "SELECT * FROM exam_results";
    $seach_result = filterTable($query);
  }

  function filterTable ($query) {
    $con = mysqli_connect("localhost","root","","examinationdb");
    $filter_result = mysqli_query($con, $query);
    return $filter_result;
  }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

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
  <div class="col-lg-12">

      <div class="card text-white shadow-custom" style="border-radius: 8px; background-color: #5D698F;">

        <div class="card-header">
          <strong class="card-title">Exam Results: </strong>
        </div>

        <div class="card-body card-body">


          <!-- Search Function --> 
          <form action="admin-dashboard-search-result.php" method="post">        

            <div class="input-group mt-1">
              <input type="text" class="form-control" 
              placeholder="Search here..." name="valueToSearch" >
              <div class="input-group-append">

              <button class="btn" name="search" style="background-color: #7f8bb3">
                <span>
                  <img src="https://cdn4.iconfinder.com/data/icons/manual-set/66/search_magnifier_zoom_lupe-512.png" style="width: 20px;">
                </span>     
              </button>

              </div>
            </div>                

          </form>

          <div class="mt-3 mb-3">
            <button class="btn w-100" name="refresh" style="background-color: #FFFBEB">
              <a href="admin-dashboard.php" style="text-decoration: none;" class="text-dark">
                <b>Refresh</b>                
              </a>
            </button>     
          </div>                      

          <div class="row">

            <div class="col-sm">
              <?php 

                $count = 0;

                $res = mysqli_query($con,"SELECT * FROM exam_results ORDER BY id asc");
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
                        <th class='align-middle' scope='col'>Operation</th>
                      </tr>
                      
                  ";  

                  while ($row=mysqli_fetch_assoc($search_result)) 
                  {
                    $ResultID = $row ['id'];
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

                        <td>
                          <button class="text-center btn btn-danger btn-sm w-auto">

                          <a href="admin-delete-dashboard-record.php?deleteid='.$ResultID.'" 
                          style="text-decoration: none; color: white;">

                            <img src="https://freeiconshop.com/wp-content/uploads/edd/trash-var-solid.png" style="filter: invert(1); width: 20px">

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

  </div>
</div>



<!-- Footer -->
<?php  

    include "../footer.php";

?>

</body>
</html>
