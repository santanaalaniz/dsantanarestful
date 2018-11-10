<?php
 
// obtener conexión de base de datos
include_once '../configuracion/basededatos.php';
 
// instanciar objeto de usuario
include_once '../objetos/usuario.php';
 
$database = new BasedeDatos();
$db = $database->getConnection();
 
$usuario = new Usuario($db);
 
// establecer los valores de propiedad del usuario
$usuario->usuario = $_POST['usuario'];
$usuario->contrasena = base64_encode($_POST['contrasena']);
$usuario->creado = date('Y-m-d H:i:s');
 
// crear el usuario
if($usuario->registro()){
    $usuario_arr=array(
        "estado" => true,
        "mensaje" => "Registro exitoso!",
        "id" => $usuario->id,
        "usuario" => $usuario->usuario
    );
}
else{
    $usuario_arr=array(
        "estado" => false,
        "mensaje" => "el usuario ya existe!"
    );
}
print_r(json_encode($usuario_arr));
?>