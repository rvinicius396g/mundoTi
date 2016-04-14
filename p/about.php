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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">

	<title>Sobre</title>
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
		<article class="col-md-10 col-md-pull-2" style="padding:0;margin-top: 51px;">
			<h2 class="text-center">Sobre</h2><hr>

			<p style="text-align: justify;margin-left: 15px;margin-right: 15px;font-size:12pt;text-indent: 30px;">
				O site Mundo da TI, tem como objetivo  compartilhar materiáis e ideias para  o mundo da tecnlogia, incluindo macetes, ferramentes, livros, tutoriais, etc.. Não temos qualquer ligação com qualquer ONG, ou algo semelhante à isso,  a ideia é ensinar as pessoas que querem ingressar nessa área de Tecnologia da Informação ,seja no que for ,desde programação/desenvolvimento web, desenvolvimento de softwares, materiais de estudo, enfim.
			</p>
			<p style="text-align: justify;margin-left: 15px;margin-right: 15px;font-size:12pt;text-indent: 30px;">
				Para entrar em contato com nós, clique em Contato, na Caixa de Informação, seja claro e insira todas as informações que nos deseja enviar. A príncipio nós iremos desenvolver video aulas, que estaram disponíveis no Youtube, e para ter acesso aos arquivos, imagens usados como exemplo no processo de cada video aula, você pode acessar o GitHub e procurar pelo respositório, com seu respectivo nome em relação a video aula que você está acessando, vale lembrar que o respectivo repositório, vai ser informado para vocês nas primeiras vídeo aulas e o link direto para o nosso GitHub estara na descrição.
			</p>
			<p style="text-align: justify;margin-right: 15px;margin-left: 15px;font-size: 12pt;text-indent: 30px;">
				Se você apoia esse projeto e sua causa de compartilhar o conhecimento para todos, nós gostariamos de pedir a ajuda de você, para isso gostariamos que você curtisse a nossa página do Facebook, assim fazendo com que nosso projeto se espalhe e outras pessoas possam fazer parte desse Site. Ficamos gratos a todos que nos ajudarem.
			</p>
			
		</article>
		<!-- footer -->
		<footer class="col-md-12" style="padding: 0;">
			<?php include("../footer.php"); ?>
		</footer>
	</div><!--Container-Fluid-->
</body>
</html>