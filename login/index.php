<?php 
  include("../conect.php"); 
  // include_once ("analyticstracking.php");
	$dbcon = conexao();
function CheckLogin($cmail,$csenha){
  $datBase = conexao();
  $stm = $datBase->prepare("SELECT * FROM adm WHERE mail = :Lnome AND pass = :Lpass");
  $stm->bindValue(":Lnome",$cmail);
  $stm->bindvalue(":Lpass",$csenha);
  $stm->execute();

  $stmRow = $stm->rowCount();
    return $stmRow;
}
function CheckCookie(){

}
function getNameUser($mail){
  $dbSearch = conexao();
    $stm = $dbSearch->prepare("SELECT * FROM adm WHERE mail = :Lnome");
    $stm ->bindValue(":Lnome",$mail);
    $stm ->execute();
   $UU = $stm -> fetch(PDO::FETCH_ASSOC);
    $Nusuario = $UU['nome'];

      return $Nusuario;
}
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

  <!-- Bootstrap -->
    <script src="../bootstrap/js/jquery.min.js"></script>
 		<script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../bootstrap/ie10-viewport-bug-workaround.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="../bootstrap/dashboard.css" rel="stylesheet"/>
	  <!-- Custom styles for this Log In -->
    <link href="../signin.css" rel="stylesheet"/>
    <!-- Custom style for DASHBOARD -->
    <link href="style/dashboard.css" rel="stylesheet"/>
</head>

  <body>
	<div class="container">
  <?php 
    if(!isset($_COOKIE['usuario']) || !isset($_GET['BSend'])){
   ?>
      <!-- login -->
      <form method="get" class="form-signin">
        <h2 class="form-signin-heading">Por Favor faça o Login!</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        	<input name="BMail" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password ...</label>
        	<input name="BPassword" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me">Lembrar de Mim
          </label>
        </div>
        <button name="BSend" class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      </form><!-- Login END -->
      <?php 
      }       
      if (isset($_GET['BSend']) && isset($_GET['BPassword'])) {
        # code...
        $mail = $_GET['BMail'];
        $password = $_GET['BPassword'];
          if( CheckLogin($mail,$password) != 0){
            $usuario = getNameUser($mail);
            // echo $usuario;
            ob_start();
            setcookie("usuario",$usuario,time()+259200);
            // cookie dura 3 dias time()+(3*24*3600)
            header("Location:dash.php");
          }
        }
      ?>
    </div>
</body>
</html>