<?php
include('AccesoDatos.php');
class User 
{
	public $id;
	public $name;
	public $email;
	public $photo;
	public $datebirth;
	public $intro;
	public $sexo;


	public function __construct($id=null, $name=null, $email=null, $photo = null, $datebirth = null, $intro = null, $sexo = null)
	{
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
		$this->photo = $photo;
		$this->datebirth = $datebirth;
		$this->intro = $intro; 
		$this->sexo = $sexo;
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

	private function informacionDeUsuarioExistente($objectAccessData)
	{
		$infouser = $objectAccessData->RetornarConsulta("SELECT i.id FROM infouser as i, users as u WHERE u.id = " . $this->id);
		$infouser->execute();
		return $infouser->fetch(PDO::FETCH_ASSOC);
	}

	private function insertarInformacionDeUsuario($objectAccessData)
	{
		$infouser = $objectAccessData->RetornarConsulta("INSERT INTO infouser (userid)  
														 VALUES (". $this->id .")");

		$infouser->execute();
		return $objectAccessData->RetornarUltimoIdInsertado();
	}

	public function modificarUsuario($userUpdate)
	{
		$objectAccessData = AccesoDatos::dameUnObjetoAcceso();

		
		
		//Array para bindear query con variables
		
		$querystring = 'UPDATE users SET users.name = ? , users.email  = ? WHERE id = ?';

		$bindeoUser = array('name' => $this->name,
							'email' => $this->email,
							'id' => $this->id );

		$consultaUser = $objectAccessData->RetornarConsulta($querystring);

		$consultaUser->execute($bindeoUser);


		/*
			Creacion de registro en infoUser en caso que no exista.
		*/
		$infouser =  $this->informacionDeUsuarioExistente($objectAccessData);

		$querystring = 'UPDATE infouser SET userid = ? ';

		if(!isset($infouser) or $infouser == 0)
		{
			$infouser = $this->insertarInformacionDeUsuario($objectAccessData);
		}


		$bindeoInfoUser[] = $infouser['id'];

		/********************************
		 **	   PARAMETRIZAR TODO!!     **
		**********************************/
		if(isset($userUpdate->photo) and $userUpdate->photo != $this->photo){
			$querystring = $querystring .	', i.photo  = ? ';
			$bindeoInfoUser[] = $userUpdate->photo;
		}

		if(isset($userUpdate->datebirth) and $userUpdate->datebirth != $this->datebirth){
			$querystring = $querystring .	', i.datebirth  = ? '; 
			$bindeoInfoUser[] = $userUpdate->datebirth;
		}

		if (isset($userUpdate->intro) and  $userUpdate->intro != $this->intro) 
		{
			$querystring = $querystring .	', i.intro  = ? '; 	
			$bindeoInfoUser[] = $userUpdate->intro;
		}

		/********************************
		 **	   PARAMETRIZAR TODO!!     **
		**********************************/

		$querystring = $querystring . "WHERE id = ?";
		$bindeoInfoUser[] = $this->id;

		$consulta = $objectAccessData->RetornarConsulta($querystring);

		$consulta->execute($bindeoInfoUser);

		return User::dameUsuarioActual($this->id);
	}


	


	/************************
	****Metodos estaticos****
	*************************/
	public static function DameUsuarioActual($id)
	{
		$objectAccessData = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objectAccessData->RetornarConsulta("SELECT u.id, u.name, u.email, d.photo, d.datebirth, d.intro 
														FROM Users as u
														LEFT JOIN infouser as d on u.infouserid = d.id
														WHERE u.id = ?");
		$consulta->execute(array($id));
		$userArray = $consulta->fetch(PDO::FETCH_ASSOC);
		return new User($userArray['id'],$userArray['name'],$userArray['email'],$userArray['photo'],$userArray['datebirth'],$userArray['intro']);
	}

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
		$consulta = $objectAccessData->RetornarConsulta("SELECT name 
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