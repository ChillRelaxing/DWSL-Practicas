<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Nombre del Día de la Semana</title>
</head>
<body>
    <div class="container">
        <div class="card m-auto mt-5">
            <div class="card-body">
                <h2 class="card-title">Mostrar Nombre del Día de la Semana</h2>
                <form action="Ejemplo2.php" method="post">
                    <div class="row m-5 justify-content-center">
                        <div class="col-md-4">
                            <label for="numeroDia">Número del día (1-7):</label>
                            <input type="number" class="form-control" id="numeroDia" name="numeroDia" min="1" max="7" required>
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
                    // Obtener el número del día del formulario
                    $numeroDia = intval($_POST["numeroDia"]);
                    
                    // Determinar el nombre del día usando switch
                    switch ($numeroDia) {
                        case 1:
                            $nombreDia = "Lunes";
                            break;
                        case 2:
                            $nombreDia = "Martes";
                            break;
                        case 3:
                            $nombreDia = "Miércoles";
                            break;
                        case 4:
                            $nombreDia = "Jueves";
                            break;
                        case 5:
                            $nombreDia = "Viernes";
                            break;
                        case 6:
                            $nombreDia = "Sábado";
                            break;
                        case 7:
                            $nombreDia = "Domingo";
                            break;
                        default:
                            $nombreDia = "Número no válido";
                            break;
                    }

                    // Mostrar los resultados
                    echo "<div class='mt-4'>";
                    echo "<h3>Resultado:</h3>";
                    echo "<p><strong>Día correspondiente al número $numeroDia:</strong> $nombreDia</p>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
