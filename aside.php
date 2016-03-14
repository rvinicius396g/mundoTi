<?php 
	$n = $dbcon-> prepare("SELECT * FROM livros");
	$n ->execute();
	$nbook = $n-> rowCount(); 
?>
<h3 class="text-center">Categorias</h3><hr style="margin-top: 0;" />
<a href="book.php" class="btn btn-default list-group-item" role="button">
	<span class="badge"><?php echo $nbook; ?></span>
	Livros
</a>