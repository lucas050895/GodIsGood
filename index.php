<!DOCTYPE html>
<html lang="es">
<head>
    <!-- META -->
    <?php include('php/pages/layout/meta.php')?>

    <!-- TITLE -->
    <title>God Is Good</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/index.css?v=<?php echo filemtime('assets/css/index.css'); ?>">
    <link rel="stylesheet" href="assets/css/styles.css?v=<?php echo filemtime('assets/css/styles.css'); ?>">

    <!-- ICONS -->
    <?php include('php/pages/layout/icons.php') ?>
</head>
<body>
    <main>
        <div class="grid">
            <div>
                <div>
                    <img src="assets/img/logo-sin.png" alt="Logo de la barberia">
                </div>
            </div>

            <div>
                <button role="button">
                    <a href="php/pages/reserve.php " class="button-29" role="button">Sacar Turno</a>
                </button>

                <a href="php/auth/login.php">Iniciar Sesión</a>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <?php include('php/pages/layout/footer.php')?>
</body>
</html>
