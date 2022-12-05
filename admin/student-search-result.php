<?php  

  include ("../connection.php");

  session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Student Category</title>

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


<?php 

  include '../connection.php';

  if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
      $query = "SELECT * FROM `tbl_student` 
      WHERE CONCAT(`StudentID`, `name`, `email`, `age`, 'address', 'username', 'contact') 
      LIKE '%".$valueToSearch."%'";
      $search_result = filterTable($query);
  }
  else {
    $query = "SELECT * FROM tbl_student";
    $seach_result = filterTable($query);
  }

  function filterTable ($query) {
    $con = mysqli_connect("localhost","root","","examinationdb");
    $filter_result = mysqli_query($con, $query);
    return $filter_result;
  }
?>



<div class="container pt-4 pb-5 d-flex justify-content-center">

  <div class="col-md">
    <div class="card text-white shadow-custom" style="border-radius: 8px; background-color: #5D698F">

      <div class="card-header">
        <strong class="card-title">Existing Students:</strong>
      </div>

        <div class="card-body card-block">


          <!-- Search Function --> 
          <form action="student-search-result.php" method="post">        

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
              <a href="admin-student.php" style="text-decoration: none;" class="text-dark">
                <b>Refresh</b>                
              </a>
            </button>     
          </div>          


          <table class="table table-striped table-success table-light table-hover table-bordered text-center table-sm table-responsive">

              <tr>
                <th class="align-middle" scope="col">Name</th>
                <th class="align-middle" scope="col">Email</th>                
                <th class="align-middle" scope="col">Age</th>
                <th class="align-middle" scope="col">Address</th>
                <th class="align-middle" scope="col">Username</th>
                <th class="align-middle" scope="col">Contact</th>                
                <th class="align-middle" scope="col">Operation</th>                
              </tr>

              <?php

                  while ($row=mysqli_fetch_assoc($search_result)) {
                  $StudentID  = $row ['StudentID'];                    
                  $Name = $row ['name'];
                  $Email = $row ['email'];
                  $Age = $row ['age'];
                  $Address = $row ['address'];
                  $Username = $row ['username'];
                  $Contact = $row ['contact'];

                  

                    echo '
                    <tr>
                      <td class="align-middle"> ' .$Name. ' </td>
                      <td class="align-middle"> ' .$Email. '</td>                      
                      <td class="align-middle"> ' .$Age. ' </td>
                      <td class="align-middle"> ' .$Address. ' </td>
                      <td class="align-middle"> ' .$Username. ' </td>
                      <td class="align-middle"> ' .$Contact. ' </td>                      
                      <td class="py-3">         
                        <button class="text-center btn btn-primary btn-sm w-auto">

                        <a href="admin-update-student.php?updateid='.$StudentID .'"
                        style="text-decoration: none; color: white;">

                          <img src="https://cdn-icons-png.flaticon.com/512/61/61456.png" style="filter: invert(1); width: 20px">

                        </a>
                        </button>
                        
                        <button class="text-center btn btn-danger btn-sm w-auto">

                        <a href="admin-delete-student.php?deleteid='.$StudentID .'" 
                        style="text-decoration: none; color: white;">

                          <img src="https://freeiconshop.com/wp-content/uploads/edd/trash-var-solid.png" style="filter: invert(1); width: 20px">

                        </a>
                        </button>
                      </td>
                    </tr> 
                    ';
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