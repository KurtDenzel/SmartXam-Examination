<?php 
	include '../connection.php';

	if (isset($_GET['deleteid'])) {
		$id= $_GET['deleteid'];

		$sql = "DELETE FROM exam_results WHERE id=$id";
		$result = mysqli_query ($con, $sql);

		if ($result) {
	      echo 
	        "<script type='text/javascript'>
	          alert('Record has been Deleted...')

	          window.location.href='admin-dashboard.php';
	          ;
	        </script>";			
		}else {
			die(mysqli_error($con));
		}
	}
?>