<?php  

  include ("../connection.php");

  $id=$_GET['updateid'];
  $sql = "SELECT * FROM exam_category WHERE id=$id";
  $result=mysqli_query($con, $sql);
  $row=mysqli_fetch_assoc($result);

  $examcategory = $row ['category'];

  session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Questions</title>

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



<div class="container pt-5 d-flex justify-content-center">

  <div class="col-lg">
    <div class="card text-white shadow-custom" style="border-radius: 8px; background-color: #5D698F;">

    <form method="post" action="">
      <div class="card-header">
        <strong class="card-title">Add Question inside: 
          <h2 style="color: white; font-weight: bolder;"> <?php echo $examcategory ?></h2></strong>
      </div>
          
          <div class="card-body card-block">

            <div class="pt-1">
              <!-- Add Question -->
              <label class="form-label">Add Question:</label>

              <input type="text" class="form-control form-control-md" 
              name="Question" placeholder="Question?">
            </div>


            <hr class="mt-3">


            <div class="row">
                    
              <div class="col-sm">
                <!-- Option 1 -->
                <label class="form-label">Option 1:</label>

                <input type="text" class="form-control form-control-md" 
                name="opt1" placeholder="Option 1">
              </div>

              <div class="col-sm">
                <!-- Option 2 -->
                <label class="form-label">Option 2:</label>

                <input type="text" class="form-control form-control-md" 
                name="opt2" placeholder="Option 2">
              </div>

            </div>





            <div class="row">            

              <div class="col-sm">
                <!-- Option 3 -->
                <label class="form-label">Option 3:</label>

                <input type="text" class="form-control form-control-md" 
                name="opt3" placeholder="Option 3">
              </div>      

              <div class="col-sm">
                <!-- Option 4 -->
                <label class="form-label">Option 4:</label>

                <input type="text" class="form-control form-control-md" 
                name="opt4" placeholder="Option 4">
              </div>

            </div>        

            <hr class="mt-4">                     

            <div class="col-sm">
              <!-- Answer -->
              <label class="form-label">Answer:</label>

              <input type="text" class="form-control form-control-md" 
              name="Answer" placeholder="Answer">
            </div>                  


          </div>

        <div class="card-footer py-3">
          <button type="submit" class="btn w-100 text-dark" name="addquestion" value="Add Question" style="background-color: #FFFBEB;">
            <b>Add Question</b>            
          </button>
        </div>
      </form>
    </div>    
  </div>
w
</div>        
    


<?php  

  if (isset($_POST['addquestion'])) {

    $loop = 0;

    $count = 0;

    $Question = $_POST["Question"];
    $Option1 = $_POST["opt1"];
    $Option2 = $_POST["opt2"];    
    $Option3 = $_POST["opt3"];
    $Option4 = $_POST["opt4"];        
    $Answer = $_POST["Answer"];    


    $res = mysqli_query($con,"SELECT * FROM tbl_questions 
      WHERE category='$examcategory' ORDER BY id ASC ") or die(mysqli_error($con));

    
    $count = mysqli_num_rows($res);


    if ($count == 0) {
      // code...
    }
    else {

      while ($row = mysqli_fetch_array($res)) {
        
        $loop=$loop+1;
        mysqli_query($con, "UPDATE SET tbl_questions 
          SET question_no='$loop'
          WHERE id = $row[id]");

      }

    }

    $loop=$loop+1;

    mysqli_query($con,"INSERT INTO tbl_questions 
      VALUES (NULL, '$loop', '$Question', '$Option1','$Option2','$Option3',
        '$Option4', '$Answer', '$examcategory')") or die(mysqli_error($con));

    echo 
      "<script type='text/javascript'>
        alert('Question Added Succesfully...')

        window.location.href=window.location.href;
        ;
      </script>";    

  }


?>


<div class="container pt-5 pb-5 d-flex justify-content-center">

  <div class="col-md">
    <div class="card text-white shadow-custom" style="border-radius: 8px; background-color: #5D698F">

      <div class="card-header">
        <strong class="card-title">Appended Questions:</strong>
      </div>

        <div class="card-body card-block">

          <table class="table table-striped table-light table-success table-hover table-bordered text-center table-sm table-responsive">

              <tr>
                <th class="align-middle" scope="col">No</th>
                <th class="align-middle" scope="col">Question</th>                
                <th class="align-middle" scope="col">Option 1</th>
                <th class="align-middle" scope="col">Option 2</th>
                <th class="align-middle" scope="col">Option 3</th>
                <th class="align-middle" scope="col">Option 4</th>
                <th class="align-middle" scope="col">Answer</th>
                <th class="align-middle" scope="col">Category</th>                
                <th class="align-middle" scope="col">Operation</th>
              </tr>

              <?php

                $sql = "SELECT * FROM tbl_questions limit 20";
                $result = mysqli_query($con,$sql);

                if ($result){
                  while ($row=mysqli_fetch_assoc($result)) {
                  $QuestionID = $row ['id'];                    
                  $QuestionNo = $row ['question_no'];
                  $Question = $row ['question'];
                  $Option1 = $row ["opt1"];
                  $Option2 = $row ["opt2"];    
                  $Option3 = $row ["opt3"];
                  $Option4 = $row ["opt4"];
                  $Category = $row ["category"];
                  $Answer = $row ["answer"];

                  

                    echo '
                    <tr>
                      <td class="align-middle" scope = "row"> ' .$QuestionNo. ' </td>
                      <td class="align-middle"> ' .$Question. '</td>                      
                      <td class="align-middle"> ' .$Option1. ' </td>
                      <td class="align-middle"> ' .$Option2. ' </td>
                      <td class="align-middle"> ' .$Option3. ' </td>
                      <td class="align-middle"> ' .$Option4. ' </td>
                      <td class="align-middle" style="text-decoration: underline"> ' .$Answer. ' </td>
                      <td class="align-middle"> ' .$Category. ' </td>

                      <td class="py-3"> ';
              ?>         
                        <button class="text-center btn btn-primary btn-sm w-auto">

                        <a href="admin-update-questions.php?updateid=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">

                          <img src="https://cdn-icons-png.flaticon.com/512/61/61456.png" style="filter: invert(1); width: 20px">

                        </a>
                        </button>


                        <br>                        
                        
                        <button class="text-center btn btn-danger btn-sm w-auto">

                        <a href="admin-delete-questions.php?deleteid=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">


                        <?php 

                        echo '
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



<!-- Footer -->
<?php  

    include "../footer.php";

?>

</body>
</html>
