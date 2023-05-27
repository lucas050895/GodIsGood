<?php
    include("../base/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Turno</title>
    <link rel="stylesheet" href="../css/reservar_turno.css">
    <link rel="stylesheet" href="../css/general.css">

</head>
<body>
    <main class="contenedor">
        <?php
            include("../layout/menu.php");
        ?>

        <form action="" method="post">
            <div class="datos">
                <h3>ingresa tus datos</h3>
                <div>
                    <div>
                        <label for="nombre">Nombre</label>
                        <input id="nombre" name="nombre" type="text">
                    </div>

                    <div>
                        <label for="celular">Celular</label>
                        <input id="celular" name="celular" type="tel" size="10">
                    </div>
                </div>
            </div>

            <div class="dias">
                <h3>Elegi el dia y horario</h3>
                <div>
                    <div>
                        <label for="dia">Dia</label>
                        <input type="date" name="dia" id="dia" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?> />
                    </div>
                    <div>
                        <label for="hora">Horario</label>
                        <?php
                            include("../base/mostrar_hora.php");
                        ?>
                    </div>
                </div>
            </div>

            <input type="submit" name="enviar" value="RESERVAR" class="button">
            <?php
                include("../base/registrar_turno.php")
            ?>
        </form>

    </main>
</body>
</html>
