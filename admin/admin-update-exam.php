<?php  

  include ("../connection.php");

  $id=$_GET['updateid'];
  $sql = "SELECT * FROM exam_category WHERE id=$id";
  $result=mysqli_query($con, $sql);
  $row=mysqli_fetch_assoc($result);

  $ExamName=$row ['category'];
  $ExamTime=$row ['exam_time_in_minutes'];

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

  include "admin-header.php";

?>



<div class="container py-5 my-5 d-flex justify-content-center">

  <div class="col-lg">
    <div class="card text-white shadow-custom" style="border-radius: 8px; background-color: #5D698F;">

    <form method="post">
      <div class="card-header">
        <strong class="card-title">Update Exam</strong>
      </div>
          
          <div class="card-body card-block">

            <div class="pt-1">
              <!-- New Exam Category -->
              <label class="form-label">New Exam Category:</label>

              <input type="text" class="form-control form-control-md" 
              name="ExamName" value="<?php echo $ExamName ?>" placeholder="Add Exam Category">
            </div>


            <div class="pt-1">              
              <!-- Exam Time -->
              <label class="form-label">Exam Time in Minutes:</label>

              <input type="text" class="form-control form-control-md" 
              name="ExamTime" value="<?php echo $ExamTime ?>" placeholder="Exam Time in Minutes">
            </div>

          </div>

        <div class="card-footer py-3">
          <button type="submit" class="btn w-100" name="update" value="Update Exam" style="background-color: #FFFBEB;">
            <b>Update</b>            
          </button>
        </div>
      </form>
    </div>    
  </div>

</div>        
    


<?php  

  if (isset($_POST['update'])) {

    $ExamName= $_POST["ExamName"];
    $ExamTime= $_POST["ExamTime"];


    $sql = "UPDATE exam_category SET id = $id, 
    category = '$ExamName',
    exam_time_in_minutes = '$ExamTime'
    WHERE id=$id";


    $result = mysqli_query($con,$sql);

    if ($result) {
        echo 
          "<script type='text/javascript'>
            alert('Exam Category Updated...')

            window.location.href='admin-exam.php';
            ;
          </script>";     
    }else {
      echo 
          "<script type='text/javascript'>
            alert('Exam Category has not been Updated...')
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
