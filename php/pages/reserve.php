<!-- CONEXION  -->
<?php include("../../config/conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- META -->
    <?php include('layout/meta.php') ?>

    <!-- TITLE -->
    <title>Reservar Turno - God Is Good</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../assets/css/reserve.css?v=<?php echo filemtime('../../assets/css/reserve.css'); ?>">
    <link rel="stylesheet" href="../../assets/css/styles.css?v=<?php echo filemtime('../../assets/css/styles.css'); ?>">

    <!-- ICONS -->
    <?php include("layout/icons.php") ?>
</head>
<body>
    <!-- HEADER -->
    <?php include("layout/header.php"); ?>

    <!-- MAIN -->
    <main>
        <form action="../functions/insert.php" method="post">
            <fieldset>
                <legend>Datos</legend>
                <div>
                    <label for="name">Nombre</label>
                    <input id="name" name="name" type="text" placeholder="Ej: Juan" required>
                </div>

                <div>
                    <label for="cell">Celular</label>
                    <input id="cell" name="cell" type="number" min="0" size="10" placeholder="1123456789" required>
                </div>
            </fieldset>

            <fieldset>
                <legend>Barbero</legend>
                <div>
                    <label for="barber">Barbero</label>
                    <select name="names" id="barber" required>
                        <option value="" selected disabled>Seleccionar</option>
                        <?php 
                            $query = "SELECT names FROM barber WHERE status = 1";
                            $resultado = mysqli_query($conexion, $query);

                            while($fila = mysqli_fetch_array($resultado)): ?>
                                <option value="<?= htmlspecialchars($fila['names']); ?>">
                                    <?= htmlspecialchars($fila['names']); ?>
                                </option>
                        <?php endwhile ?>
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
                        min="<?php $hoy=date("Y-m-d"); echo $hoy; ?>"
                        value="<?= date('Y-m-d'); ?>"
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

    <!-- FOOTER -->
    <?php include("layout/footer.php"); ?>

    <!-- SCRIPT -->
    <script src="../../assets/js/script.js?v=<?php echo filemtime('../../assets/js/script.js'); ?>"></script>
</body>
</html>
