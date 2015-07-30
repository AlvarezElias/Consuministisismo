<?php
	include_once ("../clases/User.php");
	session_start();

	if($_POST['queHacer'] == 'borrar')
	{
		USER::borrameUsuario($_POST['id']);
		echo "Usuario eliminado";
	}

?>