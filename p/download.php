<?php 
	include("../conect.php"); 
	$dbcon = conexao();
?>
<!DOCTYPE html>
<html lang="pt-br">
<meta charset="UTF-8"/>
<head>
	<!--Bibliotecas BootStrap, Folhas de estilo, etc..  -->
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta charset="UTF-8">
	<script src="../bootstrap/js/jquery.min.js"></script>
 		<script src="../bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
	<!-- CSS Modificado -->
	<link rel="stylesheet" href="../bootstrap/custom.css">
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
	 <!-- Inicialização do Tooltip  -->
		<script>
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
			});
		</script>
	 <!-- Fim TOOLTIP -->
	 	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<title>Home</title>
</head>
<body>
	<div class="container-fluid" style="padding:0;">
		<?php
			include("pnav.php");
		?>
		<aside class="col-md-2 col-md-push-10" style="border-left:1px solid gray;margin-top: 71px;">
			
		</aside>
		<article class="col-md-10 col-md-pull-2" style="padding:0;margin-top: 71px;">
			
		</article>

		<footer class="col-md-12 footer_secao">
			<?php include("../footer.php"); ?>
		</footer>
	</div><!--Container-Fluid-->
</body>
</html>