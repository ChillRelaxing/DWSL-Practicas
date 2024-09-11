<?php

$form_valid = false;

switch ( @$_GET["form"] ) {
    case 'ad':
        // redireccionamos al mantenimiento de agregar
        $form = 'Presentacion/Productos/create.php';
        $form_valid = true;
        break;
    
    case 'up':
        $form = 'Presentacion/Productos/update.php';
        $form_valid = true;
        break;

    case 'del';
        $form = 'Presentacion/Productos/delete.php';
        $form_valid = true;
        break;

    default: 
        $form = 'Presentacion/Productos/list.php';
        $form_valid = true;
        break;
}

if ( $form_valid ) {
    require_once $form;
}
else{
    header('Location: error404.php');
}