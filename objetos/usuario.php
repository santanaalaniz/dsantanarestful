<?php

class Usuario{
 
    // Conexion a la tabla de la base de datos
    private $conn;
    private $table_name = "usuarios";
 
    // propiedades del objeto
    public $id;
    public $usuario;
    public $contrasena;
    public $creado;
 
    // constructor con $db como conexión de base de datos
    public function __construct($db){
        $this->conn = $db;
    }

    // registro de usuario
    function registro(){
    
        if($this->Existe()){
            return false;
        }
        // consulta para insertar registro
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    usuario=:usuario, contrasena=:contrasena, creado=:creado";
    
        // preparar la consulta
        $stmt = $this->conn->prepare($query);
    
        // desinfectar
        $this->usuario=htmlspecialchars(strip_tags($this->usuario));
        $this->contrasena=htmlspecialchars(strip_tags($this->contrasena));
        $this->creado=htmlspecialchars(strip_tags($this->creado));
    
        // valores del enlace
        $stmt->bindParam(":usuario", $this->usuario);
        $stmt->bindParam(":contrasena", $this->contrasena);
        $stmt->bindParam(":creado", $this->creado);
    
        // ejecutar la solicitud
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
    
        return false;
        
    }

    // inicio de sesion
    function inicio(){
        // seleccionar toda consulta
        $query = "SELECT
                    `id`, `usuario`, `contrasena`, `creado`
                FROM
                    " . $this->table_name . " 
                WHERE
                    usuario='".$this->usuario."' AND contrasena='".$this->contrasena."'";

        // preparar la declaración de consulta
        $stmt = $this->conn->prepare($query);

        // ejecutar la solicitud
        $stmt->execute();
        return $stmt;
    }
    function Existe(){
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                usuario='".$this->usuario."'";

		// preparar declaración de consulta
        $stmt = $this->conn->prepare($query);

        // ejecutar la solicitud
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}