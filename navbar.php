<?php  
	echo "<h3 class='text-center tit_categoria'><img src='img/icons/category_icon.png' class='icon_category'/>Categorias</h3>";

	$stn = $dbcon->prepare("SELECT DISTINCT categoria FROM files");
	$stn->execute();

	while ($cat = $stn -> fetch(PDO::FETCH_ASSOC)) {
	?>
		<ol style="margin:0;padding-left:17px;">
		    <li class="cat_styleList">
		    	<a class="btn_categoria" href="p/download.php?categoria=<?php echo $cat['categoria'];?>">
		    		<?php echo $cat['categoria'];?>
		    	</a>
		    </li>
		</ol>
	<?php
	}
?>