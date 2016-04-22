<?php 
	$n = $dbcon-> prepare("SELECT * FROM livros");
	$n ->execute();
	$nbook = $n-> rowCount(); 
?>
<a href="book.php" class="btn btn-default list-group-item" role="button" style="margin-top:10px;">
	<span class="badge"><?php echo $nbook; ?></span>
	Livros
</a>
<div class="col-md-12" style="margin:0;padding:0;">
<?php 

	// LIVROS MAIS VISTOS
	echo "<h3 class='text-center' style='margin-bottom:5px;'>Mais Vistos</h3><br/>";
	$moreviews = $dbcon->prepare("SELECT * FROM livros ORDER BY views DESC LIMIT 5");
	$moreviews -> execute();
	while ($contVisto = $moreviews->fetch(PDO::FETCH_ASSOC) ) {
		?>

		<a data-toggle="tooltip" title="<?php echo $contVisto['nome']; ?>" href="book.php?liv=<?php echo $contVisto['id'];?>" >
			<img class="imgMaisVisto img-rounded" src="<?php echo $contVisto['img']; ?>" >
		</a>

		<br/>

		<?php
	}

?>
</div>