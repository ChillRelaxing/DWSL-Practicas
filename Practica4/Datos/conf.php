<?php

class Conf {
    private $server;
    private $user;
    private $password;
    private $database;
    private $connection;
    private $result_query;

    public function __construct() {
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "1234";
        $this->database = "dbtienda";
    }

    // Función que nos permite conectarnos al servidor y a la base de datos
    protected function connect() {
        @$this->connection = mysqli_connect(
            $this->server,
            $this->user,
            $this->password,
            $this->database
        ) or die("error: " . mysqli_connect_error());
        
        return $this->connection;
    }

    // Función para cerrar la conexión
    protected function disconnect() {
        return mysqli_close($this->connection);
    }

    // Función para ejecutar las consultas
    public function query($query) {
        $this->result_query = mysqli_query($this->connect(), $query)
            or die("error: " . mysqli_error($this->connection));
        return $this->result_query; // Añadido para usar el resultado en otras clases
    }
}
?>
