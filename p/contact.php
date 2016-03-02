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
	<title>Home</title>
</head>
<body>
	<div class="container-fluid" style="padding:0;">
		<?php
			include("pnav.php");
		?>
		
		<aside class="col-md-2 col-md-push-10" style="border-left:1px solid gray;margin-top: 51px;">
			<?php 
				include("../aside.php");
			?>
		</aside>
		<section class="col-md-10 col-md-pull-2" style="padding:0;margin-top: 51px;height:1000px;">
			<h2 class="text-center">
				Contato
			</h2>
			<h4>Para entrar em Contato preencha os dados abaixo, ou add pelo <b>Skype: robertoviniciusdasilva</b></h4>
			<hr/>
			<form role="form" action=""></form>
		</section>
		<footer class="col-md-12">
			<?php include("../footer.php"); ?>
		</footer>
	</div><!--Container-Fluid-->
</body>
</html>