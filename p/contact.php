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
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<!-- JQuery Biblioteca -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<!-- Bootstrap Mini -->
 	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 	<!-- Custom CSS -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
	<!-- CSS Modificado -->
	<link rel="stylesheet" href="../bootstrap/custom.css">
	<title>Contato</title>
</head>
<body>
	<div class="container-fluid" style="padding:0;">
		<?php
			include("pnav.php");
		?>
		
		<aside class="col-md-2 col-md-push-10" style="border-left:1px solid gray;margin-top: 71px;">

		</aside>
		<article class="col-md-10 col-md-pull-2" style="padding:0;margin-top: 71px;height:1000px;">
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
		</article>
		<footer class="col-md-12">
			<?php include("../footer.php"); ?>
		</footer>
	</div><!--Container-Fluid-->
</body>
</html>