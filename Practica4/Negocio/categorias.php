<?php

require_once 'Datos/conf.php';

class Categorias extends Conf {

    // Listamos todas las categorías existentes
    public function list_categories() {
        $query = "SELECT * FROM categorias";
        return mysqli_fetch_all($this->query($query), MYSQLI_ASSOC);
    }

    // Obtener una categoría por ID
    public function get_categoria($id) {
        $query = "SELECT * FROM categorias WHERE id = '$id'";
        return mysqli_fetch_all($this->query($query), MYSQLI_ASSOC);
    }
}
?>
