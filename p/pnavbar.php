<?php  
	echo "<h3 class='text-center tit_categoria'><img src='http://i63.tinypic.com/207oqr7.jpg' class='icon_category'/>Categorias</h3>";

	$stn = $dbcon->prepare("SELECT DISTINCT categoria FROM files");
	$stn->execute();

	while ($cat = $stn -> fetch(PDO::FETCH_ASSOC)) {
	?>
		<ol class="nav_ind">
		    <li class="cat_styleList">
		    	<a class="btn_categoria" href="download.php?categoria=<?php echo $cat['categoria'];?>">
		    		<?php echo $cat['categoria'];?>
		    	</a>
		    </li>
		</ol>
	<?php
	}
?>