<nav class="navbar navbar-inverse navbar-fixed-top bnavega">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>						
			</button>
				<a href="index.php" class="navbar-brand area_logo">
					<img class="logo_image" src="img/logo_head.png" alt="Logo Site">
				</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
										
					<li class="area_tit_menu_nav"><a class="tit_menu_nav" href="p/about.php">Sobre</a></li>
					<li class="area_tit_menu_nav"><a class="tit_menu_nav" href="p/contact.php">Contato</a></li>
					<li class="area_tit_menu_nav"><a class="tit_menu_nav" href="p/download.php" data-placement="bottom" data-toggle="tooltip" title="Livros/Softwares..">Download</a></li>
					

						<!--<ul class="dropdown-menu">
							<li><a href="#">Livros</a></li>
						</ul>-->
					</li>
				</ul>
				<div class="box_bucs">
					<form action="p/search.php" method="get">
						<input class="boxtest" type="text"  name="textsearch" placeholder="Search ..." required>
						<input class="btnPesquisa" type="image" name="Btnsearch" src="img/img_theme/images/search_09.jpg">
					</form>
				</div>
		</div>
	</div><!--END !!Container-Fluid-->
</nav>