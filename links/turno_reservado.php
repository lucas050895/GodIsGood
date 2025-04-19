<?php
    include("../php/mostrar_registro.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turno reservado</title>
    <link rel="stylesheet" href="../css/turno_rese_norese.css">
    <link rel="stylesheet" href="../css/general.css">
</head>
<body>
    <main class="contenedor">
        <?php
            include("../layout/menu.php");
        ?>
        <div>
            <section class="reservado">
                <h2>
                    <?php
                        echo $nombre
                    ?>
                </h2>
                <h3>¡Tu turno se reservo exitoxamente!</h3>

                <p>Tenes turno el dia <?php echo $fecha?> a las <?php echo $hora?> </p>
            </section>

            <p>Si no podes asistir, envianos un mensaje via WhatsApp o acercate al local.</p>
        </div>
    </main>
</body>
</html>