<?php

// Estructura para definir el módulo al cual navegará el usuario
switch (@$_GET["mod"]) {
    // Dejaremos la dirección por defecto ya que solamente tenemos un módulo
    default:
        $module = "Presentacion/Productos/index.php";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tienda</title>
</head>
<body>

<div class="container">
    <?php
    require_once $module;
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

