<?php
    // Carga de funciones y configuración de conexión
    include("../../config/function.php");

    // Indica que la respuesta será en formato JSON
    header("Content-Type: application/json");

    // Validación de parámetros requeridos
    if (isset($_GET['barber']) && isset($_GET['date'])) {
        $barber = $_GET['barber'];
        $date   = $_GET['date'];

        // Genera el rango de horas disponibles (de 09:00 a 20:00)
        $horarios = [];
        for ($h = 9; $h <= 20; $h++) {
            $horarios[] = sprintf("%02d:00:00", $h);
        }

        // Consulta las horas ya ocupadas para ese barbero y fecha
        $busy = hours($conexion, $barber, $date);

        // Construye la respuesta indicando disponibilidad por hora
        $response = array_map(function($hora) use ($busy) {
            return [
                "hora" => $hora,
                "disponible" => !in_array($hora, $busy)
            ];
        }, $horarios);

        // Devuelve la respuesta en formato JSON
        echo json_encode($response);
    }
    