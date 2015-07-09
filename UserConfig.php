<?php 
	include_once('clases/User.php');
	session_start();

	$currentUser = User::DameUsuarioActual($_SESSION['user']->id);
	$sexo = isset($currentUser->sexo) ? $currentUser->sexo : "nada";
?>

<!DOCTYPE html>
<html>
<head>
	<?php include('modules/headContent.html'); ?>
	<title>Configuracion de Usuario</title>
	<?php include('modules/style.html'); ?>
</head>

<body>
	
	<div class'row'>
		<?php include ('modules/navbar.php'); ?>
	</div>

	<div class='container text-center userdata'>
		

		<div class='jumbotron'>
			<h3>Configuracion de usuario</h3>
			<p >Aca podes modificar tus datos! </p>
			<p class="text-muted">no te olvides de guardar</p>
		</div>
		<form method="post" action="UserConfig.php" class="form">
			<label>UserCode: <?php echo $currentUser->id ?></label>

			<div class="form-group">
				<label for="email">Correo Electronico</label>
				<input id="email" class="form-control text-center"  name='email' type="email" value = "<?php echo $currentUser->email ?>" placeholder="Correo Electronico" required>
			</div>

			<div class="form-group">
				<label for="username">Nombre de usuario</label>
				<input id='username' class ='form-control text-center' name='name' type="text" value = "<?php echo $currentUser->name ?>" required/>
			</div>
			
			<div class="row file form-group">
				<label for="photo">File input</label>
				<input id="photo" name="photo" class='btn btn-default' type="file" >
				<p class="help-block">Selecciona una foto .JPG o .PNG.</p>
			</div>
			
			<div class="radio">
				<label>
					<input type="radio" name="sexo" id="masculino" value="masculino" <?php if($sexo == 'masculino') echo 'checked'; ?> >
					masculino
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="sexo" id="femenino" value="femenino" <?php if($sexo == 'femenino') echo 'checked'; ?> >
					Femenino
				</label>
			</div>

			<button class='submit btn btn-default ' type="submit" >Guardar</button>	
		</form>	
		<br>
		<a class=' btn btn-default ' href="home.php" type="button" >Volver</a>	
	</div>

	<?php include ('modules/footer.html'); ?>

	<?php include ('modules/script.html'); ?>
</body>
</html>