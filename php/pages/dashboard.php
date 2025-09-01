<?php
    // CONEXION
    include("../../config/conexion.php");
    // SESION
    include("../../config/sesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- META -->
    <?php include('layout/meta.php')?>

    <!-- TITLE -->
    <title>Dashbord - God Is Good</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboard.css?v=<?php echo filemtime('../../assets/css/dashboard.css'); ?>">
    <link rel="stylesheet" href="../../assets/css/styles.css?v=<?php echo filemtime('../../assets/css/styles.css'); ?>">

    <!-- ICONS -->
    <?php include('layout/icons.php') ?>
</head>
<body>
    <!-- HEADER -->
    <?php include("layout/header.php"); ?>

    <!-- MAIN -->
    <main>
        <div>
            <select name="names" id="barber" required>
                <option value="" selected disabled>Seleccionar barbero</option>
                <?php
                    $query = "SELECT DISTINCT name_barber FROM data";

                    $resultado = mysqli_query($conexion, $query);
                    while($row = mysqli_fetch_array($resultado)): ?>
                        <option value="<?= htmlspecialchars($row['name_barber']); ?>">
                            <?= htmlspecialchars($row['name_barber']); ?>
                        </option>
                <?php endwhile ?>
            </select>

            <div id="filtro-opciones">
                <label>
                    <input type="radio" name="horaFiltro" value="actual" checked>
                    Hora actual
                </label>
                <label>
                    <input type="radio" name="horaFiltro" value="todos">
                    Todos
                </label>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Celular</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody id="turnos-body">
                <tr>
                    <td colspan="3">Seleccioná un barbero para ver sus turnos.</td>
                </tr>
            </tbody>
        </table>
    </main>

    <!-- FOOTRE -->
    <?php include("layout/footer.php"); ?>

    <!-- SCRIPT -->
    <script>
        function cargarTurnos() {
            const barber = document.getElementById('barber').value;
            const filtro = document.querySelector('input[name="horaFiltro"]:checked').value;

            if (!barber) return;

            fetch('../functions/filtre.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'barber=' + encodeURIComponent(barber) + '&filtro=' + encodeURIComponent(filtro)
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('turnos-body').innerHTML = data;
            });
        }

        document.getElementById('barber').addEventListener('change', cargarTurnos);
        document.querySelectorAll('input[name="horaFiltro"]').forEach(radio => {
            radio.addEventListener('change', cargarTurnos);
        });
    </script>
</body>
</html>
