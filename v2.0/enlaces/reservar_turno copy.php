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
            <div class="titulo">
                <h2>Elige el día y horario disponibles</h2>
            </div>

            <div class="tabset">
                <!-- Tab 1 -->
                <input type="radio" name="tabset" id="tab1" aria-controls="lunes" checked>
                <label for="tab1">Lunes</label>
                <!-- Tab 2 -->
                <input type="radio" name="tabset" id="tab2" aria-controls="martes">
                <label for="tab2">Martes</label>
                <!-- Tab 3 -->
                <input type="radio" name="tabset" id="tab3" aria-controls="miercoles">
                <label for="tab3">Miercoles</label>
                <!-- Tab 4 -->
                <input type="radio" name="tabset" id="tab4" aria-controls="jueves">
                <label for="tab4">Jueves</label>
                <!-- Tab 5 -->
                <input type="radio" name="tabset" id="tab5" aria-controls="viernes">
                <label for="tab5">Viernes</label>
                <!-- Tab 6 -->
                <input type="radio" name="tabset" id="tab6" aria-controls="sabado">
                <label for="tab6">Sabado</label>


                <div class="tab-panels">
                    <section id="lunes" class="tab-panel">
                        <h3>Lunes</h3>
                        <?php
                            include("../base/mostrar_horas_lunes.php");
                        ?>
                   </section>

                    <section id="martes" class="tab-panel">
                        <h3>Martes</h3>
                        <?php
                            include("../base/mostrar_horas_martes.php");
                        ?>
                    </section>

                    <section id="miercoles" class="tab-panel">
                        <h3>Miercoles</h3>
                        <?php
                            include("../base/mostrar_horas_miercoles.php");
                        ?>
                    </section>
                    
                    <section id="jueves" class="tab-panel">
                        <h3>Jueves</h3>
                        <?php
                            include("../base/mostrar_horas_jueves.php");
                        ?>
                    </section>

                    <section id="viernes" class="tab-panel">
                        <h3>Viernes</h3>
                        <?php
                            include("../base/mostrar_horas_viernes.php");
                        ?>
                    </section>

                    <section id="sabado" class="tab-panel">
                        <h3>Sabado</h3>
                        <?php
                            include("../base/mostrar_horas_sabado.php");
                        ?>
                    </section>

                </div>
            
            </div>

            
        </form>

    </main>

    <script src="../js/reservar.js"></script>

</body>
</html>
