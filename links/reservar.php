<?php
    include("../conexion/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Turno - God Is Good</title>
    <link rel="stylesheet" href="../css/reservar.css">

</head>
<body>
    <main>
        <?php
            include("../layout/header.php");
        ?>
    
        <section>
            <form action="../php/registrar_turno.php" method="post">
                <fieldset>
                    <legend>Datos</legend>
                        <div>
                            <label for="nombre">Nombre (*)</label>
                            <input id="nombre" name="nombre" type="text" required>
                        </div>

                        <div>
                            <label for="celular">Celular (*)</label>
                            <input id="celular" name="celular" type="number" size="10" required>
                        </div>
                </fieldset>

                <fieldset>
                    <legend>Fecha y horario</legend>
                    <div>
                        <label for="fecha">Día</label>
                        <input type="date" id="fecha" name="fecha" onchange="manejarFechaSeleccionada()" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                    </div>

                    <div>
                        <label for="hora">Horario</label>
                        <select name="hora" id="hora" required>
                            <option value="" selected disabled>Seleccionar un horario</option>
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
                </fieldset>
                        
                <input type="submit" name="enviar" value="Reservar" class="button">
            </form>
            <a href="../links/login.php">Iniciar Sesión</a>
        </section>


    </main>

    <script src="../js/script.js"></script>
</body>
</html>
