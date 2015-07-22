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
			<a class="navbar-brand" href="index.php">Lector Rss</a>
		</div>
				
		<!--nav-collapse -->
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active btnNavBar"><a href="home.php">Home</a></li>
				<li class="btnNavBar"><a href="#about">About</a></li>
			</ul>
		
			<ul class="nav navbar-nav navbar-right">
				
				<?php
					if ( isset($_SESSION['user']) )
					{
						echo '<li class="btnNavBar"><a href="./UserConfig.php"> '. $_SESSION["user"]->name .'</a></li> ';
						echo '<li class="btnNavBar"><a href="./listar.php">Listar Usuarios</a></li>';
						echo '<li class="btnNavBar"><a href="formularios/logout.php">Desloguearse</a></li>';
						
						$photo = 'images\\' ;

						if(isset($_SESSION["user"]->photo))
							$photo =  $photo . $_SESSION["user"]->name . '\\' . $_SESSION["user"]->photo;
					 	else  
					 		$photo = $photo . "default.jpg" ;

						echo '<li class="btnNavBar"><img width="48" height="48" src="' .  $photo . '" alt="Responsive image" class="img-responsive img-circle"></li>';
					}
					else
					{
						echo '<li class="btnNavBar"><a href="index.php">Logueate</a></li>';
						echo '<li class="btnNavBar"><a href="index.php">Registrate</a></li>';
					}
				?>
							
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>