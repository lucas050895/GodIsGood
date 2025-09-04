<?php
    // Carga de funciones auxiliares y conexión PDO
    include('../../config/function.php');

    // Obtiene el nombre del barbero y el tipo de filtro desde el formulario
    $barber = $_POST['barber'] ?? null;
    $filtro = $_POST['filtro'] ?? 'actual'; // 'actual' muestra solo turnos futuros

    // Validación: si no se recibe el nombre del barbero, se muestra mensaje y se detiene la ejecución
    if (!$barber) {
        echo "<tr><td colspan='3'>No se recibió el nombre del barbero.</td></tr>";
        exit;
    }

    /**
    * Consulta de turnos:
    * Se llama a la función turnBarber() que retorna los turnos del barbero
    * según el filtro seleccionado ('actual' o 'todos').
    */
    $turn = turnBarber($conexion, $barber, $filtro);

    // Renderizado de resultados en tabla HTML
    if (count($turn) > 0) {
        foreach ($turn as $row) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['name']) . "</td>
                    <td>" . htmlspecialchars($row['phone']) . "</td>
                    <td>" . substr(htmlspecialchars($row['hour']), 0, -3) . "</td>
                  </tr>";
        }
    } else {
        // Si no hay turnos registrados, se muestra mensaje informativo
        echo "<tr><td colspan='3'>Por el momento no hay turnos registrados.</td></tr>";
    }
