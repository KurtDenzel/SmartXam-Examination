<?php  

  include ("../connection.php");

  session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Exam Category</title>

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

  include 'admin-header.php';

?>


<div class="container py-4 d-flex justify-content-center">

  <div class="col-lg">
    <div class="card text-white shadow-custom" style="border-radius: 8px; background-color: #5D698F">

    <form action="admin-exam.php" method="post">
      <div class="card-header">
        <strong class="card-title">Add Exam</strong>
      </div>
          
          <div class="card-body card-block">

            <div class="pt-1">
              <!-- New Exam Category -->
              <label class="form-label">New Exam Category:</label>

              <input type="text" class="form-control form-control-md" 
              name="ExamName" placeholder="Add Exam Category">
            </div>


            <div class="pt-1">              
              <!-- Exam Time -->
              <label class="form-label">Exam Time in Minutes:</label>

              <input type="text" class="form-control form-control-md" 
              name="ExamTime" placeholder="Exam Time in Minutes">
            </div>

          </div>

        <div class="card-footer py-3">
          <button type="submit" class="btn w-100 text-dark" name="submit" value="Add Exam" style="background-color: #FFFBEB;">
            <b>Submit</b>            
          </button>
        </div>
      </form>
    </div>    
  </div>

</div>        


<div class="container pt-4 pb-5 d-flex justify-content-center">

  <div class="col-md">
    <div class="card text-white shadow-custom" style="border-radius: 8px; background-color: #5D698F">

      <div class="card-header">
        <strong class="card-title">Exam Categories:</strong>
      </div>

        <div class="card-body card-block">

          <table class="table table-striped table-light table-success table-hover table-bordered text-center table-sm table-responsive">

              <tr>
                <th class="align-middle" scope="col">ID</th>
                <th class="align-middle" scope="col">Category</th>                
                <th class="align-middle" scope="col">Exam Time</th>
                <th class="align-middle" scope="col">Operation</th>                
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

                        <a href="admin-update-exam.php?updateid='.$ExamID.'"
                        style="text-decoration: none; color: white;">

                          <img src="https://cdn-icons-png.flaticon.com/512/61/61456.png" style="filter: invert(1); width: 20px">

                        </a>
                        </button>
                        
                        <button class="text-center btn btn-danger btn-sm w-25">

                        <a href="admin-delete-exam.php?deleteid='.$ExamID.'" 
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


<?php  

  if (isset($_POST['submit'])) {

    $ExamName= $_POST["ExamName"];
    $ExamTime= $_POST["ExamTime"];

    $query = "INSERT INTO exam_category 
    (category, exam_time_in_minutes) 
    VALUES ('$ExamName', '$ExamTime')";  

    $result = mysqli_query($con,$query);

    if ($result) {
      echo 
        "<script type='text/javascript'>
          alert('Exam Added Successfully...')

          window.location.href=window.location.href;
          ;
        </script>";

    } else {

        die(mysqli_error($con));

    }

  }


?>



<!-- Footer -->
<?php  

    include "../footer.php";

?>

</body>
</html>
