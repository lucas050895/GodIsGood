<?php
    include("../../config/conexion.php");

    $date = $_GET['date'];

    $query = $conexion->prepare("SELECT hour FROM data WHERE date = ?");
    $query->bind_param("s", $date);
    $query->execute();
    $result = $query->get_result();

    $hourDisabled = [];
    while ($fila = $result->fetch_assoc()) {
        $hourDisabled[] = substr($fila['hour'], 0, 5);
    }

    echo json_encode($hourDisabled);

    $query->close();
    $conexion->close();
?>