<?php

require_once 'Datos/conf.php';

class Productos extends Conf {

    public $name;
    public $description;
    public $categorie;

    // Método para listar los productos
    public function list_products() {
        $query = "SELECT * FROM productos";
        return mysqli_fetch_all($this->query($query), MYSQLI_ASSOC);
    }

    // Método para agregar un producto
    public function add() {
        $query = "INSERT INTO productos (nombre, descripcion, id_categorie) VALUES (
            '".$this->name."',
            '".$this->description."',
            '".$this->categorie."'
        )";
        return $this->query($query);
    }

    // Método para actualizar un producto
    public function update($id) {
        $query = "UPDATE productos SET 
            nombre = '".$this->name."', 
            descripcion = '".$this->description."', 
            id_categorie = '".$this->categorie."'
            WHERE id = '".$id."'
        ";
        return $this->query($query);
    }

    // Método para eliminar un producto
    public function delete($id) {
        $query = "DELETE FROM productos WHERE id = '".$id."'";
        return $this->query($query);
    }

    // Método para obtener un producto por ID
    public function get_producto($id) {
        $query = "SELECT * FROM productos WHERE id = '".$id."'";
        return mysqli_fetch_all($this->query($query), MYSQLI_ASSOC);
    }
}
?>
