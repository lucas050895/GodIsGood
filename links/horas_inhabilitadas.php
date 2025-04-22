<?php
    include("../conexion/conexion.php");

    $fecha = $_GET['fecha'];

    $query = $conexion->prepare("SELECT hora FROM datos WHERE fecha = ?");
    $query->bind_param("s", $fecha);
    $query->execute();
    $result = $query->get_result();

    $horasInhabilitadas = [];
    while ($fila = $result->fetch_assoc()) {
        $horasInhabilitadas[] = substr($fila['hora'], 0, 5);
    }

    echo json_encode($horasInhabilitadas);

    $query->close();
    $conexion->close();
?>