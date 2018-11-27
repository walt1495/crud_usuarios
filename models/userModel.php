<?php
require_once('Conexion.php');

class UserModel extends Conexion{

	function __construct(){
		parent::__construct();
	}

	function getAll(){
		$sql = "SELECT u.id as id,u.nombre as nombre,u.apellido_paterno as apellido_paterno,u.apellido_materno as apellido_materno,u.fecha_nacimiento as fecha_nacimiento,u.fecha_registro as fecha_registro,u.fecha_actualizacion as fecha_actualizacion,u.dni as dni,u.edad as edad,e.nombre_estado as nombre_estado,c.nombre_cargo as nombre_cargo 
			FROM usuarios as u INNER JOIN estados as e ON u.id_estado = e.id INNER JOIN cargos as c ON u.id_cargo = c.id 
			WHERE e.nombre_estado = 'ACTIVO' ORDER BY u.id DESC";
		$stm = $this->db->prepare($sql);
		$stm->execute();
		$usuarios = array();
		while($usuario = $stm->fetchObject()){
			$usuarios[] = $usuario;
		}
		return $usuarios;
	}

	function getOne($id){
		$sql = "SELECT u.id as id,u.nombre as nombre,u.apellido_paterno as apellido_paterno,u.apellido_materno as apellido_materno,u.fecha_nacimiento as fecha_nacimiento,u.fecha_registro as fecha_registro,u.fecha_actualizacion as fecha_actualizacion,u.dni as dni,u.edad as edad,e.nombre_estado as nombre_estado,c.nombre_cargo as nombre_cargo, u.id_estado as id_estado,u.id_cargo as id_cargo 
			FROM usuarios as u INNER JOIN estados as e ON u.id_estado = e.id INNER JOIN cargos as c ON u.id_cargo = c.id 
			WHERE e.nombre_estado = 'ACTIVO' and u.id = ?";
		$stm = $this->db->prepare($sql);
		$stm->bindParam(1,$id);
		$stm->execute();
		return $stm->fetchObject();
	}

	function insert($nombre,$ape_paterno,$ape_materno,$f_nacimiento,$dni,$edad,$id_estado,$id_cargo){
		
			$sql = "INSERT INTO usuarios VALUES(null,?,?,?,?,now(),null,?,?,?,?);";
			$stm = $this->db->prepare($sql);
			$stm->bindParam(1,$nombre);
			$stm->bindParam(2,$ape_paterno);
			$stm->bindParam(3,$ape_materno);
			$stm->bindParam(4,$f_nacimiento);
			$stm->bindParam(5,$dni);
			$stm->bindParam(6,$edad);
			$stm->bindParam(7,$id_estado);
			$stm->bindParam(8,$id_cargo);
			return $stm->execute();
		
	}

	function update($nombre,$ape_paterno,$ape_materno,$f_nacimiento,$dni,$edad,$id_estado,$id_cargo,$id){
		$sql = "UPDATE usuarios SET nombre=?,apellido_paterno=?,apellido_materno=?,fecha_nacimiento=?,fecha_actualizacion=now(),dni=?,edad=?,id_estado=?,id_cargo=? 
			WHERE id = ?";
		$stm = $this->db->prepare($sql);
		$stm->bindParam(1,$nombre);
		$stm->bindParam(2,$ape_paterno);
		$stm->bindParam(3,$ape_materno);
		$stm->bindParam(4,$f_nacimiento);
		$stm->bindParam(5,$dni);
		$stm->bindParam(6,$edad);
		$stm->bindParam(7,$id_estado);
		$stm->bindParam(8,$id_cargo);
		$stm->bindParam(9,$id);
		return $stm->execute();
	}

	function delete($id){
		$sql = "UPDATE usuarios SET usuarios.id_estado=2 WHERE id = ?";
		$stm = $this->db->prepare($sql);
		$stm->bindParam(1,$id);
		return $stm->execute();
	}

}

?>