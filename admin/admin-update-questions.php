<?php  

  include ("../connection.php");

  $id=$_GET['updateid'];
  $id1 = $_GET['id1'];

  $sql = "SELECT * FROM tbl_questions WHERE id=$id";
  $result=mysqli_query($con, $sql);
  $row=mysqli_fetch_assoc($result);

  $QuestionID = $row ['id'];                    
  $QuestionNo = $row ['question_no'];
  $Question = $row ['question'];
  $Option1 = $row ["opt1"];
  $Option2 = $row ["opt2"];    
  $Option3 = $row ["opt3"];
  $Option4 = $row ["opt4"];        
  $Answer = $row ["answer"];     

  session_start();

?>


<!DOCTYPE html>
<html>
<head>
    <title>Update Question</title>

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


<div class="container py-5 d-flex justify-content-center">

  <div class="col-lg">
    <div class="card text-white shadow-custom" style="border-radius: 8px; background-color: #5D698F;">

    <form method="post" action="">
      <div class="card-header">
        <strong class="card-title">Update Question:</strong>
      </div>
          
          <div class="card-body card-block">

            <div class="pt-1">
              <!-- Add Question -->
              <label class="form-label">Update Question:</label>

              <input type="text" class="form-control form-control-md" 
              name="Question" value="<?php echo $Question ?>" placeholder="Question?">
            </div>


            <hr class="mt-3">


            <div class="row">
                    
              <div class="col-sm">
                <!-- Option 1 -->
                <label class="form-label">Update Option 1:</label>

                <input type="text" class="form-control form-control-md" 
                name="opt1" value="<?php echo $Option1 ?>" placeholder="Option 1">
              </div>

              <div class="col-sm">
                <!-- Option 2 -->
                <label class="form-label">Update Option 2:</label>

                <input type="text" class="form-control form-control-md" 
                name="opt2" value="<?php echo $Option2 ?>" placeholder="Option 2">
              </div>

            </div>





            <div class="row">            

              <div class="col-sm">
                <!-- Option 3 -->
                <label class="form-label">Update Option 3:</label>

                <input type="text" class="form-control form-control-md" 
                name="opt3" value="<?php echo $Option3 ?>" placeholder="Option 3">
              </div>      

              <div class="col-sm">
                <!-- Option 4 -->
                <label class="form-label">Update Option 4:</label>

                <input type="text" class="form-control form-control-md" 
                name="opt4" value="<?php echo $Option4 ?>" placeholder="Option 4">
              </div>

            </div>        

            <hr class="mt-4">                     

            <div class="col-sm">
              <!-- Answer -->
              <label class="form-label">Update Answer:</label>

              <input type="text" class="form-control form-control-md" 
              name="Answer" value="<?php echo $Answer ?>" placeholder="Answer">
            </div>                  


          </div>

        <div class="card-footer py-3">
          <button type="submit" class="btn w-100 text-dark" name="update" value="Update Question" style="background-color: #FFFBEB;">
            <b>Update Question</b>            
          </button>
        </div>
      </form>
    </div>    
  </div>

</div>             
    


<?php  

  if (isset($_POST['update'])) {

    $Question = $_POST["Question"];
    $Option1 = $_POST["opt1"];
    $Option2 = $_POST["opt2"];    
    $Option3 = $_POST["opt3"];
    $Option4 = $_POST["opt4"];        
    $Answer = $_POST["Answer"]; 


    $sql = "UPDATE tbl_questions SET id = $id, 
    question = '$Question',
    opt1 = '$Option1',
    opt2 = '$Option2',
    opt3 = '$Option3',
    opt4 = '$Option4',
    answer   = '$Answer'             
    WHERE id=$id";


    $result = mysqli_query($con,$sql);

    if ($result) {
        echo 
          "<script type='text/javascript'>
            alert('Question has been Updated...')

            window.location.href='admin-add-questions.php?updateid=$id1';
            ;
          </script>";
    }else {
      echo 
          "<script type='text/javascript'>
            alert('Question has not been Updated...')
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
