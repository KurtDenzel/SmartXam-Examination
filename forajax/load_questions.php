
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	
	<script type="text/javascript">
		
	</script>

<?php  

	session_start();
	include "../connection.php";

	$question_no = "";
	$question =  "";
	$opt1 = "";
	$opt2 = "";
	$opt3 = "";
	$opt4 = "";			
	$answer = "";
	$count = 0;
	$haystack = "foo bar baz";
	$needle = "bar";
	$ans = "";

	$queno=$_GET["questionno"];

	if (isset($_SESSION["answer"][$queno])) 
	{
		$ans=$_SESSION["answer"][$queno];
	}

	$res=mysqli_query($con, "SELECT * FROM tbl_questions 
		WHERE category='$_SESSION[exam_category]' && question_no=$_GET[questionno]");

	$count=mysqli_num_rows($res);

if ($count==0) 
{	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 text-center d-flex justify-content-center">
				<input type="submit" class="btn btn-lg btn-block btn-light text-dark" 
					 style=" width: 100%;
					 color: white; font-weight: bolder;" 
					 onclick="window.location='./result.php';"> 
				</input>	
			</div>
		</div>
	</div>
	<?php
}
else 
{
	while ($row=mysqli_fetch_assoc($res)) 
	{
		$question_no = $row["question_no"];
		$question = $row["question"];
		$opt1 = $row["opt1"];
		$opt2 = $row["opt2"];
		$opt3 = $row["opt3"];
		$opt4 = $row["opt4"];									
	}
	?>

	<div class="container pb-3">
			<div class="col-sm" style="font-weight: bolder;">
	        	<?php  

	        		echo "(" . $question_no . ") " . $question;

	        	?>
	       	</div>
	</div>


	<div class="container">

			<!-- Option 1 -->
	    	<input class="form-check-input" type="radio" 
	    	name="r1" id="r1" value="<?php echo $opt1; ?>" 
	    	onclick="radioclick(this.value,<?php echo $question_no; ?>);"

	    	<?php
		    	if ($ans == $opt1) 
		    	{
		    		echo "checked";
		    	}
	    	?>>

	    	
	    	<?php
				echo $opt1;
	    	?>

	    	<br>

			<!-- Option 2 -->
	    	<input class="form-check-input" type="radio" 
	    	name="r1" id="r1" value="<?php echo $opt2; ?>" 
	    	onclick="radioclick(this.value,<?php echo $question_no; ?>);"

	    	<?php
		    	if ($ans == $opt2) 
		    	{
		    		echo "checked";
		    	}
	    	?>>

	    	
	    	<?php
				echo $opt2;
	    	?>			    	


	    	<br>

			<!-- Option 3 -->			
	    	<input class="form-check-input" type="radio" 
	    	name="r1" id="r1" value="<?php echo $opt3; ?>" 
	    	onclick="radioclick(this.value,<?php echo $question_no; ?>);"

	    	<?php
		    	if ($ans == $opt3) 
		    	{
		    		echo "checked";
		    	}
	    	?>>

	    	
	    	<?php
				echo $opt3;
	    	?>	

	    	<br>		    	

			<!-- Option 4 -->
	    	<input class="form-check-input" type="radio" 
	    	name="r1" id="r1" value="<?php echo $opt4; ?>" 
	    	onclick="radioclick(this.value,<?php echo $question_no; ?>);"

	    	<?php
		    	if ($ans == $opt4) 
		    	{
		    		echo "checked";
		    	}
	    	?>>

	    	<?php
				echo $opt4;
	    	?>			    		    		    	
	</div>		

<?php
}
?>