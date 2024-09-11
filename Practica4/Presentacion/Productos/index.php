
<?php

$form_valid = false;

switch (@$_GET["form"]) {
    case 'li':
        $form = 'Presentacion/Productos/list.php';
        $form_valid = true;
        break;

    case 'ad':
        $form = 'Presentacion/Productos/create.php'; 
        $form_valid = true;
        break;

    case 'up':
        $form = 'Presentacion/Productos/update.php';
        $form_valid = true;
        break;

    case 'Presentacion/Productos/delete.php':
        $form_valid = true ;
        break;

    default:
        $form_valid = false;
        break;
}

if ($form_valid) {
    require_once $form;
} else {
    header('Location: error404.php');
}

?>
