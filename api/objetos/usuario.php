<?php

class Usuario{

    // Conexion a la tabla de la base de datos
    private $conexion;
    private $nombredelatabla = "usuarios";

    // propiedades del objeto
    public $id;
    public $usuario;
    public $contrasena;
    public $creado;

    // constructor con $bd como conexión de base de datos
    public function __construct($bd){
        $this->conexion = $bd;
    }

    // registro de usuario
    function registrar(){

        if($this->Existe()){
            return false;
        }
        // consulta para insertar registro
        $consulta = "INSERT INTO
                    " . $this->nombredelatabla . "
                SET
                    usuario=:usuario, contrasena=:contrasena, creado=:creado";

        // preparar la consulta
        $declaracion = $this->conexion->prepare($consulta);

        // desinfectar
        $this->usuario=htmlspecialchars(strip_tags($this->usuario));
        $this->contrasena=htmlspecialchars(strip_tags($this->contrasena));
        $this->creado=htmlspecialchars(strip_tags($this->creado));

        // valores del enlace
        $declaracion->bindParam(":usuario", $this->usuario);
        $declaracion->bindParam(":contrasena", $this->contrasena);
        $declaracion->bindParam(":creado", $this->creado);

        // ejecutar la solicitud
        if($declaracion->execute()){
            $this->id = $this->conexion->lastInsertId();
            return true;
        }

        return false;

    }

    // inicio de sesion
    function iniciar(){
        // seleccionar toda consulta
        $consulta = "SELECT
                    `id`, `usuario`, `contrasena`, `creado`
                FROM
                    " . $this->nombredelatabla . "
                WHERE
                    usuario='".$this->usuario."' AND contrasena='".$this->contrasena."'";

        // preparar la declaración de consulta
        $declaracion = $this->conexion->prepare($consulta);

        // ejecutar la solicitud
        $declaracion->execute();
        return $declaracion;
    }
    function Existe(){
        $consulta = "SELECT *
            FROM
                " . $this->nombredelatabla . "
            WHERE
                usuario='".$this->usuario."'";

		// preparar declaración de consulta
        $declaracion = $this->conexion->prepare($consulta);

        // ejecutar la solicitud
        $declaracion->execute();
        if($declaracion->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}
