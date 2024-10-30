<?php

require '../clase31/dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

include 'conf.php';

$archivo = 'DWSL'.date('Ymd_His').'pdf';

$sql = "SELECT id, nombre, telefono, direccion from tbl_datos";
$resultados = mysqli_query($conexion, $sql);

$html = '<table border="1" cellspacing="0"
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Direccion</th>
        </tr>
>';

while ($row = $resultados->fetch_assoc()) {
    $html .= '
        <tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['nombre'] . '</td>
            <td>' . $row['telefono'] . '</td>
            <td>' . $row['direccion'] . '</td>
        </tr>
    ';
}

$html .= '</table>';

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF               
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($archivo);

