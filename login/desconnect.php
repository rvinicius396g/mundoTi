<?php
if (isset($_COOKIE["usuario"])){
	ob_start();

	// deletando o cookie
	setcookie("usuario",$_COOKIE["usuario"], time()-259200);

	if (!isset($_COOKIE["usuario"])){
		header("Location:../");
	}
}
?>