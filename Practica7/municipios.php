<?php
    $conn = mysqli_connect(hostname: "localhost", username: "root", password: "1234", database: "alumnos");

    if($conn->connect_error){
        die("Error de conexión". $conn->connect_error);
    }

    $query = "SELECT * FROM municipios WHERE id_departamento = " . $_GET['id'];
    $result = $conn->query($query);

    while($row = $result->fetch_assoc()){
        $municipios[] = $row;
    }

    echo json_encode($municipios);

    $conn->close();

?>