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
	<meta name="description" content="Video Tutoriais para a área de T.I, juntamente com uma game de livros e softwares (gratuitos) disponiveis para download!">
    <meta name="author" content="Roberto Vinicius\Skype: robertoviniciusdasilva">
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
	<!-- FACEBOOK COMENTARIO -->
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6&appId=1593133810998079";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
	<!--  -->
	<div class="container-fluid" style="padding:0;">
		<?php
			include("pnav.php");
		?>
		<aside class="col-md-2 col-md-push-10" style="border-left:1px solid gray;margin-top: 71px;">
			<!-- SEÇÃO DA BARRA LATERAL (DIREITA) -->
			<h4 class="text-center">Test!</h4>
		</aside>
		<article class="col-md-10 col-md-pull-2" style="padding:0;margin-top: 71px;">

			<?php 
				$list = $dbcon->prepare("SELECT * FROM files INNER JOIN download ON files.id = download.id");
				$list->execute();
				// Se Ninguem clicou no nome, mostrar tudo !
				if ( isset($_GET["categoria"]) ) {
					$cat = $_GET["categoria"];
						$ListCategoria = $dbcon -> prepare("SELECT * FROM files WHERE categoria = :Cat");
						$ListCategoria -> bindValue(":Cat",$cat,PDO::PARAM_STR);
						$ListCategoria -> execute();
						while ($CatList = $ListCategoria->fetch(PDO::FETCH_ASSOC)) {
							?>
								<section class="area_files col-md-12">
									<img class="col-md-3 ImgBook" src="<?php echo $CatList['img']; ?>"  alt="">
								<article class="col-md-9">
									<h3 class="text-center TituloBook">
									<!-- Link para o post e outras informações -->
										<a href="download.php?down=<?php echo $CatList['id']; ?>"><?php echo $CatList['nome'];?></a>
									<h3>
									<br/>
									<p><b>Categoria:</b> <?php echo $CatList['categoria']; ?></p>
								</article>
							</section>
							<?php
						}

						
				}
				// EXIBIÇÃO DE TD DOWNLOAD
				if( !isset($_GET['down']) && !isset($_GET["categoria"]) ){
					echo "<h2 class='text-center'>Mais recentes</h2><hr/>";
				
					while ($posts = $list->fetch(PDO::FETCH_ASSOC)) {
					?>
					<section class="area_files col-md-12">
						<img class="col-md-3 ImgBook" src="<?php echo $posts['img']; ?>"  alt="">
						<article class="col-md-9">
							<h3 class="text-center TituloBook">
							<!-- Link para o post e outras informações -->
								<a href="download.php?down=<?php echo $posts['id']; ?>"><?php echo $posts['nome'];?></a>
							<h3><br/>

							<p><b>Categoria:</b> <?php echo $posts['categoria']; ?></p>
						</article>
					</section>
					<?php
					}
				}

				// Se a pessoa tiver acessado o post (VISUALIZACAO)
				if ( isset($_GET['down']) ) {
					$identificao = $_GET['down'];

					$STM = $dbcon->prepare("SELECT * FROM files INNER JOIN download ON files.id = download.id WHERE files.id = :id ");
					$STM ->bindValue(":id",$identificao,PDO::PARAM_STR);
					$STM -> execute();

					$count = $STM->rowCount();
					//echo $count;
					$row = $STM -> fetch(PDO::FETCH_ASSOC);
					?>
					<img class="col-md-3 ImgBook" src="<?php echo $row['img']; ?>"  alt="">
					<article class="col-md-9">
						<h2 class="text-center"> <?php echo $row['nome']; ?></h2>
						<!-- Botão de Like -->
						<div
						  class="fb-like"
						  data-share="true"
						  data-width="450"
						  data-show-faces="true">
						</div>
						<!--  -->
						<br/>
						<p class="DescrBook">
							<?php echo$row['descricao']; ?>
						</p>
						<p class="TestoCategoria">Categoria: <?php echo $row['categoria'] ?></p>
						<p class="TestoCategoria">Tag: <?php echo $row['tag']; ?></p>
						<hr/>
						<!-- COMENTARIO -->
							<div class="fb-comments" data-href="http://mundoti.site88.net/p/download.php?down=1" data-width="100%" data-numposts="5"></div>
						<!--  -->

					</article>
					<?php
				}
				// 

			?>
		</article>

		<footer class="col-md-12 footer_secao">
			<?php include("../footer.php"); ?>
		</footer>
	</div><!--Container-Fluid-->
</body>
</html>