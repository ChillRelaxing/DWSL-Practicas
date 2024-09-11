<?php
// importamos los archivos con las clases
require_once 'Negocio/categorias.php';
require_once 'Negocio/productos.php';

$productos = new Productos();

if ($productos->delete($_GET['id'])){
    echo "<script>location.replace('index.php?mod=&form=li')</script>";
}