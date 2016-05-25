<?php 
	include("conect.php"); 
	$dbcon = conexao();

	// $n = $dbcon-> prepare("SELECT * FROM livros");
	// $n ->execute();
	// $nbook = $n-> rowCount();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!--Bibliotecas BootStrap, Folhas de estilo, etc..  -->
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta charset="UTF-8">
	<script src="bootstrap/js/jquery.min.js"></script>
 		<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
	<!-- CSS Modificado -->
	<link rel="stylesheet" href="bootstrap/custom.css">

	<!-- Script do horario -->
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
	<!-- SCRIPT PARA O TOOLTIP -->
	 <script>
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip();
		});
	</script>
	 <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<title>Home</title>
</head>
<body>
	<?php
	// Barra de navegação
		include("nav.php");
	?>
	<div class="container-fluid" style="padding:0;">

		<!-- Slid show -->
		<div class="col-md-12" style="padding:0;">
			<?php 
				include("carousel.php");
			?>
		</div>
		<!-- Barra lateral -->
		<aside class="col-md-2 col-md-push-10" style="border-left:1px solid gray;">
		
		</aside>
		<!-- Conteudo -->
		<article class="col-md-10 col-md-pull-2" style="padding:0;">
			<?php
				include("content.php");
			?>
		</article>
		<!-- Footer -->
		<footer class="col-md-12" style="margin-top: 15px;">
			<?php include("footer.php"); ?>
		</footer>
	</div><!--Container-Fluid-->
</body>
</html>