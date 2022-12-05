<?php  

  include ("../connection.php");

  $id=$_GET['updateid'];
  $sql = "SELECT * FROM tbl_student WHERE StudentID=$id";
  $result=mysqli_query($con, $sql);
  $row=mysqli_fetch_assoc($result);

  $StudentID  = $row ['StudentID'];                    
  $Name = $row ['name'];
  $Email = $row ['email'];
  $Age = $row ['age'];
  $Address = $row ['address'];
  $Username = $row ['username'];
  $Contact = $row ['contact']; 

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


<div class="container py-5 my-2 d-flex justify-content-center" >

  <div class="col-lg">
    <div class="card text-white shadow-custom" style="border-radius: 8px; background-color: #5D698F">

    <form action="" method="post">

      <div class="card-header">
        <strong class="card-title">Update Student</strong>
      </div>
          
          <div class="card-body card-block">

            <div class="row">

              <!-- First Name -->
              <div class="col-sm mt-1">
                <label class="form-label"><b>Student Name:</b></label><br>
                <input type="text" class="form-control form-control-sm" 
                name="Name" value="<?php echo $Name ?>" placeholder="Enter First Name" required>
              </div>      

              <!-- Email -->
              <div class="col-sm mt-1">
                <label class="form-label"><b>Email:</b></label><br>
                <input type="email" class="form-control form-control-sm" 
                name="Email" value="<?php echo $Email ?>" placeholder="Enter Email" required>
              </div>      
            
            </div>


            <div class="row pb-2">

              <!-- Age -->
              <div class="col-sm mt-1">
                <label class="form-label"><b>Age:</b></label><br>
                <input type="text" class="form-control form-control-sm" 
                name="Age" value="<?php echo $Age ?>" placeholder="Enter Age" required>
              </div>      

              <!-- Email -->
              <div class="col-sm mt-1">
                <label class="form-label"><b>Address:</b></label><br>
                <input type="text" class="form-control form-control-sm" 
                name="Address" value="<?php echo $Address ?>" placeholder="Enter Address" required>
              </div>      
            
            </div>      


            <div class="row pb-2">

              <!-- Username -->
              <div class="col-sm mt-1">
                <label class="form-label"><b>Username:</b></label><br>
                <input type="text" class="form-control form-control-sm" 
                name="Username" value="<?php echo $Username ?>" placeholder="Enter Username" required>
              </div>      

              <!-- Contact: -->
              <div class="col-sm mt-1">
                <label class="form-label"><b>Contact:</b></label><br>
                <input type="text" class="form-control form-control-sm" 
                name="Contact" value="<?php echo $Contact ?>" placeholder="Enter Contact info" required>
              </div>      
            
            </div>



            <div class="row">

              <!-- Password -->
              <div class="col-sm mt-1">
                <label class="form-label"><b>Password:</b></label><br>
                <input type="password" class="form-control form-control-sm" 
                name="Password" placeholder="Enter Password Here" minlength="8" maxlength="13" required>
              </div>      

              <!-- Confirm Password -->
              <div class="col-sm mt-1">
                <label class="form-label"><b>Confirm Password:</b></label><br>
                <input type="password" class="form-control form-control-sm" 
                name="ConfirmPassword" placeholder="Confirm Password Here" minlength="8" maxlength="13" required>
              </div>   
            
            </div>

          </div>

        <div class="card-footer py-3">
          <button type="submit" class="btn w-100" name="update" value="Update Student" style="background-color: #FFFBEB;">
            <b>Update Student</b>            
          </button>
        </div>
      </form>
    </div>    
  </div>

</div>        

</div>        


<?php  

  if (isset($_POST['update'])) {

    $Name = $_POST["Name"];       
    $Email = $_POST["Email"];

    $Age = $_POST["Age"];
    $Address = $_POST["Address"];   

    $Username = $_POST["Username"];
    $Contact = $_POST["Contact"];

    $Password = $_POST ["Password"];
    $ConfirmPassword = $_POST ["ConfirmPassword"];

    // Validation if the username does exist already
    $sql = "UPDATE tbl_student SET StudentID = $id, 
    name = '$Name',
    email = '$Email',

    age = '$Age',
    address = '$Address',

    username = '$Username',
    contact = '$Contact',

    password = '$Password'

    WHERE StudentID=$id";


    $result = mysqli_query($con,$sql);


    if ($result) {
        echo 
          "<script type='text/javascript'>
            alert('Student Record has been Updated...')

            window.location.href='admin-student.php';
            ;
          </script>";     
    }else {
      echo 
          "<script type='text/javascript'>
            alert('Student Record has not been Updated...')
          </script>";    
    }

  }
?>



<!-- Footer -->
<?php  

    include "../footer.php";

?>

</body>
</html>
