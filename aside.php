<?php 
	$n = $dbcon-> prepare("SELECT * FROM livros");
	$n ->execute();
	$nbook = $n-> rowCount(); 
?>
<a href="book.php" class="btn btn-default list-group-item" role="button" style="margin-top:10px;">
	<span class="badge"><?php echo $nbook; ?></span>
	Livros
</a>

