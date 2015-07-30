<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top nav" >
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
				<li id='home' class="active btnNavBar"><a class="lnkNavBar" href="home.php">Home</a></li>
			</ul>
		
			<ul class="nav navbar-nav navbar-right" >
				
				<?php
					if ( isset($_SESSION['user']) )
					{
						echo '<li class="btnNavBar"><a class="lnkNavBar" href="./UserConfig.php"> '. $_SESSION["user"]->name .'</a></li> ';
						echo '<li class="btnNavBar"><a class="lnkNavBar"  href="./listar.php">Listar Usuarios</a></li>';
						echo '<li class="btnNavBar"><a class="lnkNavBar" href="formularios/logout.php">Desloguearse</a></li>';
						
						$photo = 'images\\' ;

						if(isset($_SESSION["user"]->photo))
							$photo =  $photo . $_SESSION["user"]->name . '\\' . $_SESSION["user"]->photo;
					 	else  
					 		$photo = $photo . "default.jpg" ;

						echo '<li class="btnNavBar" ><img style="width: 50px; height: 50px;" src="' .  $photo . '" alt="Responsive image" class="img-responsive img-circle"><a class="lnkNavBar" href="./UserConfig.php"></a></li>';
					}
					else
					{
						echo '<li class="btnNavBar"><a class="lnkNavBar" href="index.php">Logueate</a></li>';
						echo '<li class="btnNavBar"><a class="lnkNavBar" href="index.php">Registrate</a></li>';
					}
				?>
							
			</ul>
		</div><!--/.nav-collapse -->
	</div>
 <label id='seleccion' type="hidden" name="seleccion" value=""></label>
</nav>
