<!--
    Página principal del sitio "God Is Good".
    Muestra el logotipo, acceso a reserva de turnos e inicio de sesión.
    Estructura modular con includes para layout, estilos e íconos.
-->
<?php
    require_once __DIR__ . '/config/app.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Metadatos y configuración del documento -->
    <?php include('php/pages/layout/meta.php') ?>

    <!-- Título de la página -->
    <title>God Is Good</title>

    <!-- Estilos principales con control de caché -->
    <link rel="stylesheet" href="assets/css/index.css?v=<?php echo filemtime('assets/css/index.css'); ?>">
    <link rel="stylesheet" href="assets/css/styles.css?v=<?php echo filemtime('assets/css/styles.css'); ?>">

    <!-- Íconos personalizados para mejorar la identidad visual del sitio -->
    <?php include('php/pages/layout/icons.php') ?>
</head>
<body>
    <main>
        <div class="grid">
            <div>
                <div>
                    <!-- Logotipo principal de la barbería -->
                    <img src="assets/img/logo-sin.png" alt="Logo de la barbería">
                </div>
            </div>

            <div>
                <!-- Botón para acceder al formulario de reserva -->
                <button role="button">
                    <a href="php/pages/reserve.php" class="button-29" role="button">Sacar Turno</a>
                </button>

                <!-- Enlace para iniciar sesión en el sistema -->
                <a href="php/auth/login.php">Iniciar Sesión</a>
            </div>
        </div>
    </main>

    <!-- Inclusión del componente footer desde layout/footer.php -->
    <?php include('php/pages/layout/footer.php') ?>
</body>
</html>
