<?php

class Productos
{
    private $conn;
    private $table_name = "productos"; // nombre de la tabla

    // Atributos que hacen referencia a los campos de la tabla
    public $id;
    public $nombre;
    public $descripcion;
    public $categoria;

    // Constructor de la clase
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Método para crear un producto
    public function create()
    {
        // Creamos la consulta
        /*
         los placeholders como :nombre, :descripcion etc.. son simplemente nombres que usas para enlazar los valores de las variables en tu código
         PHP con los valores que se insertan en la base de datos. Puedes cambiar el nombre de estos placeholders a cualquier cosa que desees
        */
        //Los otros campos si puntos son las columnas de la tabla la cual si debe se ser iguales a los de la base de datos
        $query = "INSERT INTO " . $this->table_name .
            " SET nombre = :nombre, descripcion = :descripcion, categoria = :categoria";

        // Preparamos la consulta
        $result = $this->conn->prepare($query);

        // Limpiamos el código
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->categoria = htmlspecialchars(strip_tags($this->categoria));

        // Enlazamos los parámetros
        $result->bindParam(":nombre", $this->nombre);
        $result->bindParam(":descripcion", $this->descripcion);
        $result->bindParam(":categoria", $this->categoria);

        // Ejecutamos la consulta
        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Método para obtener todos los productos
    public function get_products()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }

    // Método para obtener un producto por ID
    public function get_product_by_id()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $result = $this->conn->prepare($query);
        $result->bindParam(":id", $this->id);
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);

        /*
        $row["nombre"], $row["descripcion"], y $row["categoria"] hacen referencia a los valores de las columnas nombre, descripcion, y
        categoria en la fila recuperada desde la base de datos.
        */
        $this->nombre = $row["nombre"];
        $this->descripcion = $row["descripcion"];
        $this->categoria = $row["categoria"];
    }

    // Método para actualizar un producto
    public function update()
    {
        $query = "UPDATE " . $this->table_name .
            " SET nombre = :nombre, descripcion = :descripcion, categoria = :categoria 
                 WHERE id = :id";

        // Limpiamos el código
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->categoria = htmlspecialchars(strip_tags($this->categoria));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Preparamos la consulta
        $result = $this->conn->prepare($query);

        // Enlazamos los parámetros
        $result->bindParam(":nombre", $this->nombre);
        $result->bindParam(":descripcion", $this->descripcion);
        $result->bindParam(":categoria", $this->categoria);
        $result->bindParam(":id", $this->id);

        // Ejecutamos la consulta
        if ($result->execute()) {
            return true;
        }

        return false;
    }

    // Método para eliminar un producto
    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        // Preparamos la consulta
        $result = $this->conn->prepare($query);

        // Enlazamos el parámetro
        $result->bindParam(":id", $this->id);

        // Ejecutamos la consulta
        if ($result->execute()) {
            return true;
        }

        return false;
    }
}
