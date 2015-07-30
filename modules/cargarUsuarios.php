<?php
	include_once('../clases/User.php');
	session_start();
	
	$usuarios = User::TraerTodosLosUsersSP();
			foreach ($usuarios as $UnUsuario) {
				$cumple = isset($UnUsuario["datebirth"]) ? $UnUsuario["datebirth"] : 'No ingresado';
				$registro = '<tr id ="User' . $UnUsuario["id"] . '" class="usuarios">';
				$registro = $registro .  ' <td>'. $UnUsuario["id"] .'</td>';
				$registro = $registro .  ' <td>'. $UnUsuario["name"] .'</td>';
				$registro = $registro .  ' <td>'. $UnUsuario["email"] .'</td>';
				$registro = $registro .  ' <td>'. $cumple .'</td>'; //
				$registro = $registro .  ' <td>'. $UnUsuario["gender"] .'</td>'; //$UnUsuario["gender"]

				$registro = $registro .  ' <td> <button id="' . $UnUsuario["id"] .'"class="eliminar btn btn-default " >SI DALE QUIERO!</button></td>';

				echo $registro . ' <br> '. ' </tr>';
			}
?>