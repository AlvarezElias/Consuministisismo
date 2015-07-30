<?php 
	include ('clases/User.php');
	include ('clases/Rss.php');

	session_start();

	if(!isset($_SESSION['user']))
	{
		header ("location: index.php");
		exit;
	}
	$usuarios = USER::TraerTodosLosUsersSP();
	
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
			
			<!-- when clicked, it will load the create product form -->
		    <div id='load-product' class='btn btn-primary pull-right'>
		        <span class='glyphicon glyphicon-load'></span> Cargar productos
		    </div>

			<section id='stream' class='row container center-block'> 
			
			<!-- this is where the contents will be shown. -->
			<div id='page-content'>
			</div>
	  		<?php //include ('modules/generarRss.php'); ?>

			</section>
		</main>

		
		
	</div>
	<?php include ('modules/footer.html'); ?>
	<?php include ('modules/script.html'); ?>
	<script src="https://code.highcharts.com/stock/highstock.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script type="text/javascript" src="js/CRUD.js"></script>
</body>
</html>