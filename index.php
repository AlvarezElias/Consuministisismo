<?php 
	include_once('clases/User.php');
	session_start();

    if(isset($_SESSION['user']))
    {
        header('location: home.php');
        exit;
    }
?>
<html>
	<head>
	<?php include('modules/headContent.html'); ?>
		<title>LectorRss</title>
	<?php include('modules/style.html'); ?>

	</head>

	<body>
	
		<?php include ('modules/navbar.php'); ?>

		<main id="content " class=" container-fluid">
			<div id="intro" class="pinched ">
				<h2>Bienvenido a tu lector de noticias favorito (o no)</h2>
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

		<?php include ('modules/footer.html'); ?>

		<?php include('modules/script.html'); ?>
	</body>
</html>