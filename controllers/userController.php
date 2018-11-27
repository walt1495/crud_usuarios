<?php
require_once('models/userModel.php');
require_once('models/cargoModel.php');
require_once('models/estadoModel.php');

class UserController{

	public $userModel = null;
	public $cargoModel = null;
	public $estadoModel = null;

	function __construct(){
		$this->userModel = new UserModel();
		$this->cargoModel = new CargoModel();
		$this->estadoModel = new EstadoModel();
	}

	function index(){
		$usuarios = $this->userModel->getAll();
		//print_r($usuarios);
		include_once('views/usuarios/index.php');
	}
	function agregar(){
		$cargos = $this->cargoModel->getAll();
		//print_r($cargos);
		$estados = $this->estadoModel->getAll();
		include_once('views/usuarios/agregar.php');
	}

	function insertar(){
		$nombre = $_POST['txtNombre'];
		$apePaterno = $_POST['txtApePaterno'];
		$apeMaterno = $_POST['txtApeMaterno'];
		$fNacimiento = $_POST['f_nacimiento'];
		$dni = $_POST['txtDni'];
		$edad = $_POST['txtEdad'];
		$cargo = $_POST['cmbCargo'];
		$estado = $_POST['cmbEstado'];

		$resp = array();
		$resp['ok'] = false;
		$resp['msj'] = "";
		$resp['id'] = "";

		if(trim($nombre) == ""){
			$resp['msj'] = "Debe Ingresar Nombre de Usuario";
			$resp['id'] = "txtNombre";
		}else if(trim($apePaterno) == ""){
			$resp['msj'] = "Debe Ingresar su Apellido Paterno";
			$resp['id'] = "txtApePaterno";
		}else if(trim($apeMaterno) == ""){
			$resp['msj'] = "Debe Ingresar su Apellido Materno";
			$resp['id'] = "txtApeMaterno";
		}else if(trim($fNacimiento) == ""){
			$resp['msj'] = "Debe Ingresar su Fecha de Nacimiento";
			$resp['id'] = "f_nacimiento";
		}else if(trim($dni) == ""){
			$resp['msj'] = "Debe Ingresar su DNI";
			$resp['id'] = "txtDni";
		}else if(strlen($dni) != 8){
			$resp['msj'] = "El DNI debe contener 8 Dígitos";
			$resp['id'] = "txtDni";
		}else if(trim($edad) == ""){
			$resp['msj'] = "Debe Ingresar su Edad";
			$resp['id'] = "txtEdad";
		}else if($cargo == 0){
			$resp['msj'] = "Debe Seleccionar un Cargo";
			$resp['id'] = "cmbCargo";
		}else{
			$insertar = $this->userModel->insert($nombre,$apePaterno,$apeMaterno,$fNacimiento,$dni,$edad,$estado,$cargo);
			if($insertar){
				$resp['ok'] = $insertar;
			}else{
				$resp['msj'] = "Error al agregar Usuario";
			}
		}


		header('Content-Type: application/json');
		echo json_encode($resp);
	}

	function editar(){
		$cargos = $this->cargoModel->getAll();
		$estados = $this->estadoModel->getAll();
		$usuario = $this->userModel->getOne($_GET['id']);
		//print_r($usuario);
		include_once('views/usuarios/editar.php');
	}

	function registar_modificacion(){
		$id = $_POST['id'];
		$nombre = $_POST['txtNombre'];
		$apePaterno = $_POST['txtApePaterno'];
		$apeMaterno = $_POST['txtApeMaterno'];
		$fNacimiento = $_POST['f_nacimiento'];
		$dni = $_POST['txtDni'];
		$edad = $_POST['txtEdad'];
		$cargo = $_POST['cmbCargo'];
		$estado = $_POST['cmbEstado'];

		$resp = array();
		$resp['ok'] = false;
		$resp['msj'] = "";

		$editar = $this->userModel->update($nombre,$apePaterno,$apeMaterno,$fNacimiento,$dni,$edad,$estado,$cargo,$id);
		if($editar){
			$resp['ok'] = $editar;
		}else{
			$resp['msj'] = "Error al Editar Usuario";
		}

		header('Content-Type: application/json');
		echo json_encode($resp);
	}

	function eliminar(){
		$id = $_GET['id'];
		$resp = array();
		$resp['ok'] = true;
		$resp['msj'] = "";

		$eliminar = $this->userModel->delete($id);
		if($eliminar){
			$resp['ok'] = $eliminar;
		}else{
			$resp['msj'] = "Error al Eliminar Usuario";
		}

		header('Content-Type: application/json');
		echo json_encode($resp);
	}

}

?>