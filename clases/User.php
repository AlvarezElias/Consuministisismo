<?php
include('AccesoDatos.php');
class User 
{
	public $id;
	public $name;
	public $email;
	public $photo;
	public $birthDate;


	public function __construct($id=null,$name=null,$email=null)
	{
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
	} 

	public function borrarUsuario()
	{
		$objectAccessData = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objectAccessData->RetornarConsulta(
			"DELETE 
			FROM users
			WHERE id=:id;");
		$consulta->bindValue(':id',$this->id,PDO::PARAM_INT);
		$consulta->execute();
		return $consulta->rowCount();
	}

	public function modificarUsuario()
	{
		$objectAccessData = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objectAccessData->RetornarConsulta(
			"DELETE 
			FROM users 
			WHERE id = $this->id");
		$consulta->execute();
		return $consulta->rowCount();
	}

	


	//Metodos estaticos
	public static function CrearUsuario($username, $password, $email)
	{
		$objectAccessData = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objectAccessData->RetornarConsulta(
			"INSERT INTO users (name,password,email) 
				VALUES (:username,:password,:email)");
		$consulta->bindValue(':username', $username, PDO::PARAM_STR);
		$consulta->bindValue(':password',$password,PDO::PARAM_STR);
		$consulta->bindValue(':email', $email, PDO::PARAM_STR);
		$consulta->execute();

		$usuarioId = $objectAccessData->RetornarUltimoIdInsertado();
		return new User($usuarioId,$username,$email);
	}

	public static function TraerTodosLosUsersSP()
	{
		$objectAccessData = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objectAccessData->RetornarConsulta('CALL getallusers;');
		$consulta->execute();
		return $consulta->fetchAll(PDO::FETCH_CLASS, "user");
	}

	public static function NombreUsuarioExistente($username)
	{
		$objectAccessData = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objectAccessData->RetornarConsulta(
			"SELECT name 
			FROM users
			where (name LIKE ? OR email LIKE ?) ");
		//$consulta->bindValue(':username', $username, PDO::PARAM_STR);
		$consulta->execute(array($username,$username));
		return $consulta->rowCount();
	}

	public static function EmailExistente($email)
	{
		$objectAccessData = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objectAccessData->RetornarConsulta(
			"SELECT count(email) 
			FROM users
			WHERE email = :email ");
		$consulta->bindValue(':email', $email,PDO::PARAM_STR);
		$consulta->execute();
		return $consulta->fetchColumn(0);
	}


	public static function ValidarIngreso($username, $password)
	{
		$objectAccessData = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objectAccessData->RetornarConsulta(
			"SELECT * 
			FROM users
			where (name LIKE ? OR email LIKE ?) AND password = ?");
		$consulta->execute(Array($username,$username,$password));

		$userLogueado = $consulta->fetch(PDO::FETCH_ASSOC);
		
		return new User($userLogueado['id'],$userLogueado['name'],$userLogueado['email']);

	}

}