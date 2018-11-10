<?php

class BasedeDatos{
 
    // Especifique sus propias credenciales de base de datos
    private $host = "dsantana.uas.edu.mx";
    private $db_name = "dsantanarestful";
    private $username = "dsantanarestful";
    private $password = "dsantanarestful";
    public $conn;
 
    // obtener la conexión de base de datos
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Error de conexión: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>