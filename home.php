<?php 
include ('clases/User.php');
include ('clases/Rss.php');

session_start();

if(!isset($_SESSION['user']))
{
	header ("location: index.php");
	exit;
}

$user = $_SESSION['user'];

$items = Rss::cargarRss();
$i = 0;
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

			<section id='stream' class='row container center-block'> 
			<!--Meter codigo para generar el Mainstream
				Generar lista de rss como main menu-->	
<?php
			for ($i=0; $i <10 ; $i++) 
			{ 
				strip_tags($items[$i]->description, '<br><br/>');
				strip_tags($items[$i]->pubDate, '<a></a>');
				echo 
				"<article class=' notice text-center'>
					<h4 class='Item-title'>
					   	<a href='". $items[$i]->link."' target='_blank'>". $items[$i]->title ." </a>
					</h4>
				
					<div class='Item-date'>". (string) $items[$i]->pubDate ."</div>
				
					<div class='Item-content'>". substr($items[$i]->description,0,180) . 
					  	"<a href='". $items[$i]->link ."'>Dame mas</a>
					</div>
				</article>";
			}
?>
	  		

			</section>
		</main>

		<div id="footer" class="footer row">
			<p>Producto By Me</p>
		</div>
	</div>

	<?php include ('modules/script.html'); ?>
</body>
</html>