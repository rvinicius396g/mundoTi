<?php 
	try{
		function conexao(){
			$dbcon = new PDO("mysql:host=localhost;dbname=db_mti;","root","");
			// server | databaseName | user | password      
			$dbcon->exec("SET CHARACTER SET utf8");
			return $dbcon;
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}
?>