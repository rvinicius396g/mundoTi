<?php 
	if (isset($_GET['textsearch'])) {
		include("../conect.php"); 
		$dbcon = conexao();

?>	
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!--Bibliotecas BootStrap, Folhas de estilo, etc..  -->
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta charset="UTF-8">
	<script src="../bootstrap/js/jquery.min.js"></script>
 		<script src="../bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
	<!-- CSS Modificado -->
	<link rel="stylesheet" href="../bootstrap/custom.css">
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
	 	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="..img/favicon.ico" type="image/x-icon">
	<title>Search.</title>
</head>
<body>
		<?php include("pnav.php"); 
			$pchave = $_GET['textsearch'];
							// prepare("SELECT *  FROM files WHERE nome LIKE '%$pchave%' ");
			$psq = $dbcon-> prepare("SELECT *  FROM files WHERE nome LIKE '%$pchave%' ");
			$psq -> execute();
			$row = $psq -> rowCount();
			// echo $row;
		?>
	<div class="container" style="margin-top:75px;">
		<section class="col-md-10">
		<?php if ($row != 0) {	
		 ?>
			<h3 class="text-center">Resultados da Pesquisa     </small><span><small><?php echo $row; ?></small></span></h3>

			<hr/>
				
			<?php 
				while ($linha = $psq ->fetch(PDO::FETCH_ASSOC) ) {
					?>
						<div class="col-md-12">							
							<div class="col-md-3">
							<!-- IMagem em Destaque -->
								 <img class="ImgBook" src="<?php echo $linha['img'];  ?>" alt=" <?php echo $linha['nome'];?>" data-toggle="tooltip" data-placement="right" title=" <?php echo $linha['nome'] ?>"/> 
							</div>
							<div class="col-md-9">
								<!-- Título -->
								<h4 class="TituloBook" class="text-center"> 
									<a href="download.php?download=<?php echo $linha["id"]; ?>">
										<?php echo $linha['nome']; ?>
									</a>
								</h4>
								<!-- FIM TITULO -->
							<!-- Descricao e download link -->
								<!-- <p class="DescrBook">
									<?php// echo $linha['descricao']; ?>
								</p> -->
								<p class="text-left" class="TestoCategoria"><i>Categorias:</i> <?php echo $linha['categoria']; ?> </p>
							</div>
						</div>
					<?php
				}
			}else
				echo "Nada Encontrado";
			 ?>

		</section>
		<aside class="col-md-2">
		<h3 class="text-center">Categorias</h3><hr style="margin-top: 0;" />
			<?php include("../aside.php"); ?>
		</aside>
		<footer class="col-md-12" style="">
			<?php include("../footer.php"); ?>
		</footer>
	</div>
</body>
</html>
<?php
}else{
	// Redireciona para a página após location
	header("Location: http://www.mundoti.site88.net/");
}
?>