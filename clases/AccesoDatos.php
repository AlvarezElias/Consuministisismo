<?php
class AccesoDatos
{
	private static $objetoAccesoDatos;
	private $objetoPDO;
	
	private function __construct()
	{
		try 
		{
			$this->objetoPDO = new PDO('mysql:host=localhost;dbname=rss;charset=utf8',
			 'root', '', array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$this->objetoPDO->exec('SET CHARACTER SET utf8');
		} 
		catch (Exception $e) 
		{
			print "Error: " . $e->getMessage();
			die();
		}	
	}

	public function RetornarConsulta ($sql)
	{
		return $this->objetoPDO->prepare($sql);
	}

	public function RetornarUltimoIdInsertado()
	{
		return $this->objetoPDO->lastInsertID();
	}
	
	public function dameUnObjetoAcceso()
	{
		if(!isset(self::$objetoAccesoDatos))
		{
			self::$objetoAccesoDatos = new AccesoDatos();
		}
		return self::$objetoAccesoDatos;
	}

	public function __clone()
	{
		trigger_error('La clonacion de este objeto no esta permitida', E_USER_ERROR);
	}
}
?>