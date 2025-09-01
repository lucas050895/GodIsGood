<?php
    // CONEXION
    include('../../config/conexion.php');

    $barber = $_POST['barber'] ?? null;
    $filtro = $_POST['filtro'] ?? 'actual';

    if (!$barber) {
        echo "<tr><td colspan='3'>No se recibió el nombre del barbero.</td></tr>";
        exit;
    }

    $fecha_actual = date('Y-m-d');
    $hora_actual = date('H:i');

    if ($filtro === 'actual') {
        $consulta = "SELECT name, cell, hour 
                     FROM data 
                     WHERE date = '$fecha_actual' 
                     AND hour >= '$hora_actual' 
                     AND name_barber = '$barber' 
                     ORDER BY hour ASC";
    } else {
        $consulta = "SELECT name, cell, hour 
                     FROM data 
                     WHERE date = '$fecha_actual' 
                     AND name_barber = '$barber' 
                     ORDER BY hour ASC";
    }

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado->num_rows > 0) {
        while($row = $resultado->fetch_array()) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['cell']}</td>
                    <td>" . substr($row['hour'], 0, -3) . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Por el momento no hay turnos registrados.</td></tr>";
    }
