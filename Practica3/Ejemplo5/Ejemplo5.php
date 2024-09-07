<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el número de filas y columnas del formulario
    $filas = intval($_POST['filas']);
    $columnas = intval($_POST['columnas']);

    // Validar los valores ingresados
    if ($filas < 1 || $columnas < 1) {
        echo "El número de filas y columnas debe ser al menos 1.";
        exit;
    }
} else {
    echo "No se han enviado datos.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tablero de Ajedrez</title>
    <style>
        .tablero {
            border-collapse: collapse;
        }
        .tablero td {
            width: 30px;
            height: 30px;
        }
        .blanco {
            background-color: #fff;
        }
        .negro {
            background-color: #000;
        }
    </style>
</head>
<body>
    <h1>Tablero de Ajedrez</h1>
    <table class="tablero">
        <?php
        // Generar el tablero
        for ($i = 0; $i < $filas; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $columnas; $j++) {
                // Determinar el color de la celda
                $color = ($i + $j) % 2 == 0 ? 'blanco' : 'negro';
                echo "<td class=\"$color\"></td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
