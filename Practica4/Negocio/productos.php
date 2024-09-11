<?php

require_once 'Datos/conf.php';

class Productos extends Conf {
    // Atributos de la clase los cuales representan
    // los campos de la tabla en la base de datos
    public $name;
    public $description;
    public $categorie;

    // Metodo para listar los productos
    public function list_products() {
        $query = "SELECT * FROM productos";
        return mysqli_fetch_all($this->exec_query($query), MYSQLI_ASSOC);
    }

    // Metodo para agregar
    public function add(){
        $query = "INSERT INTO productos (
            nombre,
            descripcion,
            id_categorie
        )
        VALUES (
            '".$this->name."',
            '".$this->description."',
            '".$this->categorie."'
        )";

        return $this->exec_query($query);
    }

    // Metodo para actualizar 
    public function update($id){
        $query = "UPDATE productos SET 
            nombre = '".$this->name."',
            descripcion = '".$this->description."',
            id_categorie = '".$this->categorie."'
            WHERE id = '".$id."' ";
            
            return $this->exec_query($query);
    }

    // Metodo para eliminar
    public function delete($id){
        $query = "DELETE FROM productos WHERE id = '".$id."' ";
        return $this->exec_query($query);
    }

    // Metodo para obtener producto por id
    public function get_producto($id){
        $query = "SELECT * FROM productos 
            WHERE id = '".$id."' ";
        return mysqli_fetch_all($this->exec_query($query), MYSQLI_ASSOC);
    }
}