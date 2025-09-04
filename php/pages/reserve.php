<?php
    /**
    * Página de reserva de turnos para la barbería "God Is Good".
    * Permite al usuario seleccionar barbero, fecha y hora.
    * Los datos se envían a insert.php para su procesamiento.
    */

    // Carga de funciones auxiliares y configuración de conexión PDO
    include_once("../../config/function.php");

    // Carga de ruta URL
    require_once __DIR__ . '/../../config/app.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Metadatos y configuración del documento -->
    <?php include('layout/meta.php') ?>

    <!-- Título de la página -->
    <title>Reservar Turno - God Is Good</title>

    <!-- Estilos principales con control de caché -->
    <link rel="stylesheet" href="../../assets/css/reserve.css?v=<?php echo filemtime('../../assets/css/reserve.css'); ?>">
    <link rel="stylesheet" href="../../assets/css/styles.css?v=<?php echo filemtime('../../assets/css/styles.css'); ?>">

    <!-- Íconos personalizados para mejorar la identidad visual del sitio -->
    <?php include("layout/icons.php") ?>
</head>
<body>
    <!-- Inclusión del componente de encabezado desde layout/header.php -->
    <?php include("layout/header.php"); ?>

    <!-- Main -->
    <main>
        <!-- Formulario de reserva de turno -->
        <form action="../functions/insert.php" method="post">
            <fieldset>
                <legend>Datos</legend>
                <div>
                    <label for="name">Nombre</label>
                    <input id="name" name="name" type="text" placeholder="Ej: Juan" required>
                </div>

                <div>
                    <label for="phone">Celular</label>
                    <input id="phone" name="phone" type="number" min="0" size="10" placeholder="1123456789" required>
                </div>
            </fieldset>

            <fieldset>
                <legend>Barbero</legend>
                <div>
                    <label for="barber">Barbero</label>
                    <select name="names_barber" id="barber" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <?php 
                            // Carga dinámica de barberos activos desde la base de datos
                            nameBarber($conexion); 
                        ?>
                    </select>
                </div>
            </fieldset>

            <fieldset>
                <legend>Fecha y horario</legend>
                <div>
                    <label for="date">Fecha</label>
                    <input type="date" 
                        id="date"
                        name="date"
                        min="<?php
                                // Establece la fecha mínima como hoy
                                $hoy=date("Y-m-d"); echo $hoy;
                            ?>"
                        value="<?= 
                                // Precarga el valor actual
                                date('Y-m-d'); 
                            ?>"
                        required>
                </div>

                <div>
                    <label for="hour">Hora</label>
                    <select name="hour" id="hour" required>
                        <option value="" selected disabled>Seleccionar</option>
                    </select>
                </div>
            </fieldset>

            <input type="submit" name="enviar" value="Reservar" class="button">
        </form>
    </main>

    <!-- Inclusión del componente footer desde layout/footer.php -->
    <?php include("layout/footer.php"); ?>

    <!-- Carga del script con versión dinámica para evitar caché -->
    <script src="../../assets/js/script.js?v=<?php echo filemtime('../../assets/js/script.js'); ?>"></script>
</body>
</html>
