<?php
require_once('Conexion.php');

class CargoModel extends Conexion{

	function __construct(){
		parent::__construct();
	}

	function getAll(){
		$sql = "SELECT * FROM cargos";
		$stm = $this->db->prepare($sql);
		$stm->execute();
		$cargos = array();
		while($cargo = $stm->fetchObject()){
			$cargos[] = $cargo;
		}
		return $cargos;
	}

}

?>