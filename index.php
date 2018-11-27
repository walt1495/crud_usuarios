<?php

$c = (isset($_GET['c'])) ? $_GET['c'] : 'user';
$a = (isset($_GET['a'])) ? $_GET['a'] : 'index';

$controllerArchivo = 'controllers/'.$c.'Controller.php';
if(file_exists($controllerArchivo)){

	$controllerClase = ucfirst($c).'Controller';

	require_once($controllerArchivo);

	$controller = new $controllerClase();
	if(method_exists($controller, $a)){
		call_user_func(array($controller,$a));
	}else{
		die('Error, no se encuentra la página');	
	}

}else{
	die('Error, no se encuentra la página');
}


?>