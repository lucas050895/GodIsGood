<?php
    // Carga de funciones auxiliares y configuración de conexión PDO
    include("../../config/function.php");
    // Carga de ruta URL
    require_once __DIR__ . '/../../config/app.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Metadatos y configuración del documento -->
    <?php include('layout/meta.php')?>

    <!-- Título de la página -->
    <title>Dashbord - God Is Good</title>

    <!-- Estilos principales con control de caché -->
    <link rel="stylesheet" href="../../assets/css/dashboard.css?v=<?php echo filemtime('../../assets/css/dashboard.css'); ?>">
    <link rel="stylesheet" href="../../assets/css/styles.css?v=<?php echo filemtime('../../assets/css/styles.css'); ?>">

    <!-- Íconos personalizados para mejorar la identidad visual del sitio -->
    <?php include('layout/icons.php') ?>
</head>
<body>
    <!-- Inclusión del componente de encabezado desde layout/header.php -->
    <?php include("layout/header.php"); ?>

    <!-- Main -->
    <main>
        <div>
            <select name="names" id="barber" required>
                <option value="" selected disabled>Seleccionar barbero</option>
                <?php 
                    selectBarber($conexion); 
                ?>
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

    <!-- Inclusión del componente footer desde layout/footer.php -->
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
