<?php
    // CONEXION
    include("../../config/conexion.php");

    if (isset($_GET['barber']) && isset($_GET['date'])) {
        $barber = $_GET['barber'];
        $date   = $_GET['date'];

        $horarios = [];
        for ($h = 9; $h <= 20; $h++) {
            $horarios[] = sprintf("%02d:00:00", $h);
        }

        // BUSQUEDA DE HORARIOS POR BARBERO
        $query = "SELECT hour FROM data WHERE name_barber = ? AND date = ?";
        $stmt = mysqli_prepare($conexion, $query);
        mysqli_stmt_bind_param($stmt, "ss", $barber, $date);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $ocupados = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $ocupados[] = $row['hour'];
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conexion);

        $response = [];
        foreach ($horarios as $hora) {
            $response[] = [
                "hora" => $hora,
                "disponible" => !in_array($hora, $ocupados)
            ];
        }

        header("Content-Type: application/json");
        echo json_encode($response);
    }
