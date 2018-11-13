<?php
class BasedeDatos{

    // Especifique sus propias credenciales de base de datos
    private $servidor = "dsantana.uas.edu.mx";
    private $basededatos = "dsantanarestful";
    private $usuario = "dsantanarestful";
    private $contrasena = "dsantanarestful";
    public $conexion;

    // obtener la conexión de base de datos
    public function ObtenerConexion(){

        $this->conexion = null;

        try{
            $this->conexion = new PDO("mysql:host=" . $this->servidor . ";dbname=" . $this->basededatos, $this->usuario, $this->contrasena);
            $this->conexion->exec("set names utf8");
        }catch(PDOException $excepcion){
            echo "Error de conexion: " . $excepcion->getMessage();
        }

        return $this->conexion;
    }
}
?>
