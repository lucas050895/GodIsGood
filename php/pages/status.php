<?php
    /**
    * Página de estado para el sistema de turnos de la barbería "God Is Good".
    * Muestra mensajes dinámicos de éxito o error según el resultado de la reserva.
    * Los mensajes se generan a partir del parámetro 'estado' recibido por GET.
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
    <?php include('layout/meta.php')?>

    <!-- Título de la página -->
    <title>Estado del turno - God Is Good</title>

    <!-- Estilos principales con control de caché -->
    <link rel="stylesheet" href="../../assets/css/styles.css?v=<?php echo filemtime('../../assets/css/styles.css'); ?>">
    <style>
        main{
            height: calc(100dvh - 5em - 3em);
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <!-- Íconos personalizados para mejorar la identidad visual del sitio -->
    <?php include('layout/icons.php') ?>
</head>
<body>   
    <!-- Inclusión del componente de encabezado desde layout/header.php -->
    <?php include("layout/header.php"); ?>

    <!-- Main -->
    <main>
        <?php
            // MENSAJES
            if (!empty($_GET['estado'])) {
                $mensaje = '';
                switch ($_GET['estado']) {
                    case 'registrado':
                        $mensaje = 'El turno se registro correctamente.';
                        $clase = 'registered';
                        break;
                    case 'no_registrado':
                        $mensaje = 'Hubo un error. El turno no se registro.';
                        $clase = 'unregistered';
                        break;
                    case 'turno_ocupado':
                        $mensaje = 'El turno ya se encuentra reservado.';
                        $clase = 'warning';
                        break;
                    default:
                        $mensaje = 'Ha ocurrido un error. Inténtelo nuevamente.';
                        $clase = 'warning';
                        break;
                }

                echo '<div class="' . htmlspecialchars($clase) . '">' . htmlspecialchars($mensaje ) . '</div>';
            }
        ?>
    </main>

    <!-- Inclusión del componente footer desde layout/footer.php -->
    <?php include("layout/footer.php"); ?>
</body>
</html>
