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


<div class="container py-4 d-flex justify-content-center">

  <div class="col-lg">
    <div class="card text-white shadow-custom" style="border-radius: 8px; background-color: #5D698F">

    <form action="admin-student.php" method="post">

      <div class="card-header">
        <strong class="card-title">Add Student</strong>
      </div>
          
          <div class="card-body card-block">

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
                name="Age" placeholder="Enter Age" required>
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
                <input type="text" class="form-control form-control-sm" 
                name="Contact" placeholder="Enter Contact info" required>
              </div>      
            
            </div>



            <div class="row">

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

              <div class="row">

                <div class="col-sm mt-3">

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


              <!-- Validation -->
              <div class="row ">
                <div class="col-sm mt-3 d-flex justify-content-center">

                  <div class='alert alert-success alert-sm w-75 text-center' id="success" role='alert' style="display: none;">
                    <strong>Success!</strong> Account Registration is successful...
                  </div>  

                  <div class="alert alert-danger alert-sm h-auto w-75 text-center" id="failure" role="alert" style="display:none; height: 5px;">
                      <strong>Warning!</strong> Password does not match...     
                  </div>                   

                </div>
              </div>
              <!-- Validation -->
            
            </div>

          </div>

        <div class="card-footer py-3">
          <button type="submit" class="btn w-100 text-dark btn-light" name="register" value="Add Student">
            <b>Add Student</b>            
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
            <button class="btn w-100 btn-light" name="refresh">
              <a href="admin-student.php" style="text-decoration: none;" class="text-dark">
                <b>Refresh</b>                
              </a>
            </button>     
          </div>          


          <table class="table table-striped table-light table-success table-hover table-bordered text-center table-sm table-responsive">

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

                $sql = "SELECT * FROM tbl_student limit 20";
                $result = mysqli_query($con,$sql);

                if ($result){
                  while ($row=mysqli_fetch_assoc($result)) {
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
                }

              ?>
          </table>

        </div>

    </div>    
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



<!-- Footer -->
<?php  

    include "../footer.php";

?>

</body>
</html>
