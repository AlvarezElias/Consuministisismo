<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Lector Rss</a>
		</div>
				
		<!--nav-collapse -->
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#Home">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>
		
			<ul class="nav navbar-nav navbar-right">
				<li><a href="">Perfil</a></li>
				<?php
					if ( isset($_SESSION['user']) ){
						echo '<li><a href="formularios/logout.php">Desloguearse</a></li>';
					}
					else{
						echo '<li><a href="index.php">Logueate</a></li>';
					}
				?>
							
				<li class="active"><a href="">Registrate</a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>