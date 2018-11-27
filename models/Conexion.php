<?php

class Conexion{

	public $database = "crud_usuarios";
	public $user = "root";
	public $password = "";
	public $bd = null;

	function __construct(){
		$cnn = null;
		try{
			$cnn = new PDO('mysql:host=localhost;dbname='.$this->database.';charset=utf8',$this->user,$this->password);
        } catch(PDOException $e){
            die($e->getMessage());
        }    
            $this->db = $cnn;
	}

}

?>