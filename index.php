<!DOCTYPE html>
<html lang="en">
<head>
	<!--Bibliotecas BootStrap, Folhas de estilo, etc..  -->
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
	<!-- CSS Modificado -->
	<link rel="stylesheet" href="bootstrap/custom.css">
	<script type="text/javascript">
		 function startTime() {
		     var today=new Date();
		     var h=today.getHours();
		     var m=today.getMinutes();
		     var s=today.getSeconds();
		     // add a zero in front of numbers<10
		     m=checkTime(m);
		     s=checkTime(s);
		     document.getElementById('txt').innerHTML="Horário: "+h+":"+m+":"+s;
		     t=setTimeout('startTime()',500);
		 }

		 function checkTime(i){
		 if (i<10) {
		     i="0" + i;
		 }
		     return i;
		 }
	 </script>
	<title>Home</title>
</head>
<body onload="startTime()">
	<div class="container-fluid" style="padding:0;">
		<?php
			include("nav.php");
		?>
		<section class="col-md-10">
			<?php 
				include("carousel.php");
				include("content.php");
			?>
		</section>
		<aside class="col-md-2" style="background-color:#222;">
			<div class="row">
				<?php include("fbpage.php"); ?>
			</div>
aa
		</aside>

	</div>	
</body>
</html>