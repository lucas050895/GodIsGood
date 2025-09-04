<?php

    // Carga de la zona horaria predeterminada
    include_once __DIR__ . '/date.php';

    // Configuración de conexión PDO
    require_once __DIR__ . '/conexion.php';

    
    /**
    * Genera opciones HTML `<option>` con los nombres de barberos activos.
    *
    * Esta función realiza una consulta a la tabla `barber` para obtener los nombres
    * de los barberos cuyo estado (`status`) es igual a 1. Luego imprime cada nombre
    * como una opción dentro de un elemento `<select>`.
    * @param PDO $conexion Instancia activa de conexión PDO a la base de datos.
    * @return void No retorna ningún valor; imprime directamente las opciones HTML.
    * @throws PDOException Si ocurre un error al preparar o ejecutar la consulta.
    */
    function nameBarber($conexion) {
        $sql = "SELECT names FROM barber WHERE status = 1";
        $stmt = $conexion->prepare($sql);

        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <option value="<?= htmlspecialchars($row['names']); ?>">
                    <?= htmlspecialchars($row['names']); ?>
                </option>
                <?php
            }
        } else {
            echo "<option>Error al cargar nombres</option>";
        }
    }

    
    /**
    * Obtiene las horas disponibles para un barbero en una fecha específica.
    *
    * @param PDO $conexion Conexión activa a la base de datos.
    * @param string $barber Nombre del barbero.
    * @param string $date Fecha en formato 'YYYY-MM-DD'.
    * @return array Lista de horas disponibles (cada elemento es un array asociativo).
    * @throws PDOException Si ocurre un error en la consulta.
    */
    function hours(PDO $conexion, string $barber, string $date): array {
        $sql = "SELECT hour FROM data WHERE name_barber = :barber AND date = :date";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([
            ':barber' => $barber,
            ':date' => $date
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
    * Genera dinámicamente las opciones de barberos disponibles en el sistema.
    *
    * @param PDO $conexion Conexión activa a la base de datos.
    * @return void Imprime directamente elementos <option> con los nombres únicos de barberos.
    * @throws PDOException Si ocurre un error en la preparación o ejecución de la consulta.
    */
    function selectBarber(PDO $conexion): void {
        $sql = "SELECT DISTINCT name_barber FROM data";
        $stmt = $conexion->prepare($sql);

        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <option value="<?= htmlspecialchars($row['name_barber']); ?>">
                    <?= htmlspecialchars($row['name_barber']); ?>
                </option>
                <?php
            }
        } else {
            echo "<option>Error al cargar nombres</option>";
        }
    }


    /**
    * Obtiene los turnos de un barbero para la fecha actual.
    *
    * @param PDO $conexion Conexión PDO a la base de datos.
    * @param string $barber Nombre del barbero.
    * @param string $filtro Tipo de filtro: 'actual' o 'todos'.
    * @return array Arreglo de turnos (cada uno con name, phone, hour).
    */
    function turnBarber(PDO $conexion, string $barber, string $filtro = 'actual'): array {
        $fecha_actual = date('Y-m-d');
        $hora_actual = date('H:i');

        try {
            if ($filtro === 'actual') {
                $sql = "SELECT name, phone, hour 
                            FROM data 
                            WHERE date = :fecha 
                                AND hour >= :hora 
                                AND name_barber = :barber 
                            ORDER BY hour ASC";
                $stmt = $conexion->prepare($sql);
                $stmt->bindParam(':fecha', $fecha_actual);
                $stmt->bindParam(':hora', $hora_actual);
                $stmt->bindParam(':barber', $barber);
            } else {
                $sql = "SELECT name, phone, hour 
                            FROM data 
                            WHERE date = :fecha 
                                AND name_barber = :barber 
                            ORDER BY hour ASC";
                $stmt = $conexion->prepare($sql);
                $stmt->bindParam(':fecha', $fecha_actual);
                $stmt->bindParam(':barber', $barber);
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return [];
        }
    }
