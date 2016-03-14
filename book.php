<?php 
	include("conect.php"); 
	$dbcon = conexao();
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
	<!-- Script do ADF -->
	<script type="text/javascript"> 
    var adfly_id = 12478773; 
    var adfly_advert = 'int'; 
    var frequency_cap = 5; 
    var frequency_delay = 5; 
    var init_delay = 3; 
    var popunder = true; 
	</script> 
	<script src="https://cdn.adf.ly/js/entry.js"></script> 
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
	 	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<title>Home</title>
</head>
<body>
	<div class="container-fluid" style="padding:0;">
		<?php
			include("nav.php");
		?>
		<div class="col-md-12" style="margin-top:51px;padding:0;">
			<?php 
				include("carousel.php");
			?>
		</div>
		<aside class="col-md-2 col-md-push-10" style="border-left:1px solid gray;">
			<?php 
				include("aside.php");
			?>
		</aside>
		<article class="col-md-10 col-md-pull-2" style="padding:0;">
			<h3 class="text-center">Livros para Download - Gratuito</h3>
			<table>
				
			</table>
			<hr>
			<?php
				$busc = $dbcon->prepare("SELECT * FROM livros");
				$busc -> execute();
					while ($linha = $busc->fetch(PDO::FETCH_ASSOC)) {
					?>
						<div class="col-md-12">
							<!-- Título -->
							<div class="col-md-12"> <h4 style="text-transform:uppercase;" class="text-center"> <?php echo $linha['nome']; ?></h4> 
							</div>
							<div class="col-md-3">
							<!-- IMagem em Destaque -->
								 <img style="height: 150px; display:block;margin: auto;" src="<?php echo $linha['img'];  ?>" alt=" <?php echo $linha['nome'];?>"> 
							</div>
							<div class="col-md-9">
							<!-- Descricao e download link -->
								<p style="text-align:justify;text-indent:16px;font-size;13pt;">
									<?php echo $linha['descricao']; ?>
								</p>
								<p class="text-left" style="text-transform:uppercase;"><i>Categorias:</i> <?php echo $linha['categoria']; ?> </p>
								<a href="<?php echo $linha['download'];?>" target="_blank" class="btn btn-info">Download</a>
							</div>
						</div>
					<?php
					}
			?>
		</article>
		<footer class="col-md-12" style="margin-top: 15px;">
			<?php include("footer.php"); ?>
		</footer>
	</div><!--Container-Fluid-->
</body>
</html>