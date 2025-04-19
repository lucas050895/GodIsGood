<?php
    include("../conexion/conexion.php");
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

        <form action="../php/registrar_turno.php" method="post">
            <div class="datos">
                <h3>ingresa tus datos</h3>
                <div>
                    <div>
                        <label for="nombre">Nombre (*)</label>
                        <input id="nombre" name="nombre" type="text" required>
                    </div>

                    <div>
                        <label for="celular">Celular (*)</label>
                        <input id="celular" name="celular" type="tel" size="10" required>
                    </div>
                </div>
            </div>

            <div class="dias">
                <h3>Elegi el dia y horario</h3>
                <div>
                    <div>
                        <label for="fecha">Dia</label>
                        <input type="date" id="fecha" name="fecha" onchange="manejarFechaSeleccionada()" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                    </div>
                    <div>
                        <label for="hora">Horario</label>
                        <select name="hora" id="hora" required>
                            <option value="" selected disabled>Seleccionar una hora</option>
                            <?php
                                $consulta = "SELECT * FROM horas";
                                $resultado = mysqli_query($conexion, $consulta);
                                
                                if ($resultado ){
                                    while($row = $resultado->fetch_array()){
                                        $hora = $row['hora'];
                                        ?>
                                            <option value="<?php echo $row['hora'] ?>"> 
                                                    <?php echo substr($row['hora'], 0, -3) ?>
                                            </option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <input type="submit" name="enviar" value="RESERVAR" class="button">
        </form>

    </main>


    <script src="../js/script.js"></script>
</body>
</html>
