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
		<?php include("pnav.php"); ?>
	<div class="container" style="margin-top:75px;">
		<section class="col-md-10">
			<h3 class="text-center">Resultado da Pesquisa</h3>
			<hr/>
				
			<?php 
				$pchave = $_GET['textsearch'];
				$psq = $dbcon-> prepare("SELECT *  FROM livros WHERE nome LIKE %':chave'% ");
				$psq->bindValue("chave",$pchave);
				$psq -> execute();
				$row = $psq -> rowCount();
				echo $row;
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