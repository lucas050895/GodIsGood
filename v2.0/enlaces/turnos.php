<?php
    include("../base/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnos</title>
    <link rel="stylesheet" href="../css/turnos.css">
    <link rel="stylesheet" href="../css/general.css">

</head>
<body>
    <!-- CONTENEDOR GENERAL DE ESTA PÁGINA -->
    <main class="contenedor">

        <!-- MENU DE FORMA DINAMICA -->
        <?php
            include("../layout/menu.php");
        ?>

        <!-- SECCION DE CONTENIDO GENERAL -->
        <div class="contenido">
            <!-- TITULO PRINCIPAL DE LA PAGINA -->
            <div class="titulo">
                <h2>Elige el día y horario disponibles</h2>
            </div>

            <!-- SECCION DE PESTAÑAS Y CONTENIDO -->
            <div class="tabset">
                <!-- PESTAÑA 1 -->
                <input type="radio" name="tabset" id="tab1" aria-controls="lunes" checked>
                <label for="tab1">Lunes</label>
                <!-- PESTAÑA 2 -->
                <input type="radio" name="tabset" id="tab2" aria-controls="martes">
                <label for="tab2">Martes</label>
                <!-- PESTAÑA 3 -->
                <input type="radio" name="tabset" id="tab3" aria-controls="miercoles">
                <label for="tab3">Miercoles</label>
                <!-- PESTAÑA 4 -->
                <input type="radio" name="tabset" id="tab4" aria-controls="jueves">
                <label for="tab4">Jueves</label>
                <!-- PESTAÑA 5 -->
                <input type="radio" name="tabset" id="tab5" aria-controls="viernes">
                <label for="tab5">Viernes</label>
                <!-- PESTAÑA 6 -->
                <input type="radio" name="tabset" id="tab6" aria-controls="sabado">
                <label for="tab6">Sabado</label>

                <!-- CONTENEDOR DEL CONTENIDO DE LAS PESTAÑAS -->
                <div class="tab-panels">

                    <!-- CONTENIDO DE LA PESTAÑA 1 -->
                    <section id="lunes" class="tab-panel">
                        <h3>Lunes</h3>
                        <!-- BASE DE DATOS  -->
                        <?php
                            include("../base/mostrar_horas_lunes.php");
                        ?>
                   </section>

                   <!-- CONTENIDO DE LA PESTAÑA 2 -->
                    <section id="martes" class="tab-panel">
                        <h3>Martes</h3>
                        <!-- BASE DE DATOS  -->
                        <!-- <?php
                            include("../base/mostrar_horas_martes.php");
                        ?> -->
                    </section>

                    <!-- CONTENIDO DE LA PESTAÑA 3 -->
                    <section id="miercoles" class="tab-panel">
                        <h3>Miercoles</h3>
                        <!-- BASE DE DATOS  -->
                        <!-- <?php
                            include("../base/mostrar_horas_miercoles.php");
                        ?> -->
                    </section>
                    
                    <!-- CONTENIDO DE LA PESTAÑA 4 -->
                    <section id="jueves" class="tab-panel">
                        <h3>Jueves</h3>
                        <!-- BASE DE DATOS  -->
                        <!-- <?php
                            include("../base/mostrar_horas_jueves.php");
                        ?> -->
                    </section>

                    <!-- CONTENIDO DE LA PESTAÑA 5 -->
                    <section id="viernes" class="tab-panel">
                        <h3>Viernes</h3>
                        <!-- BASE DE DATOS  -->
                        <!-- <?php
                            include("../base/mostrar_horas_viernes.php");
                        ?> -->
                    </section>

                    <!-- CONTENIDO DE LA PESTAÑA 6 -->
                    <section id="sabado" class="tab-panel">
                        <h3>Sabado</h3>
                        <!-- BASE DE DATOS  -->
                        <!-- <?php
                            include("../base/mostrar_horas_sabado.php");
                        ?> -->
                    </section>

                </div>
            
            </div>

            
        </div>

    </main>

    <script src="../js/reservar.js"></script>

</body>
</html>
