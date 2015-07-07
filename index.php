<?php session_start();?>
<html>
	<head>
	<?php include('modules/headContent.html'); ?>
		<title>LectorRss</title>
	<?php include('modules/style.html'); ?>

	</head>

	<body>
	
		<?php include ('modules/navbar.php'); ?>

		<main id="content" class="container-fluid">
			<div id="intro" class="jumbotron page">
				<h2>Bienvenido a tu lector de noticias favorito (o no)</h4>
				<p>Si sos usuario da click <a href="#logueo">Aca</a> sino da click <a href="#registro">Aca</a></p>
			</div>

			<br>

			<div class='row ingreso'>
				<div class='col-xs-6 col-md-6 login'> 
					<?php include('formularios/login.php'); ?> 
				</div>
				<div class='col-xs-6 col-md-6 register'> 
					<?php include('formularios/register.php'); ?> 
				</div>
			</div>
		</main>

		<div id="footer" class="footer">
			<p>Producto By Me</p>
		</div>

		<?php include('modules/script.html'); ?>
	</body>
</html>