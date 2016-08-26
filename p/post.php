<?php 
	
	include("../conect.php"); 
	$dbcon = conexao();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>


		
	<!--Bibliotecas BootStrap, Folhas de estilo, etc..  -->
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta charset="UTF-8">

	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<!-- JQuery Biblioteca -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<!-- Bootstrap Mini -->
 	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 	<!-- Custom CSS -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
	<!-- CSS Modificado -->
	<link rel="stylesheet" href="../bootstrap/custom.css">
	<title>	-=|Mundo Ti|=- </title>
</head>
<body>
		<?php
			include("pnav.php");
		?>
	<div class="container-fluid" style="padding:0;">
			
		<aside class="col-md-2 col-md-push-10" style="border-left:1px solid gray;margin-top: 71px;">
			
		</aside>
		<article class="col-md-10 col-md-pull-2" style="padding:0;margin-top: 71px;">
			<?php 
			if (isset($_GET['cont'])) {
				switch ($_GET['cont']) {
					case 'bootstrap':include("bootstrap3.php");break;
					case 'javascript':include("javascript.php");break;
					case 'git':include("github.php");
				}
			}
			?>
		</article>
		<!-- footer -->
		<footer class="col-md-12" style="padding: 0;">
			<?php include("../footer.php"); ?>
		</footer>
	</div><!--Container-Fluid-->
</body>
</html>