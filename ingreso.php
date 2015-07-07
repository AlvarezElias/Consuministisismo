<?php
	session_start();


	//si no esta seteado el usuario, validamos el ingreso o el registro
	if(!isset($_SESSION['user']))
	{
		include('clases\User.php');

		$username = $_POST['username'];
		$password = $_POST['password'];

		if(isset($_POST['btnlogin']))
		{
			//consulta bd por el usuario y password
			//tener en consideracion que puede ingresar email. REALIZAR UN OR EN LA CONSULTA
			if (User::NombreUsuarioExistente($username) > 0)
			{	
				$log = User::ValidarIngreso($username,$password);
				
				if( isset($log))
				{
					$_SESSION ['user'] = $log; 
					echo "<h3>Usuario Logueado</h3>" . "<br/>";
					echo "ID: " . $_SESSION['user']->id . "<br/>"; 
					echo "Nombre: " . $_SESSION['user']->name . "<br/>";
					echo "Email: " . $_SESSION['user']->email . "<br/>";
					echo "<a href=home.php>Home</a>";
				}
				else
				{
					echo 'Error, no pudo loguearse <a href=index.php>Volver</a>';
				}
			}
			else
			{
					//retornar error de inexistencia de usuario en json
				echo "Inexistencia de usuario <a href=index.php>Volver</a>";
			}
		}
		else
		{
			$email = $_POST['email'];

			//consultar a la bd por existencia de usuario registrado
			if(User::NombreUsuarioExistente($username) <= 0)
			{
				//consultar a la bd por la existencia de email registrado
				if(User::EmailExistente($email) <= 0)
				{
					$_SESSION['user'] = User::CrearUsuario($username,$password,$email);
					
					echo "<h3>Usuario Insertado</h3>";
					echo "ID: " . $_SESSION['user']->id;
					echo "Nombre: " . $_SESSION['user']->name;
					echo "Email: " . $_SESSION['user']->email;
					echo "<a href=home.php>Home</a>";
				}
				else
				{
					//reronar error de email ya usado
					echo 'Email Existente <a href=index.php>Volver</a>';
				}
			}
			else
			{
				//retornar error de usuario ya usado en json
				echo 'Nombre de usuario Existente <a href=index.php>Volver</a>';
			}
		}
	}
	else
	{
		echo 'Ya estas logueado maestro';
	}
?>