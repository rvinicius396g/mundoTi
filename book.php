<?php 
	include("conect.php"); 
	$dbcon = conexao();
?>
<!DOCTYPE html>
<html lang="pt-br">
<meta charset="UTF-8"/>
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
	 <!-- Inicialização do Tooltip  -->
		<script>
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
		});
		</script>
	 <!-- Fim TOOLTIP -->
	 	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<title>Home</title>
</head>
<body>
	<div class="container-fluid" style="padding:0;">
		<?php
			include("nav.php");
		?>
		<div class="col-md-12" style=";padding:0;">
			<?php 
				include("carousel.php");
			?>
		</div>
		<aside class="col-md-2 col-md-push-10" style="border-left:1px solid gray;">
		
		<hr style="margin-top:0;" />
			<?php 
				include("aside.php");
				// CATEGORIAS
				echo "<h3 class='text-center' style='margin-bottom:5px'>Categorias</h3><br/>";
				$categor = $dbcon->prepare("SELECT DISTINCT categoria FROM livros"); 
				$categor->execute();
				// echo "<a class='btn btn-default' href='#'>".$pcategorias['categoria']."</a><br/>";
				

					while ($mcat = $categor->fetch(PDO::FETCH_ASSOC)) {
						$lcategoria = $mcat['categoria'];
						echo "<a class='btn btn-default' href='book.php?catbook=$lcategoria'>".$lcategoria."</a><br/>";
					}
				

				
			?>				
		</aside>
		<article class="col-md-10 col-md-pull-2" style="padding:0;">
			
			<?php
				if (isset($_GET['catbook'])) {
						$cat = $_GET['catbook'];
						$sb = $dbcon->prepare("SELECT * FROM livros WHERE categoria = :catlivro");
						$sb->bindValue(":catlivro",$cat);
						$sb-> execute();
						$Nsb = $sb->rowCount();				 

					?>
				<h3 class="text-center">Categ.<?php echo $cat;?>  </small><span><small><?php echo $Nsb; ?></small></span></h3>
				<hr/>

				<?php	
					while ($linha = $sb->fetch(PDO::FETCH_ASSOC )) { 

					?>
						<div class="col-md-12">							
							<div class="col-md-3">
							<!-- IMagem em Destaque -->
								 <img class="ImgBook" src="<?php echo $linha['img'];  ?>" alt=" <?php echo $linha['nome'];?>" data-toggle="tooltip" data-placement="right" title=" <?php echo $linha['nome'] ?>"/> 
							</div>
							<div class="col-md-9">
								<!-- Título -->
								<h4 class="TituloBook" class="text-center"> 
									<a href="book.php?liv=<?php echo $linha["id"]; ?>">
										<?php echo $linha['nome']; ?>
									</a>
								</h4>
								<!-- FIM TITULO -->
							<!-- Descricao e download link -->
								<p class="DescrBook">
									<?php echo $linha['descricao']; ?>
								</p>
								<p class="text-left" class="TestoCategoria"><i>Categorias:</i> <?php echo $linha['categoria']; ?> </p>
							</div>
						</div>
					<?php
					} //Fim WHILE			
				}elseif ( isset($_GET['liv']) ) {
						$id = $_GET['liv'];
						// Pesquisa do respectivo conteudo, clicado
						$lcont = $dbcon->prepare("SELECT * FROM livros WHERE id = :ident");
						// substituição do pseudo pela variável id
						$lcont ->bindValue(":ident",$id);
						// execucao da pesquis
						$lcont ->execute();
						// Associando cada Array as respectivas colunas
						$cont = $lcont->fetch(PDO::FETCH_ASSOC);
					
						// Numeros de visuzliação
						$views = $cont["views"]+1;
						$insert = $dbcon->prepare("UPDATE livros SET views = :visu WHERE id = :ident");
						$insert->bindValue(":visu",$views);
						$insert->bindValue(":ident",$id);
						$insert->execute();
						// echo $views;
				?>
				<div class="row">
					<h1 class="text-center">
						<?php echo $cont['nome']; ?>
					</h1>
				</div>
				<div class="col-md-3"> <!-- IMAGEM -->
					<imgc class="img_detalhes" src="<?php echo $cont['img'];  ?>" alt=" <?php echo $cont['nome'];?>"/> 
				</div>	<!--FIM IMAGEM -->
				<div class="col-md-9">
					<p class="descricao_detalhes">
					
						<?php 
							echo $cont['descricao']."<br/>";
						?>
					</p>
					<p class="descricao_detalhes">
						<?php 
							echo $cont['gdescricao'];
						?>
					</p>
					<div class="col-md-12 areDownload">
						<h4 class="text-center"><u>Download</u></h4>
						<a href="<?php echo $cont['download'];?>" class="" data-toggle="tooltip" data-placement="bottom" title="Click to Download!">
							<img src="img/mega-cloud-icon.png" alt="Mega" class="imgDownloadIcon">
						</a>
					</div>
					<h3 class="text-center">
						Leia abaixo o Livro
					</h3>
					<!-- EMBED CODE -->
					<figure class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" style="560px;" src="<?php echo $cont['embed']; ?>" frameborder="0" allowfullscreen></iframe>
					</figure>

					<!-- Campo de Comentários -->
					<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5&appId=504258529757506";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
					<div class="fb-comments" data-href="http://mundoti.site88.net/book.php?liv=<?php echo $id;?>" data-width="100%" data-numposts="5"></div>
					<!-- FIM COMENTS  -->
				</div>
						
				
				<?php

				}else{
					?>
					<h3 class="text-center">Livros para Download - Gratuito</h3>

					<hr/>
					<?php
					$busc = $dbcon->prepare("SELECT  *  FROM  livros");
					$busc -> execute();
					
					while ($linha = $busc->fetch(PDO::FETCH_ASSOC )) { 

					?>
						<div class="col-md-12">							
							<div class="col-md-3">
							<!-- IMagem em Destaque -->
								 <img class="ImgBook" src="<?php echo $linha['img'];  ?>" alt=" <?php echo $linha['nome'];?>" data-toggle="tooltip" data-placement="right" title=" <?php echo $linha['nome'] ?>"/> 
							</div>
							<div class="col-md-9">
								<!-- Título -->
								<h4 class="TituloBook" class="text-center"> 
									<a href="book.php?liv=<?php echo $linha["id"]; ?>">
										<?php echo $linha['nome']; ?>
									</a>
								</h4>
								<!-- FIM TITULO -->
							<!-- Descricao e download link -->
								<p class="DescrBook">
									<?php echo $linha['descricao']; ?>
								</p>
								<p class="text-left" class="TestoCategoria"><i>Categorias:</i> <?php echo $linha['categoria']; ?> </p>
							</div>
						</div>
					<?php
					} //Fim WHILE
					}
					
				

			?>
		</article>
		<footer class="col-md-12 footer_secao">
			<?php include("footer.php"); ?>
		</footer>
	</div><!--Container-Fluid-->
</body>
</html>