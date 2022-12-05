<?php 
  include '../connection.php';

  if (isset($_GET['deleteid'])) {
    $id= $_GET['deleteid'];

    $sql = "DELETE FROM tbl_student WHERE StudentID=$id";
    $result = mysqli_query ($con, $sql);

    if ($result) {
        echo 
          "<script type='text/javascript'>
            alert('Student Record has been Deleted...')

            window.location.href='admin-student.php';
            ;
          </script>";     
    }else {
      die(mysqli_error($con));
    }
  }
?>