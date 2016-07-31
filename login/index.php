<?php include("../conect.php"); 
	$dbcon = conexao();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!--Bibliotecas BootStrap, Folhas de estilo, etc..  -->
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Dash Board">
    <meta name="author" content="Robert Vinicius">

    <title>Login</title>

  <!-- BOotstrap -->
    <script src="../bootstrap/js/jquery.min.js"></script>
 		<script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../bootstrap/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../bootstrap/dashboard.css" rel="stylesheet">
	<!-- Custom styles for this Log In -->
    <link href="../signin.css" rel="stylesheet">
  </head>

  <body>
	<div class="container">

      <form action="#" method="get" class="form-signin">
        <h2 class="form-signin-heading">Por Favor faça o Login!</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        	<input name="BMail" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password ...</label>
        	<input name="BPassword" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Lembrar de Mim
          </label>
        </div>
        <button name="BSend" class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      </form>
    </div>
</body>
</html>