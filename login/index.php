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

    <title>Dashboard</title>

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

	<?php if (!isset($_GET["BSend"])) {
	?>
      <form action="index.php" method="get" class="form-signin">
        <h2 class="form-signin-heading">Por Favor faça o Login!</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        	<input name="BMail" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password ...</label>
        	<input name="BPassword" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button name="BSend" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div> 
    <?php
		} //FIm do Formulario de login
    	if( isset($_GET["BSend"]) ){
    		$mail = $_GET["BMail"];
    		$pass = $_GET["BPassword"];

    			$sts = $dbcon->prepare("SELECT * FROM adm WHERE email = :email AND password = :senha");
    			$sts->bindValue(":email",$mail,PDO::PARAM_STR);
    			$sts->bindValue(":senha",$pass,PDO::PARAM_STR);
    			$sts->execute();

    			$row = $sts->rowCount();
    			if($row != 0){
    			?>
    				 <nav class="navbar navbar-inverse navbar-fixed-top">
				      <div class="container-fluid">
				        <div class="navbar-header">
				          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				            <span class="sr-only">Toggle navigation</span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				          </button>
				          <a class="navbar-brand" href="#">Project name</a>
				        </div>
				        <div id="navbar" class="navbar-collapse collapse">
				          <ul class="nav navbar-nav navbar-right">
				            <li><a href="#">Dashboard</a></li>
				            <li><a href="#">Settings</a></li>
				            <li><a href="#">Profile</a></li>
				            <li><a href="#">Help</a></li>
				          </ul>
				          <form class="navbar-form navbar-right">
				            <input class="form-control" placeholder="Search..." type="text">
				          </form>
				        </div>
				      </div>
				    </nav>

				    <div class="container-fluid">
				      <div class="row">
				        <div class="col-sm-3 col-md-2 sidebar">
				          <ul class="nav nav-sidebar">
				            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
				            <li><a href="#">Reports</a></li>
				            <li><a href="#">Analytics</a></li>
				            <li><a href="#">Export</a></li>
				          </ul>
				          <ul class="nav nav-sidebar">
				            <li><a href="">Nav item</a></li>
				            <li><a href="">Nav item again</a></li>
				            <li><a href="">One more nav</a></li>
				            <li><a href="">Another nav item</a></li>
				            <li><a href="">More navigation</a></li>
				          </ul>
				          <ul class="nav nav-sidebar">
				            <li><a href="">Nav item again</a></li>
				            <li><a href="">One more nav</a></li>
				            <li><a href="">Another nav item</a></li>
				          </ul>
				        </div>
				        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				          <h1 class="page-header">Dashboard</h1>

				          <div class="row placeholders">
				            <div class="col-xs-6 col-sm-3 placeholder">
				              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive" alt="Generic placeholder thumbnail" height="200" width="200">
				              <h4>Label</h4>
				              <span class="text-muted">Something else</span>
				            </div>
				            <div class="col-xs-6 col-sm-3 placeholder">
				              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive" alt="Generic placeholder thumbnail" height="200" width="200">
				              <h4>Label</h4>
				              <span class="text-muted">Something else</span>
				            </div>
				            <div class="col-xs-6 col-sm-3 placeholder">
				              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive" alt="Generic placeholder thumbnail" height="200" width="200">
				              <h4>Label</h4>
				              <span class="text-muted">Something else</span>
				            </div>
				            <div class="col-xs-6 col-sm-3 placeholder">
				              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive" alt="Generic placeholder thumbnail" height="200" width="200">
				              <h4>Label</h4>
				              <span class="text-muted">Something else</span>
				            </div>
				          </div>

				          <h2 class="sub-header">Section title</h2>
				          <div class="table-responsive">
				            <table class="table table-striped">
				              <thead>
				                <tr>
				                  <th>#</th>
				                  <th>Header</th>
				                  <th>Header</th>
				                  <th>Header</th>
				                  <th>Header</th>
				                </tr>
				              </thead>
				              <tbody>
				                <tr>
				                  <td>1,001</td>
				                  <td>Lorem</td>
				                  <td>ipsum</td>
				                  <td>dolor</td>
				                  <td>sit</td>
				                </tr>
				                <tr>
				                  <td>1,002</td>
				                  <td>amet</td>
				                  <td>consectetur</td>
				                  <td>adipiscing</td>
				                  <td>elit</td>
				                </tr>
				                <tr>
				                  <td>1,003</td>
				                  <td>Integer</td>
				                  <td>nec</td>
				                  <td>odio</td>
				                  <td>Praesent</td>
				                </tr>
				                <tr>
				                  <td>1,003</td>
				                  <td>libero</td>
				                  <td>Sed</td>
				                  <td>cursus</td>
				                  <td>ante</td>
				                </tr>
				                <tr>
				                  <td>1,004</td>
				                  <td>dapibus</td>
				                  <td>diam</td>
				                  <td>Sed</td>
				                  <td>nisi</td>
				                </tr>
				                <tr>
				                  <td>1,005</td>
				                  <td>Nulla</td>
				                  <td>quis</td>
				                  <td>sem</td>
				                  <td>at</td>
				                </tr>
				                <tr>
				                  <td>1,006</td>
				                  <td>nibh</td>
				                  <td>elementum</td>
				                  <td>imperdiet</td>
				                  <td>Duis</td>
				                </tr>
				                <tr>
				                  <td>1,007</td>
				                  <td>sagittis</td>
				                  <td>ipsum</td>
				                  <td>Praesent</td>
				                  <td>mauris</td>
				                </tr>
				                <tr>
				                  <td>1,008</td>
				                  <td>Fusce</td>
				                  <td>nec</td>
				                  <td>tellus</td>
				                  <td>sed</td>
				                </tr>
				                <tr>
				                  <td>1,009</td>
				                  <td>augue</td>
				                  <td>semper</td>
				                  <td>porta</td>
				                  <td>Mauris</td>
				                </tr>
				                <tr>
				                  <td>1,010</td>
				                  <td>massa</td>
				                  <td>Vestibulum</td>
				                  <td>lacinia</td>
				                  <td>arcu</td>
				                </tr>
				                <tr>
				                  <td>1,011</td>
				                  <td>eget</td>
				                  <td>nulla</td>
				                  <td>Class</td>
				                  <td>aptent</td>
				                </tr>
				                <tr>
				                  <td>1,012</td>
				                  <td>taciti</td>
				                  <td>sociosqu</td>
				                  <td>ad</td>
				                  <td>litora</td>
				                </tr>
				                <tr>
				                  <td>1,013</td>
				                  <td>torquent</td>
				                  <td>per</td>
				                  <td>conubia</td>
				                  <td>nostra</td>
				                </tr>
				                <tr>
				                  <td>1,014</td>
				                  <td>per</td>
				                  <td>inceptos</td>
				                  <td>himenaeos</td>
				                  <td>Curabitur</td>
				                </tr>
				                <tr>
				                  <td>1,015</td>
				                  <td>sodales</td>
				                  <td>ligula</td>
				                  <td>in</td>
				                  <td>libero</td>
				                </tr>
				              </tbody>
				            </table>
				          </div>
				        </div>
				      </div>
				    </div>
					-->
    			<?php
    			}
    	}
    ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="Dashboard%20Template%20for%20Bootstrap_arquivos/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="Dashboard%20Template%20for%20Bootstrap_arquivos/bootstrap.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="Dashboard%20Template%20for%20Bootstrap_arquivos/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="Dashboard%20Template%20for%20Bootstrap_arquivos/ie10-viewport-bug-workaround.js"></script>
  		

</body>
</html>