<?php

class Db_conect_pdo {
	protected $pdo;
	public $resultado;
	public $driver;

	public function __construct() {
		try {
			$this->pdo = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // para que el pdo maneje el error automaticamente
			$this->driver = $this->pdo->getAttribute(PDO::ATTR_DRIVER_NAME);

		}catch(PDOException $e){
			echo 'Error de conexión: ' . $e->getMessage() . '<br/>';
			exit();
		}
	}
	
}

// class Db_pdo_tempo extends Db_conect_pdo {

// 	public function __construct(){
// 		parent::__construct();
// 		// echo $this->pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
// 	}

// 	public function get_tempo_control (){
// 		/**
// 		 * 
// 		 * La funcion devuelve falso si la consulta no 
// 		 * trae ningun dato de la tabla
// 		 * 
// 		 */
// 		$sql = "SELECT *, DATEDIFF(CURDATE(), fecha) AS dias 
// 			FROM aprocam.tempo_control 
// 			ORDER BY expediente, tipo, dominio;";

// 		$this->resultado = $this->pdo->query($sql);

// 		if ($this->resultado->rowCount() === 0){
// 			return false;
// 		}

// 		return true;
// 	}
// }