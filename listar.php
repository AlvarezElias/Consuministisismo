<?php 
	include_once('clases/User.php');
	session_start();

	if(!isset($_SESSION['user']))
	{
		header('location: index.php');
	}
$fecha = getdate();
	
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

	<div class='jumbotron pinched text-center container'>
		<h3>Usuarios registrados a la fecha <?php echo $fecha['mday'] . ' de ' . $fecha['month'] . ' del ' . $fecha['year'] ?></h3>
		<p >Se maldito y borra al que quieras! </p>
		<p class="text-muted">no te diviertas, no lo tenes permitido!</p>
	</div>

	<div class ='container'>
		<table class='table table-striped usercontainer'>
		<tr>
			<td>id</td>
    		<td>Nombre</td>
    		<td>Email</td> 
    		<td>Fecha de nacimiento</td>
    		<td>Genero</td>
    		<td>Eliminar</td>
  		</tr>
		</table>
	</div>

	<?php include ('modules/footer.html'); ?>

	<?php include ('modules/script.html'); ?>
	<script type="text/javascript" src="js/CRUDUsuario.js"></script>
</body>
</html>