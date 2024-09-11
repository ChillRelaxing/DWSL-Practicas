<?php

require_once 'Datos/conf.php';

class Categorias extends Conf {
    
    // listamos todas las categorias existentes
    public function list_categories(){
        $query = "SELECT * FROM categorias";
        return mysqli_fetch_all($this->exec_query($query), MYSQLI_ASSOC);
    }

    public function get_categorie($id){
        $query = "SELECT * FROM categorias 
        WHERE id = '".$id."' ";
        return mysqli_fetch_all($this->exec_query($query), MYSQLI_ASSOC);
    }

}