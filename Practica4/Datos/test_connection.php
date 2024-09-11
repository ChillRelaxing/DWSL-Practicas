<?php
require_once 'Conf.php'; // Asegúrate de que la ruta a Conf.php sea correcta

// Crear una instancia de la clase Conf
$db = new Conf();

// Probar la conexión
if ($db) {
    echo "Conexión a la base de datos exitosa.<br>";

    // Realizar una consulta simple para verificar la conexión
    $query = "SELECT 1"; // Consulta simple que debería retornar 1
    $result = $db->query($query);
    
    if ($result) {
        echo "Consulta ejecutada correctamente.<br>";
        echo "Resultado de la consulta: " . mysqli_fetch_row($result)[0] . "<br>";
    } else {
        echo "Error al ejecutar la consulta.<br>";
    }

    // Cerrar la conexión
    $db->disconnect();
} else {
    echo "No se pudo conectar a la base de datos.<br>";
}
?>
