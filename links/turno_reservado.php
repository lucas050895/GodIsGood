<?php
    include("../php/mostrar_registro.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turno reservado - God Is Good</title>
    <link rel="stylesheet" href="../css/turno.css">
</head>
<body>
    <main>
        <?php
            include("../layout/header.php");
        ?>
        
        <div>
            <section class="reservado">
                <h2>
                    <?php
                        echo $nombre
                    ?>
                </h2>
                <h3>¡Tu turno se reservo exitoxamente!</h3>

                <p>Tenes turno el dia <?php echo 
                                            date("d/m", strtotime($fecha))
                ?> a las <?php echo substr($hora, 0, -3)?> </p>
            </section>

            <p>Si no podes asistir, envianos un mensaje via WhatsApp o acercate al local.</p>
        </div>
    </main>
</body>
</html>