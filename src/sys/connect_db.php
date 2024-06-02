<?php

class Db_conect_pdo {
	protected $pdo;
	public $resultado;
	public $driver;

	public function __construct() {
		try {
			$this->pdo = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			$this->driver = $this->pdo->getAttribute(PDO::ATTR_DRIVER_NAME);

		}catch(PDOException $e){
			echo 'Error de conexión: ' . $e->getMessage() . '<br/>';
			exit();
		}
	}
	
}

class Db_pdo_movimientos extends Db_conect_pdo {

	public function __construct(){
		parent::__construct();
	}

	public function get_movimientos(){
		/**
		 * 
		 * La funcion devuelve falso si la consulta no 
		 * trae ningun dato de la tabla
		 * 
		 */
		$sql = "SELECT * 
			FROM finanzas.movimientos 
			ORDER BY fecha DESC, detalle;";

		$this->resultado = $this->pdo->query($sql);

		if ($this->resultado->rowCount() === 0){
			return false;
		}

		return true;
	}

	public function get_tipo_x_mes($año){

		$sql = "SELECT tipo, MONTH(fecha) AS mes, SUM(round(ingreso)) AS ingreso, 
					SUM(round(egreso)) AS egreso
				FROM Finanzas.movimientos
				WHERE year(fecha) = $año
				GROUP BY tipo, MONTH(fecha)
				ORDER BY tipo, MONTH(fecha);";

		$this->resultado = $this->pdo->query($sql);

		if ($this->resultado->rowCount() === 0){
			return false;
		}

		

		return true;
	}
}