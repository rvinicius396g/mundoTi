<?php 
	include("../conect.php"); 
	$dbcon = conexao();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include("../head.php"); ?>
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<title>Contato</title>
</head>
<body>
	<div class="container-fluid" style="padding:0;">
		<?php
			include("pnav.php");
		?>
		
		<aside class="col-md-2 col-md-push-10" style="border-left:1px solid gray;margin-top: 51px;">
			<?php 
				$n = $dbcon-> prepare("SELECT * FROM livros");
				$n ->execute();
				$nbook = $n-> rowCount(); 
			?>
			<h3 class="text-center">Categorias</h3><hr style="margin-top: 0;" />
			<a href="../book.php" class="btn btn-default list-group-item" role="button">
				<span class="badge"><?php echo $nbook; ?></span>
				Livros
			</a>
		</aside>
		<section class="col-md-10 col-md-pull-2" style="padding:0;margin-top: 51px;height:1000px;">
			<h2 class="text-center">
				Contato
			</h2>
			<h4>Para entrar em Contato preencha os dados abaixo, ou add pelo <b>Skype: robertoviniciusdasilva</b></h4>
			<hr/>
			<form role="form" method="get" action="contact.php" style="margin-left:15px;margin-right:35px;">
			  <div class="form-group">
			    <label for="email">Email:</label>
			    <input type="email" class="form-control" id="email" placeholder="seu@email.com" name="Bemail" autofocus required="required" />
			  </div>
			  <div class="form-group">
			    <label for="pwd">Nome:</label>
			    <input type="text" class="form-control" placeholder="Seu Nome" id="pwd" name="Bnome" required="required"/>
			  </div>
			  <div class="form-group">
			  	<label for="Bmessage">Informação <h6 style="margin-top:0;">Insira em detalhes, o que deseja nos contatar</h6></label>
			  	<textarea id="Bmessage" cols="30" rows="10" class="form-control" name="Bmessage" style="resize: none;" required="required"></textarea>
			  </div>
			  <button type="submit" class="btn btn-default" name="Bsend">Enviar</button>
			</form>

			<?php 
				if(isset($_GET["Bnome"]) && isset($_GET["Bemail"]) && isset($_GET["Bmessage"]) ) {
					// Dados para envio
					$nome = $_GET["Bnome"];
					$bmail = $_GET["Bemail"];
					$bmessage = $_GET["Bmessage"];
					// informações do mail, função para enviar
					$to = 'roberto396g@hotmail.com';
					$subject = 'Mundo Ti';
					$message = "<h2>".$nome."</h2><br/><p>".$bmessage."</p>";
					$headers = "From: \n".$bmail;
					if (mail($to, $subject, $message, $headers)) {
						echo "oks";
					}
					

				}
			?>
		</section>
		<footer class="col-md-12">
			<?php include("../footer.php"); ?>
		</footer>
	</div><!--Container-Fluid-->
</body>
</html>