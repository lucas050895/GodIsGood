<!-- CONEXION -->
<?php include("../../config/conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- META -->
    <?php include('layout/meta.php')?>

    <!-- TITLE -->
    <title>Estado del turno - God Is Good</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../assets/css/styles.css?v=<?php echo filemtime('../../assets/css/styles.css'); ?>">

    <style>
        main{
            height: calc(100dvh - 5em - 3em);
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <!-- ICONS -->
    <?php include('layout/icons.php') ?>
</head>
<body>   
    <!-- HEADER -->
    <?php include("layout/header.php"); ?>

    <!-- MAIN -->
    <main>
        <?php
            // MENSAJES
            if (!empty($_GET['estado'])) {
                $mensaje = '';
                switch ($_GET['estado']) {
                    case 'registrado':
                        $mensaje = 'El turno se registro correctamente.';
                        $clase = 'registrado';
                        break;
                    case 'no_registrado':
                        $mensaje = 'Hubo un error. El turno no se registro.';
                        $clase = 'no_registrado';
                        break;
                    default:
                        $mensaje = 'Ha ocurrido un error. Inténtelo nuevamente.';
                        $clase = 'aviso';
                        break;
                }

                echo '<div class="' . htmlspecialchars($clase) . '">' . htmlspecialchars($mensaje ) . '</div>';
            }
        ?>
    </main>

    <!-- HEADER -->
    <?php include("layout/footer.php"); ?>

    <script src="../../assets/js/script.js"></script>
</body>
</html>
