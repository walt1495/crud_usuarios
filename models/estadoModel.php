<?php
require_once('Conexion.php');
class EstadoModel extends Conexion{

	function __construct(){
		parent::__construct();
	}

	function getAll(){
		$sql = "SELECT * FROM estados";
		$stm = $this->db->prepare($sql);
		$stm->execute();
		$estados = array();
		while($estado = $stm->fetchObject()){
			$estados[] = $estado;
		}
		return $estados;
	}

}

?>