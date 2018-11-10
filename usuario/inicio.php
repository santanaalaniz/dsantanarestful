<?php

	// incluye base de datos y archivos de objetos
	include_once '../configuracion/basededatos.php';
	include_once '../objetos/usuario.php';
 
	// obtener conexión de base de datos
	$database = new BasedeDatos();
	$db = $database->getConnection();
 
	// preparar objeto de usuario
	$usuario = new Usuario($db);

	// establecer la propiedad de identificación del usuario para ser editado
	$usuario->usuario = isset($_GET['usuario']) ? $_GET['usuario'] : die();
	$usuario->contrasena = base64_encode(isset($_GET['contrasena']) ? $_GET['contrasena'] : die());

	// leer los detalles del usuario para ser editado
	$stmt = $usuario->inicio();
	if($stmt->rowCount() > 0){
		
		// obtener fila recuperada
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		// crear matriz
		$usuario_arr=array(
			"estado" => true,
			"mensaje" => "Inicio exitoso!",
			"id" => $row['id'],
			"usuario" => $row['usuario']
		);
	}

	else{
		$usuario_arr=array(
			"estado" => false,
			"mensaje" => "Usuario invalido o contraseña erronea!",
		);
	}
	
	// hacerlo en formato json
	print_r(json_encode($usuario_arr));

?>