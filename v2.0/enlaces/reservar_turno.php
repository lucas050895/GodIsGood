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
            <div class="dias">
                <h3>Elegi el dia y horario</h3>
                <div>
                    <div>
                        <label for="10">10:00</label>
                        <input type="button" value="Reservar" id="10">
                    </div>

                    <div>
                        <label for="11">11:00</label>
                        <input type="button" value="Reservar" id="11">
                    </div>

                    <div>
                        <label for="12">12:00</label>
                        <input type="button" value="Reservar" id="12">
                    </div>

                    <div>
                        <label for="13">13:00</label>
                        <input type="button" value="Reservar" id="13">
                    </div>

                    <div>
                        <label for="14">14:00</label>
                        <input type="button" value="Reservar" id="14">
                    </div>

                    <div>
                        <label for="15">15:00</label>
                        <input type="button" value="Reservar" id="15">
                    </div>

                    <div>
                        <label for="16">16:00</label>
                        <input type="button" value="Reservar" id="16">
                    </div>

                    <div>
                        <label for="17">17:00</label>
                        <input type="button" value="Reservar" id="17">
                    </div>

                    <div>
                        <label for="18">18:00</label>
                        <input type="button" value="Reservar" id="18">
                    </div>

                    <div>
                        <label for="19">19:00</label>
                        <input type="button" value="Reservar" id="19">
                    </div>

                    <div>
                        <label for="20">20:00</label>
                        <input type="button" value="Reservar" id="20">
                    </div>
                    <div>
                        <label for="21">21:00</label>
                        <input type="button" value="Reservar" id="21">
                    </div>
                </div>
            </div>
        </form>

    </main>
</body>
</html>
