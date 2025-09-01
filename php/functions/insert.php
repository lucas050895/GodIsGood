<?php
    // CONEXION
    include("../../config/conexion.php");

    if (
        isset($_POST['name']) && 
        isset($_POST['cell']) && 
        isset($_POST['names']) &&
        isset($_POST['date']) && 
        isset($_POST['hour'])
    ) {
        $name        = $_POST['name'];
        $cell        = $_POST['cell'];
        $name_barber = $_POST['names'];
        $date        = $_POST['date'];
        $hour        = $_POST['hour'];

        // VALIDAR EL TURNO
        $verificar = "SELECT COUNT(*) AS total FROM data WHERE name_barber = ? AND date = ? AND hour = ?";
        $stmtVerificar = mysqli_prepare($conexion, $verificar);
        mysqli_stmt_bind_param($stmtVerificar, "sss", $name_barber, $date, $hour);
        mysqli_stmt_execute($stmtVerificar);
        mysqli_stmt_bind_result($stmtVerificar, $total);
        mysqli_stmt_fetch($stmtVerificar);
        mysqli_stmt_close($stmtVerificar);

        if ($total > 0) {
            // REDIRIGE SI YA EXITE EL TURNO
            header("Location: http://lucasconde.ddns.net/GodIsGood/php/pages/status.php?estado=turno_ocupado");
            exit;
        }

        // INSERTANDO EL TURNO
        $consulta = "INSERT INTO data(name, cell, name_barber, date, hour) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "sssss", $name, $cell, $name_barber, $date, $hour);

        $resultado = mysqli_stmt_execute($stmt);

        if ($resultado) {
            header("Location: http://lucasconde.ddns.net/GodIsGood/php/pages/status.php?estado=registrado");
        } else {
            header("Location: http://lucasconde.ddns.net/GodIsGood/php/pages/status.php?estado=no_registrado");
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conexion);
    } else {
        header("Location: http://lucasconde.ddns.net/GodIsGood/php/pages/status.php?estado=error_formulario");
    }
