<?php
    // Conexión a la base de datos
    require_once __DIR__ . '/../../config/conexion.php';

    // Carga de ruta URL
    require_once __DIR__ . '/../../config/app.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name   = $_POST['name'] ?? '';
        $phone  = $_POST['phone'] ?? '';
        $names_barber = $_POST['names_barber'] ?? '';
        $date   = $_POST['date'] ?? '';
        $hour   = $_POST['hour'] ?? '';

            /**
            * Validación de disponibilidad del turno:
            * Se consulta si ya existe un turno registrado para el mismo barbero,
            * fecha y hora. Si existe, se redirige al estado correspondiente.
            */
        if ($name && $phone && $names_barber && $date && $hour) {

            // Verificar si ya existe un turno con ese barbero, fecha y hora
            $check = $conexion->prepare("SELECT COUNT(*)
                                            FROM data
                                        WHERE name_barber = :names_barber
                                            AND
                                        date = :date AND hour = :hour");
            $check->execute([
                ':names_barber' => $names_barber,
                ':date'   => $date,
                ':hour'   => $hour
            ]);

            if ($check->fetchColumn() > 0) {
                // Ya hay un turno reservado
                header("Location: ".BASE_URL."/php/pages/status.php?estado=turno_ocupado");
                exit();
            }

            // Insertar el turno si está libre
            $stmt = $conexion->prepare("INSERT INTO data(name, phone, name_barber, date, hour) 
                                        VALUES (:name, :phone, :names_barber, :date, :hour)");
            $stmt->execute([
                ':name'         => $name,
                ':phone'        => $phone,
                ':names_barber' => $names_barber,
                ':date'         => $date,
                ':hour'         => $hour
            ]);

            header("Location: ".BASE_URL."/php/pages/status.php?estado=registrado");
            exit();

        } else {
            // Error de registro
            header("Location: ".BASE_URL."/php/pages/status.php?estado=no_registrado");
            exit();
        }

    } else {
        // Error por URL
        header("Location: ".BASE_URL."/php/pages/status.php?estado=error");
        exit();
    }
