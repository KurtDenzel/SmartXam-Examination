<?php 
  include '../connection.php';

  if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $id1 = $_GET['id1'];

    $sql = "DELETE FROM tbl_questions WHERE id=$id";
    $result = mysqli_query ($con, $sql);

    if ($result) {
        echo 
          "<script type='text/javascript'>
            alert('Row has been Deleted...')

            window.location.href='admin-add-questions.php?updateid=$id1';
            ;
          </script>";     
    }else {
      die(mysqli_error($con));
    }
  }
?>