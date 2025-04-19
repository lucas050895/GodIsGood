<?php
    include("../conexion/mostrar_registro.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turno no reservado</title>
    <link rel="stylesheet" href="../css/turno_rese_norese.css">
    <link rel="stylesheet" href="../css/general.css">
</head>
<body>
    <main class="contenedor">
        <?php
            include("../layout/menu.php");
        ?>
        <div>
            <section class="noreservado">
                <h3>¡Tu turno no se pudo reservar!</h3>
            </section>

            <p>Si no podes reservar tu turno, envianos un mensaje via WhatsApp o acercate al local.</p>
        </div>
    </main>
</body>
</html>