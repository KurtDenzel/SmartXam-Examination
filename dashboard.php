<!DOCTYPE html>
<html>
<head>
	<title>Examination</title>	

    <link rel="icon" type="image/x-icon" href="https://z-p3-scontent.fmnl6-1.fna.fbcdn.net/v/t1.15752-9/288162814_1015549132300208_5601140088009132075_n.png?_nc_cat=101&ccb=1-7&_nc_sid=ae9488&_nc_eui2=AeHg7txJokMuLmpazaU_Tgq1M-9-2j5ZiEgz737aPlmISFVodeDl46TYaI1hKV5ODrVOE1Cjatjl-3evPQBo-DQ7&_nc_ohc=w56G0YO6KtkAX-ctl_9&_nc_ht=z-p3-scontent.fmnl6-1.fna&oh=03_AVJAH5bJgTfdo1DBK548i0KANpa0Rx98YxVmtGU0g5B91A&oe=62F7FDDC">	
	
</head>

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

<body style="background-color: #495579;">


<?php  
	session_start();
	include "header.php";

?>


<div class="container pb-5 pt-3 d-flex justify-content-center">

  <div class="col-lg-12">

    <div class="card shadow-custom" style="border-radius: 10px;  background-color: #5D698F;">
      <div class="card-header d-flex justify-content-end text-white">
      	<div style="float: left;"> Item No. </div>&nbsp
        <div id="current_que" style="float: left;">0</div>&nbsp
        <div style="float: left;"> / </div>&nbsp
        <div id="total_que" style="float: left;">0</div>
      </div>
          
          <div class="card-body card-block">
                

	          	<div class="text-white">
	          		<div id="load_questions"></div>
	          	</div>

          </div>

        <div class="card-footer py-2">
        	<div class="row">
        		
        		<div class="col-sm pt-1">
		          <button type="button" class="btn w-100 text-light" 
		          value="Previous" onclick="load_previous();" style="background-color: #263159">
		          		<b>Previous</b>		            
		          </button>
	          	</div>

        		<div class="col-sm py-1">
		          <button type="button" class="btn w-100 btn-light" 
		          value="Next" onclick="load_next();">
		           	<b>
		            	Next
		            </b>
		          </button>
		        </div>	          	

          	</div>
        </div>
      
    </div>    
  </div>

</div>  


<script type="text/javascript">

	// Fetching Total Queue of exisiting number of questions
	function load_total_que() 
	{		
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("total_que").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/load_total_que.php",true);
        xmlhttp.send(null);
	}


	var questionno="1";

	load_questions(questionno);

	// Fetching Question from the database
	function load_questions(questionno)
	{
		document.getElementById("current_que").innerHTML=questionno;
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                
				var end = xmlhttp.responseText;                
            	if (end == "-"){
            		window.location = 'result.php';
            	}
            	else 
            	{
            		document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
            		load_total_que();					
            	}

            }
        };
        xmlhttp.open("GET","forajax/load_questions.php?questionno="+questionno,true);
        xmlhttp.send(null);
	}


	// Recording the selected radio to database
	function radioclick(radiovalue,questionno) 
	{
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("total_que").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/save_answer_session.php?questionno="
        	+ questionno + "&value1="+radiovalue,true);
        xmlhttp.send(null);
	}


	// Switching to the previous question
	function load_previous()
	{
		if (questionno=="1") 
		{
			load_questions(questionno);
		}
		else 
		{
			questionno=eval(questionno)-1;
			load_questions(questionno);
		}
	}

	// Switching to the next question
	function load_next()
	{
		questionno=eval(questionno)+1;
		load_questions(questionno);
	}	

</script>


<!-- Footer -->
<?php  

	include "footer.php";

?>


</body>
</html>