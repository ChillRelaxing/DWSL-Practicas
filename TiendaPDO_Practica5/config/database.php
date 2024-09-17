<?php

class Database
{
    private $host = "localhost"; // nombre del servidor
    private $database = "dbtiendapdo"; // nombre de la base de datos
    private $user = "root"; // nombre del usuario
    private $password = "1234"; // contraseña
    public $conn; // atributo auxiliar para realizar la conexión

    // Método para establecer la conexión
    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->database,
                $this->user,
                $this->password
            );
            $this->conn->exec("set names utf8");
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
            die();
        }

        return $this->conn;
    }
}

?>
