<?php  

session_start();
session_destroy();

	$cookie_name = "ExaminationSystem";

	setcookie($cookie_name, null);

?>

<script type="text/javascript">

	window.location.href='index.php';	

</script>
