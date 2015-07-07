<?php 
include ('clases/User.php');
session_start();

if(!isset($_SESSION['user']))
{
	header ("location: index.php");
	exit;
}

$user = $_SESSION['user'];

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

			<div id='stream' class='row container'>
				<?php 
					//Meter codigo para generar el Mainstream
					//Generar lista de rss como main menu
					
				?>
			</div>
		</main>

		<div id="footer" class="footer row">
			<p>Producto By Me</p>
		</div>
	</div>

	<?php include ('modules/script.html'); ?>
</body>
</html>