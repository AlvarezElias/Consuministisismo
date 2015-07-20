<?php 
	include_once('clases/User.php');
	session_start();

	if(!isset($_SESSION['user']))
	{
		header('location: index.php');
	}
?>


<html>
<head>
	<?php include('modules/headContent.html'); ?>
	<title>Configuracion de Usuario</title>
	<?php include('modules/style.html'); ?>
</head>

<body>
	
	<div class'row'>
		<?php include_once ('modules/navbar.php'); ?>
	</div>

	<div class='jumbotron text-center container'>
		<h3>Configuracion de usuario</h3>
		<p >Aca podes modificar tus datos! </p>
		<p class="text-muted">no te olvides de guardar</p>
	</div>

	<div class='container text-center userdata'>
		

		


        <?php include_once ('formularios/userData.php'); ?>

	<?php include ('modules/footer.html'); ?>

	<?php include ('modules/script.html'); ?>
</body>
</html>