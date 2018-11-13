<?php

	// obtener conexión de base de datos
	include_once '../configuracion/basededatos.php';

	// instanciar objeto de usuario
	include_once '../objetos/usuario.php';

	$basededatos = new BasedeDatos();
	$bd = $basededatos->ObtenerConexion();

	$usuario = new Usuario($bd);

	// establecer los valores de propiedad del usuario
	$usuario->usuario = $_POST['usuario'];
	$usuario->contrasena = base64_encode($_POST['contrasena']);
	$usuario->creado = date('Y-m-d H:i:s');

	// crear el usuario
	if($usuario->registrar()){
		$arreglodelusuario=array(
			"estado" => true,
			"mensaje" => "Registro exitoso!",
			"id" => $usuario->id,
			"usuario" => $usuario->usuario
		);
	}
	else{
		$arreglodelusuario=array(
			"estado" => false,
			"mensaje" => "el usuario ya existe!"
		);
	}

        // hacerlo en formato json
	print_r(json_encode($arreglodelusuario));
?>
