<?php 
	include '../connection.php';

	if (isset($_GET['deleteid'])) {
		$id= $_GET['deleteid'];

		$sql = "DELETE FROM exam_category WHERE id=$id";
		$result = mysqli_query ($con, $sql);

		if ($result) {
	      echo 
	        "<script type='text/javascript'>
	          alert('Exam Category Deleted...')

	          window.location.href='admin-exam.php';
	          ;
	        </script>";			
		}else {
			die(mysqli_error($con));
		}
	}
?>