<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ejemplo</title>
</head>
<body>
    <div class="container">
        <div class="card m-auto mt-5">
            <div class="card-body">
                <h2 class="card-title">Cálculo de Comisión</h2>
                <form action="Ejemplo.php" method="post">
                    <div class="row m-5 justify-content-center">
                        <div class="col-md-4">
                            <label for="txtNombre">Nombre empleado</label>
                            <input type="text" class="form-control" id="txtNombre" name="txtNombre" required>
                        </div>
                        <div class="col-md-4">
                            <label for="txtCantidad">Cantidad vendida</label>
                            <input type="number" class="form-control" id="txtCantidad" name="txtCantidad" step="0.01" required>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </div>
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Obtener y sanitizar los datos del formulario
                    $nombre = htmlspecialchars($_POST["txtNombre"]);
                    $cantidad = floatval($_POST["txtCantidad"]);
                    $sueldo_base = 850.00;
                    $comision = 0.00;

                    // Calcular la comisión basada en la cantidad vendida
                    if ($cantidad >= 15000) {
                        $comision = $cantidad * 0.10;
                    } elseif ($cantidad >= 12000) {
                        $comision = $cantidad * 0.05;
                    } elseif ($cantidad >= 10000) {
                        $comision = $cantidad * 0.03;
                    }

                    // Calcular el salario final
                    $salario_final = $sueldo_base + $comision;

                    // Mostrar los resultados
                    echo "<div class='mt-4'>";
                    echo "<h3>Resultados:</h3>";
                    echo "<p><strong>Empleado:</strong> " . $nombre . "</p>";
                    echo "<p><strong>Cantidad vendida:</strong> \$" . number_format($cantidad, 2) . "</p>";
                    echo "<p><strong>Comisión obtenida:</strong> \$" . number_format($comision, 2) . "</p>";
                    echo "<p><strong>Salario final:</strong> \$" . number_format($salario_final, 2) . "</p>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>


