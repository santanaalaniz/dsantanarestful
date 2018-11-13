<?php


	// incluye base de datos y archivos de objetos
	include_once '../configuracion/basededatos.php';
	include_once '../objetos/usuario.php';

	// obtener conexión de base de datos
	$basededatos = new BasedeDatos();
	$bd = $basededatos->ObtenerConexion();

	// preparar objeto de usuario
	$usuario = new Usuario($bd);

	// establecer la propiedad de identificación del usuario para ser editado
	$usuario->usuario = isset($_GET['usuario']) ? $_GET['usuario'] : die();
	$usuario->contrasena = base64_encode(isset($_GET['contrasena']) ? $_GET['contrasena'] : die());

	// leer los detalles del usuario para ser editado
	$declaracion = $usuario->iniciar();
	if($declaracion->rowCount() > 0){

		// obtener fila recuperada
		$row = $declaracion->fetch(PDO::FETCH_ASSOC);

		// crear matriz
		$arreglodelusuario=array(
			"estado" => true,
			"mensaje" => "Inicio exitoso!",
			"id" => $row['id'],
			"usuario" => $row['usuario']
		);
	}

	else{
		$arreglodelusuario=array(
			"estado" => false,
			"mensaje" => "Usuario invalido o contrasena erronea!",
		);
	}

	// hacerlo en formato json
	print_r(json_encode($arreglodelusuario));

?>
