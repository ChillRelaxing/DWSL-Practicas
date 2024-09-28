<?php
    $conn = mysqli_connect(hostname: "localhost", username: "root", password: "1234", database: "alumnos");

    if ($conn->connect_error) {
        die("Error de conexion: ". mysqli_connect_error());
    }

    $query = "SELECT * FROM departamentos;";
    $departamentos = $conn->query(query: $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="card m-auto mt-5 p-4" style="width: 700px">
        <div class="row justify-content-center mb-3">
            <div class="col-4">
                <label for="">Nombres:</label>
                <input type="text" name="nombres" class="form-control">
            </div>
            <div class="col-4">
                <label for="">Apellidos:</label>
                <input type="text" name="apellidos" class="form-control">
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-4">
                <label for="">Departamento:</label>
                <select name="departamento" id="departamento" class="form-control">
                    <option value="">-- Seleccione -- </option>
                    <?php
                        if($departamentos->num_rows > 0){
                            while($departamento = $departamentos->fetch_assoc()){
                                echo "<option value='".$departamento['id']."'>".$departamento['nombre']."</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="col-4">
                <label for="">Municipio:</label>
                <select name="municipio" id="municipio" class="form-control">
                    <option value="">-- Seleccione --</option>
                </select>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-2">
                <label for="">Genero:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        M
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        F
                    </label>
                </div>
                </div>
        </div>
        <div class="row justify-content-center mb-3">
        <div class="col-2">
            <button type="submit" class="btn btn-success">
                Enviar
            </button>
        </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4"></div>
            <div class="col-4"></div>
        </div>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>