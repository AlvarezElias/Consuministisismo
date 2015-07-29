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

		<main id='main' class='main container-fluid center-block row text-center'>
			<div id='presentacion ' class="wrapper ">
					<h1>Casita dulce casita</h1>
			</div>
			
			<div class="container-fluid  form-group  center-block">				
				<label for="ingresoNuevo">Agrega una fuente rss nueva</label>
				<input id="ingresoNuevo" type="text" class="form-control" >
				<button id="agregar" type='submit'class="btn btn-default" >
					Agregar
				</button>
			</div>
			
			<section id='stream' class='row container center-block'> 
			
	  		<?php include ('modules/generarRss.php'); ?>

			</section>
		</main>

		
		
	</div>
	<?php include ('modules/footer.html'); ?>
	<?php include ('modules/script.html'); ?>
</body>
</html>