<?php 
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
	
	<?php include ('modules/navbar.php'); ?>

	<main id='principal' class=''>
		<div id='content' class="wrapper container-fluid">
			<h1>Principal</h1>
		</div>
	</main>

	<div id="footer" class="footer">
		<p>Producto By Me</p>
	</div>

</body>
</html>