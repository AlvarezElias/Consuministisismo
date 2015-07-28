<?php 
	include ('clases/User.php');
	include ('clases/Rss.php');

	session_start();

	if(!isset($_SESSION['user']))
	{
		header ("location: index.php");
		exit;
	}

	
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('modules/headContent.html'); ?>
	<title>Casita</title>
	<?php include('modules/style.html'); ?>
</head>
<body>
	<div class='container-fluid'>
		<div class'row'>
			<?php include ('modules/navbar.php'); ?>
		</div>

		<main id='main' class='main row text-center'>
			<div id='presentacion' class="wrapper">
				<h1>Casita dulce casita</h1>
			</div>

			<div>
				<h3>Agregar rss</h3>
				<label for="ingresoNuevo"></label>
				<input id="ingresoNuevo" type="text" class="form-control">
				<button id="agregar" class="btn btn-default" ></butt>
			</div>
			
			<section id='stream' class='row container center-block'> 
			
			<!--Meter codigo para generar el Mainstream
				Generar lista de rss como main menu
				MUDAR-->	
			
	  		

			</section>
		</main>

		
		
	</div>
	<?php include ('modules/footer.html'); ?>
	<?php include ('modules/script.html'); ?>
</body>
</html>